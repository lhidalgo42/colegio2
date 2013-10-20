<?php 
$var = $_REQUEST['var'];
echo "<h2 style='text-align:center;'>".$var."</h2>";
include'../datos/QueryAdmin.php';
include'../Vistas/Admin/Data/'.$var.'.php';
?>