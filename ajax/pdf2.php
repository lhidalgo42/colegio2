<?php
session_start();
# Cargamos la librería dompdf.
include'../../dompdf/dompdf_config.inc.php';
$html=$_SESSION['html'];

$titulo="Matriculas - Revisión de datos";
# Contenido HTML del documento que queremos generar en PDF.
$html='
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="http://www.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">
<style>
body {
				font-style:italic;
                font-weight:bold;
                font-size:80%;
}
</style>
</head>
<body>
    <br>
    <br>
<div class="span12" id="panel_superior">
        <div class="pull-right span4">

            <table class="table  table-bordered">
                <tbody><tr>
                    <td><strong>FAMILIA</strong></td>
                    <td colspan="3">3 4</td>
                </tr>
                <tr>
                    <td><strong>MADRE</strong></td>
                    <td>3 4</td>
                    <td><strong>PADRE</strong></td>
                    <td>2 3</td>
                </tr>
            </tbody></table>

        </div>
        <div class="offset2 span2">
            <br>
            <br>

                <br>
                <br>
                <table>
                    <tbody><tr>
                        <td><strong>AÑO</strong></td>
                        <td>&nbsp;&nbsp;<u>2014</u></td>
                    </tr>
                </tbody></table>

        </div>
    </div>
    <div class="span12">

        <table class="table table-bordered" border="1">
            <thead>
                 <tr>
                    <td rowspan="2"><br><center><strong>NOMBRE DE LOS NIÑOS</strong></center></td>
                    <td rowspan="2"><br><center><strong>CURSO</strong></center></td>
                    <td colspan="3"><center><strong>PAGO DE MATRICULA</strong></center></td>
                    <td colspan="3"><center><strong>PAGO DE SEGURO ESCOLAR</strong></center></td>
                    <td colspan="2"><center><strong>BECAS</strong></center></td>
                 </tr>
                 <tr>
                    <td><center>N° Boleta</center></td>
                    <td><center>Monto</center></td>
                    <td><center>Fecha</center></td>
                    <td><center>N° Vale</center></td>
                    <td><center>Monto</center></td>
                    <td><center>Fecha</center></td>
                    <td><center>1 Semestre</center></td>
                    <td><center>2 Semestre</center></td>
                </tr>
          </thead>
                    <tbody>                <tr>
                    <td>test 3</td>
                    <td>1ro Basico</td>
                    <td>10</td>
                    <td>200000</td>
                    <td>2014-01-07</td>
                    <td>300</td>
                    <td>42000</td>
                    <td>2014-03-15</td>
                    <td>0</td>
                    <td>0</td>
                </tr>            </tbody>
        </table>

        </div>
    <div class="span12">
        	<table width="100%" border="1" class="table table-bordered">
                <thead>
                  <tr>
                    <td colspan="13"><center><strong>DOCUMENTOS GIRADOS O ACEPTADOS POR EL APODERADO POR CUOTAS REGULARES MENSUALES</strong></center></td>
                  </tr>
                  <tr>
                  	<td rowspan="2"><center>NUMERO BOLETA</center></td>
                    <td rowspan="2"><center>VENCIMINETO</center></td>
                    <td rowspan="2"><center>Cheque - Letra Mandado Tipo/Detalle Documento N°</center></td>
                    <td colspan="5"><center><strong>COMPONENTES DEL MONTO (PESOS)</strong></center></td>
                    <td rowspan="2"><center>
                    MONTO TOTAL POR DOC.
                    </center></td>
                    <td rowspan="2"><center>FECHA DE DEPOSITO</center></td>
                    <td rowspan="2"><center>OBSERVACIONES</center></td>
                  </tr>
                  <tr>

                    <td><center>Colegiatura</center></td>
                    <td><center>Materiales</center></td>
                    <td><center>Cuota de Incorporación</center></td>
                    <td><center>Almuerzo</center></td>
                    <td><center>Deuda Escolar 2013</center></td>
                  </tr>
                  </thead>
                  <tbody>
                                    <tr>
                    <td>10</td>
                    <td>2013-12-17</td>
                    <td>Cheque<br>BICE&nbsp;<br>1234</td>
                    <td><center>561600</center></td>
                    <td><center>35000</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>596600</center></td>
                    <td><center>-</center></td>
                    <td></td>
                  </tr>
                                    <tr>
                    <td>10</td>
                    <td>2014-01-17</td>
                    <td>Cheque<br>BICE&nbsp;<br>1235</td>
                    <td><center>561600</center></td>
                    <td><center>35000</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>596600</center></td>
                    <td><center>-</center></td>
                    <td></td>
                  </tr>
                                    <tr>
                    <td>10</td>
                    <td>2014-02-17</td>
                    <td>Cheque<br>BICE&nbsp;<br>1236</td>
                    <td><center>561600</center></td>
                    <td><center>35000</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>596600</center></td>
                    <td><center>-</center></td>
                    <td></td>
                  </tr>
                                    <tr>
                    <td>10</td>
                    <td>2014-03-17</td>
                    <td>Cheque<br>BICE&nbsp;<br>1237</td>
                    <td><center>561600</center></td>
                    <td><center>35000</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>596600</center></td>
                    <td><center>-</center></td>
                    <td></td>
                  </tr>
                                    <tr>
                    <td>10</td>
                    <td>2014-04-17</td>
                    <td>Cheque<br>BICE&nbsp;<br>1238</td>
                    <td><center>561600</center></td>
                    <td><center>35000</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>0</center></td>
                    <td><center>596600</center></td>
                    <td><center>-</center></td>
                    <td></td>
                  </tr>
                   </tbody>
                  <tfoot>
                  <tr>
                  <td height="38" colspan="3"><center><strong>Totales :</strong></center></td>
                  <td><center>2808000</center></td>
                  <td><center>175000</center></td>
                  <td><center>0</center></td>
                  <td><center>0</center></td>
                  <td><center>0</center></td>
                  <td><center>2983000</center></td>
                  </tr></tfoot>
                </table>

    </div>
    </body>
 </html>';

# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$A['horizontal']="landscape";
$A['vertical']='portrait';
$mipdf ->set_paper("letter", "landscape");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
//$mipdf ->render();
echo $_SESSION['html'];
# Enviamos el fichero PDF al navegador.
//$mipdf ->stream('Familia '.$_SESSION['envio']['familia'][0].'.pdf');
?>