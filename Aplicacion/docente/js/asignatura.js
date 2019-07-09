	$('.boton_buscar').on('click',function(){
		var asi=$('#asi').val();
		$.ajax({ 
			type: 'POST',
			url: 'php/select_asignatura.php',
			data: {'asi': asi},
			success: function(respuesta){
				$('#result_cero').html(respuesta);
			}
		});
	});
