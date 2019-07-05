<div align="center">
	<table border=1>
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
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT Rut_apoderado, Nombre, Apellido_paterno, Apellido_materno
				From apoderado
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
			$Rut=$_POST['valorRut'];
			echo "<td><form method=\"get\" action=\"php/tipo_parentesco.php\">";
			echo "<input type=\"hidden\" name=\"Ruts\" value=\"$Rut $fila[0]\" >";
			echo "<input type=\"submit\" value=\"Agregar\">";
			echo "</form></td>";
        }
?>
</table>
</div>
