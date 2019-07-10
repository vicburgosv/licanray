$(document).ready(function(){
	$('#botones').on('click','div',function(){
		$(this).removeClass().addClass('boton_grey_active');
		$(this).siblings().removeClass().addClass('boton_grey');
		console.log($(this).children().eq(1).children().eq(0).text());
		var niv = $(this).children().eq(1).children().eq(0).text()
		var sec = $(this).children().eq(1).children().eq(1).text()
		var ano = $(this).children().eq(1).children().eq(2).text()
		$('#nivel').val(niv);
		$('#seccion').val(sec);
		$('#ano').val(ano);
		$("#myForm").submit();
	})
	
})	