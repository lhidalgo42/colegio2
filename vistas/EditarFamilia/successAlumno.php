<?php
//Iniciar Coneccion Base de Datos
include('../../datos/dbconfig.php');

$con = mysql_connect($servidor, $nombre_usuario, $contrasena);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($base_de_datos);

//Obtener datos actualizados

$rut = $_REQUEST['rut'];
$fechaNac = $_REQUEST['fechaNac'];
$fechaIns = $_REQUEST['fechaIns'];
$curso = $_REQUEST['curso'];
$colegioAnt = $_REQUEST['colegioAnt'];


$update = mysql_query("UPDATE NINO 
						SET 
							FechaNac='$fechaNac', 
							FechaIns= '$fechaIns',
							Curso= '$curso',
							Colegio_anterior= '$colegioAnt'
						WHERE RUT=$rut");
						
if (!$update) {echo "0";}
else{echo "1";}

//Cerrar Coneccion
mysql_close($con);
?>