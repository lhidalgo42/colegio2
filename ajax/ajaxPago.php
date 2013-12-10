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
include"../datos/Select.php";

$fecha1= "".$anio."-".$mes1."-01";
$fecha2= "".$anio2."-".$mes2."-01";
$pago=Query::BuscarPagoEntre($fecha1,$fecha2);
echo "<table class='table table-hover table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th rowspan='3'><strong>Tipo Documento</strong></th>";
echo "<th rowspan='3'><strong>Monto $</strong></th>";
echo "<th rowspan='3'><strong>Banco</strong></th>";
echo "<th rowspan='3'><strong>N°Documento</strong></th>";
echo "<th rowspan='3'><strong>Fecha de Vencimento</strong></th>";
echo "<th rowspan='3' colspan='3'>Boleta N°</th>";
echo "<th rowspan='3'><strong>Rut</strong></th>";
echo "<th rowspan='3'><strong>Familia</strong></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
//Array ( [ID] => 196 [Monto] => 328900 [Fecha] => 2014-09-06 [tipo_ID] => 1
//[Numero] => 2831026 [Bancos_ID] => 11 [Fecha_Deposito] => [Fecha_Ins] => 2013-11-05 12:28:46 [papas_RUT] => 115536893 )
foreach($pago as $pagos => $pago)
{
echo "<tr>";
echo "<td>";
if($pago['tipo_ID']==1)
    echo "C";
elseif($pago['tipo_ID']==2)
    echo "L";
else
    echo "E";
echo "</td>";
echo "<td>";
echo "$ ".$pago['Monto'];
echo "</td>";
echo "<td>";
$banco=Select::BuscarBanco($pago['Bancos_ID']);
echo "$banco";
echo "</td>";;
echo "<td>";
echo $pago['Numero'];
echo "</td>";
echo "<td>";
echo $pago['Fecha'];
echo "</td>";
echo "<td>";
echo "?";
echo "</td>";
echo "<td>";
echo "?";
echo "</td>";
echo "<td>";
echo "?";
echo "</td>";
echo "<td>";
echo $pago['papas_RUT'];
echo "</td>";
echo "<td>";
echo "?";
echo "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>"
?>