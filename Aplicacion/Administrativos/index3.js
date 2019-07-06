function buscar() {
    var textoBusqueda = $("input#busqueda").val();
    var rut = $("div.id_alumno").text();
     if (textoBusqueda != "") {
				 $.ajax({
					 type: 'POST',
					 url: 'php/select_apoderado_alumno.php',
					 data: {'valorBusqueda': textoBusqueda,'valorRut': rut},
					 success: function(respuesta){
						 $('#resultadoBusqueda').html(respuesta)
					 }
					 });
     } else {
        $("#resultadoBusqueda").html('');
        };
};
