<?php
session_start();
require_once('config.php');

?>
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['query'];
    $query = "SELECT * FROM `employee` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `employeenum`, `Job`, `department`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `employee`";
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
    <title>Employee</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
	
  </head>
  <body>
	<main id="swup" class=" transition-fade bg-light" style="padding-top: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light newr fixed ">
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
            <div class="dropdown-menu ghide" aria-labelledby="navbarDropdown">
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
  <a href="holidays.php">Holidays</a>
  <a class="active" href="#about">Employees</a>
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
	  
<div class="content bhg rounded">
  <div class="container con">
	  
	  <h3>Employees </h3>
	  <p align="right">
		<button class="btn-primary btn rounded buttn" onclick="openPopup()">Add Employees</button>
	  </p>
<div class="col-sm-12">
	  <form class="form-inline my-2 my-lg-0" style="float: right;" action="Employees.php" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
  </form><br><br>
	  <div class="container scroltable">
 <div class="row">
   <div class="col-sm-12">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S/N</th>
         <th>Name</th>
		 <th>Email</th>
		 <th>Employee Number</th>
		 <th>Job</th>
		 <th>Department</th>
		 <th>Action</th><tr>
    </thead>
    <tbody>
  <?php
  include('employeedeveloper.php');

      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
	 <?php while($data= mysqli_fetch_array($search_result)):?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['firstname']??''; ?> <?php echo $data['lastname']??''; ?></td>
	  <td><?php echo $data['email']??''; ?></td>
	  <td><?php echo $data['employeenum']??''; ?></td>
	  <td><?php echo $data['Job']??''; ?></td>
	  <td><?php echo $data['department']??''; ?></td>
	  <?php echo '<td><a class="btn btn-secondary" href="updatetable.php?id='.$data['id'].'">Update</a>' ?>
	  <?php echo ' '?>
      <?php echo '<a class="btn btn-danger" href="deletetable.php?id='.$data['id'].'">Delete</a>';?>
	   <?php echo ' '?>
	   <?php echo '<a class="btn btn-info" href="mail.php">Invite</a></td>';
      ?>
     </tr>
	 <?php endwhile;?>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="10">
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
	  <div class="popup epopup" id="popup">
		<script>let popup = document.getElementById("popup");
				function openPopup(){
					popup.classList.add("open-popup")
				}
				function closePopup(){	
				popup.classList.remove("open-popup")
				}		      
		</script>
		<form action="Employees.php" method="post">
			<p class="pup form-control no-borders"><i class="textcol">New Employee</i><button class="closepopup mr-auto" onclick="closePopup()">X</button></p>	
		 <div class="flex-parent-element">
          <div class="flex-child-element3">
          <label for="firstname">First Name:</label>
			  <br>
		      <input name="firstname" type="text" required="required" id="firstname" class= "form-control"><br>
			  <label for="lastname">Last Name:</label>
			  <br>
		    <input name="lastname" type="text" required="required" id="lastname" class= "form-control"><br>
			 <div>
             <label for="dob">Date Of Birth:</label>
         	<input name="dob" type="date" required="required" id="dob" class="form-control"> 
			 </div><br>
			 <div class="form-group padl">	  
            <p>
				 <label for="">Gender</label><br>
			      <input class="ml-2" required="required" type="radio" name="gender" value="Male">Male
			      <input class="ml-2" required="required" type="radio" name="gender" value="Female">Female
			      <input class="ml-2" required="required" type="radio" name="gender" value="Other">Other
		      </p>
			  </div>
             <label for="email">Email Address:</label><br>
      		 <input name="email" type="email" required="required" id="email" class="form-control"><br> 
			  <label for="employeenum">Employee Number:</label><br>
      		 <input name="employeenum" type="number" required="required" id="employeenum" autocomplete="off" class="form-control"><br>
			  <div>
              <label for="job">Job:</label>
			  <br>
		      <select name="job" id="job" class="form-control">
					<option value="" disabled selected>Search</option>
				</select><br></div>
		</div>

		<div class="flex-child-element4">
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
			  <div>
				<label for="approver">Approvers</label>
				<select name="approver"  id="approver"  class="form-control">
				<option value="" disabled selected>Search</option>	
				<?php
					include('config.php');
					$stmt = $db->prepare("SELECT firstname, lastname, roles FROM employee WHERE roles IN ('Admin','Approvers')");
					$stmt->execute();	
					$approverList = $stmt->fetchAll();

					foreach($approverList as $approve){
						echo "<option value='".$approve['firstname']." ".$approve['lastname']."'>".$approve['firstname']." ".$approve['lastname']."</option>";
						}
				?>
				</select>
			</div><br>
			<div>
             <label for="employeestart">Employee's start</label>
         	<input name="employeestart" type="date" required="required" id="employeestart" class="form-control"> 
			 </div><br>
			<label for="timezone">Timezone</label><br>
			<select name="timezone" id="timezone" class="form-control">
				    <option value="" disabled="disabled" selected="selected">Select your Timezone</option>
					<option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
					<option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
					<option value="-10:00">(GMT -10:00) Hawaii</option>
					<option value="-09:50">(GMT -9:30) Taiohae</option>
					<option value="-09:00">(GMT -9:00) Alaska</option>
					<option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
					<option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
					<option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
					<option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
					<option value="-04:50">(GMT -4:30) Caracas</option>
					<option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
					<option value="-03:50">(GMT -3:30) Newfoundland</option>
					<option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
					<option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
					<option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
					<option value="+00:00">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
					<option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
					<option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
					<option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
					<option value="+03:50">(GMT +3:30) Tehran</option>
					<option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="+04:50">(GMT +4:30) Kabul</option>
					<option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
					<option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
					<option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
					<option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
					<option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
					<option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="+08:75">(GMT +8:45) Eucla</option>
					<option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
					<option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
					<option value="+10:50">(GMT +10:30) Lord Howe Island</option>
					<option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
					<option value="+11:50">(GMT +11:30) Norfolk Island</option>
					<option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
					<option value="+12:75">(GMT +12:45) Chatham Islands</option>
					<option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
					<option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
				</select>
			<br> 
			<div class="form-group padl mt-3">	  
            <p>
				 <label for="">Roles</label><br>
			      <input type="radio" name="roles" value="Approvers">Approver<br>
			      <input type="radio" name="roles" value="Admin">Admin<br>
			      <input type="radio" name="roles" value="Hidden">Hidden
		      </p>
			  </div>
			  
		<div align="right" class="padl form-actions">
		<input type="submit" class="btn-primary btn rounded butt" id="save" Value="Save">
		<button class="btn-primary btn rounded butt" onclick="closePopup()">Cancel</button>
		</div>
		</div>
		</form>	
	  </div>
	</div>
	</div></div>
	
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

            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
			var dob = $('#dob').val();
            var email = $('#email').val();
            var employeenum = $('#employeenum').val();
			var job = $('#job').val();
            var department = $('#department').val();
            var approver = $('#approver').val();
			var notify = $('#notify').val();
			var employeestart = $('#employeestart').val();
			var timezone = $('#timezone').val();
			var roles = $('input[name="roles"]:checked').val();

              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'companycontrol.php',
                data: {firstname: firstname,lastname: lastname,dob: dob,email: email,employeenum: employeenum,job: job,department: department,approver: approver,notify: notify,employeestart: employeestart,timezone: timezone,roles: roles},
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