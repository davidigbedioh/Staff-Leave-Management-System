<?php
require_once('config.php');
$firstname = $_POST["firstname"];

$_SESSION['usernamer'] = $firstname;

$sql= "SELECT * FROM registration (firstname) VALUES(?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$firstname]);
$_SESSION['username'] = [$firstname."".$lastname];
?>