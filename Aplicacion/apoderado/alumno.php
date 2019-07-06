<?php
	session_start();
	$ano="2019";
	$rut_alumno=$_GET['rut_alumno'];
	$nom=$_SESSION['nomb'];
	$apellido=$_SESSION['apellido'];
	if(isset($_SESSION['usuario'])){
		$rut=$_SESSION['usuario'];
		//header('Location: iniciar.php');
	}
	else{
		//header('Location: iniciar.php');
	}
	require('php/conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");


	$sql = "SELECT alumno.RUT_ALUMNO, NOMBRE, APELLIDO_PATERNO, NIVEL, SECCION
			FROM alumno,pertenece
			WHERE  alumno.RUT_ALUMNO=pertenece.RUT_ALUMNO and alumno.RUT_ALUMNO='$rut_alumno' and ANO='$ano'";

	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroColumna=mysqli_num_fields($rs);
	$fila=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/funcion.js"></script>
	</head>
	<body>
		<header>
			<div class="volver" align="center"><a href="menu.php">Volver</a></div>
			<br>
			<h1 align="center">Sistema de Info-registro</h1>
			<h2 align="center">Apoderados</h2>
			<h2 align="center"><?php echo"$nom $apellido" ?></h2>
		</header>
		<main>
			<div id="contenedor" >
				<div class="cuerpo_left" align="center">
					<div>
						 <label>Rut:</label> <label id="rut"><?php echo "$fila[0]" ?></label>
						<br>
						<br>
						<label><?php echo "$fila[1] $fila[2] " ?> </label>
						<br>
						<label><?php echo "$fila[3]" ?>° basico</label>
					</div>
					<br>
					<div id="botones">
						<div class="boton_grey">
							<label>Notas</label>
						</div>
						<div class="boton_grey">
							<label>Anotaciones</label>
						</div>
						<div class="boton_grey">
							<label>Inasistencias</label>
						</div>
					</div>
				</div>
				<div class="cuerpo_right">
					<div id="result">


					</div>
				</div>
			</div>
		</main>
</html>
