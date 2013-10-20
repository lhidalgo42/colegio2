<?php 
include '../../ajax/sessionCheck.php';
iniciarCookie();
verificarIP();
$campos=array(array("inputRUT","rut"),array("inputNombre","nombre"),array("inputApellidoP","apellido1"),array("inputApellidoM","apellido2"),array("inputFechaNac","fechaNac"),array("inputProfesion","profesion"),array("inputDireccion","direccion"),array("inputComuna","comuna"),array("inputEmail","email"),array("inputLugarTrabajo","lugarTrabajo"),array("inputDireccionT","direccionTrabajo"),array("inputTelefonos","telefonos")); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Matriculas</title>
<link rel="stylesheet" href="../../css/bootstrap-combined.min.css">
<link rel="stylesheet" href="../../css/bootstrap-formhelpers.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.en_US.js"></script>
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
input{
text-transform:uppercase;	
}
</style>
</head>

<body onLoad="setInterval('bodyfuntion()',1000);">
<div class="container-fluid">
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
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
function enviar()
{
var familia = new Array();
familia[0] = $("#familia").val();
familia[1] = $("#AEconomico").children(".active").html()
var papa = new Array();
var mama = new Array();
<?php $alumnos= array("rut","name","Curso","bolM","montoM","fechaM","valeS","tipo","nombre","valor","fechaS","1sem","2sem"); ?>
<?php for($i=0;$i<12;$i++){?> 
 papa[<?php echo $i; ?>] = $("#modalPAPA").attr("<?php echo $campos[$i][1]; ?>");
 mama[<?php echo $i; ?>] = $("#modalMAMA").attr("<?php echo $campos[$i][1]; ?>");<?php }?> 
 <?php for($i=1;$i<5;$i++){ ?>
 var alumno<?php echo $i; ?> = new Array();
 <?php for($b=0;$b<13;$b++){ ?>
 <?php if($b==7 || $b==8 || $b==9){ ?>
 alumno<?php echo $i;?>[<?php echo $b; ?>] = $("#modalC<?php echo $i; ?>").attr("<?php echo $alumnos[$b]; ?>");<?php } //fin if 
  else { ?>
 alumno<?php echo $i;?>[<?php echo $b; ?>] = $("#<?php echo $alumnos[$b];echo $i; ?>").val();<?php } // fin else ?> 
 <?php } // fin for b ?>
 <?php } // fin for i?>
 var alumnos = new Array();
 <?php for($i=0;$i<4;$i++){
	 $b=$i+1;?> 
  alumnos[<?php echo $i; ?>]=alumno<?php echo $b; ?>;
<?php } ?>
 <?php $documentos=array("FechaBol","tipo","chequebanco","chequenumero","chequemonto","chequefecha","letranumero","letramonto","efectivomonto","Col","Mat","Cou","Alm","Deu","fechaD","obs");
  for($i=1;$i<13;$i++){ ?>
  var documento<?php echo $i; ?> = new Array();
  <?php for($b=0;$b<16;$b++){ ?>
  <?php if($b==1 || $b==2 || $b==3 || $b==4 || $b==5 || $b==6 || $b==7 || $b==8){ ?>
  documento<?php echo $i;?>[<?php echo $b; ?>] = $("#modalP<?php echo $i; ?>").attr("<?php echo $documentos[$b]; ?>");
  <?php } 
  else{ ?>
  documento<?php echo $i; ?>[<?php echo $b; ?>] = $("#<?php echo $documentos[$b];echo $i; ?>").val();
  <?php } //fin else ?>
  <?php } // fin for b ?>
 <?php } //fin For i?>
  var documentos = new Array();
 <?php for($i=0;$i<12;$i++){
	 $b=$i+1;?> 
  documentos[<?php echo $i; ?>]=documento<?php echo $b; ?>;
<?php } ?>
$.ajax({
  url: "../../ajax/enviar.php",
  data: {familia:familia,papa:papa,mama:mama,alumnos:alumnos,documentos:documentos},
  type: "POST",
  beforeSend: function()
  {
  },
  success: function( data ) {
    $("#ayuda").html(data);
  }
});
} 
/* los 3 modales se llaman de manera diferente, mostrar es la funcion que los abre y carga los atributos guardados en los botones, cerrar() los cierra y limpia el modal y guardar guarda los atributos en el boton y resetea el modal<br>
P es de pagos esta en la tabla Grande<br>
C es de Clinicas esta en la tabla Alumnos
Padres es de la tabla de los padres
*/
function CerrarPapa(){// funcion que restaura el modal y lo deja vacio (datos copias del modalPapa	
$("#bodyPapa").html('<center><div class="control-group"><label class="control-label" for="inputRUT">RUT</label><div class="controls"><input type="text" id="inputRUT" placeholder="Rut" required></div></div><p><center><span id="mensaje2" class="alert-danger"></span></center></p><div class="control-group"><label class="control-label" for="inputNombre">Nombre</label><div class="controls"><input type="text" id="inputNombre" placeholder="Nombre" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputApellidoP">Apellido Paterno</label><div class="controls"><input type="text" id="inputApellidoP" placeholder="Apellido Paterno" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputApellidoM">Apellido Materno</label><div class="controls"><input type="text" id="inputApellidoM" placeholder="Apellido Materno" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputFechaNac">Fecha Nacimiento</label><div class="controls"><input type="date" id="inputFechaNac" placeholder="Fecha Nacimiento" onFocus="verificarRut(inputRUT)" required>   </div></div><div class="control-group"><label class="control-label" for="inputProfesion">Profesión</label><div class="controls"><input type="text" id="inputProfesion" placeholder="Profesion" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputDireccion">Dirección</label><div class="controls"><input type="text" id="inputDireccion" placeholder="Direccion" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputComuna">Comuna</label><div class="controls"><input type="text" id="inputComuna" placeholder="Comuna" onFocus="verificarRut(inputRUT)" required></div></div><div class="control-group"><label class="control-label" for="inputEmail">Email</label><div class="controls"><input type="email" id="inputEmail" placeholder="Email" onFocus="verificarRut(inputRUT)"></div></div><div class="control-group"><label class="control-label" for="inputLugarTrabajo">Lugar de trabajo</label><div class="controls"><input type="text" id="inputLugarTrabajo" placeholder="Lugar de Trabajo" onFocus="verificarRut(inputRUT)"></div> </div><div class="control-group"><label class="control-label" for="inputDireccionT">Direccion Trabajo</label><div class="controls"><input type="text" id="inputDireccionT" placeholder="Direccion Trabajo" onFocus="verificarRut(inputRUT)"></div></div><div class="control-group"><label class="control-label" for="inputTelefonos">Telefonos</label><small>Si es mas de uno, separarlos por coma</small><div class="controls"><input type="text" id="inputTelefonos" placeholder="Telefnonos" onFocus="verificarRut(inputRUT)"></div></div></center>');}
function CerrarC(){
$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoC").html("");	
}

