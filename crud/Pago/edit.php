<?php 
include('../config.php'); 
if (isset($_GET['ID']) ) { 
$ID = (int) $_GET['ID']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `pago` SET  `Monto` =  '{$_POST['Monto']}' ,  `Fecha` =  '{$_POST['Fecha']}' ,  `tipo_ID` =  '{$_POST['tipo_ID']}' ,  `Numero` =  '{$_POST['Numero']}' ,  `Bancos_ID` =  '{$_POST['Bancos_ID']}' ,  `Fecha_Deposito` =  '{$_POST['Fecha_Deposito']}' ,  `Fecha_Ins` =  '{$_POST['Fecha_Ins']}' ,  `papas_RUT` =  '{$_POST['papas_RUT']}'   WHERE `ID` = '$ID' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pago` WHERE `ID` = '$ID' ")); 
?>

<form action='' method='POST'> 
<p><b>Monto:</b><br /><input type='text' name='Monto' value='<?php echo $row['Monto']; ?>' /> 
<p><b>Fecha:</b><br /><input type='text' name='Fecha' value='<?php echo $row['Fecha']; ?>' /> 
<p><b>Tipo ID:</b><br /><input type='text' name='tipo_ID' value='<?php echo $row['tipo_ID']; ?>' /> 
<p><b>Numero:</b><br /><input type='text' name='Numero' value='<?php echo $row['Numero']; ?>' /> 
<p><b>Bancos ID:</b><br /><input type='text' name='Bancos_ID' value='<?php echo $row['Bancos_ID']; ?>' /> 
<p><b>Fecha Deposito:</b><br /><input type='text' name='Fecha_Deposito' value='<?php echo $row['Fecha_Deposito']; ?>' /> 
<p><b>Fecha Ins:</b><br /><input type='text' name='Fecha_Ins' value='<?php echo $row['Fecha_Ins']; ?>' /> 
<p><b>Papas RUT:</b><br /><input type='text' name='papas_RUT' value='<?php echo $row['papas_RUT']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
