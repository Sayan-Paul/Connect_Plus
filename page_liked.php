<?php require_once('connect.php');
		   		$id = $_SESSION['id'];
				$sql = "select page.PPID, page.Name,page.PID from page where PID in (select PID from page_likes where LK_ID = '$id')"; 
				if($result = mysqli_query($dbc,$sql) or die('error!!'))
					{ while($row = mysqli_fetch_assoc($result)){
						
		        echo '<li><form method="POST" action="page.php"><input type="hidden" name="id" value="'.$row['PID'].'" />
                <button type="submit" class="btn-link"><i class="icon-wrench"></i> '.$row['Name'].'</button></form>';
							}}?>