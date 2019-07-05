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
    <form action="php/insert_curso.php" method="get">
       <h1 align="center">Ingresar:</h1>
       <h2> Curso </h2>
       <input type="text"  name="Ano" placeholder="Año" />
       <input type="text" name="Nivel" placeholder="Nivel" />
			 <input type="text" name="Seccion" placeholder="Seccion" />
       <br><br>
       <select name="Rut_docente">

   <option><?php
     require('php/conexion.php');

       $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
       mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

       $sql = "SELECT RUT_DOCENTE, NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO FROM docente";

       $rs = mysqli_query($conexion,$sql) or die(mysql_error());

       $numeroTuplas=mysqli_num_rows($rs);
       $numerocolumns=mysqli_num_fields($rs);

       for($i=0;$i<$numeroTuplas;$i++)
       {
          $fila=mysqli_fetch_array($rs);
          echo "<option value=\"$fila[0]\">$fila[1] $fila[2] $fila[3]</option>";
               }

   ?></option>

   </select>
       <input type="submit" value= "Enviar"/>
    </form>

  </body>
</html>
