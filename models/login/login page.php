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
    <form action="login.php" method="post" >
      <label for="uname">Email:</label><br>
      <input name="uname" type="email" required="required" id="uname" class="form-control"><br>
      <label for="password">Password:</label><br>
      <input name="password" type="password" required="required" id="password" class="form-control"><br>
      <br>
      <button type="submit" name="button" id="login" class="btn btn-primary">Continue</button>
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
	<script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>

  </body>
</html>