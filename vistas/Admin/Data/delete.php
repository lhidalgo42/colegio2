<?php 
include('config.php'); 
$ID = (int) $_GET['ID']; 
mysql_query("DELETE FROM `banco` WHERE `ID` = '$ID' ") ; 
echo (mysql_affected_rows()) ? "Fila Eliminada.<br /> " : "Sin Cambios, Intentar Denuevo.<br /> "; 
?> 

<a href='Bancos.php'>Volver a la Lista</a>