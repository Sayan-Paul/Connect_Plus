// JavaScript Document
$(document).ready(function(e) {
	function IsEmail(email) {
	  var regex =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
$('.frgt').submit(function(){
		if ($('.frgt input[name=email]').val()=='' || !IsEmail($('.frgt input[name=email]').val()))
		{	
			$('.frgt input[name=email]').focus();
			return false;
			}
	});
});