<html>
  <head>
    <title>Alumnos del curso</title>
    <meta charset="utf-8">
  </head>
    <body>
      <header>
        <h2 align="center">Alumnos</h1>
      </header>
      <table border=1 align="center" bgcolor="#FFFFFF">
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

    $Id = $_GET['Id'];
    $part = explode(" ", $Id);

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "SELECT alumno.Rut_alumno,Nombre,Apellido_paterno,Apellido_materno
            From alumno,pertenece
            WHERE alumno.Rut_alumno = pertenece.Rut_alumno AND pertenece.ano='$part[0]' AND pertenece.nivel='$part[1]' AND pertenece.seccion='$part[2]'";

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
				echo"<td><form method=\"get\" action=\"../quitar_alumno_del_curso.php\">";
				echo"<input type=\"hidden\" name=\"Id\" value=\"$fila[0] $part[0] $part[1] $part[2]\" >";
				echo"<input type=\"submit\" value=\"Eliminar del curso\">";
				echo"</form></td>";
				echo"</tr>";
            }
        echo "</table>";
        //echo"<form method=\"get\" action=\"../agregar_alumno_al_curso.php\">";
        //echo"<input type=\"hidden\" name=\"Id\" value=\"$part[0] $part[1] $part[2]\" >";
        //echo"<td><input type=\"submit\" value=\"Agregar alumno\"></td>";
        //echo"</form>";
?>
	</head>
</html>
