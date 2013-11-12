<?php 
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>RUT</b></td>"; 
echo "<td><b>Nombre</b></td>"; 
echo "<td><b>Apellido1</b></td>"; 
echo "<td><b>Apellido2</b></td>"; 
echo "<td><b>Sexo</b></td>"; 
echo "<td><b>FechaNac</b></td>"; 
echo "<td><b>FechaIns</b></td>"; 
echo "<td><b>Curso</b></td>"; 
echo "<td><b>Pago Matricula ID</b></td>"; 
echo "<td><b>Pago Seguro Escolar ID</b></td>"; 
echo "<td><b>Familia ID</b></td>"; 
echo "<td><b>Beca 1</b></td>"; 
echo "<td><b>Beca 2</b></td>"; 
echo "<td><b>Colegio Anterior</b></td>"; 
echo "<td><b>Nuevo</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `nino`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['RUT']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Nombre']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Apellido1']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Apellido2']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Sexo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['FechaNac']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['FechaIns']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Curso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Pago_Matricula_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Pago_seguro_escolar_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Familia_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Beca_1']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Beca_2']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Colegio_anterior']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Nuevo']) . "</td>";  
echo "<td valign='top'><a href=edit.php?RUT={$row['RUT']}>Editar</a></td>";
echo "</tr>"; 
} 
echo "</table>";
?>