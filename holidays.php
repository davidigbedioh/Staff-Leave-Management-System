<?php
session_start();
require_once('config.php') 

?>
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['query'];
    $query = "SELECT * FROM `holiday` WHERE CONCAT(`id`, `holidayname`, `startdate`, `enddate`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `holiday`";
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
    <title>Holidays</title>
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 

	 
	
  </head>
  <body>
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
  <a href="Summary.php">Company</a>
  <a href="Departments.php">Departments</a>
  <a href="Allowances.php">Allowances</a>
  <a class="active" href="#home">Holidays</a>
  <a href="Employees.php">Employees</a>
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
	  
	  <h3>Holidays</h3>
	</div>
	<p align="right">
		<button class="btn-primary btn rounded" onclick="openPopup()">Add Holiday</button>
	</p>
  <div class="col-sm-12">
  <form class="form-inline my-2 my-lg-0" method="post" action="holidays.php" style="float: right;">
          <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
  </form><br><br>
	<div class="container scroltable">
 <div class="row">
   <div class="col-sm-12">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S/N</th>
         <th>Holidayname</th>
		 <th>Start date</th>
		 <th>End date</th>
    </thead>
    <tbody>
  <?php
      include('holidaydeveloper.php');

      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
    <?php while($data= mysqli_fetch_array($search_result)):?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['holidayname']??''; ?></td>
	  <td><?php echo $data['startdate']??''; ?></td>
	  <td><?php echo $data['enddate']??''; ?></td>
     </tr>
     <?php endwhile;?>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="5">
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
		<form action="holidays.php" method="post">
			<p class="pup form-control no-borders"><i class="textcol">New Holiday</i><button class="closepopup mr-auto" onclick="closePopup()">X</button></p>
			<div class="container">
			  <label for="holidayname">Name of the Holiday:</label>
			  <br>
		      <input name="holidayname" type="text" required="required" id="holidayname" class="form-control" autocomplete="off"><br>
			</div>
			<div class="container">
				<label for="holidate" class="mb-3">Start date:</label><br>
      			<input name="holidate" type="date" required="required" id="holidate" class="form-control"><br>
				<label for="holidate2" class="mb-3">End date:</label>
      			<input name="holidate2" type="date" required="required" id="holidate2" class="form-control">
			</div>
			<p align="right">
				<button type="submit" class="btn-primary btn rounded butt mt-3" id="save">Save</button>
				<button type="cancel" class="btn-primary btn rounded butt mt-3 mr-2" onclick="closePopup()">Cancel</button>
				</p>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
      	$(function(){
          $('#save').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){

            var holidayname = $('#holidayname').val();
            var holidate = $('#holidate').val();
			var holidate2 = $('#holidate2').val();

              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'holidaycontrol.php',
                data: {holidayname: holidayname,holidate: holidate,holidate2: holidate2},
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
  <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script src="js/script.js"></script>
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
	<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script src="js/script.js"></script>  
  </body>
</html>