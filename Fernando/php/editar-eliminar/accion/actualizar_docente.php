<?php
	require('../../conexion.php');
	$rut = $_GET['rut'];
	$nombre = $_GET['nombre'];
	$apellido_p = $_GET['apellido_p'];
	$apellido_m = $_GET['apellido_m'];
	$sexo = $_GET['sexo'];
  $correo = $_GET['correo'];
	$fono = $_GET['fono'];

	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Update docente
			Set Nombre='$nombre', Apellido_paterno='$apellido_p', Apellido_materno='$apellido_m', Sexo='$sexo', Correo='$correo', Telefono='$fono'
			Where Rut_docente='$rut'";
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
		<p>Los datos del docente se han actualizado correctamente</p> <a href="../../../menu_docente.html">volver</a>
	</body>
</html>
