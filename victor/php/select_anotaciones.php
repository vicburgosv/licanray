<div align="center">
	<table>
		<tr>
			<td>
				NUMERO
			</td>
			<td>
				TIPO
			</td>
			<td WIDTH="600px">
				DESCRIPCION
			</td>
			<td>
				FECHA
			</td>
			<td>
				DOCENTE
			</td>
		</tr>	
<?php
	require('conexion.php');
	$tipo= $_POST['tipo'];
	$rut = $_POST['rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	$sql = "SELECT CONTADOR,TIPO,DESCRIPCION,FECHA,RUT_DOCENTE
			From anotacion
			Where RUT_ALUMNO='$rut'
			GROUP BY CONTADOR";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$numerocolumns=mysqli_num_fields($rs);
	for($i=0;$i<$numeroTuplas;$i++){
		$fila=mysqli_fetch_array($rs);
		echo "<tr>";
		for($j=0;$j<$numerocolumns;$j++){
			if($j==0){
				echo "<td align=\"center\">$fila[$j]</td>";
			}
			else{
				echo "<td>$fila[$j]</td>";
			}
		}
		echo "</tr>";
    }	
?>		

	</table>
</div>
