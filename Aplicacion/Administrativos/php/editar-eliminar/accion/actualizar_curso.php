<?php
	require('../../conexion.php');
	$Ano = $_GET['Ano'];
	$Nivel = $_GET['Nivel'];
	$Seccion = $_GET['Seccion'];
	$Rut_docente = $_GET['Rut_docente'];
	$Id = $_GET['Id'];
	$part = explode(" ", $Id);
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Update curso
			Set Ano='$Ano', Nivel='$Nivel', Seccion='$Seccion', Rut_docente='$Rut_docente'
			Where Ano='$part[0]' AND Nivel='$part[1]' AND Seccion='$part[2]'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
?>
<html lang="es">
	<head>
		<title>Colegio Licanray</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Colegio Licanray - Registro de Cursos"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="style.php" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<p>Los datos del curso se han actualizado correctamente</p> <a href="../../../menu_curso.php">volver</a>
	</body>
</html>
