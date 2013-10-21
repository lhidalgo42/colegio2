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
<div id="tipoP" class="form-horizontal">
    <div id="tipoP1" style="display: none;">
        <center>
        	<h4>Seleccione Banco del Chque</h4>
        	<br>
            <select id='bancoCheque'>
                <option></option>
                <option value'ABN AMRO'>ABN AMRO</option>
                <option value='Atlas - Citibank'>Atlas - Citibank</option>
                <option value='BancaFacil'>BancaFacil</option>
                <option  value='Banco Bice'>Banco Bice</option>
                <option value='Banco Central de Chile'>Banco Central de Chile</option>
                <option value='Banco de Chile'>Banco de Chile</option>
                <option  value='Banco de Crédito e Inversiones'>Banco de Crédito e Inversiones</option>
                <option value='Banco del Desarrollo'>Banco del Desarrollo</option>
                <option value='Banco Edwards'>Banco Edwards</option>
                <option value='Banco Falabella'>Banco Falabella</option>
                <option value='Banco Internacional'>Banco Internacional</option>
                <option value='Banco Nova'>Banco Nova</option>
                <option Banco Penta>Banco Penta</option>
                <option value='Banco Santander Santiago'>Banco Santander Santiago</option>
                <option Banco Security>Banco Security</option>
                <option value='BancoEstado'>BancoEstado</option>
                <option value='BBVA'>BBVA</option>
                <option value='Citibank N.A. Chile'>Citibank N.A. Chile</option>
                <option value='Corpbanca'>Corpbanca</option>
                <option value='Credichile'>Credichile</option>
                <option value='Credit Suisse Consultas y Asesorias Limitada'>Credit Suisse Consultas y Asesorias Limitada</option>
                <option value='Deutsche Bank'>Deutsche Bank</option>
                <option value='ING Bank N.V.'>ING Bank N.V.</option>
                <option value='Redbanc'>Redbanc</option>
                <option value='Santander Banefe'>Santander Banefe</option>
                <option value='Scotiabank'>Scotiabank</option>
                <option value='UBS AG in Santiago de Chile'>UBS AG in Santiago de Chile</option>
            </select>
            <h4>Ingrese Numero de Cheque</h4>
            <br>
            <input id='numeroCheque' placeholder='N° Cheque' type='number'>
            <br>
            <h4>Ingrese Monto</h4>
            <br>
            <input id='montoCheque' placeholder='MontoChque' type='number'>
            <br>
            <h4>Fecha de Vencimiento</h4>
            <br>
        <input type='date' id='fechaCheque' placeholder='Fecha de Vencimiento'>
    </center>
</div>
<div id="tipoP2" style="display: none;">
    <center>
        <h4>Ingrese Numero de Letra</h4>
        <br>
        <input id='numeroLetra' placeholder='N° Letra' type='number'>
        <h4>Ingrese Monto</h4>
        <br>
        <input id='montoLetra' placeholder='Monto' type='number'>
    </center>
</div>
<div id="tipoP3" style="display: none;">
    <center>
        <h4>Ingrese Monto</h4>
        <br>
        <input id='montoEfectivo' placeholder='Monto' type='number'>
    </center>
</div>	
</div>               
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
<div id="tipoC" class="form-horizontal">
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
     <div class="modal-body form-horizontal" id="bodyPapa">
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
    <div class="bfh-datepicker" data-format="d-m-y" data-date="today">
  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
    <span class="add-on"><i class="icon-calendar"></i></span>
    <input type="text"  id="inputFechaNac" placeholder="Fecha Nacimiento" onFocus="verificarRut(inputRUT)" readonly>
  </div>
  <div class="bfh-datepicker-calendar">
    <table class="calendar table table-bordered">
      <thead>
        <tr class="months-header">
          <th class="month" colspan="4">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
          <th class="year" colspan="3">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
        </tr>
        <tr class="days-header">
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
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
    <label class="control-label" for="inputEmail">Direccion de Correo</label>    
    <div class="controls">
      <div class="input-prepend">
        <span class="add-on"><i class="icon-envelope"></i></span>
        <input type="email" id="inputEmail"  onFocus="verificarRut(inputRUT)">
      </div>      
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
      <input type="text" id="inputTelefonos" placeholder="Telefonos" onFocus="verificarRut(inputRUT)">
    </div>
  </div>
        </center>               
    </div>
    <div class="modal-footer">
        <a  class="btn btn-success" id="guardarPapa" onClick="GuardarPapa()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarPapa" class="btn" onClick="CerrarPapa()">Cerrar</a>
    </div>
</div>


<div id="myModalNino" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4 id="tittlePapa">Complete los Datos del Alumno</h4>
     </div>
     <div class="modal-body form-horizontal" id="bodyNino">

        <center>
  <div class="control-group">
    <label class="control-label" for="inputNombreN">Nombre</label>
    <div class="controls">
      <input type="text" id="inputNombreN" placeholder="Nombre">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputApellidoPN">Apellido Paterno</label>
    <div class="controls">
      <input type="text" id="inputApellidoPN" placeholder="Apellido Paterno" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputApellidoMN">Apellido Materno</label>
    <div class="controls">
      <input type="text" id="inputApellidoMN" placeholder="Apellido Materno" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFechaNacN">Fecha Nacimiento</label>
    <div class="controls">
    <div class="bfh-datepicker" data-format="d-m-y" data-date="18-10-1980">
  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
    <span class="add-on"><i class="icon-calendar"></i></span>
    <input type="text"  id="inputFechaNacN" placeholder="Fecha Nacimiento" readonly>
  </div>
  <div class="bfh-datepicker-calendar">
    <table class="calendar table table-bordered">
      <thead>
        <tr class="months-header">
          <th class="month" colspan="4">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
          <th class="year" colspan="3">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
        </tr>
        <tr class="days-header">
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputColegioPast">Colegio Anterior</label>
    <div class="controls">
      <input type="text" id="inputColegioPast" placeholder="Colegio Anterior" required>
    </div>
  </div>
  
        </center>               
    </div>
    <div class="modal-footer">
        <a  class="btn btn-success" id="guardarNino" onClick="GuardarNino()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarNino" class="btn" onClick="CerrarNino()">Cerrar</a>
    </div>
</div>