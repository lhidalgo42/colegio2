<table  border="1" class="table table-bordered">
  <tr>
    <td><strong>Familia</strong></td>
     <td><input type="text" id="familia" disabled class="span3"></td>
    <td><strong>Apoderado Economico</strong></td>
    <td>
  <div class="btn-group" id="AEconomico" data-toggle="buttons-radio">
 <button type="button" class="btn" onClick="clickButton(0)">Papa</button>
 <button type="button" class="btn" onClick="clickButton(1)">Mama</button>
</div></td>
  </tr>
  <tr id="tr-papas" class="opaco">
    <td><strong>Padre</strong></td>
    <td><a id="modalPAPA" role="button" onClick="MostrarPadre(1)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" apellido2="" fechaNac="" sexo="1" profesion="" direccion="" comuna="" email="" lugarTrabajo="" direccionTrabajo="" telefonos="" aEconomico="" >Papa</a></td>
    <td><strong>Madre</strong></td>
    <td><a id="modalMAMA" role="button" onClick="MostrarPadre(0)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" apellido2="" fechaNac="" sexo="0" profesion="" direccion="" comuna="" email="" lugarTrabajo="" direccionTrabajo="" telefonos="" aEconomico="">Mama</a></td>

  </tr>
</table>