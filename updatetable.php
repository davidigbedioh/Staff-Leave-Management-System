
<?php
    session_start(); 
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: Employees.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $employeenum = $_POST['employeenum'];
        $job = $_POST['job'];
        $department = $_POST['department'];
        $approver = $_POST['approver'];
        $notify = $_POST['notify'];
        $employeestart = $_POST['employeestart'];
        $timezone = $_POST['timezone'];
        $roles = $_POST['roles'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;

        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            include('config.php');
            $sql = "UPDATE employee  set firstname = ?, lastname = ?, dob = ?, email = ?, employeenum = ?, Job = ?, department = ?, employeestart =? timezone = ?, roles = ? WHERE id = ?";
            $q = $db->prepare($sql);
            $q->execute(array($firstname,$lastname,$dob,$email,$employeenum,$job,$department,$employeestart,$timezone,$roles,$id));
            header("Location: Employees.php");
        }
    } else {
        include('config.php');
        $sql = "SELECT * FROM employee where id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $dob = $data['dob'];
        $email = $data['email'];
        $employeenum = $data['employeenum'];
        $job = $data['Job'];
        $department = $data['department'];
        $approver = $data['approver'];
        $notify = $data['notify'];
        $employeestart = $data['employeestart'];
        $timezone = $data['timezone'];
        $roles = $data['roles'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Employees</title>
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
             
            <form class="form-horizontal" action="updatetable.php?id=<?php echo $id?>" method="post">
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
					
				</select> <br>
				 <div>
                 <label for="notify">Notify</label>
				<select name="notify" id="notify"  class="form-control" placeholder="Search">
					<option value="" disabled selected>Search</option>
				</select>
			</div>
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


    <div class="form-actions" align="right">
    <button type="submit" class="btn btn-success">Update</button>
    <a class="btn" href="Employees.php">Back</a>
    </div>
    </form>
    </div>
                
    </div> 
</div>
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