<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/frgt.js"></script>

</head>

<body style="font-family:Verdana, Geneva, sans-serif;width:1366px;">
<?php
$warn="";
if(isset($_POST['submit']))
{
	require_once('connect.php');
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789?@-";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $pass=(implode($pass)); //turn the array into a string
	$passm=md5($pass);
	$id=$_POST['email'];
	$sql="UPDATE `login` SET `password` = '$passm' WHERE `email` = '$id'";
	mysqli_query($dbc,$sql) or die('Second error!!');
	$warn="New Password : ".$pass." Change Password Immeditely After Login";
	
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
<h4 style="padding-top:30px;padding-left:130px;">Forgot Password</h4><br />
<form method="post" action="frgt.php" class="form chps">
<table style="font-size:18px;border:0;" class="table">
<span style="padding-top:30px;color:red;"><?php echo $warn;?></span>
<tr><td>Your email</td><td><input type="email" placeholder="Enter email" name="email"/></td></tr>
<tr><td  style="text-align:center" colspan="2">
<button style="width:80px;margin-left:-100px" type="submit" name="submit" class="btn btn-primary">Submit</button></td></tr>
</table>
</form>
</div>
</div>
</body>
</html>