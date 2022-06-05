$(document).ready(function () {
  $.ajax({
    url: "result.php",
    success: function (data) {
      $(".dy_data").html(data);
    },
  });
});

function onDeleteRecord(id) {
  if (confirm("Are you sure to delete this record ?")) {
    $.ajax({
      url: "delete.php",
      type: "post",
      data: { id: id },
      success: function (data) {
        alert(data);
        const row = document.getElementById(id);
        document.getElementById("employeeList").deleteRow(row.rowIndex);
        resetForm();
      },
    });
  }
}

var selectedRow = null;

function onFormSubmit(event) {
  event.preventDefault();
  var formData = readFormData();
  if (selectedRow == null) {
    insertNewRecord(formData);
  } else {
    updateRecord(formData);
  }
}

function readFormData() {
  var formData = {};
  formData["full_name"] = document.getElementById("full_name").value;
  formData["email"] = document.getElementById("email").value;
  formData["type"] = document.getElementById("type").value;
  formData["password"] = document.getElementById("password").value;
  return formData;
}

function insertNewRecord(data) {
  $.ajax({
    url: "insert.php",
    type: "post",
    data: $("#form").serialize(),
    success: function (d) {
      resetForm();
      var table = document
        .getElementById("users_list")
        .getElementsByTagName("tbody")[0];
      var newRow = table.insertRow(table.length);
      cell1 = newRow.insertCell(0);
      cell1.innerHTML = data.full_name;
      cell2 = newRow.insertCell(1);
      cell2.innerHTML = data.email;
      cell3 = newRow.insertCell(2);
      cell3.innerHTML = data.type;
      cell4 = newRow.insertCell(3);
      cell4.innerHTML = data.password;
      cell4 = newRow.insertCell(4);
      cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
    },
  });
}

function resetForm() {
  document.getElementById("full_name").value = "";
  document.getElementById("email").value = "";
  document.getElementById("type").value = "";
  document.getElementById("password").value = "";
  selectedRow = null;
}

function onEdit(id) {
  selectedRow = document.getElementById(id);
  document.getElementById("full_name").value = selectedRow.cells[0].innerHTML;
  document.getElementById("email").value = selectedRow.cells[1].innerHTML;
  document.getElementById("type").value = selectedRow.cells[2].innerHTML;
  document.getElementById("password").value = selectedRow.cells[3].innerHTML;
}

function updateRecord(formData) {
  selectedRow.cells[0].innerHTML = formData.full_name;
  selectedRow.cells[1].innerHTML = formData.email;
  selectedRow.cells[2].innerHTML = formData.type;
  selectedRow.cells[3].innerHTML = formData.password;
  resetForm();
}
