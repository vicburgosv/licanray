<?php
	$ano='2019';
	require('conexion.php');
	$rut = $_POST['rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	$sql = "SELECT CONTADOR,TIPO,DESCRIPCION,ANO,Nombre,Apellido_paterno
			From anotacion,docente
			Where RUT_ALUMNO='$rut' and ANO='$ano' AND anotacion.RUT_DOCENTE=docente.RUT_DOCENTE
			GROUP BY CONTADOR";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$numerocolumns=mysqli_num_fields($rs);
	if($numeroTuplas!=0){
		echo "<div>
				<table>
					<tr>
						<td>
							NUMERO
						</td>
						<td>
							TIPO
						</td>
						<td WIDTH=\"600px\">
							DESCRIPCION
						</td>
						<td>
							AÑO
						</td>
						<td>
							DOCENTE
						</td>
					</tr>	
		";
		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			for($j=0;$j<$numerocolumns-1;$j++){
				if($j==0){
					echo "<td align=\"center\">$fila[$j]</td>";
				}
				elseif($j==$numerocolumns-2){
					$k=$j+1;
					echo "<td align=\"center\">$fila[$j] $fila[$k]</td>";
				}
				else{
				echo "<td>$fila[$j]</td>";
				}
			}
		echo "</tr>";
		}
		echo "</table>";
		echo "</div>";
	}
	else{
		echo "No se registran anotaciones para su pupilo";
	}
	
?>		