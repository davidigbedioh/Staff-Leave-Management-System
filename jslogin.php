<?php
ob_clean();
session_start();
require_once('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM registration WHERE email = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){

	$_SESSION['ROLE'] = $user['roles'];
	$_SESSION['IS_LOGIN'] = 'yes';
	if($user['roles'] = 'Approver') {
		echo 'Success';
		header('Location: approverMy leave.php');
		die();
	}
	elseif($user['roles'] = 'Admin') {
		header("Location:My leave.php");
		echo 'Success';
	}
	elseif($user['roles'] = 'Hidden') {
		header("Location: HiddenMy leave.php");	
		echo 'Success';
	}
	}else{
		echo 'Incorrect Username or Password';		
	}
}else{
	echo 'There were errors while connecting to database.';
}