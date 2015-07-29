<?php

require_once('connect.php');
session_start();
$allow = array("jpg", "jpeg", "gif", "png");
$first=mysqli_real_escape_string($dbc,$_POST['first']);
$last=mysqli_real_escape_string($dbc,$_POST['last']);
$city=mysqli_real_escape_string($dbc,$_POST['city']);
$coun=mysqli_real_escape_string($dbc,$_POST['coun']);
$loc=$city.",".$coun;
$contact=mysqli_real_escape_string($dbc,$_POST['contact']);
$rstatus=mysqli_real_escape_string($dbc,$_POST['rstatus']);
$aboutme=mysqli_real_escape_string($dbc,$_POST['aboutme']);
$pd=$_SESSION['ppid'];
$pic=mysqli_real_escape_string($dbc,$_POST['ppic']);
if(!is_uploaded_file($_FILES['prpic']['tmp_name'])) {
   //do nothing
}
else  // is the file uploaded yet?
{
	$pic="user_pics/" . $first . $last.".jpg";
	$list=explode('.', strtolower( $_FILES['prpic']['name']) );
    $ext = end($list); // whats the extension of the file
    if ( in_array( $ext, $allow) && $_FILES["prpic"]["size"] < 2000000) // is this file allowed
    {
		
        if (file_exists("user_pics/" . $first . $last.$ext))
      {
      echo "user_pics/" . $first . $last.".jpg" . " already exists. ";
	  unlink("user_pics/" . $first . $last.".".$ext);
	  move_uploaded_file($_FILES["prpic"]["tmp_name"],
      "user_pics/" . $first . $last.".".$ext);
      }
        else
      {
      move_uploaded_file($_FILES["prpic"]["tmp_name"],
      "user_pics/" . $first . $last.".".$ext);
      echo "Stored in: ";
      }
    }
    else
    {
        // error this file ext is not allowed
    }
}
//Pic upload work done now update pic link profilepic database
$sql = "UPDATE prpic SET `Image_URL` = '$pic' WHERE `PPID` = '$pd'";
$result = mysqli_query($dbc,$sql) or die('error!!');
//update user to table
$userid=$_SESSION['id'];
$sql = "UPDATE user SET `First` = '$first' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql = "UPDATE user SET `Last` = '$last' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql = "UPDATE user SET `Contact` = '$contact' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql = "UPDATE user SET `About_me` = '$aboutme' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql = "UPDATE user SET `r_status` = '$rstatus' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');
$sql = "UPDATE user SET `Location` = '$loc' WHERE `ID` = '$userid'";
$result = mysqli_query($dbc,$sql) or die('error!!');

			$_SESSION['first'] = $first;
			$_SESSION['last'] = $last;
			$_SESSION['contact'] = $contact;
			$_SESSION['about_me'] = $aboutme;
			$_SESSION['r_status'] = $rstatus;
			$_SESSION['location'] = $loc;
			header("Location: http://localhost:8800/Connect+/profile.php");
?>