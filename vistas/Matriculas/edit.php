<?php 
include '../../ajax/sessionCheck.php';
include '../../datos/Select.php';
iniciarCookie();
verificarIP(); ?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>Matriculas</title>
    <link rel="stylesheet" href="../../css/bootstrap-combined.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button,
        input[type=date]::-webkit-inner-spin-button,
        input[type=date]::-webkit-outer-spin-button,
        input[type=date]::-webkit-writing-mode{
            -webkit-appearance: none;
            margin: 0;
        }
        body {
            font-style:italic;
            font-weight:bold;
            font-size:1em;
        }
        input{
            text-transform:uppercase;
        }
        .modal{
            width: 600px;
        }

        .pago{
            display: none;
            margin-top: 10px;
        }

        .pagosContainer{
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <!-- <script>
    $(function() {
        $('input').keyup(function() {
            this.value = this.value.toUpperCase();
        });
    });
    </script> -->
</head>
<body>
<div class="container-fluid">
<form action="javascript:preguntar()">
<!--Despliega Errores-->
<p><span id="mensaje" class="alert-danger"></span></p><br>
<div id="padres"><table border="1" class="table table-bordered">
        <tbody><tr>
            <td><strong>Familia</strong></td>
            <td><input type="text" id="familia" disabled="" class="span3"></td>
            <td><strong>Apoderado Economico</strong></td>
            <td>
                <div class="btn-group" id="AEconomico" data-toggle="buttons-radio">
                    <button type="button" class="btn" onclick="clickButton(0)">Papa</button>
                    <button type="button" class="btn" onclick="clickButton(1)">Mama</button>
                </div></td>


        </tr>
        <tr>
            <td><strong>Padre</strong></td>
            <td><a id="modalPAPA" role="button" onclick="MostrarPadre(1)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" apellido2="" fechanac="" sexo="1" profesion="" direccion="" comuna="" email="" lugartrabajo="" direcciontrabajo="" telefonos="" aeconomico="">Papa</a></td>
            <td><strong>Madre</strong></td>
            <td><a id="modalMAMA" role="button" onclick="MostrarPadre(0)" class="btn" data-toggle="modal" rut="" nombre="" apellido1="" apellido2="" fechanac="" sexo="0" profesion="" direccion="" comuna="" email="" lugartrabajo="" direcciontrabajo="" telefonos="" aeconomico="">Mama</a></td>

        </tr>
        </tbody></table></div>
<div class="clearfix"></div>
<div id="ninos"><table border="1" class="table table-bordered" id="tablaAlumnos">
        <thead>
        <tr>
            <td rowspan="2"><center><strong>NOMBRE DE LOS NIÑOS</strong></center></td>
            <td rowspan="2"><center><strong>CURSO</strong></center></td>
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
        <tbody><tr>
            <td class="span2"><a id="modalNino1" role="button" onclick="MostrarNino(1)" class="btn" data-toggle="modal" nombre="" apellidop="" apellidom="" fechanac="" colegioanterior="" almuerzo="" sexo="">Nombre</a></td>

            <td class="span1">
                <select id="Curso1" onchange="curso(1)" class="input-small"><option></option>
                    <option value="Kinder">Kinder</option> <option value="1ro Basico">1ro Basico</option> <option value="2do Basico">2do Basico</option> <option value="3ro Basico">3ro Basico</option> <option value="4to Basico">4to Basico</option> <option value="5to Basico">5to Basico</option> <option value="6to Basico">6to Basico</option> <option value="7mo Basico">7mo Basico</option> <option value="8vo Basico">8vo Basico</option> </select></td>

            <td class="span1"><input type="number" class="span1" min="0" id="bolM1" value="0"></td>

            <td><a id="modalPM1" role="button" onclick="MostrarPM(1)" class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Pago</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateMatricula" id="fechaM1" placeholder="Fecha"></td>

            <td><input type="number" class="span1" min="0" id="valeS1" value="0"></td>

            <td><a id="modalC1" role="button" onclick="MostrarC(1)" class="btn" data-toggle="modal" tipoc="" nombre="" tipop="" banco="" numero="" monto="">Clinica</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateClinica" id="fechaS1" placeholder="Fecha">
            </td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" onchange="beca(1)" id="1sem1" value="0"></div></td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" id="2sem1" value="0"></div></td>

        </tr>
        <tr>
            <td class="span2"><a id="modalNino2" role="button" onclick="MostrarNino(2)" class="btn" data-toggle="modal" nombre="" apellidop="" apellidom="" fechanac="" colegioanterior="" almuerzo="" sexo="">Nombre</a></td>

            <td class="span1">
                <select id="Curso2" onchange="curso(2)" class="input-small"><option></option>
                    <option value="Kinder">Kinder</option> <option value="1ro Basico">1ro Basico</option> <option value="2do Basico">2do Basico</option> <option value="3ro Basico">3ro Basico</option> <option value="4to Basico">4to Basico</option> <option value="5to Basico">5to Basico</option> <option value="6to Basico">6to Basico</option> <option value="7mo Basico">7mo Basico</option> <option value="8vo Basico">8vo Basico</option> </select></td>

            <td class="span1"><input type="number" class="span1" min="0" id="bolM2" value="0"></td>

            <td><a id="modalPM2" role="button" onclick="MostrarPM(2)" class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Pago</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateMatricula" id="fechaM2" placeholder="Fecha"></td>

            <td><input type="number" class="span1" min="0" id="valeS2" value="0"></td>

            <td><a id="modalC2" role="button" onclick="MostrarC(2)" class="btn" data-toggle="modal" tipoc="" nombre="" tipop="" banco="" numero="" monto="">Clinica</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateClinica" id="fechaS2" placeholder="Fecha">
            </td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" onchange="beca(2)" id="1sem2" value="0"></div></td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" id="2sem2" value="0"></div></td>

        </tr>
        <tr>
            <td class="span2"><a id="modalNino3" role="button" onclick="MostrarNino(3)" class="btn" data-toggle="modal" nombre="" apellidop="" apellidom="" fechanac="" colegioanterior="" almuerzo="" sexo="">Nombre</a></td>

            <td class="span1">
                <select id="Curso3" onchange="curso(3)" class="input-small"><option></option>
                    <option value="Kinder">Kinder</option> <option value="1ro Basico">1ro Basico</option> <option value="2do Basico">2do Basico</option> <option value="3ro Basico">3ro Basico</option> <option value="4to Basico">4to Basico</option> <option value="5to Basico">5to Basico</option> <option value="6to Basico">6to Basico</option> <option value="7mo Basico">7mo Basico</option> <option value="8vo Basico">8vo Basico</option> </select></td>

            <td class="span1"><input type="number" class="span1" min="0" id="bolM3" value="0"></td>

            <td><a id="modalPM3" role="button" onclick="MostrarPM(3)" class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Pago</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateMatricula" id="fechaM3" placeholder="Fecha"></td>

            <td><input type="number" class="span1" min="0" id="valeS3" value="0"></td>

            <td><a id="modalC3" role="button" onclick="MostrarC(3)" class="btn" data-toggle="modal" tipoc="" nombre="" tipop="" banco="" numero="" monto="">Clinica</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateClinica" id="fechaS3" placeholder="Fecha">
            </td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" onchange="beca(3)" id="1sem3" value="0"></div></td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" id="2sem3" value="0"></div></td>

        </tr>
        <tr>
            <td class="span2"><a id="modalNino4" role="button" onclick="MostrarNino(4)" class="btn" data-toggle="modal" nombre="" apellidop="" apellidom="" fechanac="" colegioanterior="" almuerzo="" sexo="">Nombre</a></td>

            <td class="span1">
                <select id="Curso4" onchange="curso(4)" class="input-small"><option></option>
                    <option value="Kinder">Kinder</option> <option value="1ro Basico">1ro Basico</option> <option value="2do Basico">2do Basico</option> <option value="3ro Basico">3ro Basico</option> <option value="4to Basico">4to Basico</option> <option value="5to Basico">5to Basico</option> <option value="6to Basico">6to Basico</option> <option value="7mo Basico">7mo Basico</option> <option value="8vo Basico">8vo Basico</option> </select></td>

            <td class="span1"><input type="number" class="span1" min="0" id="bolM4" value="0"></td>

            <td><a id="modalPM4" role="button" onclick="MostrarPM(4)" class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Pago</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateMatricula" id="fechaM4" placeholder="Fecha"></td>

            <td><input type="number" class="span1" min="0" id="valeS4" value="0"></td>

            <td><a id="modalC4" role="button" onclick="MostrarC(4)" class="btn" data-toggle="modal" tipoc="" nombre="" tipop="" banco="" numero="" monto="">Clinica</a></td>

            <td>
                <input type="date" style="width:115px;" class="fixedDateClinica" id="fechaS4" placeholder="Fecha">
            </td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" onchange="beca(4)" id="1sem4" value="0"></div></td>

            <td><div class="input-prepend">
                    <span class="add-on">%</span>
                    <input type="number" style="width:30px;" max="100" min="0" id="2sem4" value="0"></div></td>

        </tr>
        </tbody><tfoot>
        <tr>
            <td colspan="2"></td><td>Total</td><td>Valor</td>
            <td colspan="1"></td><td>Total</td><td>Valor</td>
            <td colspan="3"></td>
        </tr>
        </tfoot>
    </table></div>
<div class="clearfix"></div>
<div id="coutaIncorporacion" class="pagosContainer">
    <div><input type="button" id="cIncBtn" class="btn btn-block btn-large" value="PAGAR CUOTA INCORPORACION"></div>
    <div id="cInc" class="pago"><div class="span2"> N° DE PAGO Cuota Incorporación (1-20)</div>
        <div class="span4">
            <input type="number" id="cuotaInc" maxlength="2" value="0">
        </div><div class="span1" id="valor">0 UF</div><div class="span2" id="uf" iduf="" uf=""> Valor UF . </div><div class="2" id="hoy">11 de Noviembre del 2013</div>
        <table width="100%" border="1" class="table table-bordered" id="tablaCuotaINC">
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
        </table></div>
</div>
<div id="documentos" class="pagosContainer">
    <div><input type="button" id="cDocBtn" value="PAGAR DOCUMENTOS" class="btn btn-block btn-large"></div>
    <div id="cDoc" class="pago"><div class="span2"> N° DE PAGOS (1-20)</div>
        <div class="span4">
            <input type="number" id="cuotas" maxlength="2" value="0">
        </div>


        <table width="100%" border="1" class="table table-bordered" id="tablaDocs">
            <thead>
            <tr>
                <td colspan="13"><center><strong>DOCUMENTOS GIRADOS O ACEPTADOS POR EL APODERADO POR CUOTAS REGULARES MENSUALES</strong></center></td>
            </tr>
            <tr>
                <td rowspan="2"><center>N° Boleta</center></td>
                <td rowspan="2"><center>Vencimiento</center></td>
                <td rowspan="2"><center>Cheque - Letra Mandado Tipo/Detalle Documento N°</center></td>
                <td colspan="4"><center><strong>COMPONENTES DEL MONTO (PESOS)</strong></center></td>
                <td rowspan="2"><center>FECHA DE DEPOSITO</center></td>
                <td rowspan="2"><center>OBSERVACIONES</center></td>
            </tr>
            <tr>

                <td><center>Colegiatura</center></td>
                <td><center>Materiales</center></td>
                <td><center>Deuda Escolar 2013</center></td>
                <td><center>Total</center></td>
            </tr>
            </thead>
            <tbody id="pagoCuotas"></tbody>
            <tfoot>
            <tr>
                <td height="38" colspan="3"><center><strong>Totales :</strong></center></td>
                <td><center><div id="ColT"></div></center></td>
                <td><center><div id="MatT"></div></center></td>
                <td><center><div id="DeuT"></div></center></td>
                <td><center><div id="TotalT"></div></center></td>
            </tr>
            </tfoot>
        </table><br></div>
</div>
<div id="almuerzos" class="pagosContainer">
    <div><input type="button" id="cAlmBtn" class="btn btn-block btn-large" value="PAGAR ALMUERZOS"></div>
    <div id="cAlm" class="pago"><div class="span2"> Nº DE PAGOS (1-20)</div>
        <div class="span4">
            <input type="number" id="almuerzoCuotas" maxlength="2" value="0">
        </div>
        <table width="100%" border="1" class="table table-bordered" id="tablaCuotaAlm">
            <thead>
            <tr>
                <td colspan="13"><center><strong>PAGOS DE ALMUERZOS</strong></center></td>
            </tr>
            <tr>
                <td rowspan="2"><center>N° Boleta</center></td>
                <td rowspan="2"><center>Vencimiento</center></td>
                <td rowspan="2"><center>Cheque - Letra Mandado Tipo/Detalle Documento N°</center></td>
                <td></td>
                <td rowspan="2"><center>FECHA DE DEPOSITO</center></td>
                <td rowspan="2"><center>OBSERVACIONES</center></td>
            </tr>
            <tr>

                <td><center>Costo Almuerzo</center></td>
            </tr>
            </thead>
            <tbody id="pagoCuotasAlm"></tbody>
            <tfoot>
            <tr>
                <td height="38" colspan="3"><center><strong>Totales :</strong></center></td>
                <td><center><div id="CouTAlm">0</div></center></td>
            </tr>
            </tfoot>
        </table></div>
</div>
<button type="submit" class="btn btn-success btn-block btn-large"><strong>Siguente</strong></button>
</form>
</div>

<script src="../../js/Matriculas/pagos.js"></script>
<script src="../../js/Matriculas/clinicas.js"></script>
<script src="../../js/Matriculas/papa.js"></script>
<script src="../../js/Matriculas/nino.js"></script>
<script src="../../js/Matriculas/utilidades.js"></script>
<script src="../../js/Matriculas/precios.js"></script>
<script src="../../js/Matriculas/validacion.js"></script>

<script>

    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var f=new Date();
    $("#hoy").html(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
    var fechaPago = f.getFullYear() + 1;
    $(".fixedDateClinica").val(fechaPago+"-03-15");
    $(".fixedDateMatricula").val(fechaPago+"-01-07");
    $("#cIncBtn").click(function() { $("#cInc").slideToggle() });
    $("#cDocBtn").click(function() { $("#cDoc").slideToggle() });
    $("#cAlmBtn").click(function() { $("#cAlm").slideToggle() });
    function preguntar(){
        confirmar=confirm("¿Esta seguro que desea continuar?");
        if (confirmar){
            siguente()
        }
    }
    $(document).ready(function(){
        $("input").change(
            function(){
                var id = $(this.id)
                alert(id)
                $("#ayuda").html(id)


            }
        );
    });

</script>
<div id="myModalP" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4>Cheque - Letra Mandado Tipo/Detalle Documento N°</h4>
    </div>
    <div class="modal-body">
        <div id="copiar" class="pull-right" style="display:none;"><button type="button" class="btn" onclick="copiar()">Copiar datos anteriores</button></div><br>
        <br>

        <center><h4>Seleccione</h4></center>
        <center><div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn btn-primary" onclick="tipoP(1)" idval="Cheque">Cheque</button>
                <button type="button" class="btn btn-primary" onclick="tipoP(2)" idval="Letra">Letra</button>
                <button type="button" class="btn btn-primary" onclick="tipoP(3)" idval="Efectivo">Efectivo/Deposito</button>
            </div></center>
        <div id="tipoP" class="form-horizontal">
            <div id="tipoP1" style="display: none;">
                <center>
                    <h4>Seleccione Banco del Chque</h4>
                    <br>
                    <select id="bancoCheque">
                        <option></option>
                        <option value="1">Bci&nbsp;</option>
                        <option value="2">Chile&nbsp;</option>
                        <option value="3">Estado&nbsp;</option>
                        <option value="4">Santander&nbsp;</option>
                        <option value="5">BICE&nbsp;</option>
                        <option value="6">BBVA&nbsp;</option>
                        <option value="7">CrediChile&nbsp;</option>
                        <option value="8">Desarrollo&nbsp;</option>
                        <option value="9">Edwards Citi&nbsp;</option>
                        <option value="10">Falabella&nbsp;</option>
                        <option value="11">Itaú&nbsp;</option>
                        <option value="12">Paris&nbsp;</option>
                        <option value="13">Ripley&nbsp;</option>
                        <option value="14">Security&nbsp;</option>
                        <option value="15">CorpBanca&nbsp;</option>
                        <option value="16">Scotiabank&nbsp;</option>
                        <option value="17">TBanc&nbsp;</option>
                    </select>
                    <h4>Ingrese Numero de Cheque</h4>
                    <br>
                    <input id="numeroCheque" placeholder="N° Cheque" type="number">
                    <br>
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoCheque" placeholder="MontoChque" type="number">
                </center>
            </div>
            <div id="tipoP2" style="display: none;">
                <center>
                    <h4>Ingrese Numero de Letra</h4>
                    <br>
                    <input id="numeroLetra" placeholder="N° Letra" type="number">
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoLetra" placeholder="Monto" type="number">
                </center>
            </div>
            <div id="tipoP3" style="display: none;">
                <center>
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoEfectivo" placeholder="Monto" type="number">
                </center>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success" id="guardarP" onclick="GuardarP()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarP" class="btn" onclick="CerrarP()">Cerrar</a>
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
        <center><div class="btn-group" data-toggle="buttons-radio" id="tipoc">
                <button type="button" class="btn btn-primary" onclick="tipoC(1)" idval="CA">Clinica Alemana</button>
                <button type="button" class="btn btn-primary" onclick="tipoC(2)" idval="CSM">Clinica Santa Maria</button>
                <button type="button" class="btn btn-primary" onclick="tipoC(3)" idval="OTRA">OTRA</button>
            </div></center><br>
        <br>

        <center><div class="btn-group" data-toggle="buttons-radio" id="tipop">
                <button type="button" class="btn btn-primary" onclick="tipoPC(1)" idval="Cheque">Cheque</button>
                <button type="button" class="btn btn-primary" onclick="tipoPC(2)" idval="Letra">Letra</button>
                <button type="button" class="btn btn-primary" onclick="tipoPC(3)" idval="Efectivo">Efectivo/Deposito</button>
            </div></center><br>
        <br>

        <div class="form-horizontal">
            <div id="tipoC"></div>
            <div id="tipoPC1" style="display: none;">

                <center>
                    <div class="control-group">
                        <label class="control-label" for="bancoChequeC">Seleccione Banco del Chque</label>
                        <div class="controls">
                            <select id="bancoChequeC" class="span2">
                                <option></option>
                                <option value="1">Bci&nbsp;</option>
                                <option value="2">Chile&nbsp;</option>
                                <option value="3">Estado&nbsp;</option>
                                <option value="4">Santander&nbsp;</option>
                                <option value="5">BICE&nbsp;</option>
                                <option value="6">BBVA&nbsp;</option>
                                <option value="7">CrediChile&nbsp;</option>
                                <option value="8">Desarrollo&nbsp;</option>
                                <option value="9">Edwards Citi&nbsp;</option>
                                <option value="10">Falabella&nbsp;</option>
                                <option value="11">Itaú&nbsp;</option>
                                <option value="12">Paris&nbsp;</option>
                                <option value="13">Ripley&nbsp;</option>
                                <option value="14">Security&nbsp;</option>
                                <option value="15">CorpBanca&nbsp;</option>
                                <option value="16">Scotiabank&nbsp;</option>
                                <option value="17">TBanc&nbsp;</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="numeroChequeC">Ingrese Numero de Cheque</label>
                        <div class="controls">
                            <input id="numeroChequeC" placeholder="N° Cheque" type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="montoChequeC">Ingrese Monto</label>
                        <div class="controls">
                            <input id="montoChequeC" placeholder="Monto Chque" type="number">
                        </div>
                    </div>
                </center>
            </div>
            <div id="tipoPC2" style="display: none;">
                <center>
                    <div class="control-group">
                        <label class="control-label" for="numeroLetraC">Ingrese Numero de Letra</label>
                        <div class="controls">
                            <input id="numeroLetraC" placeholder="N° Letra" type="number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="montoLetraC">Ingrese Monto</label>
                        <div class="controls">
                            <input id="montoLetraC" placeholder="Monto Letra" type="number">
                        </div>
                    </div>
                </center>
            </div>
            <div id="tipoPC3" style="display: none;">
                <div class="control-group">
                    <label class="control-label" for="montoEfectivoC">Ingrese Monto</label>
                    <div class="controls">
                        <input id="montoEfectivoC" placeholder="Monto Efectivo" type="number">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success" id="guardarC" onclick="GuardarC()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarC" class="btn" onclick="CerrarC()">Cerrar</a>
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
                    <input type="text" id="inputRUT" placeholder="Rut" required="">
                </div>
            </div>
            <span id="mensaje2" class="alert-danger"></span>
            <div class="control-group">
                <label class="control-label" for="inputNombre">Nombre</label>
                <div class="controls">
                    <input type="text" id="inputNombre" placeholder="Nombre" onfocus="verificarRut(inputRUT)" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputApellidoP">Apellido Paterno</label>
                <div class="controls">
                    <input type="text" id="inputApellidoP" placeholder="Apellido Paterno" onfocus="verificarRut(inputRUT)" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputApellidoM">Apellido Materno</label>
                <div class="controls">
                    <input type="text" id="inputApellidoM" placeholder="Apellido Materno" onfocus="verificarRut(inputRUT)" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputFechaNac">Fecha Nacimiento</label>
                <div class="controls">
                    <input type="date" id="inputFechaNac" placeholder="Fecha Nacimiento" onfocus="verificarRut(inputRUT)" requiered="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputProfesion">Profesión</label>
                <div class="controls">
                    <input type="text" id="inputProfesion" placeholder="Profesion" onfocus="verificarRut(inputRUT)" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputDireccion">Dirección</label>
                <div class="controls">
                    <input type="text" id="inputDireccion" placeholder="Direccion" onfocus="verificarRut(inputRUT)" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputComuna">Comuna</label>
                <div class="controls">
                    <select id="inputComuna" onfocus="verificar(inputRUT)" required="">
                        <option value=""></option>
                        <option value="1">ALHUE</option>
                        <option value="2">BUIN</option>
                        <option value="3">CALERA DE TANGO</option>
                        <option value="4">CERRILLOS</option>
                        <option value="5">CERRO NAVIA</option>
                        <option value="6">COLINA</option>
                        <option value="7">CONCHALI</option>
                        <option value="8">CURACAVI</option>
                        <option value="9">EL BOSQUE</option>
                        <option value="10">EL MONTE</option>
                        <option value="11">ESTACION CENTRAL</option>
                        <option value="12">HUECHURABA</option>
                        <option value="13">INDEPENDENCIA</option>
                        <option value="14">ISLA DE MAIPO</option>
                        <option value="15">LA CISTERNA</option>
                        <option value="16">LA FLORIDA</option>
                        <option value="17">LA GRANJA</option>
                        <option value="18">LA PINTANA</option>
                        <option value="19">LA REINA</option>
                        <option value="20">LAMPA</option>
                        <option value="21">LAS CONDES</option>
                        <option value="22">LO BARNECHEA</option>
                        <option value="23">LO ESPEJO</option>
                        <option value="24">LO PRADO</option>
                        <option value="25">MACUL</option>
                        <option value="26">MAIPU</option>
                        <option value="27">MARIA PINTO</option>
                        <option value="28">MELIPILLA</option>
                        <option value="29">ÑUÑOA</option>
                        <option value="30">PADRE HURTADO</option>
                        <option value="31">PAINE</option>
                        <option value="32">PEDRO AGUIRRE CERDA</option>
                        <option value="33">PEÑAFLOR</option>
                        <option value="34">PEÑALOLEN</option>
                        <option value="35">PIRQUE</option>
                        <option value="36">PROVIDENCIA</option>
                        <option value="37">PUDAHUEL</option>
                        <option value="38">PUENTE ALTO</option>
                        <option value="39">QUILICURA</option>
                        <option value="40">QUINTA NORMAL</option>
                        <option value="41">RECOLETA</option>
                        <option value="42">RENCA</option>
                        <option value="43">SAN BERNARDO</option>
                        <option value="44">SAN JOAQUIN</option>
                        <option value="45">SAN JOSE DE MAIPO</option>
                        <option value="46">SAN MIGUEL</option>
                        <option value="47">SAN PEDRO</option>
                        <option value="48">SAN RAMON</option>
                        <option value="49">SANTIAGO CENTRO</option>
                        <option value="50">SANTIAGO OESTE</option>
                        <option value="51">SANTIAGO SUR</option>
                        <option value="52">TALAGANTE</option>
                        <option value="53">TIL-TIL</option>
                        <option value="54">VITACURA</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Direccion de Correo</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="email" id="inputEmail" onfocus="verificarRut(inputRUT)">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLugarTrabajo">Lugar de trabajo</label>
                <div class="controls">
                    <input type="text" id="inputLugarTrabajo" placeholder="Lugar de Trabajo" onfocus="verificarRut(inputRUT)">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputDireccionT">Direccion Trabajo</label>
                <div class="controls">
                    <input type="text" id="inputDireccionT" placeholder="Direccion Trabajo" onfocus="verificarRut(inputRUT)">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputTelefonos">Telefonos</label>
                <small>Si es mas de uno, separarlos por coma</small>
                <div class="controls">
                    <input type="text" id="inputTelefonos" placeholder="Telefonos" onfocus="verificarRut(inputRUT)">
                </div>
            </div>
        </center>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success" id="guardarPapa" onclick="GuardarPapa()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarPapa" class="btn" onclick="CerrarPapa()">Cerrar</a>
    </div>
</div>


<div id="myModalNino" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4 id="tittlePapa">Complete los Datos del Alumno</h4>
    </div>
    <div class="modal-body form-horizontal" id="bodyNino">
        <!-- <center><h3><strong>Alumerzos</strong></h3></center>
    <center><div class="btn-group" data-toggle="buttons-checkbox">
      <button type="button" class="btn btn-primary" idval="AL">Lunes</button>
      <button type="button" class="btn btn-primary" idval="AMA">Martes</button>
      <button type="button" class="btn btn-primary"id val="AMI">Miercoles</button>
      <button type="button" class="btn btn-primary" idval="AJ">Jueves</button>
      <button type="button" class="btn btn-primary" idval="AV">Viernes</button>
    </div>
    </center><br>
    <br>-->

        <center>
            <div class="control-group">
                <label class="control-label" for="ANuevo">Alumno Nuevo</label>
                <div class="controls">
                    <div class="btn-group" id="ANuevo" data-toggle="buttons-radio">
                        <button type="button" class="btn btn-success" idval="1">SI</button>
                        <button type="button" class="btn btn-success" idval="0">NO</button>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputNombreN">RUT</label>
                <div class="controls">
                    <input type="text" id="inputRutN" placeholder="RUT">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputNombreN">Nombre</label>
                <div class="controls">
                    <input type="text" id="inputNombreN" placeholder="Nombre">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputApellidoPN">Apellido Paterno</label>
                <div class="controls">
                    <input type="text" id="inputApellidoPN" placeholder="Apellido Paterno" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputApellidoMN">Apellido Materno</label>
                <div class="controls">
                    <input type="text" id="inputApellidoMN" placeholder="Apellido Materno" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="SelectSexoMN">Sexo</label>
                <div class="controls">
                    <div class="btn-group" id="SelectSexoMN" data-toggle="buttons-radio">
                        <button type="button" class="btn" idval="1">Niño</button>
                        <button type="button" class="btn" idval="0">Niña</button>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputFechaNacN">Fecha Nacimiento</label>
                <div class="controls">
                    <input type="date" id="inputFechaNacN" placeholder="Fecha Nacimiento" requiered="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputCPast">Colegio Anterior</label>
                <div class="controls">
                    <input type="text" id="inputCPast" placeholder="Colegio Anterior" required="">
                </div>
            </div>

        </center>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success" id="guardarNino" onclick="GuardarNino()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarNino" class="btn" onclick="CerrarNino()">Cerrar</a>
    </div>
</div>



<div id="myModalPM" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h4>Cheque - Letra Mandado Tipo/Detalle Documento N°</h4>
    </div>
    <div class="modal-body">
        <center><h4>Seleccione</h4></center>
        <center><div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn btn-primary" onclick="tipoPM(1)" idval="Cheque">Cheque</button>
                <button type="button" class="btn btn-primary" onclick="tipoPM(2)" idval="Letra">Letra</button>
                <button type="button" class="btn btn-primary" onclick="tipoPM(3)" idval="Efectivo">Efectivo/Deposito</button>
            </div></center>
        <div id="tipoPM" class="form-horizontal">
            <div id="tipoPM1" style="display: none;">
                <center>
                    <h4>Seleccione Banco del Chque</h4>
                    <br>
                    <select id="bancoChequePM">
                        <option></option>
                        <option value="1">Bci&nbsp;</option>
                        <option value="2">Chile&nbsp;</option>
                        <option value="3">Estado&nbsp;</option>
                        <option value="4">Santander&nbsp;</option>
                        <option value="5">BICE&nbsp;</option>
                        <option value="6">BBVA&nbsp;</option>
                        <option value="7">CrediChile&nbsp;</option>
                        <option value="8">Desarrollo&nbsp;</option>
                        <option value="9">Edwards Citi&nbsp;</option>
                        <option value="10">Falabella&nbsp;</option>
                        <option value="11">Itaú&nbsp;</option>
                        <option value="12">Paris&nbsp;</option>
                        <option value="13">Ripley&nbsp;</option>
                        <option value="14">Security&nbsp;</option>
                        <option value="15">CorpBanca&nbsp;</option>
                        <option value="16">Scotiabank&nbsp;</option>
                        <option value="17">TBanc&nbsp;</option>
                    </select>
                    <h4>Ingrese Numero de Cheque</h4>
                    <br>
                    <input id="numeroChequePM" placeholder="N° Cheque" type="number">
                    <br>
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoChequePM" placeholder="MontoChque" type="number">
                </center>
            </div>
            <div id="tipoPM2" style="display: none;">
                <center>
                    <h4>Ingrese Numero de Letra</h4>
                    <br>
                    <input id="numeroLetraPM" placeholder="N° Letra" type="number">
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoLetraPM" placeholder="Monto" type="number">
                </center>
            </div>
            <div id="tipoPM3" style="display: none;">
                <center>
                    <h4>Ingrese Monto</h4>
                    <br>
                    <input id="montoEfectivoPM" placeholder="Monto" type="number">
                </center>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success" id="guardarPM" onclick="GuardarPM()">Guardar</a>
        <a href="#" data-dismiss="modal" id="cerrarPM" class="btn" onclick="CerrarPM()">Cerrar</a>
    </div>
</div>


;</body></html>