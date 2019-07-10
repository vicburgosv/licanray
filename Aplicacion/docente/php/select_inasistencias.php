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
	echo"<p align=\"center\">Lista de Clases: Inasistencias</p>";
?>

<?php
	if($numeroTuplas!=0){
		echo"
			<div align=\"left\">
				<table>
					<tr><td>N°</td><td>Rut</td><td>Nombre</td><td>Apellido P</td><td>Apellido M</td>
					</tr>
		";
		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			
			$sql3 = "SELECT nombre, apellido_paterno, apellido_materno
					From alumno
					Where RUT_ALUMNO='$fila[0]' ";
			$sq3 = mysqli_query($conexion,$sql3) or die(mysql_error());			
			$nombres_pila=mysqli_fetch_array($sq3);
			
			
			$j=$i+1;
			echo "<tr>";
			echo "<td align=\"center\">$j</td>";
			echo "<td align=\"center\">$fila[0]</td>";
			echo "<td align=\"center\">$nombres_pila[0]</td>";
			echo "<td align=\"center\">$nombres_pila[1]</td>";
			echo "<td align=\"center\">$nombres_pila[2]</td>";			
			echo "<td align=\"center\"><button class=\"registrar\">Ver/Registrar</button></td>";
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
		var rut = $(this).parent().prev().prev().prev().prev().text();
		console.log(rut);
        $.ajax({
            type: "POST",
            url: "php/ingresar_inasistencia.php",
            data: {'rut':rut},
            success: function(respuesta){
				console.log(respuesta)
				$('#result').html(respuesta);
            }		
		});
	})
</script>
