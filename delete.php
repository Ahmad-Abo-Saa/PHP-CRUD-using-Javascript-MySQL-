<?php
try {
	$mysqli = new mysqli("localhost", "root", "", "crud");

	if ($mysqli->connect_errno) {
		echo "Not connected to server";
	}

	$email = $_REQUEST["email"];
	$sql = "DELETE FROM crud_app WHERE email ='" . $email . "'";
	$result = $mysqli->query($sql);

	if ($result) {
		echo "Deleted";
	} else {
		echo "Not Deleted";
	}
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
