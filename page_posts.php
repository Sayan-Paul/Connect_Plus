<?php 
require_once('connect.php');

//echo 'sadsad';
//echo $post_id;
$sql="SELECT * FROM post where (SID = '$post_id' or DID = '$post_id') and `P/U`='user' order by  Timestamp DESC";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ //echo '1';
				
		while($row = mysqli_fetch_assoc($result)){
			$sid = $row['SID'];
			$did = $row['DID'];
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
					if ($sid != $did){
						
					$query2 = "SELECT * From USER where ID = '$did'";
					$names2= mysqli_query($dbc,$query2) or die('error!!');
							$user2 = mysqli_fetch_assoc($names2);
					
					echo '<div class="thumbnail clearfix">
					<div class="span1 thumbnail">
						<a href=""><img  src="'.$pics['Image_URL'].'" alt="profile_pic"/></a>
					</div>
					<div class="span7">
						<form method="post" action="frndpro.php" style="display:inline">
								<input type="hidden" name="id" value="'.$user1['ID'].'"/>
								<button type="submit" class="btn-link">'.$user1['First'].'</button>
						</form>
							<i class="icon-arrow-right"></i> 
						<form method="post" action="frndpro.php" style="display:inline">
								<input type="hidden" name="id" value="'.$user2['ID'].'"/>
								<button type="submit" class="btn-link">'.$user2['First'].'</button>
						</form>
						<p>	'.$row['Message'].'</p>
						</div>
				</div><br />
				';
				
					}
					else{
						
					echo '<div class="thumbnail clearfix">
					<div class="span1 thumbnail">
						<a href=""><img src="'.$pics['Image_URL'].'" alt="profile_pic"/></a>
					</div>
					<div class="span7">
						<form method="post" action="frndpro.php">
						<input type="hidden" name="id" value="'.$user1['ID'].'"/>
						<button type="submit" class="btn-link">'.$user1['First'].'</button></form>
						<p>	'.$row['Message'].'</p>
						</div>
				</div><br />
				';
						
						
						
						
					}
			}
		}
		}
		}
?>