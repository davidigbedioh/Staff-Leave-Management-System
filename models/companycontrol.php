<?php 
require_once ('config.php');

if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $employeenum = $_POST['employeenum'];
    $department = $_POST['department'];
    $approver = $_POST['approver'];
    $notify = $_POST['employeestart'];
    $employeestart = $_POST['employeestart'];
    $timezone = $_POST['timezone'];
    $publicholiday = $_POST['publicholiday'];
    $allowance = $_POST['allowance'];
    $roles = $_POST['roles'];
    $chk="";

foreach($roles as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
  
  $sql= "INSERT INTO employee (firstname, lastname, email, employeenum, department, approver, notify, employeestart, timezone, publicholiday, allowance, roles) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$firstname, $lastname, $dob, $email, $employeenum, $department, $approver, $notify, $employeestart, $timezone, $publicholiday, $allowance, $chk]);

  if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were errors while saving the data.';
    } 
}
else {
  echo 'No Data';
}
?>