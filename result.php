<?php 
	$con = mysqli_connect('localhost','root','');
	if(!$con)
	{
		echo "Not connected to server";
	}
	if(!mysqli_select_db($con, 'crud'))
	{
		echo "Database Not Started";
	}
	
	$sql = "SELECT * FROM crudapp";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			?>
			<tr id="<?php echo $row["id"]; ?>">
				<td><?php echo $row["fullName"]; ?></td>
				<td><?php echo $row["empCode"]; ?></td>
				<td><?php echo $row["salary"]; ?></td>
				<td><?php echo $row["city"]; ?></td>
				<td>
					<a onclick="onEdit('<?php echo $row["id"]; ?>')">Edit</a>
					<a onclick="onDeleteRecord('<?php echo $row["id"]; ?>')">Delete</a>
				</td>
			</tr>
			<?php
		}
	} else {
		echo "0 results";
	}
?>


