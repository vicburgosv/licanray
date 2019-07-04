<?php
  require('conexion.php');

  if(!empty($_GET['Ano'])&&!empty($_GET['Nivel'])&&!empty($_GET['Seccion'])&&!empty($_GET['Rut_docente']))
  {
    $Ano = $_GET['Ano'];
    $Nivel = $_GET['Nivel'];
    $Seccion = $_GET['Seccion'];
    $Rut_docente = $_GET['Rut_docente'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "INSERT INTO curso
            VALUES('$Ano','$Nivel','$Seccion','$Rut_docente')";

    mysqli_query($conexion,$sql );

    echo "El Curso ".$Ano." ".$Nivel." ".$Seccion." ha sido registrado correctamente.";
    }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
<a href="../menu_curso.php">volver</a>
