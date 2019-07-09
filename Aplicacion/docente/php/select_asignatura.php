<?php
	$ano='2019';
	session_start();
	$niv=$_SESSION['nivel'];
	$sec=$_SESSION['seccion'];
	$ano=$_SESSION['ano'];
	require('conexion.php');
	$asi=$_POST['asi'];
	$_SESSION['asi']=$asi;
	$asi=strtoupper($asi);
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
	echo"<p align=\"center\">Notas del curso: $asi</p>";
?>
<form id="form_notas">
<?php
	if($numeroTuplas!=0){
		echo"
			<div align=\"center\">
				<table>
					<tr><td>N°</td><td>Rut</td><td>Nota 1</td><td>Nota 2</td><td>Nota 3</td><td>Nota 4</td><td>Nota 5</td><td>Nota 6</td><td>Nota 7</td><td>Nota 8</td><td>Nota 9</td><td>Nota 10</td>
					</tr>
		";
		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			$sql2 = "SELECT pertenece.RUT_ALUMNO, GROUP_CONCAT(nota order by n_evaluacion)
					From pertenece,evaluacion
					Where NIVEL='$niv' AND SECCION='$sec' AND pertenece.ANO=$ano and pertenece.RUT_ALUMNO='$fila[0]' AND EVALUACION.ANO=pertenece.ANO AND pertenece.RUT_ALUMNO=evaluacion.RUT_ALUMNO and evaluacion.ASIGNATURA='$asi'";
			$consulta_notas = mysqli_query($conexion,$sql2) or die(mysql_error());
			$cadena=mysqli_fetch_array($consulta_notas);
			$notas = explode(",", $cadena[1]);
			$cantidad_nota=count($notas);
			$cantidad_nota=$cantidad_nota+1;
			$j=$i+1;
			echo "<tr>";
			echo "<td align=\"center\">$j</td>";
			echo "<td align=\"center\">$fila[0]</td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota1\" name=\"1!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota2\" name=\"2!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota3\" name=\"3!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota4\" name=\"4!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota5\" name=\"5!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota6\" name=\"6!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota7\" name=\"7!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota8\" name=\"8!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota9\" name=\"9!$fila[0]\" value=\"\"> </td>";
			echo "<td align=\"center\"> <input size=\"1px\" id=\"$fila[0]\" class=\"nota10\" name=\"10!$fila[0]\" value=\"\"> </td>";
			echo "</tr>";
			for ($k=1;$k<$cantidad_nota;$k++){
				$l=$k-1;
				echo"<script>
							var clase = '.nota'+'$k';
							var iden  = '$fila[0]';
							var todo = '#'+iden+clase;
							$(todo).val('$notas[$l]');
					</script>";						
			}


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
</form>
<br>
<div align="center"> <button id="guardar">Guardar</button> </div>
<script>
	$('#guardar').on('click',function(){
		var data = $('#form_notas').serialize();
        $.ajax({
            type: "POST",
            url: "php/actualizar_notas.php",
            data: data,
            success: function(respuesta){
				console.log(respuesta)
				$('.mensaje').slideDown('slow');
				setTimeout(function(){
				$('.mensaje').slideUp('slow');
				},3000);
            }		
		});
	})
</script>
 
 
 
