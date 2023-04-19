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