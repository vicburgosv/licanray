<div align="center">
<table border = '1' bgcolor="#FFFFFF">
	<tr>
		<td>
			Rut
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
		$Busqueda = $_POST['valorBusqueda'];
		$Id = $_POST['valorId'];
		$part = explode(" ", $Id);
		//echo "$part[0]";
		//echo "$part[1]";
		//echo "$part[2]";
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT Rut_alumno,Nombre,Apellido_paterno,Apellido_materno
				From alumno
				Where Nombre Like '%$Busqueda%' OR Apellido_paterno Like '%$Busqueda%' OR Apellido_materno Like '%$Busqueda%'";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			for($j=0;$j<$numerocolumns;$j++){
				echo "<td>$fila[$j]</td>";
			}
			echo "<td><form method=\"get\" action=\"php/agregar.php\">";
			echo "<input type=\"hidden\" name=\"Id\" value=\"$fila[0] $part[0] $part[1] $part[2]\">";
			echo "<input type=\"submit\" value=\"Agregar\">";
			echo "</form></td>";
        }
?>
</table>
</div>
