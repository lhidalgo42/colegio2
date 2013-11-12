<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `documentos` ( `NBoleta` ,  `familia_ID` ,  `Colegiatura` ,  `Materiales` ,  `Cuota_Inc` ,  `Almuerzo` ,  `Deuda` ,  `Observaciones` ,  `UF_ID`  ) VALUES(  '{$_POST['NBoleta']}' ,  '{$_POST['familia_ID']}' ,  '{$_POST['Colegiatura']}' ,  '{$_POST['Materiales']}' ,  '{$_POST['Cuota_Inc']}' ,  '{$_POST['Almuerzo']}' ,  '{$_POST['Deuda']}' ,  '{$_POST['Observaciones']}' ,  '{$_POST['UF_ID']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Fila Insertada Exitosamente.<br />"; 
echo "<a href='index.php'>Volver a la Lista</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>NBoleta:</b><br /><input type='text' name='NBoleta'/> 
<p><b>Familia ID:</b><br /><input type='text' name='familia_ID'/> 
<p><b>Colegiatura:</b><br /><input type='text' name='Colegiatura'/> 
<p><b>Materiales:</b><br /><input type='text' name='Materiales'/> 
<p><b>Cuota Inc:</b><br /><input type='text' name='Cuota_Inc'/> 
<p><b>Almuerzo:</b><br /><input type='text' name='Almuerzo'/> 
<p><b>Deuda:</b><br /><input type='text' name='Deuda'/> 
<p><b>Observaciones:</b><br /><input type='text' name='Observaciones'/> 
<p><b>UF ID:</b><br /><input type='text' name='UF_ID'/> 
<p><input type='submit' value='Agregar Fila' /><input type='hidden' value='1' name='submitted' /> 
</form> 
