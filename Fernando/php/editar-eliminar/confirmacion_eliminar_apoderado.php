<?php
	require('../conexion.php');
	$rut = $_GET['Rut'];
?>


<html lang="es">
	<head>
		<title>Colegio Licanray</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Título de la WEB"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="style.php" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<p>Estás seguro que deseas eliminar el registro del apoderado de rut: <?php echo"$rut"?> ?</p>
		<br>
		<?php 	echo"<form method=\"get\" action=\"accion/eliminar_apoderado.php\">";
				echo"<input type=\"hidden\" name=\"rut\" value=\"$rut\" >";
				echo"<td><input type=\"submit\" value=\"Sí, Eliminar\"></td>";
				echo"</form> ";
				echo"<form method=\"get\" action=\"../../menu_apoderado.html\">";
				echo"<td><input type=\"submit\" value=\"NO\"></td>";
				echo"</form> ";
		?>
	</body>
</html>
