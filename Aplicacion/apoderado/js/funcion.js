$(document).ready(function(){
	$('#botones').on('click','div',function(){
		$(this).removeClass().addClass('boton_grey_active');
		$(this).siblings().removeClass().addClass('boton_grey');
		var tipo=$(this).children().text();
		var rut = $('#rut').text();
		var link='php/select_'+tipo+'.php';
		$.ajax({
			type: 'POST',
			url: link,
			data: {'rut': rut},
			success: function(respuesta){
				$('#result').html(respuesta)
			}

		});
		
	})
	
})	