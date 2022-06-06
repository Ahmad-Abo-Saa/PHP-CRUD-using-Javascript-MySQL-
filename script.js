let fullNameInput;

let selectedRow = null;

$(document).ready(function () {
  fullNameInput = document.getElementById("full_name");
  $.ajax({
    url: "result.php",
    success: function (data) {
      $(".dy_data").html(data);
    },
  });
});

function onDeleteRecord(email) {
  if (confirm("Are you sure to delete this record ?")) {
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: { email },
      success: function (data) {
        alert(data);
        const row = document.getElementById(email);
        document.getElementById("users_list").deleteRow(row.rowIndex);
        resetForm();
      },
    });
  }
}

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
  return {
    full_name: fullNameInput.value,
    email: document.getElementById("email").value,
    type: document.getElementById("type").value,
    password: document.getElementById("password").value,
  };
}

function insertNewRecord(data) {
  $.ajax({
    url: "insert.php",
    type: "post",
    data: { ...data, action: "insert" },
    success: function (d) {
      if (d != "Inserted") {
        alert(d);
      } else {
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
        cell4.innerHTML = `<button class="btn btn-link" onclick="onEdit(${data.email})">Edit</button>
      <button class="btn btn-link" onclick="onDeleteRecord(${data.email})">Delete</button>`;
      }
    },
  });
}

function resetForm() {
  fullNameInput.value = "";
  document.getElementById("email").value = "";
  document.getElementById("email").readOnly = false;
  document.getElementById("type").value = "";
  document.getElementById("password").value = "";
  selectedRow = null;
}

function onEdit(id) {
  selectedRow = document.getElementById(id);
  fullNameInput.value = selectedRow.cells[0].innerHTML;
  document.getElementById("email").value = selectedRow.cells[1].innerHTML;
  document.getElementById("email").readOnly = true;
  document.getElementById("type").value = selectedRow.cells[2].innerHTML;
  document.getElementById("password").value = selectedRow.cells[3].innerHTML;
}

function updateRecord(formData) {
  $.ajax({
    url: "insert.php",
    type: "POST",
    data: { ...formData, action: "update" },
    success: function (d) {
      if (d != "Updated") {
        alert(d);
      } else {
        selectedRow.cells[0].innerHTML = formData.full_name;
        selectedRow.cells[1].innerHTML = formData.email;
        selectedRow.cells[2].innerHTML = formData.type;
        selectedRow.cells[3].innerHTML = formData.password;
        resetForm();
      }
    },
  });
}
