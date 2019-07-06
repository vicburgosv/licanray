<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		$nombre=$_SESSION['usuario'];
		//header('Location: menu.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Apoderadossss</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/index.js"></script>
	</head>
	<body>
		<header>
			<div class="volver" align="center"><a href="../index_start.html">Volver</a></div>
			<br>
			<h1 align="center">Apoderados</h1>
			<h2 align="center">Escuela Licanray</h1>
		</header>
		<main>
			<div align="center" >
				<form action="" id="formulario">
					<input type="text" name="rut" title="Ingrese su rut" placeholder="Rut" required>
					<br>
					<input type="text" name="pass" title="Ingrese su contraseña" placeholder="Contraseña" required>
					<br>
					<input type="submit" class="botonlog" value="enviar">
					<!-- <input type="submit" value="Ingresar"> -->
				</form>
			</div>
			<br>
			<div class="error">
				<span>Datos de ingreso no válidos. Intente nuevamente</span>
			</div>

		</main>
</html>
