<?php
	session_start();
	require_once('connect.php');
	$sid = $_SESSION['id'];
	$did = $_POST['id'];
	$msg =$_POST['msg'];
	if(!empty($msg)){
	$sql = "INSERT INTO message (SID,DID,msg) VALUES ('$sid','$did','$msg')";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ 
 			echo 'OK';
 			header('Location:http://localhost:8800/Connect+/msg.php');
	
		}
		else{
		  echo 'Error';	
		}
	}
	
?>