<?php 
require_once('connect.php');
session_start();
$rid=$_SESSION['id'];
$sid=$_POST['id'];
$sql="insert into `friend list` values('$sid','$rid')";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql="DELETE FROM `friend_req` WHERE SID='$sid' and RID = '$rid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
header("Location: http://localhost:8800/Connect+/dashboard.php");
?>