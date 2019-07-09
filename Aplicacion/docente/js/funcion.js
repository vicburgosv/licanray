$(document).ready(function(){
	$('#botones').on('click','div',function(){
		$(this).removeClass().addClass('boton_grey_active');
		$(this).siblings().removeClass().addClass('boton_grey');
		var tipo=$(this).children().text();
		console.log($(this).children().text());
		console.log($('.nivel').text());
		var niv=$('.nivel').text();
		var sec=$('.seccion').text();
		var ano=$('.ano').text();
		var link='php/select_'+tipo+'.php';
		$.ajax({ 
			type: 'POST',
			url: link,
			data: {'niv': niv, 'sec': sec, 'ano':ano},
			success: function(respuesta){
				$('#result').html(respuesta)
			}

		});
		
	})
	
})	