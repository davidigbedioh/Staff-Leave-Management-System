<?php
session_start();
require_once('config.php');

?>
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['query'];
    $query = "SELECT * FROM `department` WHERE `departmentname` LIKE '%".$valueToSearch."%' OR `id` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `department`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "registrationpage");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departments</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
	 
	
  </head>
  <body>
  	<!-- body code goes here -->
	<main id="swup" class="transition-fade bg-light" style="padding-top: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light newr fixed">
      <a class="navbar-brand newq" href="#">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item pad"> <a class="nav-link" href="summarized.php">SUMMARY</a> </li>
			<li class="nav-item pad"> <a class="nav-link" href="My leave.php">MY LEAVE</a> </li>
			<li class="nav-item pad"> <a class="nav-link" href="Reports.php">REPORTS</a> </li>
		  </ul>
		  
        <ul class="navbar-nav ml-auto">
		<li class="nav-item pad"> <a class="nav-link" href="javascript:void(0)"><img src="img/sign2 edit.png" alt="img/gear sign.png" class="closebtn rounded-circle" id="set"  onclick="toggleNav()"></a></li>	
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pad" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">me&nbsp; </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Change My Password</a>
			
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Sign Out</a>&nbsp;
			</div>
			<li class="nav-item"> <a class="nav-link" href="#"></a> </li>
		  </li>
		  </ul>
      </div>
    </nav>
<div class="sidebar tof" id="menu">
  <a  href="Summary.php">Company</a>
  <a class="active" href="#news">Departments</a>
  <a href="Allowances.php">Allowances</a>
  <a href="holidays.php">Holidays</a>
  <a href="Employees.php">Employees</a>
  <a href="#about">Leave types</a>
	<a href="limits.php">Limits</a>
	<a href="update.php">Update</a>
 	
</div>
	<script>
		var toggleStatus =1;
		function toggleNav() {
			if (toggleStatus == 1) {
				document.getElementById("menu").style.left = "-150px";
				toggleStatus = 0;
			} else if (toggleStatus == 0) {
				document.getElementById("menu").style.left = "0px"
				toggleStatus = 1;
			}
		}
	</script>
<!-- Page content -->
<div class="content bhg rounded">
  <div class="container con">
	  
	  <h3>Departments&nbsp;</h3>
	</div>
	<p align="right">
		<button class="btn-primary btn rounded" onclick="openPopup()">Add Department</button>
	</p>
<div class="col-sm-12">
<form class="form-inline my-2 my-lg-0" action="Departments.php" method="post" style="float: right;">
          <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button name="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form><br><br>
<div class="container scroltable">
 <div class="row">
   <div class="col-sm-12">
    <?php echo $deleteMsg??''; ?>
   
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S/N</th>
         <th>Department Name</th>
        <th>Actions</th></tr>
    </thead>
    <tbody>
    
  <?php
      include('developers.php');
      
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
    <?php while($data = mysqli_fetch_array($search_result)):?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['departmentname']??''; ?></td>  
      <?php echo '<td><a class="btn btn-secondary" href="departmentupdatetable.php?id='.$data['id'].'">Update</a>' ?>
	    <?php echo ' '?>
      <?php echo '<a class="btn btn-danger" href="departmentdeletetable.php?id='.$data['id'].'">Delete</a></td>';
      ?>
     </tr>
     <?php endwhile;?>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="3">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
  </div>
	<div class="popup depopup" id="popup">
		<script>let popup = document.getElementById("popup");
				function openPopup(){
					popup.classList.add("open-popup")
				}
				function closePopup(){	
				popup.classList.remove("open-popup")
				}		      
		</script>
		<form action="Departments.php" method="post">
			<p class="pup form-control no-borders"><i class="textcol">New Department</i><button class="closepopup mr-auto" onclick="closePopup()">X</button></p>
			<div class="container">
			  <label for="departmentname">Department Name:</label>
			  <br>
		      <input name="departmentname" type="text" required="required" id="departmentname" class="form-control" ><br>
			</div>
			<div class="container">
				<label for="approver">Approvers</label>
				<select id="approver" name="approver" class="form-control">
					
				</select><br>
				 <div>
				<label for="notify">Notify</label>
				<select id="notify" name="notify" class="form-control" placeholder="Search">
					<option value="" disabled selected>Search</option>
				</select>
				</div>
			<p align="right">
				<button type="submit" class="btn-primary btn rounded butt mt-3" id="save">Save</button>
				<button type="cancel" class="btn-primary btn rounded butt mt-3" onclick="closePopup()">Cancel</button>
				</p>
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
	<script type="text/javascript">
      	$(function(){
          $('#save').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){

            var departmentname = $('#departmentname').val();
            var approver = $('#approver').val();
			      var notify = $('#notify').val();

              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'departmentcontrol.php',
                data: {departmentname: departmentname,approver: approver,notify: notify},
                success: function(data){
                  alert(data);
                  closePopup();
                },
                error: function(data){
                  alert('Error in saving data');
				} 
              });

		  }
			else{
              
            }

          });		
        });
    </script>
	
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  	  
  </body>
</html>