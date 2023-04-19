<?php
require_once('config.php')
?>
<?php
if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $employeenum = $_POST['employeenum'];
    $job = $_POST['job'];
    $department = $_POST['department'];
    $approver = $_POST['approver'];
    $employeestart = $_POST['employeestart'];
    $timezone = $_POST['timezone'];
    $roles = $_POST['roles'];
   
  $sql= "INSERT INTO employee (firstname, lastname, dob, email, employeenum, job, department, approver, employeestart, timezone, roles) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$firstname, $lastname, $dob, $email, $employeenum, $job, $department, $approver, $employeestart, $timezone, $roles]);

  $regsql= "INSERT INTO registration (firstname, lastname, dob, email, employeenum, job, department, approver, employeestart, timezone, roles) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($regsql);
  $result = $stmtinsert->execute([$firstname, $lastname, $dob, $email, $employeenum, $job, $department, $approver, $employeestart, $timezone, $roles]);

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