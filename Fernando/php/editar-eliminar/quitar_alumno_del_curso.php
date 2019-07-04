<?php
  require('../conexion.php');
    $Id = $_GET['Id'];
    $part = explode(" ", $Id);

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "Delete
            From pertenece
            Where Rut_alumno='$part[0]' AND Ano='$part[1]' AND Nivel='$part[2]' AND Seccion='$part[3]'";

    mysqli_query($conexion,$sql );

    echo "El Alumno ".$part[0]." ha sido eliminado correctamente de ".$part[1]." ".$part[2]." ".$part[3]."";

?>
