<?php
  require('conexion.php');

  if(!empty($_GET['Rut'])&&!empty($_GET['Nombre'])&&!empty($_GET['Apellidop'])&&!empty($_GET['Apellidom'])&&!empty($_GET['Correo'])&&!empty($_GET['Telefono']))
  {
    $Rut = $_GET['Rut'];
    $Nombre = $_GET['Nombre'];
    $Apellido_paterno = $_GET['Apellidop'];
    $Apellido_materno = $_GET['Apellidom'];
    $Sexo = $_GET['Sexo'];
    $Correo = $_GET['Correo'];
    $Telefono = $_GET['Telefono'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "INSERT INTO docente (RUT_DOCENTE,NOMBRE,APELLIDO_PATERNO,APELLIDO_MATERNO,SEXO,CORREO,TELEFONO)
            VALUES('$Rut','$Nombre','$Apellido_paterno','$Apellido_materno','$Sexo','$Correo',$Telefono)";

    mysqli_query($conexion,$sql );

    echo "El Docente ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha sido registrado correctamente.";
    }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
<a href="../menu_docente.html">volver</a>
