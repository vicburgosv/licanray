<?php
	session_start();
	$ano='2019';
	if(isset($_SESSION['usuario'])){
		$rut=$_SESSION['usuario'];
		$nom=$_SESSION['nomb'];
		$apellido=$_SESSION['apellido'];
		//header('Location: iniciar.php');
	}
	else{
		header('Location: iniciar.php');
	}
	require('php/conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	
	$sql = "SELECT alumno.Rut_alumno, alumno.Nombre, alumno.Apellido_paterno
			FROM depende, alumno, pertenece
			WHERE RUT_APODERADO='$rut' and alumno.Rut_alumno=depende.RUT_ALUMNO and alumno.RUT_ALUMNO=pertenece.RUT_ALUMNO and pertenece.ANO=$ano";
			
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
?>

<!DOCTYPE html>
<html lang="es">  
	<head>    
		<title>Info-registro: Apoderados</title>    
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">    
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/botones.js"></script>		
	</head>  
	<body>    
		<header>
			<div class="volver" align="center" style="visibility: hidden"><a href="iniciar.php">Volver</a></div> 
			<div class="salir" align="center"><a href="php/logout.php">Salir</a></div> 
			<h1 align="center">Sistema de Info-registro</h1>
			<h1 align="center">Escuela Licanray</h1>
			<h2 align="center">Apoderados</h2>   
			<h3 id="nombre" align="center"><?php echo" $nom $apellido";?></h3>
			<hr/>			
		</header>    
		<main>
			<div align="center" >
			<h3>Alumnos</h3>
				<div id="botones">
					<?php
					if($numeroTuplas==0){
						echo "No hay alumnos para consultar";
					}
					else{
						for($i=0;$i<$numeroTuplas;$i++){
							$fila=mysqli_fetch_array($rs);
							$j=$i+1;
						echo "<div class=\"boton_grey\"> <label>$fila[1] $fila[2]</label><span class=\"oculto\">$fila[0]</span></div>";
						}
					}
					?>
				</div>
			</div>
			<div>
				<form action="alumno.php" method="get" id="myForm">
					<input id="rut_enviar" type="hidden" name="rut_alumno" value="">
				</form>
			</div>
		</main>
</html>