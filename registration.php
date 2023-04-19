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
    <title>Registration</title>
	<link href="css/reg.css" rel="stylesheet">
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <!-- Bootstrap -->
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light newr">
      <a class="navbar-brand newq" href="Get started.html">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    </nav>
	 <div class="container">
	  <div class="jumbotron mt-3">
    <header><h2 id="reg1" class="mb-1 newq">Sign Up</h2>
    </header>
    <div class="flex-parent-element">
    <div class="flex-child-element1">  
    <form action= "registration.php" method="post">
	<label for="companyname">Company Name:</label><br>
		<input name="companyname" type="text" required="required" id="companyname" class= "form-control"><br>
      <label for="firstname">First Name:</label><br>
			<input name="firstname" type="text" required="required" id="firstname" class="form-control"><br>
      <label for="lastname">Last Name:</label><br>
		  <input name="lastname" type="text" required="required" id="lastname" class="form-control"><br>
      <label for="email">Email:</label><br>
      <input name="email" type="email" required="required" id="email" class="form-control"><br>
      </div>
      <div class="flex-child-element2">
      <label for="password">Password:</label><br>
      <input name="password" type="password" required="required" id="password" class="form-control"><br>
      <label for="confirm_password">Confirm Password:</label><br>
      <input name="confirm_password" type="password" required="required" id="confirm_password" class="form-control"><br>
      <div id="gender">
        <p>
          <label for="gender">Sex</label>
            <input class="ml-2" name="gender" type="radio" required="required" id="male" value="Male">Male
            <input name="gender" type="radio" required="required" id="female" value="Female" class="ml-2">Female
            <input class="ml-2" name="gender" type="radio" required="required" id="other" value="Other"><br>
        </p>
		</div>
      <label for="phonenumber">Phone Number:</label>
      <input name="phonenumber" type="tel" required="required" id="phonenumber" class="form-control"><br><br>
      <div class="mb-3" id="but">
      <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
      <input name="reset" type="reset" class="btn btn-primary" id="reset" form="form1" value="Reset">
		<a href="Get started.html"><input name="button" type="button" class="btn btn-primary" form="form1" value="Cancel"></a>
		  <a href="login page.php"><p><em>Already have an account? Sign in!!</em></p></a></div>
    </div>
    </div>
    </form>
  </div>

	</div>	  
</div>
<footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p class="ftr">Copyright © Leavy. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>  	<!-- body code goes here -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/confirmpassword.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      	$(function(){
          $('#register').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){

            var companyname = $('#companyname').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var gender = $('input[name="gender"]:checked').val();
            var phonenumber = $('#phonenumber').val();


              e.preventDefault();	

              $.ajax({
                type: 'POST',
                url: 'process.php',
                data: {companyname: companyname,firstname: firstname,lastname: lastname,email: email,password: password,gender: gender,phonenumber: phonenumber},
                success: function(data){
                swal({
                      position: 'top-end',
                      customClass: 'swal-wide',
                      title: 'Successful',
                      text: data,
                      button: 'okay',
                      popup: 'swal2-show',
                      backdrop: 'swal2-backdrop-show',
                      type: 'success'
                      })

                },
                error: function(data){
                  swal({
                      title: 'Errors',
                      text: 'There were errors while saving the data.',
                      type: 'error'
                      })
                }
              });

            }else{
              
            }

          });		
        });
    </script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
    
  </body>
</html>