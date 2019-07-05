<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="style2.css" rel="stylesheet">
		<script src="jquery-3.4.1.min.js"></script>
		<script src="index.js"></script>
	</head>
	<body>
		<header>
			 <div class="volver" align="center"><a href="index.html">Volver</a></div> <h1 align="center">Sistema de Info-registro</h1>
			<h2 align="center">Cursos</h1>
		</header>
		<main>
			<div id="contenedor" >
				<div class="cuerpo_center" align="center">
					<br>
					<div id="botones">
						<div class="boton_grey">
							<label><a href="Ingresar_Curso.php">Registrar curso</a></label>
						</div>
						<?php
						require('php/conexion.php');

						$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
						mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

						$dateaux = "SELECT YEAR(CURRENT_TIMESTAMP)";
						$date = mysqli_query($conexion,$dateaux) or die(mysql_error());
						$date1 = mysqli_fetch_array($date);
						echo "<label>Cursos del año $date1[0]</label>";
						 ?>
						<section id="contenedor2">
							<?php
							$sql = "SELECT *
											FROM curso
											WHERE ANO='$date1[0]'";

							$rs = mysqli_query($conexion,$sql) or die(mysql_error());
							$numeroTuplas=mysqli_num_rows($rs);

							for($i=0;$i<$numeroTuplas;$i++)
			        {
			           $fila=mysqli_fetch_array($rs);
								 echo "<div>";
								 echo "<form method=\"get\" action=\"php/editar-eliminar/reg-cur.php\">";
								 echo "<input type=\"hidden\" name=\"Id\" value=\"$fila[0] $fila[1] $fila[2]\" >";
								 echo "<input type=\"submit\" style=\"
								  font-size : 40px;
									margin-top: 20px;
								 	margin-bottom: 10px;
								 	background: #D8D8D8;
								 	text-align: center;
								 	width: 400px;
								 	height: 100px;
								 	border-radius:8px;\" value=\"$fila[1]\">";
								 echo "</form>";
	 							 echo "</div>";
			                }
							?>

						</section>
					</div>
					<div class="boton_grey">
						<label style="font-size:22px"><a href="Consulta_Curso.php">Datos cursos de años anteriores</a></label>
					</div>
				</div>

			</div>
		</main>
</html>
