<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="style2.css" rel="stylesheet">
	</head>
  <body>

		<!--formulario - Tablita-->
    <form action="php/alumnos_curso_anterior.php" method="get">
       <h1 align="center">Buscador:</h1>
       <h2> Curso </h2>

	 <div style="color: white">Año  <select name="Ano">
   <option><?php
     require('php/conexion.php');

       $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
       mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

			 $dateaux = "SELECT YEAR(CURRENT_TIMESTAMP)";
			 $date = mysqli_query($conexion,$dateaux) or die(mysql_error());
			 $date1 = mysqli_fetch_array($date);

       $sql = "SELECT DISTINCT Ano FROM curso WHERE Ano!='$date1[0]'";

       $rs = mysqli_query($conexion,$sql) or die(mysql_error());

       $numeroTuplas=mysqli_num_rows($rs);
       $numerocolumns=mysqli_num_fields($rs);

       for($i=0;$i<$numeroTuplas;$i++)
       {
          $fila=mysqli_fetch_array($rs);
          echo "<option value=\"$fila[0]\">$fila[0]</option>";
               }

   ?></option>
 </select>

	 Nivel  <select name="Nivel">
	 <option><?php
		 require('php/conexion.php');

			 $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
			 mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

			 $sql2 = "SELECT DISTINCT Nivel FROM curso ORDER BY Nivel";

			 $rs2 = mysqli_query($conexion,$sql2) or die(mysql_error());

			 $numeroTuplas2=mysqli_num_rows($rs2);
			 $numerocolumns2=mysqli_num_fields($rs2);

			 for($i=0;$i<$numeroTuplas2;$i++)
			 {
					$fila2=mysqli_fetch_array($rs2);
					echo "<option value=\"$fila2[0]\">$fila2[0]</option>";
							 }

	 ?></option>
 </select>

	 Seccion  <select name="Seccion">
	 <option><?php
		 require('php/conexion.php');

			 $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
			 mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

			 $sql3 = "SELECT DISTINCT Seccion FROM curso ORDER BY Seccion";

			 $rs3 = mysqli_query($conexion,$sql3) or die(mysql_error());

			 $numeroTuplas3=mysqli_num_rows($rs3);
			 $numerocolumns3=mysqli_num_fields($rs3);

			 for($i=0;$i<$numeroTuplas3;$i++)
			 {
					$fila3=mysqli_fetch_array($rs3);
					echo "<option value=\"$fila3[0]\">$fila3[0]</option>";
							 }

	 ?></option>
	 </select>
       <input type="submit" value= "Enviar"/>
    </form></div>

  </body>
</html>
