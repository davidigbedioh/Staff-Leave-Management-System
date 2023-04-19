+<?php

$company_name = $_POST['company_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];

$conn = new mysqli('localhost', 'root', '', 'registrationpage');
if($conn ->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else {
	$stmt = $conn-> prepare ("insert into registration(company_name, first_name, last_name, email, password, gender, phone_number)
	VALUES(?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssi", $company_name, $first_name, $last_name, $email, $password, $gender, $phone_number);
	$stmt->execute();
	echo "Registration Succesful";
	$stmt->close();
	$conn->close();
}
?>