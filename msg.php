<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="30; URL=http://localhost:8800/connect+/msg.php">
<title>Connect+ | Social Networking site</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<?php session_start(); require_once('header.php');

?>

      
	<div class="row-fluid">
		<div class="span3 spabs-docs-sidebar">
			<legend>FRIENDS</legend><br>
			<ul class="nav nav-list bs-docs-sidenav" data-tabs="tabs">
               <?php 
		   		require_once('connect.php');
		   		$id = $_SESSION['id'];
				$sql = "select user.ID, user.First from user where ID in (select `friend list`.UID from `friend list` where `friend list`.FR_ID = '$id') or ID in(select `friend list`.FR_ID from `friend list` where `friend list`.UID = '$id')"; 
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
					
		        		echo '<li><a href="#'.$row['ID'].'" data-toggle="tab">'.$row['First'].'</a</li> ';
							}
					}
				?>
            
			</ul>
		</div>
		<div class="tab-content">
			<legend>RECENT CONVERSATION</legend><br><br>
				<?php 
				
				require_once('connect.php');
		   		$id = $_SESSION['id'];
				$sql = "select First,ID from user where ID in (select `friend list`.UID from `friend list` where `friend list`.FR_ID = '$id') or ID in(select `friend list`.FR_ID from `friend list` where `friend list`.UID = '$id')"; 
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result))
						{
						$data = $row['ID'];

							echo '<div id="'.$data.'" class="tab-pane span8"> ';
						//echo $data;
						//echo $id;
						$query = "select * from message where (( SID = $id and DID = $data ) or ( SID = $data and DID = $id))order by Timestamp";
							if($results1 = mysqli_query($dbc,$query) or die('error!!!!'))
							 {		
								  while($rows = mysqli_fetch_assoc($results1))
							 	{
									
									if( $rows['SID'] == $id){
									echo '<div class="well span6">
										<a href="">'.$_SESSION['first'].'</a><br /><br />
										<p>	'.$rows['msg'].'<br /> 
										</p>
										<span style="font-size:9px"> '.$rows['Timestamp'].'</span>
										</div>';
									  }
									  else{
										 echo '<div class="well offset4 span6">
										<a href="">'.$row['First'].'</a><br /><br />
										<p>	'.$rows['msg'].'<br />
										</p>
										<span style="font-size:9px"> '.$rows['Timestamp'].'</span>
										</div>';
									  }
									
									}
								    echo '<form class="span10 form-inline" action="update_msg.php" role="form" method="POST">
									<textarea rows="3" class="span9" name="msg"></textarea>
									<input type="hidden" name="id" value='.$data.'>
									<button type="submit" class="offset1 btn btn-primary">POST</button>				
									</form>';						
									echo '</div>';
								}
							 } 

		        		//echo '<li><a href="#'.$row['First'].'" data-toggle="tab"">'.$row['First'].'</a></li> ';
						}
					
				
				
				
				
				
				
				
				?>		
				
				</div>
			
			 
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(e) {   
    $('.nav-list a').on('click', function (e) {
        e.preventDefault(); 
		$(this).tab('show');
});
});

		
	
	

</script>

</html>
