<?php

require_once('connect.php');
$allow = array("jpg", "jpeg", "gif", "png");
$email=mysqli_real_escape_string($dbc,$_POST['email']);
$first=mysqli_real_escape_string($dbc,$_POST['first']);
$last=mysqli_real_escape_string($dbc,$_POST['last']);
$gender=mysqli_real_escape_string($dbc,$_POST['gender']);
$birthday=mysqli_real_escape_string($dbc,$_POST['birthday']);
$birthday = date('y-m-d', strtotime($birthday));
$city=mysqli_real_escape_string($dbc,$_POST['city']);
$coun=mysqli_real_escape_string($dbc,$_POST['coun']);
$loc=$city.",".$coun;
$contact=mysqli_real_escape_string($dbc,$_POST['contact']);
$rstatus=mysqli_real_escape_string($dbc,$_POST['rstatus']);
$aboutme=mysqli_real_escape_string($dbc,$_POST['aboutme']);
$pic="userpics/male.jpg";
//echo $_FILES['prpic'];
if(!is_uploaded_file($_FILES['prpic']['tmp_name'])) {
   if (!file_exists("user_pics/" . $first . $last.".jpg"))
      { $pic="user_pics/" .$gender.".jpg";}
	else
	{$pic="user_pics/" . $first . $last.".jpg";}
}
else  // is the file uploaded yet?
{
	$pic="user_pics/" . $first . $last.".jpg";
	$list=explode('.', strtolower( $_FILES['prpic']['name']) );
    $ext = end($list); // whats the extension of the file
    if ( in_array( $ext, $allow) && $_FILES["prpic"]["size"] < 2000000) // is this file allowed
    {
		
        if (file_exists("user_pics/" . $first . $last.".".$ext))
      {
      echo "user_pics/" . $first . $last.".".$ext . " already exists. ";
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
//Pic upload work done now upload pic link profilepic database
$sql="INSERT INTO prpic (Image_URL) values ('$pic')";
$result = mysqli_query($dbc,$sql) or die('error!!');
$pid = mysqli_insert_id($dbc);
$userid=$_POST['uid'];
//add user to table
$sql="INSERT INTO user (ID,First,Contact,Last,DOB,Sex,About_me,email,r_status,Location,PPID,frcnt)
 values ('$userid','$first','$contact','$last','$birthday','$gender','$aboutme','$email','$rstatus','$loc','$pid',0)";
 $result = mysqli_query($dbc,$sql) or die('error!!');
 			session_start(); 
			$_SESSION['email']=$email;
			$_SESSION['access_token']=md5($email.$pwd);
			$_SESSION['id']=$userid;
			$_SESSION['first'] = $first;
			$_SESSION['last'] = $last;
			$_SESSION['contact'] = $contact;
			$_SESSION['dob'] = $birthday;
			$_SESSION['sex'] = $gender;
			$_SESSION['about_me'] = $aboutme;
			$_SESSION['r_status'] = $rstatus;
			$_SESSION['ppid'] = $pid;
			$_SESSION['location'] = $loc;
			$_SESSION['frcnt'] = 0;
			header("Location: http://localhost:8800/Connect+/dashboard.php");
?>