<?php
require_once('config.php')
?>
<?php
if(isset($_POST)){
    $departmentname = $_POST['departmentname'];
    $approver = $_POST['approver'];
    $notify = $_POST['notify'];


  $sql= "INSERT INTO department (departmentname, approver, notify) VALUES(?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$departmentname, $approver, $notify]);

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