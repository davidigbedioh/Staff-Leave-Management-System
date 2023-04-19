<?php 
$conn = new mysqli('localhost', 'root', '', 'registrationpage');

$company_name = $_POST['company_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];

$sql = "INSERT INTO `registration` (`company_name`, `first_name`, 'last_name', 'email', 'password', 'gender', 'phone_number') VALUES ('0', '$company_name', '$first_name', '$last_name', '$email', '$password', '$gender', '$phone_number')";

$rs = mysqli_query($conn, $sql);

if($rs)
{
	echo "Registration Succesfull";
}else {
    echo "Error in registering";
}
$conn.close();
?>