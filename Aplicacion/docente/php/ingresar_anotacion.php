<?php
	$ano='2019';
	session_start();
	$ano=$_SESSION['ano'];
	$rut=$_POST['rut'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
?>

<div class="volver_small" align="center"><label class="dos">Volver</label></div>
<script>
	$('.volver_small').on('click',function(){
		console.log('hola')
		$('#botones').children().eq(1).click();
	})
</script>

<br>
<h3>Alumno:<span class="rut_al"><?php echo"$rut";?></span></h3>

<p>Anotaciones del alumno</p>
<table>
<tr>
	<td>N°</td><td>Tipo</td><td>Descripción</td>
</tr>

<?php	
	//Busco las anotaciones actuales
	$sql = "SELECT CONTADOR, TIPO, DESCRIPCION
			FROM anotacion
			WHERE RUT_ALUMNO='$rut' AND ANO=$ano";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$numerocolumns=mysqli_num_fields($rs);
	$total=$numeroTuplas+1;
	for($i=1; $i<$total; $i++){
		$fila=mysqli_fetch_array($rs);
		echo "<tr>";
		echo "<td align=\"center\">$fila[0]</td>";
		echo "<td align=\"center\">$fila[1]</td>";
		echo "<td>$fila[2]</td>";
		echo "<td><button class=\"eliminar_anotacion\">Eliminar</button></td>";
		echo "</tr>";
	};
?>
</table>
<br>
<br>

<hr/>
<h3>Ingrese una nueva anotación</h3>
<div>
Tipo de anotación:
</div>
<br>
	<select class="tipo_anotacion">

	<option>Positiva</option>

	<option>Negativa</option>

	</select>
<br>
<br>
<div>
Descripción:
</div>
<input type="text" class="cuerpo_anotacion">
<button class="boton_guardar">Guardar</button>
<script>
	$('.eliminar_anotacion').on('click',function(){
		console.log($(this).parent().prev().prev().prev().text());
		var contador=$(this).parent().prev().prev().prev().text();
		$('#botones').children().eq(1).click();
		$('.mensaje').slideDown('slow');
		setTimeout(function(){
			$('.mensaje').slideUp('slow');
		},3000);
		
		var rut_al=$('.rut_al').text();
		$.ajax({ 
			type: 'POST',
			url: 'php/eliminar_anotacion.php',
			data: {'contador': contador, 'rut_al': rut_al},
			success: function(respuesta){
				console.log(respuesta);
			}
		});
	});	
</script>



<script>
	$('.boton_guardar').on('click',function(){
		var cuerpo=$('.cuerpo_anotacion').val();
		var rut_al=$('.rut_al').text();
		var tipo=$('.tipo_anotacion').val();
		console.log(tipo);
		console.log(rut_al);
		if(cuerpo!=''){
			$.ajax({ 
				type: 'POST',
				url: 'php/guardar_anotacion.php',
				data: {'cuerpo': cuerpo, 'rut_al': rut_al,'tipo': tipo},
				success: function(respuesta){
					console.log(respuesta);
				}
			});
		};//Poner la otra opcion
		$('#botones').children().eq(1).click();
		$('.mensaje').slideDown('slow');
		setTimeout(function(){
			$('.mensaje').slideUp('slow');
		},3000);
	});	
</script>

