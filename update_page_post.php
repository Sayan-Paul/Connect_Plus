<?php
	session_start();
	require_once('connect.php');
	$msg =  $_POST['data'];
	$sid = $_SESSION['id'];
	$did = $_POST['did'];
	$type = 'page';
	if(!empty($msg)){
	$sql = "INSERT INTO post(SID,DID,Message,`P/U`) VALUES ('$sid','$did','$msg','$type')";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ 
 			echo 'OK';
 			header('http://localhost:8800/Connect+/profile.php');
	
		}
		else{
		  echo 'Error';	
		}
	}
	
?>