<?php 
require_once ('config.php');
?>
<?php

if(isset($_POST)){
    $companyname = $_POST['companyname'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phonenumber'];

  $sql= "INSERT INTO registration (companyname, firstname, lastname, email, password, phonenumber, gender) VALUES(?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([ $companyname, $firstname, $lastname, $email, $password, $phonenumber, $gender]);
  $_SESSION['username'] = $firstname;
}
$_SESSION['username'] = [$firstname."".$lastname];
?>