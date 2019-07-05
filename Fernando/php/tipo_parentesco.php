<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="../style2.css" rel="stylesheet">
	</head>
  <body>

    <!--formulario - Tablita-->
    <form action="agregar_ap_a_al.php" method="get">
  	<h2> Apoderado </h2>
		<select name="Tipo_apoderado">
	  <option value="Titular">Titular</option>
	  <option value="Suplentes">Suplente</option>
		</select>
    <input type="text" name="Parentesco" placeholder="Parentesco" />
    <br><br>
		<?php
		require('conexion.php');
		$Ruts = $_GET['Ruts'];
		echo "<input type=\"hidden\" name=\"Ruts\" value=\"$Ruts\" >";
		?>
    <input type="submit" value= "Enviar"/>
    </form>

  </body>
</html>
