<?php
  require('conexion.php');

  if(!empty($_GET['Nivel'])&&!empty($_GET['Seccion'])&&!empty($_GET['Rut_docente']))
  {
    $Nivel = $_GET['Nivel'];
    $Seccion = $_GET['Seccion'];
    $Rut_docente = $_GET['Rut_docente'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $dateaux = "SELECT YEAR(CURRENT_TIMESTAMP)";
    $date = mysqli_query($conexion,$dateaux) or die(mysql_error());
    $date1 = mysqli_fetch_array($date);

    $sql = "INSERT INTO curso
            VALUES('$date1[0]','$Nivel','$Seccion','$Rut_docente')";

    mysqli_query($conexion,$sql );

    echo "El Curso ".$date1[0]." ".$Nivel." ".$Seccion." ha sido registrado correctamente.";
    }
    elseif(!empty($_GET['Nivel'])&&!empty($_GET['Seccion']))
    {
      $Nivel = $_GET['Nivel'];
      $Seccion = $_GET['Seccion'];

      $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
      mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

      $dateaux = "SELECT YEAR(CURRENT_TIMESTAMP)";
      $date = mysqli_query($conexion,$dateaux) or die(mysql_error());
      $date1 = mysqli_fetch_array($date);

      $sql = "INSERT INTO curso(Ano,Nivel,Seccion)
              VALUES('$date1[0]','$Nivel','$Seccion')";

      mysqli_query($conexion,$sql );

      echo "El Curso ".$date1[0]." ".$Nivel." ".$Seccion." ha sido registrado correctamente.";
      }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
<a href="../menu_curso.php">volver</a>
