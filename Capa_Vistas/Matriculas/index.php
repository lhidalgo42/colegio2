<?php $campos=array(array("inputRUT","rut"),array("inputNombre","nombre"),array("inputApellidoP","apellido1"),array("inputApellidoM","apellido2"),array("inputFechaNac","fechaNac"),array("inputProfesion","profesion"),array("inputDireccion","direccion"),array("inputComuna","comuna"),array("inputEmail","email"),array("inputLugarTrabajo","lugarTrabajo"),array("inputDireccionT","direccionTrabajo"),array("inputTelefonos","telefonos")); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../../css/bootstrap-combined.min.css" rel="stylesheet">
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button,
input[type=date]::-webkit-inner-spin-button,
input[type=date]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
body {
				font-style:italic;
                font-weight:bold;
                font-size:1em;	
}
</style>
</head>

<body onLoad="setInterval('bodyfuntion()',1000);">
<br>
<br>
<br>

<form method="post" action="javascript:enviar()">
<!--Despliega Errores-->
 <p><center><span id="mensaje" class="alert-danger"></span></center></p><br>

<div id="padres">
<?php include("padres.php"); ?>

</div>
<!-- Datos de alumnos-->
<div id="ninos"><center><?php include("Alumnos.php"); ?></center></div>
<!-- fin datos alumnos-->
<br>
<br>
<!-- inicio Documentos -->
<div id="documentos"><?php include("Documentos.php"); ?></div>

</form>

</div>


<script>
function CerrarPapa(){// funcion que restaura el modal y lo deja vacio (datos copias del modalPapa	
$("#bodyPapa").html('<center><div class="control-group"><label class="control-label" for="inputRUT">RUT</label><div class="controls"><input type="text" id="inputRUT" placeholder="Rut" required></div></div><p><center><span id="mensaje2" class="alert-danger"></span></center></p><div class="control-group"><label class="control-label" for="inputNombre">Nombre</label><div class="controls"><input type="text" id="inputNombre" placeholder="Nombre" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputApellidoP">Apellido Paterno</label><div class="controls"><input type="text" id="inputApellidoP" placeholder="Apellido Paterno" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputApellidoM">Apellido Materno</label><div class="controls"><input type="text" id="inputApellidoM" placeholder="Apellido Materno" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputFechaNac">Fecha Nacimiento</label><div class="controls"><input type="date" id="inputFechaNac" placeholder="Fecha Nacimiento" onFocus="verificarRut(inputRUT)" required>   </div></div><div class="control-group"><label class="control-label" for="inputProfesion">Profesión</label><div class="controls"><input type="text" id="inputProfesion" placeholder="Profesion" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputDireccion">Dirección</label><div class="controls"><input type="text" id="inputDireccion" placeholder="Direccion" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputComuna">Comuna</label><div class="controls"><input type="text" id="inputComuna" placeholder="Comuna" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputEmail">Email</label><div class="controls"><input type="email" id="inputEmail" placeholder="Email" onFocus="verificarRut(inputRUT)"></div></div><div class="control-group"><label class="control-label" for="inputLugarTrabajo">Lugar de trabajo</label><div class="controls"><input type="password" id="inputLugarTrabajo" placeholder="Lugar de Trabajo" onFocus="verificarRut(inputRUT)"></div> </div><div class="control-group"><label class="control-label" for="inputDireccionT">Direccion Trabajo</label><div class="controls"><input type="password" id="inputDireccionT" placeholder="Direccion Trabajo" onFocus="verificarRut(inputRUT)"></div></div><div class="control-group"><label class="control-label" for="inputTelefonos">Telefonos</label><small>Si es mas de uno, separarlos por coma</small><div class="controls"><input type="text" id="inputTelefonos" placeholder="Telefnonos" onFocus="verificarRut(inputRUT)"></div></div></center>');}
function GuardarPapa(I){
var Nombre = $("#inputNombre").val();
var Apellido = $("#inputApellidoP").val();
	if(I==0){
$("#modalMAMA").html(Nombre+" "+Apellido)
<?php foreach($campos as $campo){?>
$("#modalMAMA").attr("<?php echo $campo[1]; ?>",$("#<?php echo $campo[0]; ?>").val());
<?php } ?>}
	if(I==1){
$("#modalPAPA").html(Nombre+" "+Apellido)	
<?php foreach($campos as $campo){?>
$("#modalPAPA").attr("<?php echo $campo[1]; ?>",$("#<?php echo $campo[0]; ?>").val());
<?php } ?>}
	CerrarPapa()
	$('#myModalPapa').modal('hide');}
	
