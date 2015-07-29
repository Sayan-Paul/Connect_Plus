$(document).ready(function(e) {
	function ispwd(text)	{
		var regex =/^([1-zA-Z0-1@.\s]{1,255})$/;
		return regex.test(text);	
		
	}
	$('.chps').submit(function(){
		
	if ($('.chps input[name=old]').val()=='' || !ispwd($('.chps input[name=old]').val()))
		{
			$('.chps input[name=old]').focus();
			return false;
			}

	if ($('.chps input[name=new]').val()=='' || !ispwd($('.chps input[name=new]').val()))
		{
			$('.chps input[name=new]').focus();
			return false;
			}

	if ($('.chps input[name=cnfpass]').val()=='' || !ispwd($('.chps input[name=cnfpass]').val()))
		{
			$('.chps input[name=cnfpass]').focus();
			return false;
		}
	if ($('.chps input[name=cnfpass]').val()!=$('.chps input[name=new]').val())
		{
			$('.chps input[name=new]').focus();
			return false;
			}
	});
	
});