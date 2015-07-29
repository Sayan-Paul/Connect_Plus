<?php
	session_start();
	require_once('connect.php');
	$pid =  $_POST['pid'];
	$sid = $_SESSION['id'];
	if(!empty($pid)){
	$sql = "INSERT INTO `post_likes` (PID,LK_ID) VALUES ('$pid','$sid')";
	if ((mysqli_query($dbc,$sql)) or die('error!!'))
			echo 'OK';
 		else{
		  	echo 'Error';	
			}
	}
	
?>