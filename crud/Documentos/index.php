<?php 
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>ID</b></td>"; 
echo "<td><b>NBoleta</b></td>"; 
echo "<td><b>Familia ID</b></td>"; 
echo "<td><b>Colegiatura</b></td>"; 
echo "<td><b>Materiales</b></td>"; 
echo "<td><b>Cuota Inc</b></td>"; 
echo "<td><b>Almuerzo</b></td>"; 
echo "<td><b>Deuda</b></td>"; 
echo "<td><b>Observaciones</b></td>"; 
echo "<td><b>UF ID</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `documentos`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['NBoleta']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['familia_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Colegiatura']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Materiales']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Cuota_Inc']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Almuerzo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Deuda']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Observaciones']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['UF_ID']) . "</td>";  
echo "<td valign='top'><a href=edit.php?ID={$row['ID']}>Editar</a></td><td><a href=delete.php?ID={$row['ID']}>Borrar</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Nueva Fila</a>"; 
?>