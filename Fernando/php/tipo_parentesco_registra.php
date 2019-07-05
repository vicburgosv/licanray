<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="../style2.css" rel="stylesheet">
	</head>
  <body>

    <!--formulario - Tablita-->
		<?php
		if(!empty($_GET['Rut_ap'])&&!empty($_GET['Nombre'])&&!empty($_GET['Apellidop'])&&!empty($_GET['Apellidom'])&&!empty($_GET['Residencia'])&&!empty($_GET['Calle'])&&!empty($_GET['Comuna'])&&!empty($_GET['Telefono']))
	  {
		echo	"<form action=\"agregar_ap_a_al_registrar.php\" method=\"get\">";
		echo	"<h2> Apoderado </h2>";
		echo	"<select name=\"Tipo_apoderado\">";
		echo	"<option value=\"Titular\">Titular</option>";
		echo	"<option value=\"Suplentes\">Suplente</option>";
		echo	"</select>";
		echo "&nbsp;";
		echo "<input type=\"text\" name=\"Parentesco\" placeholder=\"Parentesco\" />";
		echo	"<br><br>";
		require('conexion.php');
		$Rut_al = $_GET['Rut_al'];
		$Nombre = $_GET['Nombre'];
		$Apellido_paterno = $_GET['Apellidop'];
    $Apellido_materno = $_GET['Apellidom'];
		$Rut_ap = $_GET['Rut_ap'];
    $Sexo = $_GET['Sexo'];
    $N_de_Calle = $_GET['Residencia'];
    $Calle = $_GET['Calle'];
    $Comuna = $_GET['Comuna'];
    $Telefono = $_GET['Telefono'];
    $Correo = $_GET['Correo'];
		echo "<input type=\"hidden\" name=\"Rut_al\" value=\"$Rut_al\" >";
		echo "<input type=\"hidden\" name=\"Nombre\" value=\"$Nombre\" >";
		echo "<input type=\"hidden\" name=\"Apellidop\" value=\"$Apellido_paterno\" >";
		echo "<input type=\"hidden\" name=\"Apellidom\" value=\"$Apellido_materno\" >";
		echo "<input type=\"hidden\" name=\"Rut_ap\" value=\"$Rut_ap\" >";
		echo "<input type=\"hidden\" name=\"Sexo\" value=\"$Sexo\" >";
		echo "<input type=\"hidden\" name=\"Residencia\" value=\"$N_de_Calle\" >";
		echo "<input type=\"hidden\" name=\"Calle\" value=\"$Calle\" >";
		echo "<input type=\"hidden\" name=\"Comuna\" value=\"$Comuna\" >";
		echo "<input type=\"hidden\" name=\"Telefono\" value=\"$Telefono\" >";
		echo "<input type=\"hidden\" name=\"Correo\" value=\"$Correo\" >";
    echo "<input type=\"submit\" value= \"Enviar\"/>";
    echo "</form>";
	}
		else
		{
				echo "Debe completar todos campos.";
		}
	?>

  </body>
</html>
