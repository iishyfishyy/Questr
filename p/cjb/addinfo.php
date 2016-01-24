<?php
	$name = $_POST['nameinput'];
	$category = $_POST['categoryinput'];
	$pnumber = $_POST['numberinput'];
	$email = $_POST['emailinput'];
	$description = $_POST['descriptioninput'];
	$payment = $_POST['paymentinput'];
	$title = $_POST['titleinput'];
	$location = $_POST['locationinput'];

	if(substr($pnumber, 0, 2) === "+1"){
		$pnumber = $pnumber;	
	} else if (preg_match("[\d{10}]", $pnumber, $matches)){
		$pnumber = "+1" . $pnumber;
	} else {
		die("Faulty Number : " . $pnumber);
	}

	$name = ucwords($name);
	$category = ucwords($category);
	$title = ucfirst($title);
	$location = ucfirst($location);

	$description = str_replace("'", "''", $description);
	$title = str_replace("'","''",$title);

	$servername = "localhost";
	$s_username = "root";
	$s_password = "658860";
	$db_name = "questr";
			
	$conn  = new mysqli($servername, $s_username, $s_password, $db_name);
			
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO jobs (name, category, number, email, description, payment, title, location, status) VALUES ('$name', '$category', '$pnumber', '$email', '$description', '$payment', '$title', '$location', 0)";

	if($conn->query($sql) === TRUE){
		header("Location: jobadded.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>