<?php
require_once('connect.php');
$key=mysqli_real_escape_string($dbc,$_GET['search_text']);
if(!empty($_GET['search_text']))
{
	$sql= "SELECT * FROM `user` WHERE First like '".mysql_real_escape_string($key)."%'";
		$result = mysqli_query($dbc,$sql) or die('error!!');
		//echo '<ul>';
		while($row = mysqli_fetch_assoc($result)){
			$id=$row['PPID'];
			$sql= "SELECT * FROM `prpic` WHERE `PPID` = '$id'";
			$result1 = mysqli_query($dbc,$sql) or die('error!!');
			$picsr = mysqli_fetch_assoc($result1);
			  $purl=$picsr['Image_URL'];
			echo '<option value="'.$row['ID'].'"><div style="background-color:white;height:20px;width:400px;border:2px"><form method="post" action="frndpro.php">
			<img style="max-height:40px;max-width:50px" src="'.$purl.'" alt="pic"/>
			<input type="hidden" name="id" value="'.$row['ID'].'"/>
			<button type="submit" class="btn-link">'.$row['First'].'</button></form></div><hr/></option>';
			
	//		echo $value = $row['First'].'<br />';
		
		
		} 
		//echo '</ul>';
}
?> 