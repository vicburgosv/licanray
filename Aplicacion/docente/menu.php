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
		//header('Location: iniciar.php');
	}
	require('php/conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	
	$sql = "SELECT NIVEL, SECCION, ANO
			FROM curso
			WHERE RUT_DOCENTE='$rut' and ANO=$ano";
			
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
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
		<script src="js/botones.js"></script>		
	</head>  
	<body>    
		<header>
			<div class="volver" align="center" style="visibility: hidden"><a href="iniciar.php">Volver</a></div> 
			<div class="salir" align="center"><a href="php/logout.php">Salir</a></div> 
			<h1 align="center">Sistema de Info-registro</h1>
			<h1 align="center">Escuela Licanray</h1>
			<h2 align="center">Docente</h2>   
			<h2 id="nombre" align="center">Prof. <?php echo" $nom $apellido";?></h2>
			<hr/>			
		</header>    
		<main>
			<div align="center" >
			<h3>Cursos <?php echo"$ano"?></h3>
				
					<div id="botones">
					<section id="contenedor_cursos">
						<?php
						if($numeroTuplas==0){
							echo "No se ha ingresado un curso";
						}
						else{
							for($i=0;$i<$numeroTuplas;$i++){
								$fila=mysqli_fetch_array($rs);
								$j=$i+1;
								$fila[1]=strtoupper($fila[1]);
							echo "<div class=\"boton_grey\"> <label>$fila[0]° $fila[1]</label><span class=\"oculto\"><p class=\"nivel\">$fila[0]</p><p class=\"seccion\">$fila[1]</p><p class=\"ano\">$fila[2]</p></span></div>";
							}
						}
						?>
					</div>
				</section>	
			</div>
			<div>
				<form action="curso.php" method="get" id="myForm">
					<input id="nivel" type="hidden" name="nivel" value="">
					<input id="seccion" type="hidden" name="seccion" value="">
					<input id="ano" type="hidden" name="ano" value="">
				</form>
			</div>
		</main>
</html>