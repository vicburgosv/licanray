$(document).ready(function(){
	$('#botones').on('click','div',function(){
		$(this).removeClass().addClass('boton_grey_active');
		$(this).siblings().removeClass().addClass('boton_grey');
		console.log($(this).children().text());
		var rut = $(this).children().text();
		console.log(rut);
		$('#rut_enviar').val(rut);
		$("#myForm").submit();
	})
	
})	