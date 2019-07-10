function buscar() {
    var textoBusqueda = $("input#busqueda").val();
    var curso = $("div.id_curso").text();
     if (textoBusqueda != "") {
				 $.ajax({
					 type: 'POST',
					 url: 'php/select_alumno_curso.php',
					 data: {'valorBusqueda': textoBusqueda,'valorId': curso},
					 success: function(respuesta){
						 $('#resultadoBusqueda').html(respuesta)
					 }
					 });
     } else {
        $("#resultadoBusqueda").html('');
        };
};
