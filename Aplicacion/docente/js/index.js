$(document).ready(function(){
	$(document).on('submit','#formulario',function(){
		event.preventDefault();
		console.log('hola');
		console.log($(this).serialize());
		$.ajax({
			type: 'POST',
			url: 'php/login.php',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function(){
				$('.botonlog').val('validando...');
			},
			success: function(respuesta){
				if(respuesta=='correcto'){
					console.log(respuesta+'yes');
					location.href='menu.php';
				}
				else{
					console.log('respuesta');
					$('.error').slideDown('slow');
					setTimeout(function(){
						$('.error').slideUp('slow');
					},3000);
					$('.botonlog').val('Enviar');
				}
			}

		});
		
	})
	
})	