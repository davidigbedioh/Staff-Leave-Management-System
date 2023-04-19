
<?php
    session_start(); 
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: Departments.php");
    }
     
    if ( !empty($_POST)) {
		$departmentname = $_POST['departmentname'];
        // validate input
        $valid = true;
  
         
        // update data
        if ($valid) {
            include('config.php');
            $sql = "UPDATE department  set departmentname = ? WHERE id = ?";
            $q = $db->prepare($sql);
            $q->execute(array($departmentname));
            header("Location: Departments.php");
        }
    } else {
        include('config.php');
        $sql = "SELECT * FROM department where id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $departmentname = $data['departmentname'];

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Department</title>
    <meta charset="utf-8">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
</head>
 
<body>
<main id="swup" class=" transition-fade bg-light" style="padding-top: 0;">
<?php include_once('navbar.php');?>

<div class="content bhg rounded epopup">
  <div class="container con">
    <div class="container">
            <div class="span10 offset1">
            <div class="row">
            <h3>Update</h3>
            </div>
             
		<form action="departmentupdatetable.php" method="post">
			<p class="pup form-control no-borders"><i class="textcol">Update Department</i><button class="closepopup mr-auto" onclick="closePopup()">X</button></p>
			<div class="container">
			  <label for="departmentname">Department Name:</label>
			  <br>
		      <input name="departmentname" type="text" required="required" id="departmentname" class="form-control" ><br>
		</div>    
    <div class="form-actions" align="right">
    <button type="submit" class="btn btn-success">Update</button>
    <a class="btn" href="Departments.php">Back</a>
    </div>
    </form>
    </div>
</div>
<footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p class="ftr" >Copyright © Leavy. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
	</main> 
	
	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  </body>

</html>