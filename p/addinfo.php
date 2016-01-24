<?php
	$name = $_POST['nameinput'];
	$category = $_POST['categoryinput'];
	$pnumber = $_POST['numberinput'];
	$email = $_POST['emailinput'];
	$description = $_POST['descriptioninput'];
	$payment = $_POST['paymentinput'];

	$servername = "localhost";
	$s_username = "root";
	$s_password = "658860";
	$db_name = "questr";
			
	$conn  = new mysqli($servername, $s_username, $s_password, $db_name);
			
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO jobs (name, category, number, email, description, payment) VALUES ('$name', '$category', '$pnumber', '$email', '$description', '$payment')";

	if($conn->query($sql) === TRUE){
		header("Location: jobadded.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>