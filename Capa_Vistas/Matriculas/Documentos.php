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
    
    <td><center>Colegiatura</center></td>
    <td ><center>Materiales</center></td>
    <td ><center>Cuota de Incorporación</center></td>    
    <td><center>Almuerzo</center></td>
    <td><center>Deuda Escolar 2013</center></td>
  </tr>
  </thead>
  <tbody>
  <?php for($i=1;$i<13;$i++)
  { 
  $b=$i-1;
  ?>
  <tr>
    <td><input style="width:115px;" type="date" id="FechaBol<?php echo $i; ?>"></td>
    <td style="width:100px;"><center><a id="modalP<?php echo $i; ?>" role="button" onClick="MostrarP(<?php echo $i; ?>)"class="btn" data-toggle="modal" tipo="" chequebanco="" chequenumero="" chequemonto="" chequefecha="" letranumero="" letramonto="" efectivomonto="">Seleccionar</a></center></td>
    <!-- suma desde aqui-->
    <td><input type="number" style="width:80px;" min="0"  value="0" id="<?php echo"Col".$i.""?>"></td>
    <td><input type="number" style="width:80px;" min="0" value="0" id="<?php echo"MatK".$i.""?>"></td>
    <td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0" id="<?php echo"Cou".$i.""?>"></td>
    <td><input type="number" style="width:60px;" min="0" value="0" id="<?php echo"Alm".$i.""?>" ></td>
    <td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0"  id="<?php echo"Deu".$i.""?>"></td>
    <!-- hasta aqui -->
    <td style="width:80px;"><center><div id="<?php echo"Total".$i.""; ?>">0</div></center></td>
    <td><input type="date" style="width:115px;" id="<?php echo"fechaD".$i.""?>" disabled></td>
    <td><input type="text" style="width:170px;" id="<?php echo"obs".$i.""?>"></td>
  </tr>
  <?php
  }
  ?> </tbody>
  <div class="clearfix"></div>
  <tfoot>
  <tr>
  <td height="38" colspan="2"><center><strong>Totales :</strong></center></td>
  <td><center><div id="ColT"></div></center></td>
  <td><center><div id="MatKT"></div></center></td>
  <td><center><div id="CouT"></div></center></td>
  <td><center><div id="AlmT"></div></center></td>
  <td><center><div id="DeuT"></div></center></td>
  <td><center><div id="TotalT"></div></center></td>
  </tfoot>
</table><br>

<button type="submit" class="btn btn-primary btn-block btn-large"><strong>Enviar</strong></button> 