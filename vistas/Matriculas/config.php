<?php
 // connectar a la BBDD
$link = mysql_connect('localhost', 'edithorc', 'hmhs210659');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('edithorc_correo') ) {
    die ('Can\'t use edithorc_correo : ' . mysql_error()); 
}
 ?>