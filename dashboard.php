<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="40; URL=http://localhost:8800/connect+/dashboard.php">
<title>Connect+ | Social Networking site</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">

function updatePost(did)
{
	var input = document.getElementById('status').value;
	alert(input);
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP')
	}
	
	xmlhttp.onreadystatechange = function(){
		window.location.reload();
		//document.getElementById('posts').innerHTML = xmlhttp.responseText;
			
		
		}
	
	parameters = 'data='+input+'&did='+did;	
	xmlhttp.open('POST','update_post.php',true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send(parameters);	
};


</script>



</head>

<body style="width:100%">

    <?php require_once('header.php');
	require_once('connect.php');
		$id=$_SESSION['ppid'];
		$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$purl=$row['Image_URL'];
	?>

<div style="padding-top:10px">
	<div class="span3 thumbnail clearfix" style="height:900px">
			<br />
            <div class="span1" style="max-height:130px;background-color:#F4F4FF" >
            	<img class="img-rounded thumbnail" src="<?php echo $purl;?>" alt="profile_pic" />
			</div>
			<div style="margin-left:100px;">
            <br /><br />
				<a href="profile.php"> <span style="font-size:18px"><?php echo $_SESSION['first']." ".$_SESSION['last'];?></span></a><br />
							 
			</div><br />
			<div class="span3"><br />
				Favorites<br/>
				<ul type="none">
				<li><a href="msg.php"><img src="img/mail.png"/>  Messages</a><br>
				<li><a href="profile.php"><img src="img/user.png"/>  Profile</a><br>
				<li><a href="friends_list.php"><img src="img/users.png"/>   Friends</a><br>			 			 			 	
				</ul>
				Pages<br>
				<ul type="none">
				<?php require_once('page_liked.php');?>		 			 			 	
				</ul>
			</div>
	</div>

	<div class="thumbnail span9">
		<div style="margin-left:50px"><b>Update status </b><br><br>
		<input type="text" class="input-xxlarge" style="float:left" id="status" placeholder="Whats on your mind"/>
        </div>
        <input style="margin-left:10px" type="submit" class="btn btn-primary" value="POST" onclick="updatePost(<?php echo $_SESSION['id']?>);"/>

	</div>	
	<div id="posts" class="span9">
		<br><b>Recent Posts</b><br><br>
        <?php require_once('recent_posts.php');?>
	</div>	
	<div class="span3 thumbnail clearfix" style="height:900px;margin-top:-90px">
			<strong>Friend Requests</strong><br><br>			
			<?php require_once('fri_req.php');?>

	</div>


  
</div>

	
</body>
</html>
