<?php require_once('connect.php');
		   		$id = $_SESSION['id'];
				$sql = "select user.PPID, user.First,user.ID from user where ID in (select SID from friend_req where RID = '$id')"; 
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
						$pid = $row['PPID'];
						$pic = "SELECT Image_URL From prpic where PPID = '$pid'";
							if($picr= mysqli_query($dbc,$pic) or die('error!!')){
					
								$pics =  mysqli_fetch_assoc($picr);
		        echo '<div class="span1">
				<a href=""><img src="'.$pics['Image_URL'].'" alt="profile_pic"/></a>
			</div>
			<div class="offset1">
			<form method="POST" action="frndpro.php"><input type="hidden" name="id" value="'.$row['ID'].'" />
                <button type="submit" class="btn-link">'.$row['First'].'</button></form>
				<form method="POST" action="addfrnd.php"><input type="hidden" name="id" value="'.$row['ID'].'" />
                <button type="submit" class="btn-link"><img src="img/add.png"/><span style="font-size:x-small">  Add as a friend</span</button></form>		 
			</div>';
							}}}?>