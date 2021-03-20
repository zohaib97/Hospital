<?php
session_start();
// $con = mysqli_connect("localhost","root","","hospital");
$con = mysqli_connect("localhost","root","","hospital");
if(!$con)
{
	echo "Database not connected";
}


?>