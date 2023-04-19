<?php 
require_once('database.php');

$query =$_GET['query'];

$result = mysqli_query($conn, "SELECT * FROM department
    WHERE departmentname LIKE '%".$query."%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['departmentname'];
        echo "<br>";
}
    mysqli_close($conn);
?>