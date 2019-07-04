<?php
	session_start();
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
	//echo "$vec[$k]";	
	
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
			<h1 align="center">Apoderados</h1>
			<h2 align="center">Escuela Licanray</h2>   
			<h3 id="nombre" align="center">Apoderado:<?php echo"$rut";?></h3>   
		</header>    
		<main>
			<div align="center" >
				<div id="botones">
					<?php
					for($i=0;$i<$numeroTuplas;$i++){
						$sql = "SELECT Nombre,Apellido_paterno
								FROM alumno
								WHERE Rut_alumno='$vec[$i]'";
						$con = mysqli_query($conexion,$sql);
						$fila=mysqli_fetch_array($con);
						$j=$i+1;
					echo "<div class=\"boton_grey\"> <label>$vec[$i]</label></div> ";
					}
					?>
				</div>

			</div>
			<div>
				<div class="volver" align="center"><a href="php/logout.php">Salir</a></div> 
			
				<form action="alumno.php" method="get" id="myForm">
					<input id="rut_enviar" type="hidden" name="rut" value="">
			
				</form>
			</div>
		</main>
</html>