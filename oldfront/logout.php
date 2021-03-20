<?php 
include_once('database/db.php');
session_start();
session_destroy();


$offid = $_GET['id'];
$onq = mysqli_query($con, "UPDATE `admin` SET `on/off` = 'off' WHERE `id` = '$offid'");

header('location: index.php');
?>