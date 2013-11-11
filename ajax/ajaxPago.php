<?php
$anio = $_POST['anio'];
$mes = $_POST['mes'];
if($mes<10)
$mes1="0".$mes;
else
$mes1=$mes;
$mes2=$mes+1;
if($mes2>12){
$mes2=1; $anio2=$anio+1; }
else{
if($mes2<10)
$mes2="0".$mes2;
$anio2=$anio;
}
include"../datos/Querys.php";

$fecha1= "".$anio."-".$mes1."-01";
$fecha2= "".$anio2."-".$mes2."-01";
$pago=Query::BuscarPagoEntre($fecha1,$fecha2);
echo "<table class='table table-hover table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach($pago as $pagos => $pago)
{
echo "<tr>";
foreach($pago as $key =>$dato)
{
  echo "<td>";
    echo $dato;
  echo "</td>";
}
echo "</tr>";
}
echo "</tbody>";
echo "</table>"
?>