<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `nino` ( `Nombre` ,  `Apellido1` ,  `Apellido2` ,  `Sexo` ,  `FechaNac` ,  `FechaIns` ,  `Curso` ,  `Pago_Matricula_ID` ,  `Pago_seguro_escolar_ID` ,  `Familia_ID` ,  `Beca_1` ,  `Beca_2` ,  `Colegio_anterior` ,  `Nuevo`  ) VALUES(  '{$_POST['Nombre']}' ,  '{$_POST['Apellido1']}' ,  '{$_POST['Apellido2']}' ,  '{$_POST['Sexo']}' ,  '{$_POST['FechaNac']}' ,  '{$_POST['FechaIns']}' ,  '{$_POST['Curso']}' ,  '{$_POST['Pago_Matricula_ID']}' ,  '{$_POST['Pago_seguro_escolar_ID']}' ,  '{$_POST['Familia_ID']}' ,  '{$_POST['Beca_1']}' ,  '{$_POST['Beca_2']}' ,  '{$_POST['Colegio_anterior']}' ,  '{$_POST['Nuevo']}'  ) "; 
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
<p><b>Curso:</b><br /><input type='text' name='Curso'/> 
<p><b>Pago Matricula ID:</b><br /><input type='text' name='Pago_Matricula_ID'/> 
<p><b>Pago Seguro Escolar ID:</b><br /><input type='text' name='Pago_seguro_escolar_ID'/> 
<p><b>Familia ID:</b><br /><input type='text' name='Familia_ID'/> 
<p><b>Beca 1:</b><br /><input type='text' name='Beca_1'/> 
<p><b>Beca 2:</b><br /><input type='text' name='Beca_2'/> 
<p><b>Colegio Anterior:</b><br /><input type='text' name='Colegio_anterior'/> 
<p><b>Nuevo:</b><br /><input type='text' name='Nuevo'/> 
<p><input type='submit' value='Agregar Fila' /><input type='hidden' value='1' name='submitted' /> 
</form> 
