<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="style2.css" rel="stylesheet">
		<script src="jquery-3.4.1.min.js"></script>
		<script src="index2.js"></script>
	</head>
	<body>
		<main>
			<div id="contenedor" >
					<br>
						<div>
							<label>Busque alumno que desea agregar</label>
							<form accept-charset="utf-8" method="POST">
							<input type="text" name="busqueda" id="busqueda" value="" placeholder="Ingrese nombre del alumno" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
							</form>
					  <div id="resultadoBusqueda"></div>
						<?php
							require('php/conexion.php');
								$Id = $_GET['Id'];
								?>
								<div style = "display: none;" class="id_curso"><?php echo "$Id" ?></div>
				 	  </div>
				</div>

			</div>
		</main>
</html>