function clickButton(I){
if(I ==0){
$("#AEconomico").children("button:first").addClass("btn-success active");
$("#AEconomico").children("button:last").removeClass("btn-success active");}
if(I==1){
$("#AEconomico").children("button:last").addClass("btn-success active");
$("#AEconomico").children("button:first").removeClass("btn-success active");}	
}


function GuardarPapa(I){
var Nombre = $("#inputNombre").val();
var Apellido = $("#inputApellidoP").val();
	if(I==0){if(Nombre != "" || Apellido != ""){$("#modalMAMA").html(Nombre+" "+Apellido);}
<?php foreach($campos as $campo){?>$("#modalMAMA").attr("<?php echo $campo[1]; ?>",$("#<?php echo $campo[0]; ?>").val());<?php } ?>}
	if(I==1){if(Nombre != "" || Apellido != ""){$("#modalPAPA").html(Nombre+" "+Apellido)}
<?php foreach($campos as $campo){?>$("#modalPAPA").attr("<?php echo $campo[1]; ?>",$("#<?php echo $campo[0]; ?>").val());<?php } ?>}
	CerrarPapa();$('#myModalPapa').modal('hide');}
	
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
	/*
	var monto = parseFloat($("#montoM"+I).attr("valorMonto"));
	var total = ((100-beca)*monto)/100
	$("#montoM"+I).val(total)	
 */}
 function verificarRut( Objeto ) // extre el rut de la casilla y lo verifica atraves del digito verificador(ultimo digito) si el rut es valido o no devuelve true o false
{var tmpstr = "";$('#mensaje').html("");$('#mensaje2').html("");var intlargo = Objeto.value;if (intlargo.length> 0){crut = Objeto.value;largo = crut.length;if ( largo <2 ){$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4><small>");Objeto.focus();return false;}for ( i=0; i <crut.length ; i++ )if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ){tmpstr = tmpstr + crut.charAt(i);}rut = tmpstr;crut=tmpstr;largo = crut.length;if ( largo> 2 )rut = crut.substring(0, largo - 1);		else rut = crut.charAt(0);dv = crut.charAt(largo-1);if ( rut == null || dv == null )return 0;var dvr = '0';suma = 0;mul  = 2;for (i= rut.length-1 ; i>= 0; i--){suma = suma + rut.charAt(i) * mul;if (mul == 7)mul = 2;else mul++;}res = suma % 11;if (res==1)dvr = 'k';else if (res==0)dvr = '0';else{dvi = 11-res;dvr = dvi + "";}if ( dvr != dv.toLowerCase() ){$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4></small>");Objeto.focus();return false;}return true;}}

