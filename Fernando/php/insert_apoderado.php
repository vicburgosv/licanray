<?php
  require('conexion.php');
  if(!empty($_GET['Rut'])&&!empty($_GET['Nombre'])&&!empty($_GET['Apellidop'])&&!empty($_GET['Apellidom'])&&!empty($_GET['Residencia'])&&!empty($_GET['Calle'])&&!empty($_GET['Comuna'])&&!empty($_GET['Telefono']))
  {
    $Rut = $_GET['Rut'];
    $Nombre = $_GET['Nombre'];
    $Apellido_paterno = $_GET['Apellidop'];
    $Apellido_materno = $_GET['Apellidom'];
    $Sexo = $_GET['Sexo'];
    $N_de_Calle = $_GET['Residencia'];
    $Calle = $_GET['Calle'];
    $Comuna = $_GET['Comuna'];
    $Telefono = $_GET['Telefono'];
    $Correo = $_GET['Correo'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "INSERT INTO apoderado (RUT_APODERADO,NOMBRE,APELLIDO_PATERNO,APELLIDO_MATERNO,SEXO,TELEFONO,CORREO,N_DE_CALLE,CALLE,COMUNA)
            VALUES('$Rut','$Nombre','$Apellido_paterno','$Apellido_materno','$Sexo',$Telefono,'$Correo',$N_de_Calle,'$Calle','$Comuna')";

    mysqli_query($conexion,$sql );

    echo "El Apoderado ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha sido registrado correctamente.";
    }
    else
    {
        echo "Debe completar todos campos.";
    }

?>
<a href="../menu_apoderado.html">volver</a>
