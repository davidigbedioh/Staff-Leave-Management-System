<?php
session_start();
require('db.php');
$error='';
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="select * from registration where email='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row->roles;
		$_SESSION['username']=$username;
		if($row['roles']=='Admin'){
		header('location:summarized.php');
		die();
		}	
		elseif($row['roles']=='Approver'){
			header('location:approversummarized.php');
			die();
		}elseif($row['roles']=='Hidden'){
			header('location:hiddensummarized.php');
			die();
		}
	}else{
		$error='Please enter correct login details';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link href="css/login.css" rel="stylesheet">
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light newr">
      <a class="navbar-brand newq" href="Get started.html">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  </nav>
	 <div class="container">
	  <div class="row">
      <div class="mx-auto col-12 col-lg-6 ml-auto mr-auto mb-5 mt-5">
	  <div class="jumbotron">
    <header><h2 id="reg1" class="mb-1 newq">Sign In</h2></header>
    <form method="post">
      <label for="username">Email:</label><br>
      <input name="username" type="email" required="required" id="username" class="form-control"><br>
      <label for="password">Password:</label><br>
      <input name="password" type="password" required="required" id="password" class="form-control"><br>
      <br>
      <button type="submit" name="submit" id="login" class="btn btn-primary">Continue</button>
	  <?php echo $error?>
		  <a href="registration.php"><p><em>Dont have an account? Sign up!!</em></p></a>
	</form>
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
  <script src="js/jquery-3.4.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
	<script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  </body>
</html>