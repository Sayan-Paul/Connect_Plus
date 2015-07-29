<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/pagedet.js"></script>
<title>Page Details</title>
</head>

<body style="background-color:#E6E8FF;background:url(img/userdet.jpg)">
<header class="main_navigation">
<div style="margin-left:100px;"><a href="index.php"><img src="img/logo.png" class="img-rounded" height="80px" width="95px" alt="logo" /></a></div></header>
	<div class="container" align="center" 
    style="background-color:#DDDDDD; border-radius:25px;box-shadow:0 0 2px 1px;width:650px;margin-top:2%;">
	<h3>Page Details</h3>
    <?php
	require_once('connect.php');
	session_start();
?>
	  <form enctype="multipart/form-data" method="post" action="pagedata.php" class="form det" style="font-size:15px">
        	<table>
            	<tr><td>Name</td><td>
                    <input type="text" name="name" placeholder="Name" />
                </td></tr><tr><td>About </td><td>
                	<textarea type="text" name="about" placeholder="Describe page..." ></textarea>
                </td></tr><tr><td>Profile pic</td><td>
                	<input id="upl" style="cursor:pointer;" type="button" class="btn" value="Upload pic"/>
                    <input type="file" id="prpic" style="display:none" name="prpic" />
                    <img id="prrpic" class="img-rounded" src="<?php echo "img/page.jpg";?>" 
                    height="70" width="80" alt="Uploaded image">
                 
                </td></tr><tr><td>Type</td><td>
                    <select name="ptype" class="form-control" >
                        <option value="Business">Business</option>
                        <option value="Food">Food</option>
                        <option value="Places">Places</option>
                        <option value="Education">Education</option>
                        <option value="Movies">Movies</option>
                        <option value="Book">Book</option>
                        <option value="Hobbies">Hobbies</option>
                        <option value="Sports">Sports</option>
                    </select>
                </td>
                </tr><tr><td colspan="2" align="center">
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button></td></tr>
            </table>
        </form>

	</div>
</body>
</html>