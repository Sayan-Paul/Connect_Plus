// JavaScript Document
function readURL(input) {
alert(input);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prrpic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function isvalid(text)	{
	var regex =/^[A-Za-z_][A-Za-z_]*$/;
	return regex.test(text);	
	
}
function isnum(num)	{
	var regex =/^[0-9][0-9]*$/;
	return regex.test(num);	
	
}
$(document).ready(function(e) {
    $("#upl").click(function(){
		 $("#prpic").click();
	});
     $('input[type=file]').change(function() {
	 	readURL(this);
	});
	
	$('.det').submit(function(){
		if ($('.det input[name=first]').val()=='' || !isvalid($('.det input[name=first]').val()))
		{	
			$('.det input[name=first]').focus();
			return false;
			}
		else if ($('.det input[name=last]').val()=='' || !isvalid($('.det input[name=last]').val()))
		{
			$('.det input[name=last]').focus();
			return false;
			}
		else if (!isvalid($('.det input[name=city]').val()))
		{
			$('.det input[name=city]').focus();
			return false;
			}
		else if (!isnum($('.det input[name=contact]').val()))
		{
			$('.det input[name=contact]').focus();
			return false;
			}
		});
	
});