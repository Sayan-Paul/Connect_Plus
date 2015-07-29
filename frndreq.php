<?php 
require_once('connect.php');
session_start();
$rid=$_SESSION['id'];
$sid=$_POST['id'];
$sql="insert into `friend_req` values('$rid','$sid')";
$result = mysqli_query($dbc,$sql) or die('error!!');
header("Location: http://localhost:8800/Connect+/dashboard.php");
?>