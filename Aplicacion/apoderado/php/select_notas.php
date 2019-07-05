<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Promedio</title>
    <meta charset="utf-8">
    <link href="../../style2.css" rel="stylesheet">
  </head>

  <header>
			<h1 align="center">Registro de notas</h1>
	</header>

  <body>
  <div class="cuerpo_center" align="center"><!--Aquí comienza la tabla con las notas-->


<?php

  $Promediosfinales = array();

  require('conexion.php');

  if(!empty($_POST['rut']))
  {
    $Rut = $_POST['rut'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
    if (!$conexion) {
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      exit;}

    $sql = "SELECT Max(N_evaluacion) From Evaluacion WHERE RUT_ALUMNO='$Rut'";
    $rs = mysqli_query($conexion,$sql) or die(mysql_error());
    $N = mysqli_fetch_array($rs);
    $N_evaluaciones = $N[0];


    $sql = "SELECT alumno.Rut_alumno, alumno.Nombre,alumno.Apellido_paterno,alumno.Apellido_materno,evaluacion.Asignatura,evaluacion.nota
           From evaluacion,alumno,pertenece
           Where evaluacion.ANO='2018' AND alumno.Rut_alumno=Evaluacion.Rut_alumno AND pertenece.RUT_ALUMNO = alumno.RUT_ALUMNO AND pertenece.ANO = '2019' AND alumno.Rut_alumno = '$Rut' AND N_evaluacion=1" ;
    $rs = mysqli_query($conexion,$sql) or die(mysql_error());
    $numeroTuplas=mysqli_num_rows($rs);
    $numerocolumns=mysqli_num_fields($rs);

    $sql2 = "SELECT alumno.Nombre,alumno.Apellido_paterno,alumno.Apellido_materno,pertenece.NIVEL,pertenece.ANO
           From alumno,pertenece
           Where  alumno.Rut_alumno = '$Rut' AND pertenece.Rut_alumno = alumno.Rut_alumno";
    $rs2 = mysqli_query($conexion,$sql2) or die(mysql_error());
    $Nombre=mysqli_fetch_array($rs2);


		if($numeroTuplas>0)
		{
		echo '<div align = center>';
    echo '<table border=1 align="center">';
    echo '</div>';
    echo '<p>';
    echo"<tr>";
      echo  "<th>Asignatura</th>";
      echo "<th colspan='$N_evaluaciones'>Notas</th>";
      echo "<th>Promedio</th>";
    echo "</tr>";

    for($i=0;$i<$numeroTuplas;$i++)
    {
       $fila=mysqli_fetch_array($rs);
       echo"<tr>";
       for($j=4;$j<$numerocolumns;$j++)
        {
       echo "<td>$fila[$j]</td>";
        }
        for($j=2;$j<=$N_evaluaciones;$j++)
        {
          $sql = "SELECT evaluacion.nota
                  From evaluacion,pertenece
                  Where  evaluacion.Rut_alumno = '$Rut' AND evaluacion.N_evaluacion = $j AND evaluacion.Asignatura = '$fila[Asignatura]' AND evaluacion.Rut_alumno = pertenece.RUT_ALUMNO AND pertenece.ANO = '2019' AND evaluacion.ANO = '2018'";
          $rs2 = mysqli_query($conexion,$sql) or die(mysql_error());
          $notaadicional = mysqli_fetch_array($rs2);
          echo "<td>$notaadicional[0]</td>";
        }
        $sql5 = "SELECT round(AVG(evaluacion.nota),2)
                From evaluacion,pertenece
                Where evaluacion.Rut_alumno = '$Rut' AND evaluacion.Asignatura = '$fila[Asignatura]' AND evaluacion.Rut_alumno = pertenece.RUT_ALUMNO AND pertenece.ANO = '2019' AND evaluacion.ANO = '2018'";
        $rs5 = mysqli_query($conexion,$sql5) or die(mysql_error());
        $promedio = mysqli_fetch_array($rs5);
        echo "<td>$promedio[0]</td>";
        echo"</tr>";
        $Promediosfinales[] = $promedio[0];
            }
      echo "<tr>";
			$largo_nose = $N_evaluaciones+1;
      echo "<th colspan='$largo_nose'>Promedio</th>";
      $promediototal = round(array_sum($Promediosfinales)/count($Promediosfinales),2);
      echo "<td colspan = '1'>$promediototal</td>";
      echo "</tr>";
		}
		else
		{
			echo 'No hay notas disponibles';
		}

    }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
</table>
</div>


</body>
</html>
