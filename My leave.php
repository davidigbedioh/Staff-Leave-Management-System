<?php 
session_start();
require_once('config.php');
?>
<?php
	if(!isset($_SESSION['username'])){
		$_SESSION['msg'] = "You have to log in first";
		header("Location:login page.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location:login page.php");
	}
?>
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['query'];
    $query = "SELECT * FROM `myleave` WHERE `id` LIKE '%".$valueToSearch."%' OR `leavetype` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `myleave`";
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
    <title>My Leave</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
    
  </head>
  <body class="bgcolored">
  	<!-- body code goes here -->
	<main id="swup" class="transition-fade color-bg" style="padding-top: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light newr fixed addborderbottom">
      <a class="navbar-brand newq" href="#">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse addborderbottom" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item pad"> <a class="nav-link" href="summarized.php">SUMMARY </a> </li>
         	<li class="nav-item pad active"> <a class="nav-link" href="#"><span class="sr-only">(current)</span>MY LEAVE</a> </li>
			<li class="nav-item pad"> <a class="nav-link" href="Reports.php">REPORTS</a> </li>
		  </ul>
		  
        <ul class="navbar-nav ml-auto">
		<li class="nav-item pad"> <a class="nav-link" href="summary.php"><img src="img/sign2 edit.png" alt="img/gear sign.png" class="closebtn rounded-circle" id="set"  onclick="toggleNav()"></a></li>	
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pad" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">me&nbsp; </a>
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
<div class="divc bhg rounded"> 
  <div class="container con">
	  <h3>My Leave</h3>
	  <p align="right">
		<button class="btn-primary btn rounded buttn" onclick="openPopup()">New Leave</button>
	  </p>  
	 <!-- <form class="form-inline my-2 my-lg-0" method="post" action="My leave.php" style="float: right;">
          <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
  </form><br><br> -->
	  <div class="container">
 <div class="row rowed">
	<h4>Leaves</h4><br>
   <div class="col-sm-12">
    <?php echo $deleteMsg??''; ?>
	
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S/N</th>
         <th>Leave Type</th>
		 <th>Comments</th>
		 <th>Additional Files</th>
		 <th>Date and time</th>
    </thead>
    <tbody>
  <?php
      include_once('leavedeveloperman.php');

      if(is_array($fetchDatar)){      
      $sn=1;
      foreach($fetchDatar as $data){
    ?>
	<?php //while($data= mysqli_fetch_array($search_result)):?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['leavetype']??''; ?></td>
	  <td><?php echo $data['comments']??''; ?></td>
	  <td><?php echo $data['addfiles']??''; ?></td>
	  <td><?php echo $data['time']??''; ?></td>
     </tr>
	<?php //endwhile;?>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="6">
    <?php echo $fetchDatar; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
</div>
</div>
<div class="container col-sm-12">
<div class="mt-3">
<?php include_once('leavedeveloper.php')?>
<h4>Leaves to manage</h4>
	   <div class="table-responsive col-sm-12" style="width: 100%">
      <table class="table table-bordered">
       <thead><tr><th>S/N</th>
	   <th>Name</th>
         <th>Leave Type</th>
		 <th>Department</th>
		 <th>Comments</th>
		 <th>Additional Files</th>
		 <th>Date and time</th>
		 <th></th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
	<?php //while($data= mysqli_fetch_array($search_result)):?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
	  <td><?php echo $data['name']??''; ?></td>
      <td><?php echo $data['leavetype']??''; ?></td>
	  <td><?php echo $data['department']??''; ?></td>
	  <td><?php echo $data['comments']??''; ?></td>
	  <td><?php echo $data['addfiles']??''; ?></td>
	  <td><?php echo $data['time']??''; ?></td>
	  <?php echo '<td><a class="btn btn-success" href="#">Approve</a>' ?>
	  <?php echo ' '?>
      <?php echo '<a class="btn btn-danger mt-2" href="#">Deny</a></td>';
      ?>
     </tr>
	<?php //endwhile;?>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
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
<div>
</div>
</div>
</div>
</div>	  
	<div class="popup lpopup" id="popup">
		<script>let popup = document.getElementById("popup");
				function openPopup(){
					popup.classList.add("open-popup")
				}
				function closePopup(){	
				popup.classList.remove("open-popup")
				}		      
		</script>
		<form action="My leave.php" method="post">
			<p class="pup form-control no-borders"><i class="textcol">New Leave</i><button class="closepopup mr-auto" onclick="closePopup()">X</button></p>	
		 <div class="container">
		 <label for="name">Name:</label><br>
		 <input name="name" type="text" required="required" id="name" class= "form-control"><br>
			  <label for="leavetype">Leave Type:</label><br>
			 <select name="leavetype" id="leavetype" class="form-control">
				 <option value="" disabled="disabled" selected="selected">Select your leave type</option>
				 <option>Annual Leave</option>
				 <option>Casual Leave</option>
				 <option>Jury Service</option>
				 <?php
					include('config.php');
					$stmt = $db->prepare("SELECT * FROM holiday ORDER BY holidayname");
					$stmt->execute();	
					$departmentList = $stmt->fetchAll();

					foreach($departmentList as $depart){
						echo "<option value='".$depart['holidayname']."'>".$depart['holidayname']."</option>";
					}
				?>
			 </select><br>
			 <div>
			<label for="department">Deparments:</label>
				<select name="department" id="department" class="form-control">
				<option value="" disabled selected>Search for a department</option>
				<?php
					include('config.php');
					$stmt = $db->prepare("SELECT * FROM department ORDER BY departmentname");
					$stmt->execute();	
					$departmentList = $stmt->fetchAll();

					foreach($departmentList as $depart){
						echo "<option value='".$depart['departmentname']."'>".$depart['departmentname']."</option>";
					}
				?>
				</select><br>
			</div>
			 <label for="comments">Comments:</label><br>
			  <textarea name="comments" class="form-control" id="comments" required></textarea><br>
			 <label for="addfiles">Additional files:</label>
			 <div  class="drop-zone form-control drop-zoneover" id="drop-zone1">
				 <span class="drop-zone-prompt">Drag & drop or Browse</span>
				 <input type="file" name="addfiles" id="addfiles" class="drop-zoneinput">
			 </div><br>
		</div>
		<p align="right" class="padl">
		<button name="save" type="submit" class="btn-primary btn rounded butt" id="save">Save</button>
		<button type="submit" class="btn-primary btn rounded butt" onclick="closePopup()">Cancel</button>
	    </p>
		</form>	
	</div>&nbsp; 
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
			var name = $('#name').val();	
            var leavetype = $('#leavetype').val();
			var department = $('#department').val();
			var comments = $('#comments').val();
			var addfiles = $('#addfiles').val();

              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'myleavecontrol.php',
                data: {name: name,leavetype: leavetype,department: department,comments: comments,addfiles: addfiles},
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
	<script src="js/drop-over.js"></script>
	<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  	  
  </body>
</html>