<?php
	require('../../conexion.php');
	$rut = $_GET['rut'];
	$nombre = $_GET['nombre'];
	$apellido_p = $_GET['apellido_p'];
	$apellido_m = $_GET['apellido_m'];
	$fecha_na = $_GET['fecha_na'];
	$sexo = $_GET['sexo'];
	$n_calle = $_GET['n_calle'];
	$calle = $_GET['calle'];
	$comuna = $_GET['comuna'];
	$fono = $_GET['fono'];

	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Update alumno
			Set Nombre='$nombre', Apellido_paterno='$apellido_p', Apellido_materno='$apellido_m', Fecha_de_nacimiento='$fecha_na', Sexo='$sexo', N_de_calle='$n_calle', Calle='$calle', Comuna='$comuna', Telefono_emergencia='$fono'
			Where Rut_alumno='$rut'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
?>
<html lang="es">
	<head>
		<title>Colegio Licanray</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Colegio Licanray - Registro de Alumnos"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="style.php" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<p>Los datos del alumno se han actualizado correctamente</p> <a href="../../../menu.html">volver</a>
	</body>
</html>
