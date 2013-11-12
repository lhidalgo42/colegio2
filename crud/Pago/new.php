<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `pago` ( `Monto` ,  `Fecha` ,  `tipo_ID` ,  `Numero` ,  `Bancos_ID` ,  `Fecha_Deposito` ,  `Fecha_Ins` ,  `papas_RUT`  ) VALUES(  '{$_POST['Monto']}' ,  '{$_POST['Fecha']}' ,  '{$_POST['tipo_ID']}' ,  '{$_POST['Numero']}' ,  '{$_POST['Bancos_ID']}' ,  '{$_POST['Fecha_Deposito']}' ,  '{$_POST['Fecha_Ins']}' ,  '{$_POST['papas_RUT']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Fila Insertada Exitosamente.<br />"; 
echo "<a href='index.php'>Volver a la Lista</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Monto:</b><br /><input type='text' name='Monto'/> 
<p><b>Fecha:</b><br /><input type='text' name='Fecha'/> 
<p><b>Tipo ID:</b><br /><input type='text' name='tipo_ID'/> 
<p><b>Numero:</b><br /><input type='text' name='Numero'/> 
<p><b>Bancos ID:</b><br /><input type='text' name='Bancos_ID'/> 
<p><b>Fecha Deposito:</b><br /><input type='text' name='Fecha_Deposito'/> 
<p><b>Fecha Ins:</b><br /><input type='text' name='Fecha_Ins'/> 
<p><b>Papas RUT:</b><br /><input type='text' name='papas_RUT'/> 
<p><input type='submit' value='Agregar Fila' /><input type='hidden' value='1' name='submitted' /> 
</form> 
