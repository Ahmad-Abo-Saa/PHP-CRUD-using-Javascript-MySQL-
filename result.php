<?php
try {
	$con = mysqli_connect('localhost', 'root', '');
	if (!$con) {
		echo "Not connected to server";
	}

	$con->query("CREATE DATABASE IF NOT EXISTS `crud`");

	$con->query(
		"CREATE TABLE IF NOT EXISTS `crud`.`crud_app`(
			`email` VARCHAR(20) NOT NULL,
			`password` VARCHAR(20) NOT NULL,
			`full_name` VARCHAR(20) NOT NULL,
			`type` VARCHAR(10) NOT NULL,
			PRIMARY KEY (`email`));"
	);

	if (!mysqli_select_db($con, 'crud')) {
		echo "Database Not Started";
	}

	$sql = "SELECT * FROM crud_app";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
?>
			<tr id="<?php echo $row["email"]; ?>">
				<td><?php echo $row["full_name"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["type"]; ?></td>
				<td><?php echo $row["password"]; ?></td>
				<td>
					<a onclick="onEdit('<?php echo $row["email"]; ?>')">Edit</a>
					<a onclick="onDeleteRecord('<?php echo $row["email"]; ?>')">Delete</a>
				</td>
			</tr>
<?php

		}
	} else {
		echo "0 results";
	}
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
?>