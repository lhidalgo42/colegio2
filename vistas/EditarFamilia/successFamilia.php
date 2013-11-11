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
$profesion = $_REQUEST['profesion'];
$direccion = $_REQUEST['direccion'];
$email = $_REQUEST['email'];
$lugarT = $_REQUEST['lugarT'];
$direccionT = $_REQUEST['direccionT'];
$telefonos = $_REQUEST['telefonos'];

$update = mysql_query("UPDATE PAPAS 
						SET 
							FechaNac='$fechaNac', 
							FechaIns= '$fechaIns',
							Profesion= '$profesion',
							Direccion= '$direccion',
							Email= '$email',
							Lugar_Trabajo= '$lugarT',
							Direccion_Trabajo= '$direccionT',
							Telefonos= '$telefonos'
						WHERE RUT=$rut");
						
if (!$update) {echo "0";}
else{echo "1";}

//Cerrar Coneccion
mysql_close($con);
?>