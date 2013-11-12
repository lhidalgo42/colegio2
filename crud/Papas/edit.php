<?php 
include('../config.php'); 
if (isset($_GET['RUT']) ) { 
$RUT = (int) $_GET['RUT']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `papas` SET  `Nombre` =  '{$_POST['Nombre']}' ,  `Apellido1` =  '{$_POST['Apellido1']}' ,  `Apellido2` =  '{$_POST['Apellido2']}' ,  `Sexo` =  '{$_POST['Sexo']}' ,  `FechaNac` =  '{$_POST['FechaNac']}' ,  `FechaIns` =  '{$_POST['FechaIns']}' ,  `Apoderado_Economico` =  '{$_POST['Apoderado_Economico']}' ,  `Profesion` =  '{$_POST['Profesion']}' ,  `Familia_ID` =  '{$_POST['Familia_ID']}' ,  `Direccion` =  '{$_POST['Direccion']}' ,  `Email` =  '{$_POST['Email']}' ,  `Lugar_Trabajo` =  '{$_POST['Lugar_Trabajo']}' ,  `Direccion_Trabajo` =  '{$_POST['Direccion_Trabajo']}' ,  `Telefonos` =  '{$_POST['Telefonos']}' ,  `comunas_ID` =  '{$_POST['comunas_ID']}'   WHERE `RUT` = '$RUT' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `papas` WHERE `RUT` = '$RUT' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre:</b><br /><input type='text' name='Nombre' value='<?php echo $row['Nombre']; ?>' /> 
<p><b>Apellido1:</b><br /><input type='text' name='Apellido1' value='<?php echo $row['Apellido1']; ?>' /> 
<p><b>Apellido2:</b><br /><input type='text' name='Apellido2' value='<?php echo $row['Apellido2']; ?>' /> 
<p><b>Sexo:</b><br /><input type='text' name='Sexo' value='<?php echo $row['Sexo']; ?>' /> 
<p><b>FechaNac:</b><br /><input type='text' name='FechaNac' value='<?php echo $row['FechaNac']; ?>' /> 
<p><b>FechaIns:</b><br /><input type='text' name='FechaIns' value='<?php echo $row['FechaIns']; ?>' /> 
<p><b>Apoderado Economico:</b><br /><input type='text' name='Apoderado_Economico' value='<?php echo $row['Apoderado_Economico']; ?>' /> 
<p><b>Profesion:</b><br /><input type='text' name='Profesion' value='<?php echo $row['Profesion']; ?>' /> 
<p><b>Familia ID:</b><br /><input type='text' name='Familia_ID' value='<?php echo $row['Familia_ID']; ?>' /> 
<p><b>Direccion:</b><br /><input type='text' name='Direccion' value='<?php echo $row['Direccion']; ?>' /> 
<p><b>Email:</b><br /><input type='text' name='Email' value='<?php echo $row['Email']; ?>' /> 
<p><b>Lugar Trabajo:</b><br /><input type='text' name='Lugar_Trabajo' value='<?php echo $row['Lugar_Trabajo']; ?>' /> 
<p><b>Direccion Trabajo:</b><br /><input type='text' name='Direccion_Trabajo' value='<?php echo $row['Direccion_Trabajo']; ?>' /> 
<p><b>Telefonos:</b><br /><input type='text' name='Telefonos' value='<?php echo $row['Telefonos']; ?>' /> 
<p><b>Comunas ID:</b><br /><input type='text' name='comunas_ID' value='<?php echo $row['comunas_ID']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
