<?php 
require_once('connect.php');
$sid = $pid;


$sql="SELECT * FROM post where DID = '$sid' and `P/U`='page' order by  Timestamp DESC";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ //echo '1';
				
		while($row = mysqli_fetch_assoc($result)){
			$sid = $row['SID'];
			//echo $sid;
			//echo $row['SID'];
			//echo $row['Message'];
			$query = "SELECT * From user where ID = '$sid'";
			if($names= mysqli_query($dbc,$query) or die('error!!')){

				$user1 = mysqli_fetch_assoc($names);
				$pi = $user1['PPID'];
				$pic = "SELECT Image_URL From prpic where PPID = '$pi' ";
				if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
					$pics =  mysqli_fetch_assoc($picr);
					
					echo '<div class="thumbnail clearfix">
					<div class="span1">
						<a href=""><img src="'.$pics['Image_URL'].'" alt="profile_pic"/></a>
					</div>
					<div class="span7">
						<a href="">'.$user1['First'].'</a><br><br>
						<p>	'.$row['Message'].'</p>
						<a href="">Like</a>			
					</div>
				</div><br />
				';
			}
		}
		}
		}
?>