// funciones de Pago
function tipoP(I){
	if(I == 1){
		$('#tipoP1').css('display','block');
		$('#tipoP2').css('display','none');
		$('#tipoP3').css('display','none');
	}
	if (I == 2){
		$('#tipoP1').css('display','none');
		$('#tipoP2').css('display','block');
		$('#tipoP3').css('display','none');
	}
	if (I == 3){
		$('#tipoP1').css('display','none');
		$('#tipoP2').css('display','none');
		$('#tipoP3').css('display','block');
	}
}
function CerrarP(){
	$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
	$('#tipoP1').css('display','none');
	$('#tipoP2').css('display','none');
	$('#tipoP3').css('display','none');
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