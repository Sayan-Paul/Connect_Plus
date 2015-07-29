<?php 
require_once('connect.php');
$sid = $pid;

//echo $pid;
$sql="SELECT * FROM page_likes where PID = '$sid'";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ //echo $sid;
			//			echo mysqli_num_rows($result);				
		while($row = mysqli_fetch_assoc($result)){
			//echo mysqli_num_rows($result);
			$sid = $row['LK_ID'];
			//echo $sid;
			//echo $row['SID'];
			//echo $row['Message'];
			$query = "SELECT * From USER where ID = '$sid'";
			if($names= mysqli_query($dbc,$query) or die('error!!')){

				$user1 = mysqli_fetch_assoc($names);
				$pid = $user1['PPID'];
				$pic = "SELECT Image_URL From prpic where PPID = '$pid'";
				if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
					$pics =  mysqli_fetch_assoc($picr);
					echo '<li class="span2">
					<div class="thumbnail clearfix" style="text-align:center;height:150px;max-width:200px">
            		<div style="height:130px"><img style="max-height:130px" class="img-rounded" src="'.$pics['Image_URL'].'" alt="profile_pic" /></div>
            		<a href="">'.$user1['First'].'</a>
            	</div></li>';
			}
		}
		}
		}
?>