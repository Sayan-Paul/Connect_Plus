<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/book1.jpg">

    <title>Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
	function updatePost(){
		var input = document.getElementById('status').value;
		var did = document.getElementById('id').value;
		
		if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
		
		parameters = 'data='+input+'&did='+did;	
	xmlhttp.open('POST','update_page_post.php',true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send(parameters);	
	alert('Posted!!!');
		
		};
	</script>
	
  </head>

  <body>

		<?php 
		require_once('connect.php');
		require_once('header.php');
		if(isset($_POST['id'])){
			$id=$_POST['id']."<br />"."<br />"."<br />";
			$fid = $id;
			$sql= "SELECT * FROM `page` WHERE `PID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$name=$row['Name'];
		$type=$row['Type'];
		$about=$row['About'];
		$pid=$id;
		$id=$row['PPID'];
		$ad=$row['Admin'];
		$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		$row = mysqli_fetch_assoc($result);
		$purl=$row['Image_URL'];
		//echo $_POST['id'];
			$sid = $_SESSION['id'];
			$sql = "SELECT * FROM `page_likes` WHERE PID = '$fid' AND LK_ID = '$sid'";
			$result = mysqli_query($dbc,$sql) or die('error!!');
			$numrows = mysqli_num_rows($result);
			if($numrows == 0)
			{
				$likebutton = '<form method="POST" action="likpg.php"><input type="hidden" name="id" value="'.$pid.'" />
                <button type="submit" class="btn btn-default"><i class="icon-thumbs-up"></i> Like</button>';
			}
			else $likebutton = "<button class=\"btn btn-default disabled\"><i class=\"icon-ok\"></i> Liked</button>";
			}
		?>

    
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="hero-unit">
		<img src="<?php echo $purl;?>" alt="page display pic" max-height="100px" width="100px" class="thumbnail"> 
        <h2><?php echo $name;?></h2>
        <h5><?php echo $type;?> page</h5>
      <!--<button class="btn btn-default"><i class="icon-thumbs-up"></i> Like</button>
<button class="btn btn-default disabled"><i class="icon-ok"></i> Liked</button><hr /> -->
		<?php  
		 $userid = $_SESSION['id'];
		if($userid == $ad) {
		echo '<form method="POST" action="editpage.php">
		<input type="hidden" name="id" value="'.$_POST['id'].'" />
		<input type="hidden" name="name" value="'.$name.'" />
		<input type="hidden" name="type" value="'.$type.'" />
		<input type="hidden" name="about" value="'.$about.'" />
		<input type="hidden" name="pic" value="'.$purl.'" />
                <button type="submit" class="btn btn-link"><i class="icon-edit"></i> Edit Page</button><hr />';
			}
		?>
		
		<?php echo $likebutton; ?>
        

        
        
                    	<br /><h5> Page Likes : 
				<?php 	$pid = $_POST['id'];
						$sql = "SELECT * FROM `pg_likes` WHERE PID = '$pid'";
						if($result = mysqli_query($dbc,$sql)) {
						$row = mysqli_fetch_assoc($result);
						echo $row['likes'];
						}
						else echo '0';
			
			?></h5>

		<hr />
	</div>
    
	
	
	<hr>
	
	<div class="tabbable">
		<ul class="nav nav-pills">
			<li><a href="#about" data-toggle="pill">About</a></li>
			<li><a href="#events" data-toggle="pill">Events</a></li>
			<li><a href="#members" data-toggle="pill">Members</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane" id="about">
				<h4><?php echo $type;?> page</h4>
				<p><?php echo $about;?></p>
			</div>
			<div class="active tab-pane" id="events">
                
                
				<h3>Recent Posts</h3>
				
                <div class="thumbnail span9">
					<div style="margin-left:50px"><b>Post On Wall </b><br><br>
					<input type="text" class="input-xxlarge" style="float:left" id="status" placeholder="Whats on your mind"/>
					</div>
					
					<form method="post" action="page.php">
					<input type="hidden" name="id" value="<?php echo $fid ?>" id="id"/>
					<input style="margin-left:10px" type="submit" class="btn btn-primary" value="POST" onclick="updatePost();"/>
					</form>
					

				</div>
				<br>
				<br>
				<br>
				<br><br><br>
				
				<?php require_once('page_events.php')?>
                	 
			</div>
			<div class="tab-pane" id="members">
				<h2>Members</h2>
                <ul class="thumbnails">
				<?php require_once('page_likes.php')?>
                </ul>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	</div> <!-- /container -->
	
				
				


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.js"></script>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> !-->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
