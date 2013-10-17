<table  border="1" class="table table-bordered">
  <tr>
    <td><strong>Familia</strong></td>
    <td><input type="text" id="familia" disabled class="span3"></td>
    <td><strong>Apoderado Economico</strong></td>
    <td>
  <div class="btn-group" id="AEconomico" idModal="" data-toggle="buttons-radio">
  <button type="button" class="btn" onClick="clickButton(0)">Mama</button>
  <button type="button" class="btn" onClick="clickButton(1)">Papa</button>
</div></td>
  </tr>
  <tr>
    <td><strong>Madre</strong></td>
    <td><a id="modalMAMA" role="button" onClick="MostrarPadre(0)" class="btn" data-toggle="modal" rut="" nombre="" apellidoP="" apellidoM="" >Mama</a></td>
    <td>Padre</td>
    <td><a id="modalPAPA" role="button" onClick="MostrarPadre(1)" class="btn" data-toggle="modal">Papa</a></td>
  </tr>
</table>