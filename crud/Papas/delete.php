<?php 
include('../config.php'); 
$RUT = (int) $_GET['RUT']; 
mysql_query("DELETE FROM `papas` WHERE `RUT` = '$RUT' ") ; 
echo (mysql_affected_rows()) ? "Fila Eliminada.<br /> " : "Sin Cambios, Intentar Denuevo.<br /> "; 
?> 

<a href='index.php'>Volver a la Lista</a>