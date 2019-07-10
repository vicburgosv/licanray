<?php
	session_start();
	$ano="2019";
	$nivel=$_GET['nivel'];
	$_SESSION['nivel']=$nivel;
	$seccion=$_GET['seccion'];
	$_SESSION['seccion']=$seccion;
	$ano=$_GET['ano'];
	$_SESSION['ano']=$ano;
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
	
	
	/*$sql = "SELECT alumno.RUT_ALUMNO, NOMBRE, APELLIDO_PATERNO, NIVEL, SECCION
			FROM curso
			WHERE  alumno.RUT_ALUMNO=pertenece.RUT_ALUMNO and alumno.RUT_ALUMNO='$rut_alumno' and ANO='$ano'";
			
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroColumna=mysqli_num_fields($rs);
	$fila=mysqli_fetch_array($rs);	*/
?>
<!DOCTYPE html>
<html lang="es">  
	<head>    
		<title>Info-registro: Docentes</title>    
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">    
		<link href="css/style.css" rel="stylesheet">    
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/funcion.js"></script>
		<script src="js/asignatura.js"></script>
	</head>  
	<body>    
		<header>
			<div class="volver" align="center"><a href="menu.php">Volver</a></div> 
			<div class="salir" align="center"><a href="php/logout.php">Salir</a></div> 
			<h1 align="center">Sistema de Info-registro</h1>
			<h1 align="center">Escuela Licanray</h1>
			<h2 align="center">Docentes</h2>     
			<h2 align="center">Prof. <?php echo"$nom $apellido" ?></h2>  
		</header>    
		<main>
			<div id="contenedor" >
				<div class="cuerpo_left" align="center">
					<div>
						 <label>Curso:</label>
						<br>
						<br>
						<label><?php echo "$nivel - $seccion"?><?php echo " año $ano"?></label>
						<span class="oculto">
							<p class="nivel"><?php echo"$nivel"?></p>
							<p class="seccion"><?php echo"$seccion"?></p>
							<p class="ano"><?php echo"$ano"?></p>
						</span>
					</div>
					<br>
					<div id="botones">
						<div class="boton_grey">
							<label>Evaluaciones</label>
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
					<div class="mensaje">
						<span>La base de datos se han actualizado correctamente</span>
					</div>
				</div>
			</div>
		</main>
</html>