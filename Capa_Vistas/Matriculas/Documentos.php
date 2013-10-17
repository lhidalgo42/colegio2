<table  width="100%" border="1" class="table table-bordered">
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
    
    <td><center>COLEGIATURA</center></td>
    <td ><center>MATERIALES</center></td>
    <td ><center>CUOTA DE INCORPORACION</center></td>    
    <td><center>ALMUERZO</center></td>
    <td><center>DEUDA ESCOL. 2012</center></td>
  </tr>
  </thead>
  <tbody>
  <?php for($i=1;$i<13;$i++)
  { 
  $b=$i-1;
  ?>
  <tr>
    <td><input style="width:115px;" type="date" id="FechaBol<?php echo $i; ?>"></td>
    <td><a id="modal<?php echo $i; ?>" role="button" onClick="MostrarP(<?php echo $i; ?>)"class="btn" data-toggle="modal">Seleccionar</a></td>
    <!-- suma desde aqui-->
    <td><input type="number" class="span1" min="0"  value="0" id="<?php echo"Col".$i.""?>"></td>
    <td><input type="number" class="span1" min="0" value="0" id="<?php echo"MatK".$i.""?>"></td>
    <td><input type="number" class="span1" min="0" value="0" id="<?php echo"Cou".$i.""?>"></td>
    <td><input type="number" class="span1" min="0" value="0" id="<?php echo"Alm".$i.""?>" ></td>
    <td><input type="number" class="span1" min="0" value="0"  id="<?php echo"Deu".$i.""?>"></td>
    <!-- hasta aqui -->
    <td><div id="<?php echo"Total".$i.""; ?>">0</div></td>
    <td><input type="date" style="width:115px;" id="<?php echo"fechaD".$i.""?>" disabled></td>
    <td><input type="text" id="<?php echo"obs".$i.""?>"></td>
  </tr>
  <?php
  }
  ?> </tbody>
  <div class="clearfix"></div>
  <tfoot>
  <tr>
  <td height="38" colspan="2"><center><strong>Totales :</strong></center></td>
  <td><div id="ColT"></div></td>
  <td><div id="MatKT"></div></td>
  <td><div id="CouT"></div></td>
  <td><div id="AlmT"></div></td>
  <td><div id="DeuT"></div></td>
  <td><div id="TotalT"></div></td>
  </tfoot>
</table><br>

<button type="submit" class="btn btn-primary btn-block btn-large"><strong>Enviar</strong></button> 