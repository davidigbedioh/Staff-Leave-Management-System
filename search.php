<?php
require_once('database.php');
	mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_error());
	
	mysqli_select_db($conn, "registrationpage") or die(mysqli_error());
?>
<?php
	$query = $_GET['query'];
	$min_length = 1;
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		$query = mysqli_real_escape_string($conn, $query);
		// makes sure nobody uses SQL injection
		$raw_results = mysqli_query($conn, "SELECT * FROM department WHERE (`departmentname` LIKE '%".$query."%') OR (`id` LIKE '%".$query."%')")  or die(mysqli_error());
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
            echo $row['departmentname'] . " " . $row['id'];
            echo "<br>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
