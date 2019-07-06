<html>
  <head>
    <title>Alumnos del curso</title>
    <meta charset="utf-8">
  </head>
    <body>
      <header>
        <?php
        require('conexion.php');
          $Ano = $_GET['Ano'];
          $Nivel = $_GET['Nivel'];
          $Seccion = $_GET['Seccion'];
          echo "<h1 align=\"center\">Curso $Ano $Nivel";
          echo "° $Seccion</h1>";
          $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
          mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
          $sql = "SELECT NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO
              From curso, docente
              Where curso.RUT_DOCENTE = docente.RUT_DOCENTE AND Ano Like '%$Ano%' AND Nivel Like '%$Nivel%' AND Seccion Like '%$Seccion'";
          $rs = mysqli_query($conexion,$sql) or die(mysql_error());
          $numerocolumns=mysqli_num_fields($rs);
          $fila=mysqli_fetch_array($rs);
          echo "<h2 align=\"center\">Profesor Jefe $fila[0] $fila[1] $fila[2]</h2>"?>
        <h3 align="center">Alumnos</h3>
      </header>
      <table border=1 align="center">
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
    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "SELECT alumno.Rut_alumno,Nombre,Apellido_paterno,Apellido_materno
            From alumno,pertenece
            WHERE alumno.Rut_alumno = pertenece.Rut_alumno AND pertenece.ano='$Ano' AND pertenece.nivel='$Nivel' AND pertenece.seccion='$Seccion'";

		$rs = mysqli_query($conexion,$sql) or die(mysql_error());

    $numeroTuplas=mysqli_num_rows($rs);
    $numerocolumns=mysqli_num_fields($rs);

    for($i=0;$i<$numeroTuplas;$i++)
    {
       $fila=mysqli_fetch_array($rs);
       echo"<tr>";
       for($j=0;$j<$numerocolumns;$j++)
        {
       echo "<td>$fila[$j]</td>";
        }
				echo"</tr>";
            }
        echo "</table>";
?>
<p><a href="../Consulta_curso.php">Volver</p>
	</head>
</html>
