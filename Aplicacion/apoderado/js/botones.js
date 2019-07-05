$(document).ready(function(){
	$('#botones').on('click','div',function(){
		$(this).removeClass().addClass('boton_grey_active');
		$(this).siblings().removeClass().addClass('boton_grey');
		console.log($(this).children().eq(1).text());
		var rut = $(this).children().eq(1).text();
		$('#rut_enviar').val(rut);
		$("#myForm").submit();
	})
	
})	