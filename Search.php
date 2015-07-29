<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Connect+ | Social Networking site</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/index_forms.js"></script>

</head>

<body style="width:100%">
<?php require_once('header.php');?>
		<br><br>
		<div class="span20">
		<b> <h3 style="text-align:center;color:purple">All Suggestions</h3></b>
		</div>
		
<?php
require_once('connect.php');
	echo '<br /><br /><hr>';
	echo '<div class="tabbable" >';
	echo '<ul class="nav nav-pills">';
	echo '<li><a href="#people" data-toggle="pill">People</a></li>';
	echo '<li><a href="#pages" data-toggle="pill">Pages</a></li>';
	echo '</ul>';
	echo	'<div class="tab-content" >';
	echo	'<div class="active tab-pane" id="people">';
		$id=$_SESSION['id'];
		$sql = "select * from user where ID in (select `friend list`.UID from `friend list` where `friend list`.FR_ID = '$id') or ID in(select `friend list`.FR_ID from `friend list` where `friend list`.UID = '$id')"; 
		$result = mysqli_query($dbc,$sql) or die('error!!');
		echo '<ul>';
		echo '<br />';
	
		while($row = mysqli_fetch_assoc($result))
		{
			$id=$row['PPID'];
			$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
			$result1 = mysqli_query($dbc,$sql) or die('error!!');
			$picsr = mysqli_fetch_assoc($result1);
			  $purl=$picsr['Image_URL'];
			echo '<h2 value="'.$row['ID'].'"><div height:20px;width:400px;border:2px"><form method="post" action="frndpro.php">
			<img style="max-height:40px;max-width:50px" src="'.$purl.'" alt="pic"/>
			<input type="hidden" name="id" value="'.$row['ID'].'"/>
			<button type="submit" class="btn-link">'.$row['First'].'</button></form></div></h2>';
		}
		echo '</ul><hr>';
		//Other
		$id=$_SESSION['id'];
		$sql = "select * from user where ID!='$id' and (ID NOT in (select `friend list`.UID from `friend list` where `friend list`.FR_ID = '$id') and ID NOT in(select `friend list`.FR_ID from `friend list` where `friend list`.UID = '$id'))"; 
		$result = mysqli_query($dbc,$sql) or die('error!!');
		echo '<ul>';
	
		while($row = mysqli_fetch_assoc($result))
		{
			$id=$row['PPID'];
			$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
			$result1 = mysqli_query($dbc,$sql) or die('error!!');
			$picsr = mysqli_fetch_assoc($result1);
			  $purl=$picsr['Image_URL'];
			  echo '<br />';
			echo '<h2 value="'.$row['ID'].'"><div style="background-color:white;height:20px;width:400px;border:2px"><form method="post" action="frndpro.php">
			<img style="max-height:40px;max-width:50px" src="'.$purl.'" alt="pic"/>
			<input type="hidden" name="id" value="'.$row['ID'].'"/>
			<button type="submit" class="btn-link">'.$row['First'].'</button></form></div></h2>';
		}
		echo '</ul></div>';
		//Pages	
		$id=$_SESSION['id'];
		echo	'<div class="tab-pane fade" id="pages">
				 <li class ="divider" ></li>
				<br />';
		$sql= "select page.PPID, page.Name,page.PID from page where PID in (select PID from page_likes where LK_ID = '$id')";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		echo '<ul>';
		while($row = mysqli_fetch_assoc($result)){
			$id=$row['PPID'];
			$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
			$result1 = mysqli_query($dbc,$sql) or die('error!!');
			$picsr = mysqli_fetch_assoc($result1);
			  $purl=$picsr['Image_URL'];
			echo '<br />';
			echo '<h2 value="'.$row['PID'].'"><div style="background-color:white;height:20px;width:400px;border:2px"><form method="post" action="page.php">
			<img style="max-height:40px;max-width:50px" src="'.$purl.'" alt="pic"/>
			<input type="hidden" name="id" value="'.$row['PID'].'"/>
			<button type="submit" class="btn-link">'.$row['Name'].'</button></form></div></h2>';
			}
		echo '<br /></ul><hr>';
		// Pages Not Liked
		$id=$_SESSION['id'];
		echo '<li class ="divider" ></li>';
		$sql= "select page.PPID, page.Name,page.PID from page where PID NOT in (select PID from page_likes where LK_ID != '$id')";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		echo '<ul>';
		while($row = mysqli_fetch_assoc($result))
		{
			$id=$row['PPID'];
			$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
			$result1 = mysqli_query($dbc,$sql) or die('error!!');
			$picsr = mysqli_fetch_assoc($result1);
			  $purl=$picsr['Image_URL'];
			echo '<h2 value="'.$row['PID'].'"><div style="background-color:white;height:20px;width:400px;border:2px"><form method="post" action="page.php">
			<img style="max-height:40px;max-width:50px" src="'.$purl.'" alt="pic"/>
			<input type="hidden" name="id" value="'.$row['PID'].'"/>
			<button type="submit" class="btn-link">'.$row['Name'].'</button></form></div></h2>';
		}
		echo '</ul>';
		echo '</div>';
		echo '</div><br/><br/><br/>'
		
?>

</body>
</html>