<?php
try {
	$mysqli = new mysqli("localhost", "root", "", "crud");

	if ($mysqli->connect_errno) {
		echo "Not connected to server";
	}

	$id = $_REQUEST["id"];
	$sql = "DELETE FROM crudapp WHERE id ='" . $id . "'";
	$result = $mysqli->query($sql);

	if ($result) {
		echo "Deleted";
	} else {
		echo "Not Deleted";
	}
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
