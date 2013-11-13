<?php
session_start();
if(!isset($_SESSION))
{
	die;
}
include'config.php';
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="http://www.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script src="js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>Correos</title>
</head>
<body>
<?php
if($_SESSION['Tipo']=="Personalizado")
{
$sfrom=$_SESSION['De'][1]; //cuenta que envia 
$sdestinatario=$_SESSION['Data']; //cuenta destino 
$ssubject=$_SESSION['Titulo']; //subject 
$shtml="<html><head><title>".$_SESSION['Titulo']."</title></head><body>".$_SESSION['Mensaje']."</body></html>"; //mensaje 
$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html";
$sheader=$sheader."charset=utf8\n";
$correo=mail($sdestinatario,$ssubject,$shtml,$sheader);
if($correo)
{
echo "<div class='alert alert-success'>1<center>Correo Exitoso a ".$sdestinatario."</center></div><br>";
}
else
{
echo "<div class='alert alert-danger'><center>Error Inesperado</center></div><br>";
}
}


if($_SESSION['Tipo']=="Todos"){
$sql="SELECT * FROM  datos";
$result=mysql_query($sql);
set_time_limit(0);
while($row = mysql_fetch_assoc($result)){ 

$sfrom=$_SESSION['De']; //cuenta que envia 
$sdestinatario=$_SESSION['Data']; //cuenta destino 
$ssubject=$_SESSION['Titulo']; //subject 
$shtml="<html><head><title>".$_SESSION['Titulo']."</title></head><body>".$_SESSION['Mensaje']."</body></html>"; //mensaje 
$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html";
$sheader=$sheader."charset=utf8";


// Mail it
if ($row['Correo']!=""){
$correo=mail($sdestinatario,$ssubject,$shtml,$sheader);
}
else{
	echo "<div class='alert alert-danger'>".$row['ID']."<center>el Correo no existe</center></div><br>";
}
if($correo){
echo "<div class='alert alert-success'>".$row['ID']."<center>Correo Exitoso ".$row['Nombre']."</center></div><br>";
}// fin if de correo
else{
echo "<div class='alert alert-danger'><center>Error Inesperado</center></div><br>";

}// fin else
}// fin while
}//fin if de tipo
?>
</body>
</html>