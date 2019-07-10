<?php
	$ano='2019';
	session_start();
	$contador=$_POST['contador'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$rut_docente=$_SESSION['usuario'];
	$rut_al=$_POST['rut_al'];
	$sql = "DELETE
			FROM anotacion
			WHERE RUT_ALUMNO='$rut_al' AND ANO=$ano AND CONTADOR='$contador'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
?>