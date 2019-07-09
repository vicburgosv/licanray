<?php
	$ano='2019';
	session_start();
	$asi=$_SESSION['asi'];
	require('conexion.php');
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	
	foreach($_POST as $variable => $valor){ 
		$datos = explode("!", $variable);
		$n_eval=$datos[0];
		$rut=$datos[1];
		$marcador=strlen($valor);
		if($marcador!=0){
			$hay_dato ="Select RUT_ALUMNO
						FROM evaluacion
						WHERE N_EVALUACION='$n_eval' AND RUT_ALUMNO='$rut' AND ASIGNATURA='$asi' AND ANO=$ano";
			$respuesta = mysqli_query($conexion,$hay_dato) or die(mysql_error());
			$numeroTuplas=mysqli_num_rows($respuesta);
			if($numeroTuplas==0){
				//Se hace un inset into
				$sql = "INSERT INTO evaluacion
						VALUES('$n_eval', '$asi', '$rut', '$valor', '$ano')";
				$rs = mysqli_query($conexion,$sql) or die(mysql_error());				
			}
			else{
				//Se hace un update
				$sql = "UPDATE evaluacion
						SET NOTA='$valor'
						WHERE N_EVALUACION='$n_eval' AND RUT_ALUMNO='$rut' AND asignatura='$asi' AND ANO=$ano";		
				$rs = mysqli_query($conexion,$sql) or die(mysql_error());
			}
		}
		else{
			$hay_dato ="Select RUT_ALUMNO
						FROM evaluacion
						WHERE N_EVALUACION='$n_eval' AND RUT_ALUMNO='$rut' AND ASIGNATURA='$asi' AND ANO=$ano";
			$respuesta = mysqli_query($conexion,$hay_dato) or die(mysql_error());
			$numeroTuplas=mysqli_num_rows($respuesta);
			if($numeroTuplas==0){
				//No se hace nada
			}
			else{
				//Se hace un delete
				$sql = "DELETE 
						FROM evaluacion
						WHERE N_EVALUACION='$n_eval' AND RUT_ALUMNO='$rut' AND asignatura='$asi' AND ANO=$ano";		
				$rs = mysqli_query($conexion,$sql) or die(mysql_error());
			}			
		}
	}
?>		