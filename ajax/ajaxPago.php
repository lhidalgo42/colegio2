<?php
include"../datos/llamarQuery.php";
include "../sql/sql.php";
//TODO Cambiar conecciones a la BBDD
$tipo = $_POST['tipo'];
if($tipo==1)
{
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
if($mes==0){
    $anio2=$anio+1;
$fecha1= "".$anio."-01-01";
$fecha2= "".$anio2."-01-01";
}
else{
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


$fecha1= "".$anio."-".$mes1."-01";
$fecha2= "".$anio2."-".$mes2."-01";
}

$sql="SELECT pago.tipo_ID as tipo_ID, pago.Monto as Monto, pago.Numero as Numero, pago.Bancos_ID as Bancos_ID, pago.Fecha as Fecha, papas.RUT as RUT, familia.Familia as Familia FROM pago,papas,familia
WHERE Fecha BETWEEN  '".$fecha1."' AND  '".$fecha2."'
AND pago.papas_ID=papas.ID
AND papas.Familia_ID=Familia.ID";
$r = CallQuery($sql);
$pago = array();
while ($fila = $r->fetch_assoc()) {
    $pago[] = $fila;
}
echo "<table class='table table-hover table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th rowspan='3'><strong>Tipo</strong></th>";
echo "<th rowspan='3'><strong>Monto $</strong></th>";
echo "<th rowspan='3'><strong>Banco</strong></th>";
echo "<th rowspan='3'><strong>Numero</strong></th>";
echo "<th rowspan='3'><strong>Fecha de Vencimento</strong></th>";
echo "<th rowspan='3'>Boleta N°</th>";
echo "<th rowspan='3'><strong>Rut</strong></th>";
echo "<th rowspan='3'><strong>Familia</strong></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
//Array ( [ID] => 196 [Monto] => 328900 [Fecha] => 2014-09-06 [tipo_ID] => 1
//[Numero] => 2831026 [Bancos_ID] => 11 [Fecha_Deposito] => [Fecha_Ins] => 2013-11-05 12:28:46 [papas_RUT] => 115536893 )
$c=0;
foreach($pago as $pagos => $pago)
{

    $sql = "SELECT Nombre FROM  bancos WHERE  ID =".$pago['Bancos_ID']."";
    $r = CallQuery($sql);
    $fila = $r->fetch_assoc();
    $banco = $fila['Nombre'];
echo "<tr id='tr".$c."'>";
echo "<td id='1td".$c."'>";
if($pago['tipo_ID']==1)
    echo "Ch";
elseif($pago['tipo_ID']==2)
    echo "Le";
else
    echo "Ef";
echo "</td>";
echo "<td id='2td".$c."'>";
echo "$ ".$pago['Monto'];
echo "</td>";
echo "<td id='3td".$c."'>";
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
echo $pago['RUT'];
echo "</td>";
echo "<td>";
echo strtoupper($pago['Familia']);
echo "</td>";
echo "</tr>";
    $c++;
}
echo "</tbody>";
echo "</table>";
}
if($tipo==2)
{
    $sql="SELECT Curso FROM nino GROUP BY Curso";
    $r = CallQuery($sql);
    echo '<option value="Todo">Todos</option>';
    while ($fila = $r->fetch_assoc())
    {
        echo "<option value='".$fila['Curso']."'>".$fila['Curso']."</option>";
    }
}
if($tipo==3)
{
    $curso=$_POST['curso'];
    $familia=$_POST['familia'];
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
    $info = $_POST['info'];

        if($familia==""){
            if($curso=="Todo")
                $sql="SELECT * FROM familia";
            else
                $sql="SELECT * FROM familia , nino WHERE familia.ID = nino.Familia_ID AND nino.Curso = '$curso'";
        }
    else
        $sql = "SELECT familia.ID FROM familia WHERE Familia LIKE '$familia'";
        $r=CallQuery($sql);
        $arreglo=array();
        while ($fila = $r->fetch_assoc())
            {
               $arreglo[]=$fila['ID'];
             }
    if($mes==0){
        $anio2=$anio+1;
        $fecha1= "".$anio."-01-01";
        $fecha2= "".$anio."-12-31";
    }
    else{
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
        $fecha1= "".$anio."-".$mes1."-01";
        $fecha2= "".$anio2."-".$mes2."-01";
    }
    $datos=array();
    $length = count($arreglo);
    echo "<table class='table table-hover table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th rowspan='3'><strong>Tipo</strong></th>";
    echo "<th rowspan='3'><strong>Monto $</strong></th>";
    echo "<th rowspan='3'><strong>Banco</strong></th>";
    echo "<th rowspan='3'><strong>Numero</strong></th>";
    echo "<th rowspan='3'><strong>Fecha de Vencimento</strong></th>";
    echo "<th rowspan='3'>Boleta N°</th>";
    echo "<th rowspan='3'><strong>Rut</strong></th>";
    echo "<th rowspan='3'><strong>Familia</strong></th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    if($info=="Materiales" || $info=="Colegiatura" || $info=="Cuota_Inc" || $info=="Almuerzo")
    {
    for ($i=0;$i<$length;$i++){
        $sql="SELECT     documentos.NBoleta,
                         documentos.Colegiatura,
                         documentos.Materiales,
                         documentos.Cuota_Inc,
                         documentos.Almuerzo,
                         documentos.Deuda,
                         pago.Fecha,
                         pago.Monto,
                         pago.tipo_ID,
                         pago.Numero,
                         pago.Bancos_ID,
                         pago.papas_ID
              FROM
                      pago_has_documentos
              INNER JOIN pago ON pago_has_documentos.pago_ID = pago.ID
              INNER JOIN documentos ON pago_has_documentos.documentos_ID = documentos.ID
              WHERE   documentos.familia_ID = ".$arreglo[$i]."
              AND     pago.Fecha BETWEEN  '".$fecha1."' AND  '".$fecha2."'";
        $r=CallQuery($sql);
        while ($fila = $r->fetch_assoc())
        {
            $datos[]=$fila;
        }
    }
        foreach($datos as $n => $array)
        {
            echo "<tr>";
            echo "<td>";
            if($array['tipo_ID']==1)
                echo "CHEQUE";
            elseif($array['tipo_ID']==2)
                echo "LETRA";
            else
                echo "EFECTIVO";
            echo "</td>";
            echo "<td>";
            echo $array[$info];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  bancos WHERE  ID =".$array['Bancos_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo $fila['Nombre'];
            echo "</td>";
            echo "<td>";
            echo $array['Numero'];
            echo "</td>";
            echo "<td>";
            echo $array['Fecha'];
            echo "</td>";
            echo "<td>";
            echo $array['NBoleta'];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  papas WHERE  ID =".$array['papas_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo $fila['RUT'];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  familia WHERE  ID =".$fila['Familia_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo strtoupper($fila['Familia']);
            echo "</td>";
        }
    $total=0;
    $largo=count($datos);
        for($i=0;$i<$largo;$i++)
        {
            $total=$total+$datos[$i][$info];
        }
    echo "<table>";
    echo "<tr>";
    echo "<td>";
        echo "Total Monto Recaudado en $info en ";
        if($mes!=0)
        {
            echo "el mes $mes d";
        }
        echo "el año $anio en el Curso $curso ";
        echo "</td>";
    echo "<td>";
echo $total;
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    }
    elseif($info=="Seguro")
    {
        for ($i=0;$i<$length;$i++){
            $sql="SELECT * FROM nino WHERE Familia_ID = ".$arreglo[$i];
            $r=CallQuery($sql);
            while($fila=$r->fetch_assoc())
            {
               $sql="SELECT pago_seguro_escolar_has_pago.pago_seguro_escolar_ID,
                            pago_seguro_escolar_has_pago.pago_ID,
                            pago.Monto,
                            pago.Fecha,
                            pago.tipo_ID,
                            pago.Numero,
                            pago.Bancos_ID,
                            pago_seguro_escolar.Vale_N,
                            pago_seguro_escolar.Monto,
                            pago.papas_ID
                FROM pago_seguro_escolar_has_pago
                INNER JOIN pago ON pago_seguro_escolar_has_pago.pago_ID = pago.ID
                INNER JOIN pago_seguro_escolar ON pago_seguro_escolar_has_pago.pago_seguro_escolar_ID = pago_seguro_escolar.ID
                WHERE pago_seguro_escolar.ID = ". $fila['Pago_seguro_escolar_ID']."
                AND     pago.Fecha BETWEEN  '".$fecha1."' AND  '".$fecha2."'";
;
                $r=CallQuery($sql);
                $datos[]=$r->fetch_assoc();
            }
        }
        foreach($datos as $n => $array)
        {
            if(count($array)!=0){
            echo "<tr>";
            echo "<td>";
            if($array['tipo_ID']==1)
                echo "CHEQUE";
            elseif($array['tipo_ID']==2)
                echo "LETRA";
            else
                echo "EFECTIVO";
            echo "</td>";
            echo "<td>";
            echo $array['Monto'];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  bancos WHERE  ID =".$array['Bancos_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo $fila['Nombre'];
            echo "</td>";
            echo "<td>";
            echo $array['Numero'];
            echo "</td>";
            echo "<td>";
            echo $array['Fecha'];
            echo "</td>";
            echo "<td>";
            echo $array['Vale_N'];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  papas WHERE  ID =".$array['papas_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo $fila['RUT'];
            echo "</td>";
            echo "<td>";
            $sql = "SELECT * FROM  familia WHERE  ID =".$fila['Familia_ID'];
            $r=CallQuery($sql);
            $fila=$r->fetch_assoc();
            echo strtoupper($fila['Familia']);
            echo "</td>";

            echo "</tr>";
            }
        }
    }
    if($info=="Matriculas")
    {
        for ($i=0;$i<$length;$i++){
            $sql="SELECT * FROM nino WHERE Familia_ID = ".$arreglo[$i];
            $r=CallQuery($sql);
            while($fila=$r->fetch_assoc())
            {
                $sql="SELECT pago_matricula.N_de_Boleta,
                             pago_matricula.Monto,
                             pago.Monto,
                             pago.Fecha,
                             pago.tipo_ID,
                             pago.Numero,
                             pago.Bancos_ID,
                             pago.papas_ID
                     FROM    pago_matricula
                     INNER JOIN pago_matricula_has_pago ON pago_matricula_has_pago.pago_matricula_ID = pago_matricula.ID
                     INNER JOIN pago ON pago_matricula_has_pago.pago_ID = pago.ID
                     WHERE pago_matricula.ID = ". $fila['Pago_Matricula_ID']."
                     AND pago.Fecha BETWEEN  '".$fecha1."' AND  '".$fecha2."'";
                ;
                $r=CallQuery($sql);
                $datos[]=$r->fetch_assoc();
            }
        }
        print_r($datos);
        foreach($datos as $n => $array)
        {
            if(count($array)!=0){
                echo "<tr>";
                echo "<td>";
                if($array['tipo_ID']==1)
                    echo "CHEQUE";
                elseif($array['tipo_ID']==2)
                    echo "LETRA";
                else
                    echo "EFECTIVO";
                echo "</td>";
                echo "<td>";
                echo $array['Monto'];
                echo "</td>";
                echo "<td>";
                $sql = "SELECT * FROM  bancos WHERE  ID =".$array['Bancos_ID'];
                $r=CallQuery($sql);
                $fila=$r->fetch_assoc();
                echo $fila['Nombre'];
                echo "</td>";
                echo "<td>";
                echo $array['Numero'];
                echo "</td>";
                echo "<td>";
                echo $array['Fecha'];
                echo "</td>";
                echo "<td>";
                echo $array['Vale_N'];
                echo "</td>";
                echo "<td>";
                $sql = "SELECT * FROM  papas WHERE  ID =".$array['papas_ID'];
                $r=CallQuery($sql);
                $fila=$r->fetch_assoc();
                echo $fila['RUT'];
                echo "</td>";
                echo "<td>";
                $sql = "SELECT * FROM  familia WHERE  ID =".$fila['Familia_ID'];
                $r=CallQuery($sql);
                $fila=$r->fetch_assoc();
                echo strtoupper($fila['Familia']);
                echo "</td>";

                echo "</tr>";
            }
        }
    }
}
?>