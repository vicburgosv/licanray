<?php
	$ano='2019';
	session_start();
	$fecha=$_POST['fecha'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$rut_al=$_POST['rut_al'];
	
	$sql = "SELECT RUT_ALUMNO, fecha
			FROM inasistencia
			where RUT_ALUMNO='$rut_al' AND fecha='$fecha'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	
	if($numeroTuplas==0){
		$sql = "INSERT INTO inasistencia
				VALUES('$rut_al','$fecha')";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	};
?>