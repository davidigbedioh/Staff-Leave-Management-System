<?php
session_start();
require_once('config.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company</title>
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
	 
	
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
            <a class="nav-link dropdown-toggle pad" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">me</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"></a> 
			  <a class="dropdown-item" href="#">Account</a>
			
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Sign Out</a>&nbsp;
			</div>
			<li class="nav-item"> <a class="nav-link" href="#"></a> </li>
		  </li>
		  </ul>
      </div>
    </nav>
<div class="sidebar tof" id="menu">
  <a class="active" href="#home">Company</a>
  <a href="Departments.php">Departments</a>
  <a href="Allowances.php">Allowances</a>
  <a href="holidays.php">Holidays</a>
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
	  <h3>Company</h3>
	  <form action="Summary.php" method="post">
	    <div class="flex-parent-element">
          <div class="flex-child-element1">
			  <label for="companyname">Company Name:</label><br>
		      <input name="companyname" type="text" required="required" id="companyname" class= "form-control"><br>
		<div>
			<div>
				<label for="daysoftheweek">First Day of Week:</label>
				<select id="daysoftheweek" name="daysoftheweek" class="form-control">
					<option>Monday</option>
					<option>Tuesday</option>
					<option>Wednesday</option>
					<option>Thursday</option>
					<option>Friday</option>
					<option>Saturday</option>
					<option>Sunday</option>
				</select>
			</div>
		</div><br>
		<div class="form-control no-borders">  
		<label for="allowance" class="mr-3" id="allowance">Allowance Unit</label>
          <label>
            <input class="" name="allowance" type="radio" required="required" id="days" value="Days">
          Days</label>
         
          <label>
            <input name="allowance" type="radio" required="required" id="hours" value="Hours" class="ml-2">
			  Hours</label></div><br>
			 <label for="hpwd">Hours per working day:</label><br>
		<input name="hpwd" type="number" required="required" autocomplete="off" id="hpwd" class= "form-control"><br>  
          </div>	
          <div class="flex-child-element2">
			  <label for="work">Working Week:</label><br>
		    <div class="container">
			    <label>
			      <input type="checkbox" name="work" value="Monday" id="Monday">
			      Monday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
			    <input for="Monday" name="Mondaystart" type="time" id= "Mondaystart" autocomplete="off"  > 
				–
             <input type="time" name="Mondayend" id= "Mondayend" autocomplete="off">
				
		      <br>
			    <label>
			      <input type="checkbox" name="work" value="Tuesday" id="Tuesday">
			      Tuesday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
			    <input for="Tuesday" name="Tuesdaystart" id= "Tuesdaystart" type="time" autocomplete="off"  > 
	          –
              <input type="time" name="Tuesdayend" id= "Tuesdayend" autocomplete="off"  >
			 <br>
			    <label>
			      <input type="checkbox" name="work" value="Wednesday" id="Wednesday">
			      Wednesday&nbsp;&nbsp;</label>
			    <input for="Wednesday" name="Wednesdaystart" type="time" autocomplete="off"> 
	          –
	          <input type="time" name="Wednesdayend" autocomplete="off" >
			  <br>
			    <label>
			      <input type="checkbox" name="work" value="Thursday" id="Thurday">
			      Thursday&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
			    <input for="Thursday" name="Thursdaystart" type="time" autocomplete="off"  > 
			        –
			        <input type="time" name="Thursdayend" autocomplete="off"  >
				
		      <br>
			    <label>
			      <input type="checkbox" name="work" value="Friday" id="Friday">
			      Friday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
			    <input for="Friday" type="time" name="Fridaystart" autocomplete="off"  > 
			        –
	          <input type="time" name="Fridayend" autocomplete="off"  >
				
		      <br>
			    <label>
			      <input type="checkbox" name="work" value="Saturday" id="Saturday">
			      Saturday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
			    <input for="Saturday" name="Saturdaystart" type="time" autocomplete="off"  > 
			        –
			        <input type="time" name="Saturdayend" autocomplete="off"  >
			  <br>
			    <label>
			      <input type="checkbox" name="work" value="Sunday" id="Sunday">
			      Sunday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
			    <input for="Sunday" name="Sundaystart" type="time" autocomplete="off"  > 
			        –
			        <input type="time" name="Sundayend" autocomplete="off"  >
			  <br>
		    </div>
          </div>
		  </div>
		  <button name="save" type="submit" class="btn-primary" id="save">Save</button>
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
	<script>
		$(':checkbox:not(:checked)').prop('disabled', true);
	</script>
	<script src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
      	$(function(){
          $('#save').click(function(e){

			var valid = this.form.checkValidity();

            if(valid){

            var companyname = $('#companyname').val();
			var daysoftheweek = $('#daysoftheweek').val();
            var allowance = $('#allowance').val();
			var hpwd = $('#hpwd').val();
            var Mondaystart = $('#Mondaystart').val();
			var Mondayend = $('#Mondayend').val();
            var Tuesdaystart = $('#Tuesdaystart').val();
			var Tuesdayend = $('#Tuesdayend').val();
			var Wednesdaystart = $('#Wednesdaystart').val();
			var Wednesdayend = $('#Wednesdayend').val();
            var Thursdaystart = $('#Thursdaystart').val();
			var Thursdayend = $('#Thursdayend').val();
            var Fridaystart = $('#Fridaystart').val();
			var Fridayend = $('#Fridayend').val();
			var Saturdaystart = $('#Saturdaystart').val();
			var Saturdayend = $('#Saturdayend').val();
			var Sundaystart = $('#Sundaystart').val();
			var Sundayend = $('#Sundayend').val();
		

              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'summaryprocess.php',
                data: {companyname: companyname,daysoftheweek: daysoftheweek,allowance: allowance,hpwd: hpwd,Mondaystart: MondayStart,Mondayend: Mondayend,Tuesdaystart: Tuesdaystart,Tuesdayend: Tuesdayend,Wednesdaystart: Wednesdaystart,Wednesdayend: Wednesdayend,Thursdaystart: Thursdaystart,Thursdayend: Thursdayend,Fridaystart: Fridaystart,Fridayend: Fridayend,Saturdaystart: Saturdaystart,Saturdayend: Saturdayend,Sundaystart: Sundaystart,Sundayend: Sundayend},
                success: function(data){
                  alert(data);
                },
                error: function(data){
                  alert('Error in saving data');
				} 
              });
			} else {

			}
          });		
        });
    </script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  	  
  </body>
</html>
