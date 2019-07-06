<?php
  require('conexion.php');

  $Ruts = $_GET['Ruts'];
  $part = explode(" ", $Ruts);

  $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
  mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
  if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;}
  $sqlaux = "SELECT Nombre,Apellido_Paterno,Apellido_Materno
             From Alumno
             WHERE Rut_alumno = '$part[0]'";
  $rsaux = mysqli_query($conexion,$sqlaux) or die(mysqli_error());
  $Nom = mysqli_fetch_array($rsaux);

  $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
  mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
  if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;}
  $sqlaux = "SELECT Nombre,Apellido_Paterno,Apellido_Materno
             From apoderado
             WHERE Rut_apoderado = '$part[1]'";
  $rsaux = mysqli_query($conexion,$sqlaux) or die(mysqli_error());
  $Nom_ap = mysqli_fetch_array($rsaux);

  if(!empty($_GET['Tipo_apoderado'])&&!empty($_GET['Parentesco']))
  {
    $Tipo_apoderado = $_GET['Tipo_apoderado'];
    $Parentesco = $_GET['Parentesco'];

    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

    $sql = "Insert into depende(Rut_alumno,Rut_apoderado,Tipo_apoderado,Parentesco)
            VALUES('$part[0]','$part[1]','$Tipo_apoderado','$Parentesco')";
    mysqli_query($conexion,$sql);
    echo "El Apoderado ";
    echo " $Nom_ap[0] $Nom_ap[1] $Nom_ap[2] ";
    echo "ha sido agregado correctamente a";
    echo " $Nom[0] $Nom[1] $Nom[2] ";
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
