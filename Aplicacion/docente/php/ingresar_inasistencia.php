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
		$('#botones').children().eq(2).click();
	})
</script>

<br>
<h3>Alumno:<span class="rut_al"><?php echo"$rut";?></span></h3>

<p>Inasistencias del alumno</p>
<table>
<tr>
	<td>N°</td><td>Fecha</td>
</tr>

<?php	
	//Busco las inasistencias actuales
	$sql = "SELECT fecha
			FROM inasistencia
			WHERE RUT_ALUMNO='$rut' AND YEAR(fecha)=$ano";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$numerocolumns=mysqli_num_fields($rs);
	$total=$numeroTuplas+1;
	for($i=1; $i<$total; $i++){
		$fila=mysqli_fetch_array($rs);
		echo "<tr>";
		echo "<td align=\"center\">$i</td>";
		echo "<td align=\"center\">$fila[0]</td>";
		echo "<td><button class=\"eliminar_inasistencia\">Eliminar</button></td>";
		echo "</tr>";
	};
?>
</table>
<br>
<br>

<hr/>
<h3>Ingrese una nueva inasistencia</h3>
<br>
<input type="date" class="cuerpo_anotacion">
<button class="boton_guardar">Guardar</button>
<script>
	$('.eliminar_inasistencia').on('click',function(){
		var fecha=$(this).parent().prev().text();
		var rut_al=$('.rut_al').text();
		$('#botones').children().eq(2).click();
		$('.mensaje').slideDown('slow');
		setTimeout(function(){
			$('.mensaje').slideUp('slow');
		},3000);
		$.ajax({ 
			type: 'POST',
			url: 'php/eliminar_inasistencia.php',
			data: {'fecha': fecha, 'rut_al': rut_al},
			success: function(respuesta){
				console.log(respuesta);
			}
		});
	});	
</script>



<script>
	$('.boton_guardar').on('click',function(){
		var rut_al=$('.rut_al').text();
		var fecha=$('.cuerpo_anotacion').val();
		$.ajax({ 
			type: 'POST',
			url: 'php/guardar_inasistencia.php',
			data: {'fecha': fecha, 'rut_al': rut_al},
			success: function(respuesta){
				console.log(respuesta);
			}
		});

		$('#botones').children().eq(2).click();
		$('.mensaje').slideDown('slow');
		setTimeout(function(){
			$('.mensaje').slideUp('slow');
		},3000);
	});	
</script>

