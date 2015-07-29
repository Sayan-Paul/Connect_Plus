// JavaScript Document
$(document).ready(function(e) {
	function IsEmail(email) {
	  var regex =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	function isvalid(text)	{
		var regex =/^[A-Za-z_][A-Za-z_]*$/;
		return regex.test(text);	
		
	}
	function ispwd(text)	{
		var regex =/^([1-zA-Z0-1@.\s]{1,255})$/;
		return regex.test(text);	
		
	}
    $(".signin input").attr("value","");
    $(".signup input").attr("value","");
	$('.signin').submit(function(){
		if ($('.signin input[type=email]').val()=='')
		{
			
			$('.signin input[type=email]').attr("placeholder",'You must provide email');
			$('.signin input[type=email]').css("color","red");
			$('.signin input[type=email]').focus();
			return false;
			}
		else if(!IsEmail($('.signin input[type=email]').val()))
		{
			$(".signin input[type=email]").attr("value","");
			$('.signin input[type=email]').attr("placeholder",'Invalid email');
			$('.signin input[type=email]').css("color","red");
			$('.signin input[type=email]').focus();
			return false;
			}
		else if ($('.signin input[type=password]').val()=='')
		{			
			$('.signin input[type=email]').css("color","black");
			$('.signin input[type=password]').attr("placeholder",'You must provide password');
			$('.signin input[type=password]').css("color","red");
			$('.signin input[type=password]').focus();
			return false;
			}
		})
	$('.signup').submit(function(){
		if ($('.signup input[name=first]').val()=='' || !isvalid($('.signup input[name=first]').val()))
		{	
			$('.signup input[name=first]').focus();
			return false;
			}
		else if(!IsEmail($('.signup input[name=email]').val()) || $('.signup input[name=email]').val()=='')
		{
			$('.signup input[name=email]').attr("placeholder",'Invalid email');
			$('.signup input[name=email]').focus();
			return false;
			}
		else if ($('.signup input[name=last]').val()=='' || !isvalid($('.signup input[name=last]').val()))
		{
			$('.signup input[name=last]').focus();
			return false;
			}
		else if ($('.signup input[name=email]').val()=='')
		{
			$('.signup input[name=email]').focus();
			return false;
			}
		else if ($('.signup input[name=re-email]').val()=='')
		{
			$('.signup input[name=re-email]').focus();
			return false;
			}
		else if ($('.signup input[name=re-email]').val()!=$('.signup input[name=email]').val())
		{
			$('.signup input[name=re-email]').attr("value","");
			$('.signup input[name=re-email]').attr("placeholder","Enter email again");
			$('.signup input[name=re-email]').focus();
			return false;
			}
		else if ($('.signup input[name=password]').val()=='' || !ispwd($('.signup input[name=password]').val()))
		{
			$('.signup input[name=password]').focus();
			return false;
			}
		else if ($(!'.signup input[name=gender]:checked').val())
			{
				$('.signup input[name=gender]').focus();
				alert("Select gender");
				return false;
				}
		})
});