<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
	<script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script defer src="js/script.js"></script>
	
  </head>
  <body>
  	<!-- body code goes here -->
	<main id="swup" class=" transition-fade bg-light" style="padding-top: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light newr fixed">
      <a class="navbar-brand newq" href="#">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="#">SUMMARY <span class="sr-only">(current)</span></a> </li>
          <div><li class="nav-item pad"> <a class="nav-link" href="#">WALL CHART</a> </li></div>
			<li class="nav-item pad"> <a class="nav-link" href="My leave.html">MY LEAVE</a> </li>
			<li class="nav-item pad"> <a class="nav-link" href="#">REPORTS</a> </li>
		  </ul>
		  
        <ul class="navbar-nav ml-auto">
		<li class="nav-item pad"> <a class="nav-link" href="javascript:void(0)"><img src="img/sign2 edit.png" alt="img/gear sign.png" class="closebtn rounded-circle" id="set"  onclick="toggleNav()"></a></li>	
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pad" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">me&nbsp; </a>
            <div class="dropdown-menu ghide" aria-labelledby="navbarDropdown">
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
  <a href="Summary.html">Company</a>
  <a href="Departments.html">Departments</a>
  <a href="Allowances.html">Allowances</a>
  <a href="holidays.html">Holidays</a>
  <a class="active" href="#about">Employees</a>
<a href="#about">Calendars</a>
	<a href="limits.html">Limits</a>
	<a href="update.html">Update</a>
 	
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
			<p class="pup form-control no-borders"><i class="textcol">New Employee</i></p>	
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
             <label for="email">Email Address:</label><br>
      		 <input name="email" type="email" required="required" id="email" class="form-control"><br> 
			  <label for="employeenum">Employee Number:</label><br>
      		 <input name="employeenum" type="number" required="required" id="employeenum" autocomplete="off" class="form-control"><br>
			  <div>
              <label for="job">Job:</label>
			  <br>
		      <select id="job" name="job" class="form-control">
					<option value="" disabled selected>Search</option>
				</select><br>

              <label for="department">Deparments:</label>
				<select id="department" name="department" class="form-control">
				<option value="" disabled selected>Search for a department</option>
				<?php 
					$stmt = $db->prepare("SELECT * FROM department ORDER BY departmentname");
					$stmt->execute();
					$departmentList = $stmt->fetchAll();

					foreach($departmentList as $depart){
						echo "<option value='".$depart['departmentname']."'>".$depart['departmentname']."</option>";
					}
					?>
				</select>
			</div><br>
		</div>
			 
	
		<div class="flex-child-element4">
			  <div>
				<label for="approver">Approvers</label>
				<select id="approver" name="approver" class="form-control">
					
				</select> <br>
				 <div>
                 <label for="notify">Notify</label>
				<select id="notify" name="notify" class="form-control" placeholder="Search">
					<option value="" disabled selected>Search</option>
				</select>
			</div>
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
			<div class="padl mt-3" id="roles" >	  
            <p>
				 <label for="roles">Roles</label><br>
			    <label>
			      <input type="checkbox" name="roles[]" value="Approver" id="Approver">
			      Approver</label>
			    <br>
			    <label>
			      <input type="checkbox" name="roles[]" value="Admin" id="Admin">
			      Admin</label>
			    <br>
			    <label>
			      <input type="checkbox" name="roles[]" value="Hidden" id="Hidden">
			      Hidden</label>
			    <br>
		      </p>
			  </div>
			  
		<p align="right" class="padl">
		<input type="submit" class="btn-primary btn rounded butt" id="save" Value="Save">
		<button class="btn-primary btn rounded butt" onclick="closePopup()">Cancel</button>
        </p>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  	  
  </body>
</html>