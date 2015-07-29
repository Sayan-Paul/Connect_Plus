<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect+ | Social Networking site</title>
<meta http-equiv="refresh" content="30; URL=http://localhost:8800/connect+/profile.php">
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body style="width:100%; background-color:#F2F3FF">

    <?php session_start();require_once('header.php');
		require_once('connect.php');
		$id=$_SESSION['ppid'];
		$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$purl=$row['Image_URL'];
	?>

<div style="padding-top:20px">
	<div class="span3 thumbnail clearfix" style="height:900px">
			<div>
				<a href=""><img src="<?php echo $purl;?>" class="img-rounded" alt="profile_pic"/></a>
			</div>
			<div class="span3" style="padding-top:10px">
            <br />
				<ul>
				<li style="list-style-image: url(img/wall.png)"><a href="dashboard.php">Wall</a><br>
				<li style="list-style-image: url(img/photo.png)"><a href="page_all.php">Pages</a><br>
				<li style="list-style-image: url(img/friends.png)"><a href="friends_list.php">Friends</a><br>			 			 			 	
				</ul>
			</div>
	</div>
</div>
<div class="span9" style="text-align:center;height:100%;color:#000066">
<br /><br /><br />
	<h2 style="color:#000033"><?php echo $_SESSION['first']." ".$_SESSION['last'];?></h2>
<a href="editprof.php"><h6><i class="icon-edit"></i> Edit Profile</h6></a><hr />
<h5><i class="icon-map-marker"></i> Stays in <?php echo $_SESSION['location'];?></h5>
<h5><i class="icon-gift"></i> Born on <?php echo $_SESSION['dob'];?></h5>
<h5><i class="icon-user"></i> About me : <?php echo $_SESSION['about_me'];?></h5>
<h5><i class="icon-heart"></i> Relationship status : <?php echo $_SESSION['r_status'];?></h5>
<h5><i class="icon-signal"></i> Contact No. : <?php echo $_SESSION['contact'];?></h5>
<h5><i class="icon-envelope"></i> Contact Email : <?php echo $_SESSION['email'];?></h5>
</div>
<div class="span3 thumbnail clearfix" style="height:900px">
			<h5> Friends Count : <?php echo $_SESSION['frcnt']; ?> </h5><br/>
			
            <strong>Friend Requests</strong><br><br>			
			<?php require_once('fri_req.php');?>
	</div>

	
</body>
</html>
