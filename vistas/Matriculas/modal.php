<div id="myModalP" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4>Cheque - Letra Mandado Tipo/Detalle Documento N°</h4>
     </div>
     <div class="modal-body">
         <center><h4>Seleccione</h4></center>
        <center><div class="btn-group" data-toggle="buttons-radio">
  <button type="button" class="btn btn-primary" onClick="tipoP(1)" idval="Cheque">Cheque</button>
  <button type="button" class="btn btn-primary" onClick="tipoP(2)" idval="Letra">Letra</button>
  <button type="button" class="btn btn-primary" onClick="tipoP(3)" idval="Efectivo">Efectivo/Deposito</button>
</div></center>
<div id="tipoP"></div>                
    </div>
    <div class="modal-footer">
        <a  class="btn btn-success" id="guardarP" onClick="GuardarP()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarP" class="btn" onClick="CerrarP()">Cerrar</a>
    </div>
</div>
<!-- datas-->
<div id="myModalC" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4>Seleccione Lugar de Seguro Esclar</h4>
     </div>
     <div class="modal-body">
              <center><h4>Seleccione</h4></center>
        <center><div class="btn-group" data-toggle="buttons-radio">
  <button type="button" class="btn btn-primary" onClick="tipoC(1)" idval="CA">Clinica Alemana</button>
  <button type="button" class="btn btn-primary" onClick="tipoC(2)" idval="CSM">Clinica Santa Maria</button>
  <button type="button" class="btn btn-primary" onClick="tipoC(3)" idval="OTRA">OTRA</button>
</div></center>
<div id="tipoC">
</div>  
     </div>
    <div class="modal-footer">
        <a  class="btn btn-success" id="guardarC" onClick="GuardarC()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarC" class="btn" onClick="CerrarC()">Cerrar</a>
    </div>
</div>

<div id="myModalPapa" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4 id="tittlePapa">Complete los Datos del Papa</h4>
     </div>
     <div class="modal-body" id="bodyPapa">

        <center>
   <div class="control-group">
    <label class="control-label" for="inputRUT">RUT</label>
    <div class="controls">
      <input type="text" id="inputRUT" placeholder="Rut" required>
    </div>
  </div>
   <p><center><span id="mensaje2" class="alert-danger"></span></center></p>
  <div class="control-group">
    <label class="control-label" for="inputNombre">Nombre</label>
    <div class="controls">
      <input type="text" id="inputNombre" placeholder="Nombre" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputApellidoP">Apellido Paterno</label>
    <div class="controls">
      <input type="text" id="inputApellidoP" placeholder="Apellido Paterno" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputApellidoM">Apellido Materno</label>
    <div class="controls">
      <input type="text" id="inputApellidoM" placeholder="Apellido Materno" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFechaNac">Fecha Nacimiento</label>
    <div class="controls">
      <input type="date" id="inputFechaNac" placeholder="Fecha Nacimiento" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputProfesion">Profesión</label>
    <div class="controls">
      <input type="text" id="inputProfesion" placeholder="Profesion" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputDireccion">Dirección</label>
    <div class="controls">
      <input type="text" id="inputDireccion" placeholder="Direccion" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputComuna">Comuna</label>
    <div class="controls">
      <input type="text" id="inputComuna" placeholder="Comuna" onFocus="verificarRut(inputRUT)" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="email" id="inputEmail" placeholder="Email" onFocus="verificarRut(inputRUT)">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputLugarTrabajo">Lugar de trabajo</label>
    <div class="controls">
      <input type="text" id="inputLugarTrabajo" placeholder="Lugar de Trabajo" onFocus="verificarRut(inputRUT)">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputDireccionT">Direccion Trabajo</label>
    <div class="controls">
      <input type="text" id="inputDireccionT" placeholder="Direccion Trabajo" onFocus="verificarRut(inputRUT)">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputTelefonos">Telefonos</label>
    <small>Si es mas de uno, separarlos por coma</small>
    <div class="controls">
      <input type="text" id="inputTelefonos" placeholder="Telefnonos" onFocus="verificarRut(inputRUT)">
    </div>
  </div>
        </center>               
    </div>
    <div class="modal-footer">
        <a  class="btn btn-success" id="guardarPapa" onClick="GuardarPapa()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarPapa" class="btn" onClick="CerrarPapa()">Cerrar</a>
    </div>
</div>