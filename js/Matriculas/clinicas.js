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
if (I == 3)
{
$("#tipoC").html("<div class='control-group'><label class='control-label' for='NombreC'>Ingrese Nombre de la Clinica</label> <div class='controls'><input type='text' id='NombreC' placeholder='Nombre'></div></div>");
$("#montoEfectivoC").val("");
$("#montoLetraC").val("");
$("#montoChequeC").val("");    
}
}
function MostrarC(I){
var tipo =$("#modalC"+I).attr("tipo")
$("#myModalC").children(".modal-body").children("center:last").children(".btn-group").children("button[idval='"+tipo+"']").addClass("active"); 
if(tipo == "OTRA"){
$("#tipoC").html("<center><h4>Ingrese Nombre</h4><br><input id='NombreC' value='"+$("#modalC"+I).attr("nombre")+"' placeholder='Nombre' type='text'><h4>Ingrese Valor</h4><br><input id='MontoC' placeholder='Valor' value='"+$("#modalC"+I).attr("valor")+"' type='number'></center>");}
$("#guardarC").attr("onClick","GuardarC("+I+")")
$('#myModalC').modal('show');
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
function CerrarC(){
$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoC").html("");	
}