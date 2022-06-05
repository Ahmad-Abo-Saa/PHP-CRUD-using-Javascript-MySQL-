<?php

$server_name = "localhost";
$username = "root";
$password = "";
try {
	$con = new mysqli($server_name, $username, $password);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	if (!mysqli_select_db($con, 'crud')) {
		echo "Database Not Started";
	}

	function test_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$full_name = test_data($_POST["full_name"]);
	$password = test_data($_POST["password"]);
	$email = test_data($_POST["email"]);
	$type = test_data($_POST["type"]);

	$sql = "INSERT INTO crud_app (full_name, email, type, password) VALUES 
			('$full_name', '$email', '$type', '$password')";

	if (!mysqli_query($con, $sql)) {
		echo "Not Inserted";
	} else {
		echo "Inserted";
	}
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
