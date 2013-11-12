<?php 
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>ID</b></td>"; 
echo "<td><b>Familia</b></td>"; 
echo "<td><b>Matriculas Persona RUT</b></td>"; 
echo "<td><b>Fecha Ins</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `familia`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Familia']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Matriculas_Persona_RUT']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Fecha_Ins']) . "</td>";  
echo "<td valign='top'><a href=edit.php?ID={$row['ID']}>Editar</a></td>";
echo "</tr>"; 
} 
echo "</table>";
?>