function MostrarPadre(I){
$("#guardarPapa").attr("onClick","GuardarPapa("+I+")")
if(I==0){
$("#tittlePapa").html("<center>Complete los Datos de la Madre</center>");
<?php foreach($campos as $campo){?>$("#<?php echo $campo[0]; ?>").val($("#modalMAMA").attr("<?php echo $campo[1]; ?>"));<?php } ?>
}
if(I==1){
$("#tittlePapa").html("<center>Complete los Datos del Padre</center>");
<?php foreach($campos as $campo){?>$("#<?php echo $campo[0]; ?>").val($("#modalPAPA").attr("<?php echo $campo[1]; ?>"));<?php } ?>
}
$('#myModalPapa').modal('show');
}
  function curso(I){
    var curso = $('#Curso'+I).val();
	if(curso == "Kinder"){
	var valor=190000;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
   else if(curso == ""){
	var valor=0;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
 	 else{
	  var valor=200000;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
}
function beca(I){
	var beca = parseFloat($("#1sem"+I).val());
	$("#2sem"+I).val(beca);
	var monto = parseFloat($("#montoM"+I).attr("valorMonto"));
	var total = ((100-beca)*monto)/100
	$("#montoM"+I).val(total)	
}
function verificarRut( Objeto ) // extre el rut de la casilla y lo verifica atraves del digito verificador(ultimo digito) si el rut es valido o no devuelve true o false
{var tmpstr = "";$('#mensaje').html("");$('#mensaje2').html("");var intlargo = Objeto.value;if (intlargo.length> 0){crut = Objeto.value;largo = crut.length;if ( largo <2 ){$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4><small>");Objeto.focus();return false;}for ( i=0; i <crut.length ; i++ )if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ){tmpstr = tmpstr + crut.charAt(i);}rut = tmpstr;crut=tmpstr;largo = crut.length;if ( largo> 2 )rut = crut.substring(0, largo - 1);		else rut = crut.charAt(0);dv = crut.charAt(largo-1);if ( rut == null || dv == null )return 0;var dvr = '0';suma = 0;mul  = 2;for (i= rut.length-1 ; i>= 0; i--){suma = suma + rut.charAt(i) * mul;if (mul == 7)mul = 2;else mul++;}res = suma % 11;if (res==1)dvr = 'k';else if (res==0)dvr = '0';else{dvi = 11-res;dvr = dvi + "";}if ( dvr != dv.toLowerCase() ){$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4></small>");Objeto.focus();return false;}return true;}}
function sumar(I) //variable que suma la totalidad de las columnas del documento
{ var A= parseFloat($("#Col"+I).val())+parseFloat($("#MatK"+I).val())+parseFloat($("#Cou"+I).val())+parseFloat($("#Alm"+I).val())+parseFloat($("#Deu"+I).val());$("#Total"+I).html("<strong>"+A+"</strong>");}function total(I){if(I == "Tot"){var A = parseFloat($("#ColT").children().html())+parseFloat($("#MatKT").children().html())+parseFloat($("#CouT").children().html())+parseFloat($("#AlmT").children().html())+parseFloat($("#DeuT").children().html());$("#TotalT").html("<strong>"+A+"</strong>");}else{var A = + <?php for($i=1;$i<12;$i++){ ?> parseFloat($("#"+I+"<?php echo $i; ?>").val())+<?php }?>parseFloat($("#"+I+"12").val());$("#"+I+"T").html("<strong>"+A+"</strong>");}}function bodyfuntion(){<?php for($i=1;$i<13;$i++){?>sumar(<?php echo $i; ?>);<?php }?>total("Col");total("MatK");total("Cou");total("Deu");total("Alm");total("Tot");$("#familia").val($("#modalPAPA").attr("inputApellidoP")+" "+$("#modalMAMA").attr("inputApellidoP"));}
function MostrarP(I){
$("#guardarP").attr("onClick","Guardar("+I+")")
$('#myModalP').modal('show');
}
function MostrarC(I){
$("#guardarC").attr("onClick","Guardar("+I+")")
$('#myModalC').modal('show');
}
function GuardarP(I){
var A = $("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").html();
$("#modal"+I).html(A);
$("#tipoP").html("");
$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$('#myModalP').modal('hide');
}
function GuardarC(I){
var A = $("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").html();
$("#modal"+I).html(A);
$("#tipoC").html("");
$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$('#myModalC').modal('hide');
}
function CerrarP(){
$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoP").html("");	
}
function CerrarC(){
$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoC").html("");	
}
function tipoP(I){
if(I == 1){
$("#tipoP").html("<center><h4>Seleccione Banco del Chque</h4><br><select><option></option><option value'ABN AMRO'>ABN AMRO</option><option value='Atlas - Citibank'>Atlas - Citibank</option><option value='BancaFacil'>BancaFacil</option><option  value='Banco Bice'>Banco Bice</option><option value='Banco Central de Chile'>Banco Central de Chile</option><option value='Banco de Chile'>Banco de Chile</option><option  value='Banco de Crédito e Inversiones'>Banco de Crédito e Inversiones</option><option value='Banco del Desarrollo'>Banco del Desarrollo</option><option value='Banco Edwards'>Banco Edwards</option><option value='Banco Falabella'>Banco Falabella</option><option value='Banco Internacional'>Banco Internacional</option><option value='Banco Nova'>Banco Nova</option><option Banco Penta>Banco Penta</option><option value='Banco Santander Santiago'>Banco Santander Santiago</option><option Banco Security>Banco Security</option><option value='BancoEstado'>BancoEstado</option><option value='BBVA'>BBVA</option><option value='Citibank N.A. Chile'>Citibank N.A. Chile</option><option value='Corpbanca'>Corpbanca</option><option value='Credichile'>Credichile</option><option value='Credit Suisse Consultas y Asesorias Limitada'>Credit Suisse Consultas y Asesorias Limitada</option><option value='Deutsche Bank'>Deutsche Bank</option><option value='ING Bank N.V.'>ING Bank N.V.</option><option value='Redbanc'>Redbanc</option><option value='Santander Banefe'>Santander Banefe</option><option value='Scotiabank'>Scotiabank</option><option value='UBS AG in Santiago de Chile'>UBS AG in Santiago de Chile</option></select><h4>Ingrese Numero de Cheque</h4><br><input id='numero' placeholder='N° Cheque' type='number'><br><h4>Ingrese Monto</h4><br><input id='monto' placeholder='MontoChque' type='number'><br><h4>Fecha de Vencimiento</h4><br><input type='date' id='fechaCheque' placeholder='Fecha de Vencimiento'></center>");
}
if (I == 2){
$("#tipoP").html("<center><h4>Ingrese Numero de Letra</h4><br><input id='numeroLetra' placeholder='N° Letra' type='number'><h4>Ingrese Monto</h4><br><input id='monto' placeholder='Monto' type='number'></center>");
}
if (I == 3){
$("#tipoP").html("<center><h4>Ingrese Monto</h4><br><input id='monto' placeholder='Monto' type='number'></center>");
}
}
function tipoC(I){
if(I == 1){
$("#tipoC").html("<center>Valor -> 42.000</center>");
}
if (I == 2){
$("#tipoC").html("<center>Valor -> 39.000</center>");
}
if (I == 3)
{
$("#tipoC").html("<center><h4>Ingrese Nombre</h4><br><input id='NombreC' placeholder='Nombre' type='number'><h4>Ingrese Valor</h4><br><input id='MontoC' placeholder='Valor' type='number'></center>");
}
}
enviar()
{
alert("el documento se enviara");
}
</script>
<?php include("modal.php"); ?>
</body>
</html>