function sumar(){//variable que suma la totalidad de las columnas del documento
	var cuotas = +$('#cuotas').val();
    var col = 0;
    var mat = 0;
    var cou = 0;
    var alm = 0;
    var deu = 0;
    var totalC1 = 0;
    var totalC2 = 0;
    var totalCol = 0;
    var	totalReal= 0;
    for(var i=1; i< cuotas +1; i++){
    	total1 = 0;
    	total2 = 0;
	   	col = +$('#Col'+i).val() + col;
	   	mat = +$('#Mat'+i).val() + mat;
	   	cou = +$('#Cou'+i).val() + cou;
	   	alm = +$('#Alm'+i).val() + alm;
	   	deu = +$('#Deu'+i).val() + deu;
	   	totalC1 = +$('#Col'+i).val() + +$('#Mat'+i).val() + +$('#Cou'+i).val();
	   	totalC2 = +$('#Alm'+i).val() + +$('#Deu'+i).val();
	   	totalCol = totalC1 + totalC2;
	   	totalReal = totalCol + totalReal
	   	$('#Total'+i).html(totalCol);
	   
	}
    $('#ColT').html(col);
    $('#MatT').html(mat);
    $('#CouT').html(cou);
    $('#AlmT').html(alm);
    $('#DeuT').html(deu);
    $('#TotalT').html(totalReal);
    
}

function bodyfuntion(){//funcion que se ejecuta constantemente en la pagina <body onload"....">
sumar();
$("#familia").val(""+$("#modalPAPA").attr("apellido1")+" "+$("#modalMAMA").attr("apellido1")+"");}

function MostrarC(I){
var tipo =$("#modalC"+I).attr("tipo")
$("#myModalC").children(".modal-body").children("center:last").children(".btn-group").children("button[idval='"+tipo+"']").addClass("active"); 
if(tipo == "OTRA"){
$("#tipoC").html("<center><h4>Ingrese Nombre</h4><br><input id='NombreC' value='"+$("#modalC"+I).attr("nombre")+"' placeholder='Nombre' type='text'><h4>Ingrese Valor</h4><br><input id='MontoC' placeholder='Valor' value='"+$("#modalC"+I).attr("valor")+"' type='number'></center>");}
$("#guardarC").attr("onClick","GuardarC("+I+")")
$('#myModalC').modal('show');
}
function MostrarP(I){
var tipo =$("#modalP"+I).attr("tipo")
$("#myModalP").children(".modal-body").children().children(".btn-group").children("button[idval='"+tipo+"']").addClass("active");
if(tipo == "Cheque"){
	tipoP(1);
	$("#bancoCheque").val($("#modalP"+I).attr("chequebanco"));
	$("#numeroCheque").val($("#modalP"+I).attr("chequenumero"));
	$("#montoCheque").val($("#modalP"+I).attr("chequemonto"));
	$("#fechaCheque").val($("#modalP"+I).attr("chequefecha"));
}
if(tipo == "Letra"){
	tipoP(2);
	$("#numeroLetra").val($("#modalP"+I).attr("letranumero"));
	$("#montoLetra").val($("#modalP"+I).attr("letramonto"));		
	}
if(tipo == "Efectivo"){
	tipoP(3);
	$("#montoEfectivo").val($("#modalP"+I).attr("efectivomonto"));
	}
$("#guardarP").attr("onClick","GuardarP("+I+")")
$('#myModalP').modal('show');
}

