<?php
include"../../datos/dbconfig.php";
$link = mysql_connect($servidor, $nombre_usuario, $contrasena);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db($base_de_datos) ) {
    die ('Can\'t use $base_de_datos : ' . mysql_error());
}
?>