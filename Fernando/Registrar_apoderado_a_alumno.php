<html>
  <head >
    <title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="style2.css" rel="stylesheet">
		<script src="jquery-3.4.1.min.js"></script>
		<script src="index.js"></script>
    <meta charset="utf-8">
  </head>
  <body>


    <!--formulario - Tablita-->
    <form action="php/tipo_parentesco_registra.php" method="get">
       <h1 align="center">Agregar apoderado a alumno:</h1>
       <h2> Datos del Apoderado </h2>
       <?php
       require('php/conexion.php');
       $Rut_al = $_GET['Rut'];
       echo "<input type=\"hidden\" name=\"Rut_al\" value=\"$Rut_al\">"?>
       <input type="text"  name="Nombre" placeholder="Nombre" />
       <input type="text" name="Apellidop" placeholder="Apellido Paterno" />
       <input type="text" name="Apellidom" placeholder="Apellido Materno" />
       <br><br>
       <input type="text" name="Rut_ap" placeholder="Rut" />
       <input type="text" name="Sexo" placeholder="Sexo" />
       <br><br>
       <input type="text" name="Residencia" placeholder="N° de Residencia" />
       <input type="text" name="Calle" placeholder="Calle" />
       <input type="text" name="Comuna" placeholder="Comuna" />
       <br><br>
       <input type="text" name="Telefono" placeholder="Teléfono" />
       <input type="text" name="Correo" placeholder="Correo" />
       <br><br>
       <input type="submit" value= "Enviar"/>
    </form>

  </body>
</html>
