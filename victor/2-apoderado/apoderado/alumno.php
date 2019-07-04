<?php
	session_start();
	$alumno=$_GET['rut'];
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
	
	
	$sql = "SELECT RUT_ALUMNO
			FROM depende
			WHERE RUT_APODERADO='$rut'";
			
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	$vec=array();
		
	for($i=0;$i<$numeroTuplas;$i++){
		$fila=mysqli_fetch_array($rs);
		$vec[]=$fila[0];
		
	}
	$k=0;
	
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
			 <div class="volver" align="center"><a href="menu.php">Volver</a></div> <h1 align="center">Sistema de Info-registro</h1>
			<h2 align="center">Apoderados</h1>       
		</header>    
		<main>
			<div id="contenedor" >
				<div class="cuerpo_left" align="center">
					<div>
						 Rut: <label id="rut"><?php echo "$alumno" ?></label>
						<br>
						<label>Maria Villanueva</label>
						<br>
						<label>3° basico</label>
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
							<label>Inasistencia</label>
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