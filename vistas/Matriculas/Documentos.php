<div class="span3"> NUMERO DE PAGOS</div>
<div class="span4"> 
	<input type="number" min="1" max="20" id="cuotas" placeholder="0">
</div>

<table  width="100%" border="1" class="table table-bordered" id="tablaDocs">
<thead>
  <tr>
    <td colspan="12"><center><strong>DOCUMENTOS GIRADOS O ACEPTADOS POR EL APODERADO POR CUOTAS REGULARES MENSUALES</strong></center></td>
  </tr>
  <tr>
    <td rowspan="2"><center>Vencimiento</center></td>
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
  <tbody id="pagoCuotas">
  </tbody>
  <div class="clearfix"></div>
  <tfoot>
  <tr>
  <td height="38" colspan="2"><center><strong>Totales :</strong></center></td>
  <td><center><div id="ColT"></div></center></td>
  <td><center><div id="MatT"></div></center></td>
  <td><center><div id="CouT"></div></center></td>
  <td><center><div id="AlmT"></div></center></td>
  <td><center><div id="DeuT"></div></center></td>
  <td><center><div id="TotalT"></div></center></td>
  </tfoot>
</table><br>

<button type="submit" class="btn btn-primary btn-block btn-large"><strong>Enviar</strong></button> 