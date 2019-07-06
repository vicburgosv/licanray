$(document).ready(function(){
	$('.boton').on('click',function(){
		var curso=$('#curso').val();
		$.ajax({
			type: 'GET',
			url: '../alumnos_curso.php',
			data: {'Id': curso},
			success: function(respuesta){
				$('#result').html(respuesta)
			}

		});

	})

})
