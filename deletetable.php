<?php
session_start();
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        include('config.php');
        $id = $_POST['id'];
        $sql = "DELETE FROM employee  WHERE id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($id));
        header("Location: Employees.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delete Employee</title>
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
<main id="swup" class=" transition-fade bg-light" style="padding-top: 0;">
<?php include_once('navbar.php');?>

<div class="content bhg rounded">
  <div class="container con">
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete</h3>
                    </div>
                     
                    <form class="form-horizontal" action="deletetable.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="Employees.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
</div>
<div>
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