<?php 
include('../config.php'); 
if (isset($_GET['ID']) ) { 
$ID = (int) $_GET['ID']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `familia` SET  `Familia` =  '{$_POST['Familia']}' ,  `Matriculas_Persona_RUT` =  '{$_POST['Matriculas_Persona_RUT']}' ,  `Fecha_Ins` =  '{$_POST['Fecha_Ins']}'   WHERE `ID` = '$ID' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `familia` WHERE `ID` = '$ID' ")); 
?>

<form action='' method='POST'> 
<p><b>Familia:</b><br /><input type='text' name='Familia' value='<?php echo $row['Familia']; ?>' /> 
<p><b>Matriculas Persona RUT:</b><br /><input type='text' name='Matriculas_Persona_RUT' value='<?php echo $row['Matriculas_Persona_RUT']; ?>' /> 
<p><b>Fecha Ins:</b><br /><input type='text' name='Fecha_Ins' value='<?php echo $row['Fecha_Ins']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
