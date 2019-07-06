<?php
  require('conexion.php');
    $Id = $_GET['Id'];
    $part = explode(" ", $Id);

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "Insert into pertenece(Rut_alumno,Ano,Nivel,Seccion)
            VALUES('$part[0]','$part[1]','$part[2]','$part[3]')";
    mysqli_query($conexion,$sql);

    echo "El Alumno ".$part[0]." ha sido agregado correctamente a ".$part[1]." ".$part[2]." ".$part[3]."";
    echo "<form method=\"get\" action=\"editar-eliminar/reg-cur.php\">";
    echo "<input type=\"hidden\" name=\"Id\" value=\"$part[1] $part[2] $part[3]\" >";
    echo "<input type=\"submit\" value=\"Volver\">";
    echo "</form>";

?>
