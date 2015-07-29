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

	 
	<div class="span12">
		<br><legend style="text-align:center">PAGES</legend><br><br>
		<ul class='thumbnails'>
		   <?php 
		   		require_once('connect.php');
		   		$id = $_SESSION['id'];
				$sql = "select page.PPID, page.Name,page.PID from page where page.PID in (SELECT PID FROM `page_likes` WHERE LK_ID = '$id')";
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
						$pid = $row['PPID'];
						$pic = "SELECT Image_URL From prpic where PPID = '$pid'";
							if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
								$pics =  mysqli_fetch_assoc($picr);
		        echo '<li class="span2">
        		<div class="thumbnail clearfix" style="text-align:center;height:150px">
            		<div style="height:130px"><img style="max-height:130px" class="img-rounded" src="'.$pics['Image_URL'].'" alt="profile_pic" /></div>
            		<form method="POST" action="page.php"><input type="hidden" name="id" value="'.$row['PID'].'" />
                <button type="submit" class="btn-link">'.$row['Name'].'</button></form>
            	</div>
    		</li> ';
							}}}?>
         </ul>   
	</div>

	<div class="span3 offset1 thumbnail clearfix" style="height:900px">
			<strong>Friend Requests</strong><br><br>			
			<?php require_once('fri_req.php');?>
	</div>
	</div>


  
</div>

	



</body>
</html>