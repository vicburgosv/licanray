<?php
	$ano='2019';
	session_start();
	$cuerpo=$_POST['cuerpo'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$rut_docente=$_SESSION['usuario'];
	$rut_al=$_POST['rut_al'];
	$tipo=$_POST['tipo'];
	echo"$rut_docente";
	echo"$tipo";
	
	$sql = "SELECT CONTADOR, RUT_ALUMNO, ANO
			FROM anotacion
			where RUT_ALUMNO='$rut_al' AND ANO=$ano ";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	
	$numero=$numeroTuplas+1;
	echo"$numeroTuplas";
	$sql = "INSERT INTO anotacion
			VALUES('$numero','$rut_al','$tipo','$cuerpo',$ano,'$rut_docente')";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	
?>