<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="style2.css" rel="stylesheet">
		<script src="jquery-3.4.1.min.js"></script>
		<script src="index3.js"></script>
	</head>
	<body>
		<header>
			 <div class="volver" align="center"><a href="menu.html" style='color:blue'>Volver</a></div>
			 <br>
			 <h1 align="center">Sistema de Info-registro</h1>
			<h2 align="center">Apoderados</h1>
		</header>
		<main>
			<div id="contenedor" >
				<div class="cuerpo_center" align="center">
					<br>
					<div align='center'>Asigne el apoderado para el alumno<?php
					require('php/conexion.php');
					$Rut = $_GET['Rut'];
					$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
			    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
			    if (!$conexion) {
			      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			      exit;}
					$sqlaux = "SELECT Nombre,Apellido_Paterno,Apellido_Materno
										 From Alumno
										 WHERE Rut_alumno = '$Rut'";
					$rsaux = mysqli_query($conexion,$sqlaux) or die(mysqli_error());
					$Nom = mysqli_fetch_array($rsaux);

					echo " $Nom[0] $Nom[1] $Nom[2]";
					?></div>
					<form action="Registrar_apoderado_a_alumno.php">
					<?php echo "<input type=\"hidden\" name=\"Rut\" value=\"$Rut\">" ?>
					<input type="submit" style="
					font-size : 20px;
					margin-top: 20px;
					margin-bottom: 10px;
					background: #D8D8D8;
					text-align: center;
					width: 400px;
					height: 50px;
					border-radius:8px;" value="Registrar apoderado">
					</form>
					<div id="botones">
						<div>
							<label>Busqueda apoderado</label>
							<form accept-charset="utf-8" method="POST">
							<input type="text" name="busqueda" id="busqueda" value="" placeholder="Ingrese nombre del apoderado" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
							</form>
					  <div id="resultadoBusqueda"></div>
						<?php
							require('php/conexion.php');
								$Rut = $_GET['Rut'];
								?>
								<div style = "display: none;" class="id_alumno"><?php echo "$Rut" ?></div>
				 	  </div>
				 	  </div>
					</div>
				</div>

			</div>
		</main>
</html>
