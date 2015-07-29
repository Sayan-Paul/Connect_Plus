   <?php 

	 
	echo '<div class="span12">
		<br>
		<ul class=\'thumbnails\'> ';
		   
		   		require_once('connect.php');
		   		$id = $_SESSION['id'];
				$id2 = $fid;
				$sql = "SELECT user.ID, user.PPID, user.First FROM USER WHERE ID in (SELECT FR_ID FROM `friend list` WHERE UID = '$id' AND (FR_ID IN (SELECT FR_ID FROM `friend list` WHERE UID = '$id2') OR FR_ID IN (SELECT UID FROM `friend list` WHERE FR_ID = '$id2')))";

				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
				
						$pid = $row['PPID'];
						$pic = "SELECT Image_URL From prpic where PPID = '$pid'";
							if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
								$pics =  mysqli_fetch_assoc($picr);
		        echo '<div class="span1">
				<img src="'.$pics['Image_URL'].'" alt="profile_pic"/>
			</div>
			<div class="offset1">
			<form method="POST" action="frndpro.php"><input type="hidden" name="id" value="'.$row['ID'].'" />
                <button type="submit" class="btn-link">'.$row['First'].'</button></form>		 
			</div>';
				
							}}}
				

				$sql = "SELECT user.ID, user.PPID, user.First FROM USER WHERE ID in (SELECT UID FROM `friend list` WHERE FR_ID = '$id' AND (UID IN (SELECT FR_ID FROM `friend list` WHERE UID = '$id2') OR UID IN (SELECT UID FROM `friend list` WHERE FR_ID = '$id2')))";
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
						
						$pid = $row['PPID'];
						$pic = "SELECT Image_URL From prpic where PPID = '$pid'";
							if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
								$pics =  mysqli_fetch_assoc($picr);
		        echo '<div class="span1">
				<img src="'.$pics['Image_URL'].'" alt="profile_pic"/>
			</div>
			<div class="offset1">
			<form method="POST" action="frndpro.php"><input type="hidden" name="id" value="'.$row['ID'].'" />
                <button type="submit" class="btn-link">'.$row['First'].'</button></form>		 
			</div>';
				}}}
							
						
       echo'  </ul>   
	</div>';
	?>


