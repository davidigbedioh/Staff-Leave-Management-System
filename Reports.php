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
    <title>Reports</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/reg.css" rel="stylesheet"> 
  </head>
  <body>
  	<!-- body code goes here -->
	<main id="swup" class="transition-fade color-bg" style="padding-top: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light newr fixed addborderbottom">
      <a class="navbar-brand newq" href="#">Leavy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse addborderbottom" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item pad"> <a class="nav-link" href="summarized.php">SUMMARY </a> </li>
			<li class="nav-item pad"> <a class="nav-link" href="My leave.php">MY LEAVE</a> </li>
			<li class="nav-item pad active"> <a class="nav-link" href="#"><span class="sr-only">(current)</span>REPORTS</a> </li>
		  </ul>
		  
        <ul class="navbar-nav ml-auto">
		<li class="nav-item pad"> <a class="nav-link" href="Summary.php"><img src="img/sign2 edit.png" alt="img/gear sign.png" class="closebtn rounded-circle" id="set"  onclick="toggleNav()"></a></li>	
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
<!-- Page content -->
<div class="divc bhg rounded"> 
  <div class="container con">
	  
	  <h3>Reports</h3>
	 <table width="200" border="1">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

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

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
  <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
	<script src="js/drop-over.js"></script>  
  </body>
</html>