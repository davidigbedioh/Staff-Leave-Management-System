<?php 
require_once ('config.php');
?>
<?php
if(isset($_POST)){
    $companyname = $_POST['companyname'];
    $daysoftheweek = $_POST['daysoftheweek'];
    $lastname = $_POST['allowance'];
    $email = $_POST['hpwd'];
    $Mondays = $_POST['Mondaystart'];
    $Mondaye = $_POST['Mondayend'];
    $Tuesdays = $_POST['Tuesdaystart'];
    $Tuesdaye = $_POST['Tuesdayend'];
    $Wednesdays = $_POST['Wednesdaystart'];
    $Wednesdaye = $_POST['Wednesdayend'];
    $Thursdays = $_POST['Thursdaystart'];
    $Thursdaye = $_POST['Thursdayend'];
    $Fridays = $_POST['Fridaystart'];
    $Fridaye = $_POST['Fridayend'];
    $Saturdays = $_POST['Saturdaystart'];
    $Saturdaye = $_POST['Saturdayend'];
    $Sundays = $_POST['Sundaystart'];
    $Sundaye = $_POST['Sundayend'];

  $sql= "INSERT INTO 'policy' (companyname, daysoftheweek, allowance, hpwd, Mondaystart, Mondayend, Tuesdaystart, Tuesdayend, Wednesdaystart, Wednesdayend, Thursdaystart, Thursdayend, Fridaystart, Fridayend, Saturdaystart, Saturdayend, Sundaystart, Sundayend) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([ $companyname, $daysoftheweek, $allowance, $hpwd, $Mondays, $Mondaye, $Tuesdays, $Tuesdaye, $Wednesdays, $Wednesdaye, $Thursdays, $Thursdaye, $Fridays, $Fridaye, $Saturdays, $Saturdaye, $Sundays, $Sundaye]);

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