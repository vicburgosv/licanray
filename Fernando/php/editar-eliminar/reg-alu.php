<?php
	require('../conexion.php');
	$Rut = $_GET['Rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "SELECT *
			From alumno
			Where Rut_alumno='$Rut'";
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
				<h2>Formulario de registro de alumnos</h2>
				<form method="get" action="accion/actualizar_alumno.php">
				<section id="contenedor_center">
						<div>

							<h3> Datos Personales </h3>
							<label>Rut:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"rut\" size=\"8px\" title=\"Ingrese su rut\" value=\"$fila[0]\" readonly>"?> <!--readonly hace que este campo no sea momdificable-->
							<br>
							<label>Nombres:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"nombre\" size=\"20px\" title=\"Ingrese ambos nombres del alumno\" value=\"$fila[1]\" required>" ?> <!--requiered hace que este campo deba ser completado-->
							<br>
							<label>Apellido Paterno:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"apellido_p\" size=\"20px\" title=\"Ingrese apellido paterno\" value=\"$fila[2]\" required>" ?>
							<br>
							<label>Apellido Materno:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"apellido_m\" size=\"20px\" title=\"Ingrese apellido materno\" value=\"$fila[3]\" required>" ?>
							<br>
							<label>Fecha de nacimiento:</label>
							<br>
							<?php echo"<input type=\"date\" name=\"fecha_na\" placeholder=\"dd/mm/aa\" value=\"$fila[4]\" required>" ?>
							<br>
							<label>Sexo:</label>
							<br>
							<?php
							if($fila[5]=="masculino" or $fila[5]=="Masculino" or $fila[5]=="hombre" or $fila[5]=="Hombre"){
								echo"<input id=\"o1\" type=\"radio\" name=\"sexo\" value=\"masculino\" checked>";
								echo"<label>Masculino</label>";
								echo"<input id=\"o2\" type=\"radio\" name=\"sexo\" value=\"femenino\">";
								echo"<label>Femenino</label>";

							}elseif($fila[5]=="femenino" or $fila[5]=="Femenino" or $fila[5]=="mujer" or $fila[5]=="Mujer"){
								echo"<input id=\"o1\" type=\"radio\" name=\"sexo\" value=\"masculino\">";
								echo"<label>Masculino</label>";
								echo"<input id=\"o2´\" type=\"radio\" name=\"sexo\" value=\"femenino\" checked>";
								echo"<label>Femenino</label>";
							}
							?>
						</div>
						<div class="hijo-c2">
							<h3>Dirección</h3>
							<label>Numero de calle:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"n_calle\" value=\"$fila[6]\" required>" ?>
							<br>
							<label>Calle:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"calle\" size=\"20px\" title=\"Nombre de la calle\" value=\"$fila[7]\" required>" ?>
							<br>
							<label>Comuna:</label>
							<br>
							<?php echo"<input type=\"text\" name=\"comuna\" size=\"20px\" value=\"$fila[8]\" required>" ?>
						</div>
						<div class="hijo-c2">
							<h3>Informacion de contacto</h3>
							<label>Teléfono</label>
							<br>
							<?php echo"<input type=\"text\" name=\"fono\" size=\"20px\" title=\"Ingrese un numero de contacto\" value=\"$fila[9]\" required>" ?>
							<br>


						</div>

				</section>
				<br>
				<br>
				<input type="submit" value="Guardar">
				</form>
			</div>
		</main>
	</body>
</html>
