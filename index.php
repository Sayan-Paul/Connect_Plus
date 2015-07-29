<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect+ | Social Networking site</title>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<script type="text/javascript" src="js/index_forms.js"></script>
</head>

<body style="width:1366px;
 background-image:url(img/index.jpg);
 height:100%;">
 <?php
 session_start();
 if(isset($_SESSION['access_token']))
 header("Location: http://localhost:8800/Connect+/dashboard.php");
 ?>
<header class="main_navigation"><div>
<div style="margin-left:100px;float:left"><img src="img/logo.png" class="img-rounded" style="margin-top:-23px;width:auto;height:90px;" alt="logo" /></div>
<div align="right" style="margin-right:30px;margin-top:16px;">
<form class="form-inline signin" role="form" id="" method="post" action="login.php">
  <div class="form-group">
    <label class="sr-only" for="email"><span class="help-block">Email address</span></label>    
    <input type="email" class="form-control" name="email" placeholder="Enter email"/>

    <label class="sr-only" for="Password"><span class="help-block">Password</span></label>
    <input type="password" name="password" class="form-control" id="Password" placeholder="Password"/>
  <div style="margin-left:1040px;position:absolute"><a href="frgt.php">Forgot Password ?</a></div>
  <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
	</div>
</form>
</div>
</div></header>
<div class="container"
 style="
 background-color:#E2E1FF;border-radius:8px;
 -webkit-box-shadow: 1px 1px 4px 2px #666666;
    -moz-box-shadow: 1px 1px 4px 2px #666666;
    box-shadow: 1px 1px 4px 2px #666666;
 text-align:center;
 min-height:400px;
 width:600px;
 margin-top:50px;
 ">
<h3>Welcome to Connect+</h3>
<form style="text-align:left;margin-left:80px;" class="form-inline signup" role="form" method="post" action="userdet.php">
  <div class="form-group" style="padding-bottom:7px;">
	<input type="text" name="first" class="form-control" placeholder="First Name" />
    <input type="text" name="last" class="form-control" placeholder="Last Name" />
	</div>
    <div class="form-group" style="padding-bottom:7px;">
    <input type="email" name="email" class="form-control" placeholder="Your Email" />
    </div>
    <div class="form-group" style="padding-bottom:7px;">
    <input type="email" name="re-email" class="form-control" placeholder="Re-enter Email" />
    </div>
    <div class="form-group" style="padding-bottom:7px;">
    <input type="password" name="password" class="form-control" placeholder="New Password" />
    </div>
    <span class="help-block">Birthday</span>
    <div class="form-group" style="padding-bottom:7px;">
    <select name="day" class="form-control" style="width:100px">
	<?php
    for($i=1;$i<=31;$i++)
    {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
    ?>
    </select>
    
    
    <select name="month"  class="form-control">
    <option value="January">January</option>
    <option value="February">February</option>
    <option value="Mars">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
    </select>
    
    <select name="year" class="form-control" style="width:120px">
    <?php
    for($i=1980;$i<=2015;$i++)
    {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
    
    ?>
    </select>
    </div>
    <div class="form-group" style="padding-bottom:7px;">
    	<label class="radio inline" ><input type="radio" style="visibility:hidden;margin-left:-70px" value="" name="gender" checked/></label>
        <label class="radio inline" ><input type="radio" value="female" name="gender" />Female</label>
        <label class="radio inline"><input type="radio" value="male" name="gender" />Male</label>
	
	</div>
    <div class="form-group" style="margin-top:12px;">
    <button type="submit" class="btn btn-primary" name="submit">Sign Up for Connect+</button>
    </div>
</form>
</div>
</body>
</html>