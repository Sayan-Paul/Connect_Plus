<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>

<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/chps.js"></script>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;width:1366px;">
<?php
$warn="";
require_once('header.php');
if(isset($_POST['submit']))
{
	require_once('connect.php');
	$old=md5($_POST['old']);
	$id=$_SESSION['id'];
	$sql= "SELECT * FROM `login` WHERE `id`= '$id' and `password`='$old'";
	$result = mysqli_query($dbc,$sql) or die('First error!!');
	if(mysqli_num_rows($result)){
		$new=md5($_POST['new']);
		$sql="UPDATE `login` SET `password` = '$new' WHERE `id` = '$id'";
		mysqli_query($dbc,$sql) or die('Second error!!');
		}
	else $warn="Entered wrong password";
	}
?>
<div class="container" 
    style="width:540px;
    margin-top:130px;
    margin-left:420px;
    background-color:#D4D4D4;
    border-radius:15px;
    box-shadow:2px 2px 3px #535353;
">
<div style="padding-left:40px;">
<h4 style="padding-top:30px;padding-left:130px;">Change Password</h4><br />
<form method="post" action="chngeps.php" class="form chps">
<table style="font-size:18px;border:0;" class="table">
<span style="padding-top:30px;padding-left:130px;color:red;"><?php echo $warn;?></span>
<tr><td>Old Password</td><td><input type="password" placeholder="Old Password" name="old"/></td></tr>
<tr><td>New Password</td><td><input type="password" placeholder="New Password" name="new" /></td></tr>
<tr><td>Confirm New Password</td><td><input type="password" placeholder="Confirm New Password" name="cnfpass" /></td></tr>
<tr><td  style="text-align:center" colspan="2">
<button style="width:80px;margin-left:-100px" type="submit" name="submit" class="btn btn-primary">Submit</button></td></tr>
</table>
</form>
</div>
</div>
</body>
</html>