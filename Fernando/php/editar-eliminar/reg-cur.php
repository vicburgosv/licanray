<?php
	require('../conexion.php');
	$Id = $_GET['Id'];
	$part = explode(" ", $Id);
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "SELECT Rut_docente
			From curso
			Where Ano='$part[0]' AND Nivel='$part[1]' AND Seccion='$part[2]'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numerocolumns=mysqli_num_fields($rs);
	$fila=mysqli_fetch_array($rs);
?>


<html lang="es">
	<head>
		<title>Colegio Licanray</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Título de la WEB"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="style.php" rel="stylesheet" type="text/css"/>
		<script src="jquery-3.4.1.min.js"></script>
		<script src="index.js"></script>
	</head>
	<body>
		<main id="contenedor_left">
			<div>
				<img class="logo" src="licanray.png">
				<h3 align="center" >División </h3>
				<h3 align="center" >Administrativos </h3>
			</div>
			<div>
				<h1>Colegio Licanray</h1><br>
				<h2>Formulario de registro de docentes</h2>
				<form method="get" action="accion/actualizar_curso.php">
				<section id="contenedor_left">
						<div>

							<h3> Datos </h3>
							<?php echo"<input type=\"hidden\" name=\"Id\" id=\"curso\" value=\"$Id\">"?>
							<label>Año:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"Ano\" id=\"ano\" size=\"8px\" title=\"Ingrese año\" value=\"$part[0]\" readonly>"?> <!--readonly hace que este campo no sea momdificable-->
							<br>
							<label>Nivel:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"Nivel\" id=\"nivel\" size=\"20px\" title=\"Ingrese nivel\" value=\"$part[1]\" required>" ?> <!--requiered hace que este campo deba ser completado-->
							<br>
							<label>Seccion:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"Seccion\" id=\"seccion\" size=\"20px\" title=\"Ingrese seccion\" value=\"$part[2]\" required>" ?>
							<br>
							<label>Nombre docente:</label>
							<br>
							<select name="Rut_docente">
							<option><?php
					      require('../conexion.php');

					        $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
					        mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

					        $sql = "SELECT RUT_DOCENTE, NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO FROM docente
													WHERE RUT_DOCENTE!='$fila[0]'";
									$sql2 = "SELECT RUT_DOCENTE, NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO FROM docente
													WHERE RUT_DOCENTE='$fila[0]'";

					        $rs = mysqli_query($conexion,$sql) or die(mysql_error());
									$rs2 = mysqli_query($conexion,$sql2) or die(mysql_error());

									$fila3=mysqli_fetch_array($rs2);

					        $numeroTuplas=mysqli_num_rows($rs);
					        $numerocolumns=mysqli_num_fields($rs);

					        for($i=0;$i<$numeroTuplas;$i++)
					        {
					           $fila2=mysqli_fetch_array($rs);
					           echo "<option value=\"$fila2[0]\">$fila2[1] $fila2[2] $fila2[3]</option>";
					                }
									echo "<option value=\"$fila3[0]\" selected>$fila3[1] $fila3[2] $fila3[3] </option>"

					    ?></option>
							</select>
							<br>

						</div>

				</section>
				<br>
				<input type="submit" value="Actualizar curso">
				</form>
				<form method="get" action="confirmacion_eliminar_curso.php">
				<?php echo "<input type=\"hidden\" name=\"Id\" value=\"$part[0] $part[1] $part[2]\" >"?>
				<td><input type="submit" value="Eliminar curso"></td>
				</form>
				<form method="get" action="../../agregar_alumno_al_curso.php">
				<?php echo "<input type=\"hidden\" name=\"Id\" value=\"$part[0] $part[1] $part[2]\" >"?>
				<td><input type="submit" value="Agregar alumno"></td>
				</form>
				<button class='boton'>Alumnos</button>
				<div style="margin-left: 50px; margin-top: 20px;" id="result">
				</div>
			</div>
		</main>
	</body>
</html>
