function buscar() {
    var textoBusqueda = $("input#busqueda").val();

     if (textoBusqueda != "") {
				 $.ajax({
					 type: 'POST',
					 url: 'php/select_apoderado.php',
					 data: {'valorBusqueda': textoBusqueda},
					 success: function(respuesta){
						 $('#resultadoBusqueda').html(respuesta)
					 }
					 });
     } else {
        $("#resultadoBusqueda").html('');
        };
};
