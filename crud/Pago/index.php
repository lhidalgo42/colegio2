<?php 
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>ID</b></td>"; 
echo "<td><b>Monto</b></td>"; 
echo "<td><b>Fecha</b></td>"; 
echo "<td><b>Tipo ID</b></td>"; 
echo "<td><b>Numero</b></td>"; 
echo "<td><b>Bancos ID</b></td>"; 
echo "<td><b>Fecha Deposito</b></td>"; 
echo "<td><b>Fecha Ins</b></td>"; 
echo "<td><b>Papas RUT</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `pago`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Monto']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Fecha']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tipo_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Numero']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Bancos_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Fecha_Deposito']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Fecha_Ins']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['papas_RUT']) . "</td>";  
echo "<td valign='top'><a href=edit.php?ID={$row['ID']}>Editar</a></td><td><a href=delete.php?ID={$row['ID']}>Borrar</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Nueva Fila</a>"; 
?>