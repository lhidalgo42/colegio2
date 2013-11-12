<?php 
include('../config.php'); 
if (isset($_GET['ID']) ) { 
$ID = (int) $_GET['ID']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `documentos` SET  `NBoleta` =  '{$_POST['NBoleta']}' ,  `familia_ID` =  '{$_POST['familia_ID']}' ,  `Colegiatura` =  '{$_POST['Colegiatura']}' ,  `Materiales` =  '{$_POST['Materiales']}' ,  `Cuota_Inc` =  '{$_POST['Cuota_Inc']}' ,  `Almuerzo` =  '{$_POST['Almuerzo']}' ,  `Deuda` =  '{$_POST['Deuda']}' ,  `Observaciones` =  '{$_POST['Observaciones']}' ,  `UF_ID` =  '{$_POST['UF_ID']}'   WHERE `ID` = '$ID' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `documentos` WHERE `ID` = '$ID' ")); 
?>

<form action='' method='POST'> 
<p><b>NBoleta:</b><br /><input type='text' name='NBoleta' value='<?php echo $row['NBoleta']; ?>' /> 
<p><b>Familia ID:</b><br /><input type='text' name='familia_ID' value='<?php echo $row['familia_ID']; ?>' /> 
<p><b>Colegiatura:</b><br /><input type='text' name='Colegiatura' value='<?php echo $row['Colegiatura']; ?>' /> 
<p><b>Materiales:</b><br /><input type='text' name='Materiales' value='<?php echo $row['Materiales']; ?>' /> 
<p><b>Cuota Inc:</b><br /><input type='text' name='Cuota_Inc' value='<?php echo $row['Cuota_Inc']; ?>' /> 
<p><b>Almuerzo:</b><br /><input type='text' name='Almuerzo' value='<?php echo $row['Almuerzo']; ?>' /> 
<p><b>Deuda:</b><br /><input type='text' name='Deuda' value='<?php echo $row['Deuda']; ?>' /> 
<p><b>Observaciones:</b><br /><input type='text' name='Observaciones' value='<?php echo $row['Observaciones']; ?>' /> 
<p><b>UF ID:</b><br /><input type='text' name='UF_ID' value='<?php echo $row['UF_ID']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
