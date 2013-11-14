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
echo "<td><b>Apoderado Economico</b></td>"; 
echo "<td><b>Profesion</b></td>"; 
echo "<td><b>Familia ID</b></td>"; 
echo "<td><b>Direccion</b></td>"; 
echo "<td><b>Email</b></td>"; 
echo "<td><b>Lugar Trabajo</b></td>"; 
echo "<td><b>Direccion Trabajo</b></td>"; 
echo "<td><b>Telefonos</b></td>"; 
echo "<td><b>Comunas ID</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `papas`") or trigger_error(mysql_error()); 
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
echo "<td valign='top'>" . nl2br( $row['Apoderado_Economico']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Profesion']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Familia_ID']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Direccion']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Email']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Lugar_Trabajo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Direccion_Trabajo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Telefonos']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['comunas_ID']) . "</td>";  
echo "<td valign='top'><a href=edit.php?RUT={$row['RUT']}>Editar</a></td>";
echo "</tr>"; 
} 
echo "</table>";
?>