<?php 
include('../config.php'); 
if (isset($_GET['RUT']) ) { 
$RUT = (int) $_GET['RUT']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `nino` SET  `Nombre` =  '{$_POST['Nombre']}' ,  `Apellido1` =  '{$_POST['Apellido1']}' ,  `Apellido2` =  '{$_POST['Apellido2']}' ,  `Sexo` =  '{$_POST['Sexo']}' ,  `FechaNac` =  '{$_POST['FechaNac']}' ,  `FechaIns` =  '{$_POST['FechaIns']}' ,  `Curso` =  '{$_POST['Curso']}' ,  `Pago_Matricula_ID` =  '{$_POST['Pago_Matricula_ID']}' ,  `Pago_seguro_escolar_ID` =  '{$_POST['Pago_seguro_escolar_ID']}' ,  `Familia_ID` =  '{$_POST['Familia_ID']}' ,  `Beca_1` =  '{$_POST['Beca_1']}' ,  `Beca_2` =  '{$_POST['Beca_2']}' ,  `Colegio_anterior` =  '{$_POST['Colegio_anterior']}' ,  `Nuevo` =  '{$_POST['Nuevo']}'   WHERE `RUT` = '$RUT' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `nino` WHERE `RUT` = '$RUT' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre:</b><br /><input type='text' name='Nombre' value='<?php echo $row['Nombre']; ?>' /> 
<p><b>Apellido1:</b><br /><input type='text' name='Apellido1' value='<?php echo $row['Apellido1']; ?>' /> 
<p><b>Apellido2:</b><br /><input type='text' name='Apellido2' value='<?php echo $row['Apellido2']; ?>' /> 
<p><b>Sexo:</b><br /><input type='text' name='Sexo' value='<?php echo $row['Sexo']; ?>' /> 
<p><b>FechaNac:</b><br /><input type='text' name='FechaNac' value='<?php echo $row['FechaNac']; ?>' /> 
<p><b>FechaIns:</b><br /><input type='text' name='FechaIns' value='<?php echo $row['FechaIns']; ?>' /> 
<p><b>Curso:</b><br /><input type='text' name='Curso' value='<?php echo $row['Curso']; ?>' /> 
<p><b>Pago Matricula ID:</b><br /><input type='text' name='Pago_Matricula_ID' value='<?php echo $row['Pago_Matricula_ID']; ?>' /> 
<p><b>Pago Seguro Escolar ID:</b><br /><input type='text' name='Pago_seguro_escolar_ID' value='<?php echo $row['Pago_seguro_escolar_ID']; ?>' /> 
<p><b>Familia ID:</b><br /><input type='text' name='Familia_ID' value='<?php echo $row['Familia_ID']; ?>' /> 
<p><b>Beca 1:</b><br /><input type='text' name='Beca_1' value='<?php echo $row['Beca_1']; ?>' /> 
<p><b>Beca 2:</b><br /><input type='text' name='Beca_2' value='<?php echo $row['Beca_2']; ?>' /> 
<p><b>Colegio Anterior:</b><br /><input type='text' name='Colegio_anterior' value='<?php echo $row['Colegio_anterior']; ?>' /> 
<p><b>Nuevo:</b><br /><input type='text' name='Nuevo' value='<?php echo $row['Nuevo']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
