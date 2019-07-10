<?php
	$ano='2019';
	session_start();
	$niv=$_SESSION['nivel'];
	$sec=$_SESSION['seccion'];
	$ano=$_SESSION['ano'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	//Busco a todos los alumnos del curso
	$sql = "SELECT RUT_ALUMNO
			From pertenece
			Where NIVEL='$niv' AND SECCION='$sec' AND ANO=$ano
			ORDER BY RUT_ALUMNO";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	
	$numerocolumns=mysqli_num_fields($rs);
	echo"<p align=\"center\">Lista de Clases</p>";
?>

<?php
	if($numeroTuplas!=0){
		echo"
			<div align=\"center\">
				<table>
					<tr><td>N°</td><td>Rut</td>
					</tr>
		";
		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			$j=$i+1;
			echo "<tr>";
			echo "<td align=\"center\">$j</td>";
			echo "<td align=\"center\">$fila[0]</td>";
			echo "<td align=\"center\"><button class=\"registrar\">Registrar Anotacion</button></td>";
			echo "</tr>";
		}
		echo"
			</table>
			</div>		
			";

	
	}
	else{
		echo"No hay alumnos registrados en este curso";
	}
?>

<br>
<script>
	$('.registrar').on('click',function(){
		var rut = $(this).parent().prev().text();
		console.log(rut);
        $.ajax({
            type: "POST",
            url: "php/ingresar_anotacion.php",
            data: {'rut':rut},
            success: function(respuesta){
				console.log(respuesta)
				$('#result').html(respuesta);
            }		
		});
	})
</script>