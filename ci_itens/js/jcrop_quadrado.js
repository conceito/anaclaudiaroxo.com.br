$(document).ready(function(){
	$('#cropbox').Jcrop({
			aspectRatio: 1,
			onSelect: updateCoords
		});

	
});
function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};

	function checkCoords()
	{
		if (parseInt($('#w').val())>0 || parseInt($('#h').val()) > 0) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};