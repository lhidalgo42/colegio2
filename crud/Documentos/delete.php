<?php 
include('../config.php'); 
$ID = (int) $_GET['ID']; 
mysql_query("DELETE FROM `documentos` WHERE `ID` = '$ID' ") ; 
echo (mysql_affected_rows()) ? "Fila Eliminada.<br /> " : "Sin Cambios, Intentar Denuevo.<br /> "; 
?> 

<a href='index.php'>Volver a la Lista</a>