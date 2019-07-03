<?php
  require('conexion.php');

  if(!empty($_GET['Rut'])&&!empty($_GET['Nombre'])&&!empty($_GET['Apellidop'])&&!empty($_GET['Apellidom'])&&!empty($_GET['Fecha_nac'])&&!empty($_GET['Sexo'])&&!empty($_GET['Residencia'])&&!empty($_GET['Calle']))
  {
    $Rut_alumno = $_GET['Rut'];
    $Nombre = $_GET['Nombre'];
    $Apellido_paterno = $_GET['Apellidop'];
    $Apellido_materno = $_GET['Apellidom'];
    $Fecha_de_nacimiento = $_GET['Fecha_nac'];
    $Sexo = $_GET['Sexo'];
    $N_de_Calle = $_GET['Residencia'];
    $Calle = $_GET['Calle'];
    $Comuna = $_GET['Comuna'];
    $Telefono_emergencia = $_GET['Telemergencia'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "INSERT INTO alumno (Rut_alumno,Nombre,Apellido_paterno,Apellido_materno,Fecha_de_nacimiento,Sexo,N_de_Calle,Calle,Comuna,Telefono_emergencia)
            VALUES('$Rut_alumno','$Nombre','$Apellido_paterno','$Apellido_materno','$Fecha_de_nacimiento','$Sexo',$N_de_Calle,'$Calle','$Comuna',$Telefono_emergencia)";

    mysqli_query($conexion,$sql );

    echo "El Alumno ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha sido registrado correctamente.";
    }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
<a href="../menu.html">volver</a>
