<?php
 // connectar a la BBDD
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('Colegio') ) {
    die ('Can\'t use Colegio : ' . mysql_error()); 
}
 ?>