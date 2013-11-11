<?php
include'../datos/insert.php';
$uf=$_POST['UF'];
$date = date('Y-m-d');
$uf=str_replace(".","",$uf);
$uf=str_replace(",","",$uf);
$uf1=str_split($uf,5);
$uf="".$uf1[0].".".$uf1[1]."";
$insert=Insert::UF($uf,$date);
if($insert)
    echo 1;
else
    echo 0;

?>