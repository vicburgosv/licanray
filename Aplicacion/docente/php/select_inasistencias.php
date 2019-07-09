<?php
	$ano='2019';
	require('conexion.php');
	$rut = $_POST['rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	$sql = "SELECT FECHA
			From inasistencia
			Where RUT_ALUMNO='$rut' and YEAR(FECHA)='$ano'
			ORDER BY FECHA";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$numerocolumns=mysqli_num_fields($rs);
	
	if($numeroTuplas!=0){
		echo"
			<div align=\"left\">
				<table>
					<tr>
						<td>
							NUMERO
						</td>
						<td>
							FECHA
						</td>
					</tr>			
		";
		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			$j=$i+1;
			echo "<tr>";
			echo "<td align=\"center\">$j</td>";
			echo "<td align=\"center\">$fila[0]</td>";
			echo "</tr>";		
		}
		echo"
			</table>
			<p>Recuerde justificar las inasistencia de su pupilo.</p>
		</div>		
		";
	}
	else{
		echo"No se registrar inasistecias para su pupilo";
	}
?>		
 
