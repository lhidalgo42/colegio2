<?php 
include('config.php'); 
if (isset($_GET['ID']) ) { 
$ID = (int) $_GET['ID']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `banco` SET  `Nombre` =  '{$_POST['Nombre']}'   WHERE `ID` = '$ID' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='Bancos.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `banco` WHERE `ID` = '$ID' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre:</b><br /><input type='text' name='Nombre' value='<?php echo $row['Nombre']; ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
