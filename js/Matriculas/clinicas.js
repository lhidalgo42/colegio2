// Funciones de la Clinica
function tipoPC(I){
	if(I == 1){
		$('#tipoPC1').css('display','block');
		$('#tipoPC2').css('display','none');
		$('#tipoPC3').css('display','none');
	}
	if (I == 2){
		$('#tipoPC1').css('display','none');
		$('#tipoPC2').css('display','block');
		$('#tipoPC3').css('display','none');
	}
	if (I == 3){
		$('#tipoPC1').css('display','none');
		$('#tipoPC2').css('display','none');
		$('#tipoPC3').css('display','block');
	}
}
function tipoC(I){
if(I == 1){
$("#montoEfectivoC").val(42000);
$("#montoLetraC").val(42000);
$("#montoChequeC").val(42000);
$("#tipoC").html("");
}
if (I == 2){
$("#montoEfectivoC").val(39000);
$("#montoLetraC").val(39000);
$("#montoChequeC").val(39000);
$("#tipoC").html("");
}
if (I == 3){
$("#tipoC").html("<div class='control-group'><label class='control-label' for='NombreC'>Ingrese Nombre de la Clinica</label> <div class='controls'><input type='text' id='NombreC' placeholder='Nombre'></div></div>");
$("#montoEfectivoC").val("");
$("#montoLetraC").val("");
$("#montoChequeC").val("");
}
}
function MostrarC(I){
var tipo =$("#modalC"+I).attr("tipoc")
$("#myModalC").children(".modal-body").children("center:last").children(".btn-group").children("button[idval='"+tipo+"']").addClass("active"); 
if(tipo == "OTRA"){
$("#tipoC").html("<div class='control-group'><label class='control-label' for='NombreC'>Ingrese Nombre de la Clinica</label> <div class='controls'><input type='text' id='NombreC' value='"+$("#modalC"+I).attr("nombre")+"' placeholder='Nombre'></div></div>");}
$("#formC").attr("actiom","javascript:GuardarC("+I+")")
$('#myModalC').modal('show');
}
function GuardarC(I){
var A = $("#tipoc").children(".active").html();
$("#modalC"+I).attr("tipoc",$("#tipoc").children(".active").attr("idval"));
var B = $("#tipop").children(".active").html();
$("#modalC"+I).attr("tipop",$("#tipop").children(".active").attr("idval"));

if($("#tipoc").children(".active").attr("idval")=="OTRA")
{
var A = $("#NombreC").val();
$("#modalC"+I).attr("nombre",$("#NombreC").val());
}
else if($("#tipoc").children(".active").attr("idval")=="CA")
{
$("#modalC"+I).attr("nombre",A);
}
else if($("#tipoc").children(".active").attr("idval")=="CSM"){
$("#modalC"+I).attr("nombre",A);
}
if($("#tipop").children(".active").attr("idval") == "Cheque"){
	$("#modalC"+I).attr("banco",$("#bancoChequeC").val());
	$("#modalC"+I).attr("numero",$("#numeroChequeC").val());
	$("#modalC"+I).attr("monto",$("#montoChequeC").val());
	}
	else if ($("#tipop").children(".active").attr("idval") == "Letra"){
	$("#modalC"+I).attr("banco","");
	$("#modalC"+I).attr("numero",$("#numeroLetraC").val());
	$("#modalC"+I).attr("monto",$("#montoLetraC").val());
	}
	else if ($("#tipop").children(".active").attr("idval") == "Efectivo"){
	$("#modalC"+I).attr("banco","");
	$("#modalC"+I).attr("numero","");
	$("#modalC"+I).attr("monto",$("#montoEfectivoC").val());
	}
$("#modalC"+I).html(A);
CerrarC()
$('#myModalC').modal('hide');
}
function CerrarC(){
    $("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
    $('#tipoPC1').css('display','none');
    $("#bancoChequeC").val("");
    $("#numeroChequeC").val("");
    $("#montoChequeC").val("");
    $('#tipoPC2').css('display','none');
    $("#numeroLetraC").val("");
    $("#montoLetraC").val("");
    $('#tipoPC3').css('display','none');
    $("#montoEfectivoC").val("");
    $("#tipoC").html("");
}