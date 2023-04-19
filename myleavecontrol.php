<?php
session_start();
require_once('config.php');
?>
<?php
if(isset($_POST)){

    $name = $_POST['name'];
    $leavetype = $_POST['leavetype'];
    $department = $_POST['department'];
    $comments = $_POST['comments'];
    $addfiles = $_POST['addfiles'];


  $sql= "INSERT INTO myleave (name, leavetype, department, comments, addfiles) VALUES(?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$name, $leavetype, $department, $comments, $addfiles]);

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