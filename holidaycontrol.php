<?php
require_once('config.php')
?>
<?php
if(isset($_POST)){

    $holidayname = $_POST['holidayname'];
    $holidate = $_POST['holidate'];
    $holidate2 = $_POST['holidate2'];


  $sql= "INSERT INTO holiday (holidayname, startdate, enddate) VALUES(?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$holidayname, $holidate, $holidate2]);

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