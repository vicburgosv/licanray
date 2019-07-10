<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../style2.css" rel="stylesheet">
	</head>
	<body>
	<header>
	<h1 align="center">Lista de Apoderados</h1>
	</header>
<div align="center">
<table border = '1' style = "border-collapse: collapse;" bgcolor = 'D5D6F8'>
	<tr bgcolor="03065D" style="font-weight: bold; color:white">
		<td>
			Rut Alumno
		</td>
		<td>
			Nombre
		</td>
		<td>
			Apellido Paterno
		</td>
		<td>
			Apellido Materno
		</td>
		<td>
			Rut Apoderado
		</td>
		<td>
			Nombre
		</td>
		<td>
			Apellido Paterno
		</td>
		<td>
			Apellido Materno
		</td>
	</tr>
<?php
	require('conexion.php');
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT alumno.Rut_alumno, alumno.Nombre, alumno.Apellido_paterno, alumno.Apellido_materno, apoderado.Rut_apoderado, apoderado.Nombre, apoderado.Apellido_paterno, apoderado.Apellido_materno
		FROM alumno, apoderado, depende WHERE alumno.Rut_alumno=depende.Rut_alumno AND apoderado.Rut_apoderado=depende.Rut_apoderado";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			for($j=0;$j<$numerocolumns;$j++){
				echo "<td>$fila[$j]</td>";
			}
			echo "</tr>";
        }
?>
</table>
</div>
