<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `familia` ( `Familia` ,  `Matriculas_Persona_RUT` ,  `Fecha_Ins`  ) VALUES(  '{$_POST['Familia']}' ,  '{$_POST['Matriculas_Persona_RUT']}' ,  '{$_POST['Fecha_Ins']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Fila Insertada Exitosamente.<br />"; 
echo "<a href='index.php'>Volver a la Lista</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Familia:</b><br /><input type='text' name='Familia'/> 
<p><b>Matriculas Persona RUT:</b><br /><input type='text' name='Matriculas_Persona_RUT'/> 
<p><b>Fecha Ins:</b><br /><input type='text' name='Fecha_Ins'/> 
<p><input type='submit' value='Agregar Fila' /><input type='hidden' value='1' name='submitted' /> 
</form> 
