    <?php 
	session_start();
		 $id=$_POST['id'];
if($_SESSION['id']===$_POST['id'])
{echo '<script type="text/javascript">location.href = "profile.php";</script>';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect+ | Social Networking site</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" >
function updatePost()
{	
	var input = document.getElementById('status').value;
	var did   = document.getElementById('did').value;
	//alert(input);
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP')
	}
	
	xmlhttp.onreadystatechange = function(){
		//parameters = 'id='
		//document.getElementById('posts').innerHTML = xmlhttp.responseText;
			
		
		}
	
	parameters = 'data='+input+'&did='+did;	
	xmlhttp.open('POST','update_post.php',true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send(parameters);	
	alert('Posted!!!');
};
</script>
</head>
<?php
?>

<body style="width:100%; background-color:#F2F3FF">

    <?php 
		 $id=$_POST['id'];
if($_SESSION['id']===$_POST['id'])
{echo '<script type="text/javascript">location.href = "profile.php";</script>';}
		require_once('header.php');
		require_once('connect.php');
		$fid = $id;
		$post_id = $fid;
		$sql= "SELECT * FROM `user` WHERE `ID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$first=$row['First'];
		$last=$row['Last'];
		$contact=$row['Contact'];
		$loc=$row['Location'];
		$bir=$row['DOB'];
		$abt=$row['About_me'];
		$email=$row['email'];
		$rst=$row['r_status'];
		
		
		
		$id=$row['PPID'];
		$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$purl=$row['Image_URL'];
		
		$sid = $_SESSION['id'];
		$sql= "SELECT * FROM `friend list` WHERE (UID = '$sid' AND FR_ID = '$fid') OR (UID = '$fid' AND FR_ID = '$sid')";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$numrows = mysqli_num_rows($result);
		if($numrows == 0)
		{
			$sql= "SELECT * FROM `friend_req` WHERE (SID = '$sid' AND RID = '$fid')";
			$result = mysqli_query($dbc,$sql) or die('error!!');
			$req_sent = mysqli_num_rows($result);
			$sql= "SELECT * FROM `friend_req` WHERE (SID = '$fid' AND RID = '$sid')";
			$result = mysqli_query($dbc,$sql) or die('error!!');
			$req_recv = mysqli_num_rows($result);
			if($req_sent>0)
			{$friendbutton = "<button class=\"btn btn-default disabled\"><i class=\"icon-ok\"></i> Friend Request sent</button><hr />";}
			else if($req_recv>0)
			{$friendbutton = '<form method="POST" action="addfrnd.php"><input type="hidden" name="id" value="'.$fid.'" />
                <button type="submit" class="btn btn-success"><img src="img/add.png"/> Accept Friend Request</button>';}
			else
			$friendbutton = '<form method="POST" action="frndreq.php"><input type="hidden" name="id" value="'.$fid.'" />
                <button type="submit" class="btn btn-success"><img src="img/add.png"/> Add friend</button>';
		}
		else $friendbutton = "<button class=\"btn btn-default disabled\"><i class=\"icon-ok\"></i> Friends</button>";
	?>

<div style="padding-top:20px">
	<div class="span3 thumbnail clearfix" style="height:900px">
			<div>
				<a href=""><img src="<?php echo $purl;?>" class="img-rounded" alt="profile_pic"/></a>
			</div>
	</div>
</div>
<div class="span9" style="text-align:center;height:100%;color:#000066">
<br /><br /><br />
	<h2 style="color:#000033"><?php echo $first." ".$last;?></h2>
<?php if($_SESSION['id']!=$_POST['id'])echo $friendbutton ?>
<!-- <button class="btn btn-success"><img src="img/add.png"/> Add friend</button>
<button class="btn btn-default disabled"><i class="icon-ok"></i> Friends</button> --><hr /> 
<h5><i class="icon-map-marker"></i> Stays in <?php echo $loc;?></h5>
<h5><i class="icon-gift"></i> Born on <?php echo $bir;?></h5>
<h5><i class="icon-user"></i> About me : <?php echo $abt;?></h5>
<h5><i class="icon-heart"></i> Relationship status : <?php echo $rst;?></h5>
<h5><i class="icon-signal"></i> Contact No. : <?php echo $contact;?></h5>
<h5><i class="icon-envelope"></i> Contact Email : <?php echo $email;?></h5>
</div>
<div class="thumbnail span9">
		<div style="margin-left:50px"><b>Post On Wall </b><br><br>
		<input type="text" class="input-xxlarge" style="float:left" id="status" placeholder="Whats on your mind"/>
        </div>
        <form method="post" action="frndpro.php">
        <input type="hidden" name="id" value="<?php echo $fid ?>" id="did"/>
        <input style="margin-left:10px" type="submit" class="btn btn-primary" value="POST" onclick="updatePost();"/>
        </form>

</div>
<?php if($numrows > 0){
	echo	'<div id="posts" class="span9">
			<br><b>Recent Posts</b><br><br>
       	 ';
		 require_once('page_posts.php');
		  echo'
		</div>';
		}
	?>
    
<div class="span3 thumbnail clearfix" style="height:900px;margin-top:-450px">
	<strong> Mutual Friends</strong>
    <?php require_once('mutual_friends.php'); ?>
</div>
     
</body>
</html>
