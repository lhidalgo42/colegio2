<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `papas` ( `Nombre` ,  `Apellido1` ,  `Apellido2` ,  `Sexo` ,  `FechaNac` ,  `FechaIns` ,  `Apoderado_Economico` ,  `Profesion` ,  `Familia_ID` ,  `Direccion` ,  `Email` ,  `Lugar_Trabajo` ,  `Direccion_Trabajo` ,  `Telefonos` ,  `comunas_ID`  ) VALUES(  '{$_POST['Nombre']}' ,  '{$_POST['Apellido1']}' ,  '{$_POST['Apellido2']}' ,  '{$_POST['Sexo']}' ,  '{$_POST['FechaNac']}' ,  '{$_POST['FechaIns']}' ,  '{$_POST['Apoderado_Economico']}' ,  '{$_POST['Profesion']}' ,  '{$_POST['Familia_ID']}' ,  '{$_POST['Direccion']}' ,  '{$_POST['Email']}' ,  '{$_POST['Lugar_Trabajo']}' ,  '{$_POST['Direccion_Trabajo']}' ,  '{$_POST['Telefonos']}' ,  '{$_POST['comunas_ID']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Fila Insertada Exitosamente.<br />"; 
echo "<a href='index.php'>Volver a la Lista</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Nombre:</b><br /><input type='text' name='Nombre'/> 
<p><b>Apellido1:</b><br /><input type='text' name='Apellido1'/> 
<p><b>Apellido2:</b><br /><input type='text' name='Apellido2'/> 
<p><b>Sexo:</b><br /><input type='text' name='Sexo'/> 
<p><b>FechaNac:</b><br /><input type='text' name='FechaNac'/> 
<p><b>FechaIns:</b><br /><input type='text' name='FechaIns'/> 
<p><b>Apoderado Economico:</b><br /><input type='text' name='Apoderado_Economico'/> 
<p><b>Profesion:</b><br /><input type='text' name='Profesion'/> 
<p><b>Familia ID:</b><br /><input type='text' name='Familia_ID'/> 
<p><b>Direccion:</b><br /><input type='text' name='Direccion'/> 
<p><b>Email:</b><br /><input type='text' name='Email'/> 
<p><b>Lugar Trabajo:</b><br /><input type='text' name='Lugar_Trabajo'/> 
<p><b>Direccion Trabajo:</b><br /><input type='text' name='Direccion_Trabajo'/> 
<p><b>Telefonos:</b><br /><input type='text' name='Telefonos'/> 
<p><b>Comunas ID:</b><br /><input type='text' name='comunas_ID'/> 
<p><input type='submit' value='Agregar Fila' /><input type='hidden' value='1' name='submitted' /> 
</form> 
