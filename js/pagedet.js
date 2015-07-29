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

$(document).ready(function(e) {
    $("#upl").click(function(){
		 $("#prpic").click();
	});
     $('input[type=file]').change(function() {
	 	readURL(this);
	});
	
	$('.det').submit(function(){
		if ($('.det input[name=name]').val()=='' || !isvalid($('.det input[name=name]').val()))
		{	
			$('.det input[name=name]').focus();
			return false;
			}
		});
	
});