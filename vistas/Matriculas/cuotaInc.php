<div class="span2"> N° DE PAGO Cuota Incorporación (1-20)</div>
<div class="span4"> 
	<input type="number" id="cuotaInc" maxlength="2" value="0">
    <?php include_once '../../datos/Select.php';
	
	$data2=Select::BuscarUF(date('Y-m-d'));
	$data=str_replace(".",",",$data2['Valor'])?>
</div><div class="span1" id="valor">0 UF</div><div class="span2" id="uf" iduf="<?php echo $data2['ID']; ?>" uf="<?php echo $data2['Valor']; ?>"> Valor UF <?php echo"".substr($data, 0, 2-strlen($data)).".".substr($data, 2, 6).""; ?> </div><div class="2"id="hoy"></div>
<table  width="100%" border="1" class="table table-bordered" id="tablaCuotaINC">
<thead>
  <tr>
    <td colspan="13"><center><strong>DOCUMENTOS GIRADOS O ACEPTADOS POR EL APODERADO POR CUOTAS REGULARES MENSUALES</strong></center></td>
  </tr>
  <tr>
  	<td rowspan="2"><center>N° Boleta</center></td>
    <td rowspan="2"><center>Vencimiento</center></td>
    <td rowspan="2"><center>Cheque - Letra Mandado Tipo/Detalle Documento N°</center></td>
    <td></td>
    <td rowspan="2"><center>TOTAL</center></td>
    <td rowspan="2"><center>FECHA DE DEPOSITO</center></td>
    <td rowspan="2"><center>OBSERVACIONES</center></td>
  </tr>
  <tr>

    <td><center>Cuota de Incorporación</center></td>    
  </tr>
  </thead>
  <tbody id="pagoCuotasInc"></tbody>
  <tfoot>
  <tr>
  <td height="38" colspan="3"><center><strong>Totales :</strong></center></td>
  <td><center><div id="CouTInc"></div></center></td>
  <td><center><div id="TotalTInc"></div></center></td>
</tr>
</tfoot>
</table>