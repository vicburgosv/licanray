<?php
	require('../conexion.php');
	$Id = $_GET['Id'];
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
		<p>Estás seguro que deseas eliminar el registro del curso: <?php echo"$Id"?> ?</p>
		<br>
		<?php 	echo"<form method=\"get\" action=\"accion/eliminar_curso.php\">";
				echo"<input type=\"hidden\" name=\"Id\" value=\"$Id\" >";
				echo"<td><input type=\"submit\" value=\"Sí, Eliminar\"></td>";
				echo"</form> ";
				echo"<form method=\"get\" action=\"../../menu_curso.php\">";
				echo"<td><input type=\"submit\" value=\"NO\"></td>";
				echo"</form> ";
		?>
	</body>
</html>
