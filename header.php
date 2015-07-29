<?php session_start();
if (!isset($_SESSION['access_token'])){
	echo '<script type="text/javascript">location.href = "login.php";</script>';
}
?>
<script type="text/javascript">
function CreateMsg()
{
	$('#create').modal({
                show: true
            });
};

function findResults()
{
	//alert(document.getElementById('search_text').value);
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP')
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('test').innerHTML = xmlhttp.responseText;
			}
		
		}
		
	xmlhttp.open('GET','frnpage_query.php?search_text='+document.getElementById('search_text').value,true);
	xmlhttp.send();	
	
};





function findFriends(final ,initial)
{
	//alert(document.getElementById('search_text').value);
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP')
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById(final).innerHTML = xmlhttp.responseText;
			}
		
		}
		
	xmlhttp.open('GET','friends_query.php?search_text='+document.getElementById(initial).value,true);
	xmlhttp.send();	
	
	if(document.getElementById(initial).value != ''){
		//alert(document.getElementById(initial).value);
		$(final).css('visibility','visible');	
		
	}
};

</script>    
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container" style="width:1240px;">
    <a class="brand" href="#">
    	<div class="span1">
			<img src="img/logo.png" style="width:50px;height:28px;" alt="logo"/>
		</div>	
     </a>
        <form class="navbar-search pull-left">
    
    <input autocomplete="off" type="text" class="search-query" id="search_text" style="width:450px;height:25px;" onkeyup="findResults();" placeholder="Search for people ,photos, places and things">
    
    
    </form>
    

    <ul class="nav pull-right" style="margin-top:4px;">
    <li><a href="dashboard.php">Home</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="msg.php">Messages</a></li>
    <li>
     <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['first'];?><b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="pagedet.php">Create Page</a></li>
<li><a href="chngeps.php">Change Password</a></li>
<li><a href="#" onclick="CreateMsg()">Send Message</a></li>
                <li class="divider"></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>
    </li>
    </ul>
    </div></div>
    </div><br /><br /><br />
<div style="position:fixed;padding-left=150px;margin-top:-15px;margin-left:170px;box-shadow:1px 0px 1px #000000;background-color:#FFF">
<ul id="test" type="none">
</ul>
</div>


<div class="modal hide" id="create" style="margin-left:-350px">
	<form class="form-inline span8" action="update_msg.php" role="form" style="padding:10px" method="POST">
          Send To  : <div class="input-append btn-group">
                        <input class="span2" id="InputButton" size="16" type="text" onkeyup="findFriends('posts','InputButton');">
                        <select class="dropdown-menu" style="visibility:visible" id="posts" name="id">
                        </select>
                    </div><br /><br/>
         Message : <textarea rows="4" class="span5" name="msg"></textarea><br /><br />
        <button type="submit" class="offset1 btn btn-primary">SEND</button>				
	</form>	
    
</div>    
