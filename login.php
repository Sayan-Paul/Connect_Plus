<?php
require_once('connect.php');
$email=mysqli_real_escape_string($dbc,$_POST['email']);
$pwd=md5(mysqli_real_escape_string($dbc,$_POST['password']));
echo $email.$pwd;
$sql= "SELECT * FROM `login` WHERE `email`= '$email' and `password`='$pwd'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$row = mysqli_fetch_assoc($result);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result)){
		session_start(); 
		$_SESSION['email']=$email;
		$_SESSION['access_token']=md5($email.$pwd);
		$_SESSION['id'] = $row['id'];
		$id=$row['id'];
		echo $id;
		$sql= "SELECT * FROM `user` WHERE `id` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		echo mysqli_num_rows($result);
		echo $row['ID'];
		$_SESSION['first'] = $row['First'];
		$_SESSION['last'] = $row['Last'];
		$_SESSION['contact'] = $row['Contact'];
		$_SESSION['dob'] = $row['DOB'];
		$_SESSION['sex'] = $row['Sex'];
		$_SESSION['about_me'] = $row['About_me'];
		$_SESSION['r_status'] = $row['r_status'];
		$_SESSION['frcnt'] = $row['frcnt'];
		$_SESSION['ppid'] = $row['PPID'];
		$_SESSION['location'] = $row['Location'];
		$_SESSION['frcnt'] = $row['frcnt'];
		echo $row['First'];
		
		header("Location: http://localhost:8800/Connect+/dashboard.php");
	}
else
	{
		header("Location: http://localhost:8800/Connect+/index.php");
		}
?>