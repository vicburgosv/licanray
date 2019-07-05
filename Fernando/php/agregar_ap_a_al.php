<?php
  require('conexion.php');

  $Ruts = $_GET['Ruts'];
  $part = explode(" ", $Ruts);

  if(!empty($_GET['Tipo_apoderado'])&&!empty($_GET['Parentesco']))
  {
    $Tipo_apoderado = $_GET['Tipo_apoderado'];
    $Parentesco = $_GET['Parentesco'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "Insert into depende(Rut_alumno,Rut_apoderado,Tipo_apoderado,Parentesco)
            VALUES('$part[0]','$part[1]','$Tipo_apoderado','$Parentesco')";
    mysqli_query($conexion,$sql);
    echo "El Apoderado ".$part[0]." ha sido agregado correctamente a ".$part[1]."";
    echo "<form method=\"get\" action=\"../agregar_apoderado_a_alumno.php\">";
    echo "<input type=\"hidden\" name=\"Rut\" value=\"$part[0]\" >";
    echo "<input type=\"submit\" value=\"Volver\">";
    echo "</form>";
  }
    else
    {
        echo "Debe completar todos campos.";
        echo "<form method=\"get\" action=\"tipo_parentesco.php\">";
        echo "<input type=\"hidden\" name=\"Ruts\" value=\"$part[0] $part[1]\" >";
        echo "<input type=\"submit\" value=\"Volver\">";
        echo "</form>";
    }


?>