function GuardarP(I){
$("#modalP"+I).html($("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").html());
$("#modalP"+I).attr("tipo",$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").attr("idval"));
$("#modalP"+I).attr("chequebanco",$("#bancoCheque").val());
$("#modalP"+I).attr("chequenumero",$("#numeroCheque").val());
$("#modalP"+I).attr("chequemonto",$("#montoCheque").val());
$("#modalP"+I).attr("chequefecha",$("#fechaCheque").val());
$("#modalP"+I).attr("letranumero",$("#numeroLetra").val());
$("#modalP"+I).attr("letramonto",$("#montoLetra").val());
$("#modalP"+I).attr("efectivomonto",$("#montoEfectivo").val());
CerrarP();
$('#myModalP').modal('hide');
}
function GuardarC(I){
var A = $("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").html();
$("#modalC"+I).attr("tipo",$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").attr("idval"));
if($("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").attr("idval")=="OTRA")
{
var A = $("#NombreC").val();
$("#modalC"+I).attr("nombre",$("#NombreC").val());
$("#modalC"+I).attr("valor",$("#MontoC").val());
}
else if($("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").attr("idval")=="CA")
{
$("#modalC"+I).attr("nombre",A);
$("#modalC"+I).attr("valor",42000);
}
else if($("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").attr("idval")=="CSM"){
$("#modalC"+I).attr("nombre",A);
$("#modalC"+I).attr("valor",39000);	
}
$("#modalC"+I).html(A);
CerrarC()
$('#myModalC').modal('hide');
}
function CerrarP(){
$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoP").html("");	
}

function tipoP(I){
if(I == 1){
$("#tipoP").html("<center><h4>Seleccione Banco del Chque</h4><br><select id='bancoCheque'><option></option><option value'ABN AMRO'>ABN AMRO</option><option value='Atlas - Citibank'>Atlas - Citibank</option><option value='BancaFacil'>BancaFacil</option><option  value='Banco Bice'>Banco Bice</option><option value='Banco Central de Chile'>Banco Central de Chile</option><option value='Banco de Chile'>Banco de Chile</option><option  value='Banco de Crédito e Inversiones'>Banco de Crédito e Inversiones</option><option value='Banco del Desarrollo'>Banco del Desarrollo</option><option value='Banco Edwards'>Banco Edwards</option><option value='Banco Falabella'>Banco Falabella</option><option value='Banco Internacional'>Banco Internacional</option><option value='Banco Nova'>Banco Nova</option><option Banco Penta>Banco Penta</option><option value='Banco Santander Santiago'>Banco Santander Santiago</option><option Banco Security>Banco Security</option><option value='BancoEstado'>BancoEstado</option><option value='BBVA'>BBVA</option><option value='Citibank N.A. Chile'>Citibank N.A. Chile</option><option value='Corpbanca'>Corpbanca</option><option value='Credichile'>Credichile</option><option value='Credit Suisse Consultas y Asesorias Limitada'>Credit Suisse Consultas y Asesorias Limitada</option><option value='Deutsche Bank'>Deutsche Bank</option><option value='ING Bank N.V.'>ING Bank N.V.</option><option value='Redbanc'>Redbanc</option><option value='Santander Banefe'>Santander Banefe</option><option value='Scotiabank'>Scotiabank</option><option value='UBS AG in Santiago de Chile'>UBS AG in Santiago de Chile</option></select><h4>Ingrese Numero de Cheque</h4><br><input id='numeroCheque' placeholder='N° Cheque' type='number'><br><h4>Ingrese Monto</h4><br><input id='montoCheque' placeholder='MontoChque' type='number'><br><h4>Fecha de Vencimiento</h4><br><input type='date' id='fechaCheque' placeholder='Fecha de Vencimiento'></center>");
}
if (I == 2){
$("#tipoP").html("<center><h4>Ingrese Numero de Letra</h4><br><input id='numeroLetra' placeholder='N° Letra' type='number'><h4>Ingrese Monto</h4><br><input id='montoLetra' placeholder='Monto' type='number'></center>");
}
if (I == 3){
$("#tipoP").html("<center><h4>Ingrese Monto</h4><br><input id='montoEfectivo' placeholder='Monto' type='number'></center>");
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
$("#tipoC").html("<center><h4>Ingrese Nombre</h4><br><input id='NombreC' placeholder='Nombre' type='text'><h4>Ingrese Valor</h4><br><input id='MontoC' placeholder='Valor' type='number'></center>");
}
}

$('#cuotas').keyup(function(){
  		var cuotas = +$('#cuotas').val();			
		$('#pagoCuotas').html("");
		for(var i=1;i<cuotas+1;i++){
			$('#pagoCuotas').append('<tr><td><input style="width:115px;" type="date" id="FechaBol'+i+'; ?>"></td><td style="width:100px;"><center><a id="modalP'+i+'; ?>" role="button" onClick="MostrarP('+i+')"class="btn" data-toggle="modal" tipo="" chequebanco="" chequenumero="" chequemonto="" chequefecha="" letranumero="" letramonto="" efectivomonto="">Seleccionar</a></center></td><!-- suma desde aqui--><td><input type="number" style="width:80px;" min="0"  value="0" id="Col'+i+'"></td><td><input type="number" style="width:80px;" min="0" value="0" id="Mat'+i+'"></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0" id="Cou'+i+'"></td><td><input type="number" style="width:60px;" min="0" value="0" id="Alm'+i+'" ></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0"  id="Deu'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="Total'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
		}				
	})


</script>
<?php include("modal.php"); ?>
<div id="ayuda"><?php print_r($_SESSION); ?></div>
</body>
</html>