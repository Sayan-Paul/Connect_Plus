<script type="text/javascript">
function updateLike(pid)
{
	
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
	
	parameters = 'pid='+pid;	
	xmlhttp.open('POST','update_like.php',true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send(parameters);	
	
	
}

</script>


<?php 
require_once('connect.php');
$sid = $_SESSION['id'];


$sql="SELECT * FROM post where (SID = '$sid' or DID = '$sid' or SID in (SELECT FR_ID FROM `friend list` where UID = '$sid') ) and `P/U`='user' order by  Timestamp DESC";
		if($result = mysqli_query($dbc,$sql) or die('error!!'))
		{ //echo '1';
				
		while($row = mysqli_fetch_assoc($result)){
			$sid = $row['SID'];
			$did = $row['DID'];
			$post_id = $row['PID'];
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
						<p>	'.$row['Message'].'</p>';
						$sid=$_SESSION['id'];
						$q3 = "select * from post_likes where PID = '$post_id' and LK_ID = '$sid'";
						if($result1 = mysqli_query($dbc,$q3) or die('error')){
							if ( mysqli_num_rows($result1) == 0){
								echo '<a href="" onclick="updateLike('.$post_id.');">Like('.$row['Likes'].')</a>';			
								}
							else
								{
								echo 'Liked('.$row['Likes'].')';
								}
							};
						
					echo' </div>
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
						<p>	'.$row['Message'].'</p>';
						$q3 = "select * from post_likes where PID = '$post_id' and LK_ID = '$sid'";
						if($result1 = mysqli_query($dbc,$q3) or die('error')){
							if ( mysqli_num_rows($result1) == 0){
								echo '<a href="" onclick="updateLike('.$post_id.');">Like('.$row['Likes'].')</a>';			
								}
							else
								{
								echo 'Liked('.$row['Likes'].')';
								}
							};
						
					echo' </div>
				</div><br />
				';
						
						
						
						
					}
			}
		}
		}
		}
?>