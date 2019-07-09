<?php
	require('conexion.php');
	session_start();
	sleep(1);
	$rut = $_POST['rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	$sql = "SELECT RUT_DOCENTE, NOMBRE, Apellido_paterno
			From docente
			Where RUT_DOCENTE='$rut'";
			
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numeroTuplas=mysqli_num_rows($rs);
	if($numeroTuplas==1){
		$fila=mysqli_fetch_array($rs);
		$_SESSION['usuario']=$fila[0];
		$_SESSION['nomb']=$fila[1];
		$_SESSION['apellido']=$fila[2];
		echo json_encode("correcto");
	}
	else{
		echo json_encode("error");
	}
	
?>