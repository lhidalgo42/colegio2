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
	$("#bancoCheque").val("");
	$("#numeroCheque").val("");
	$("#montoCheque").val("");		
	$('#tipoP2').css('display','none');
	$("#numeroLetra").val("");
	$("#montoLetra").val("");
	$('#tipoP3').css('display','none');
	$("#montoEfectivo").val("");
	$("#copiar").css('display','none');
}
function GuardarP(I){
	$("#modalP"+I).html($("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").html());
	$("#modalP"+I).attr("tipo",$("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").attr("idval"));
	if($("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Cheque"){
	$("#modalP"+I).attr("banco",$("#bancoCheque").val());
	$("#modalP"+I).attr("numero",$("#numeroCheque").val());
	$("#modalP"+I).attr("monto",$("#montoCheque").val());
	}
	else if ($("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Letra"){
	$("#modalP"+I).attr("banco","");
	$("#modalP"+I).attr("numero",$("#numeroLetra").val());
	$("#modalP"+I).attr("monto",$("#montoLetra").val());
	}
	else if ($("#myModalP").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Efectivo"){
	$("#modalP"+I).attr("banco","");
	$("#modalP"+I).attr("numero","");
	$("#modalP"+I).attr("monto",$("#montoEfectivo").val());
	}
	CerrarP();
	$('#myModalP').modal('hide');
}
function MostrarP(I){
var tipo =$("#modalP"+I).attr("tipo")
$("#myModalP").children(".modal-body").children().children(".btn-group").children("button[idval='"+tipo+"']").addClass("active");
if(tipo == "Cheque"){
	tipoP(1);
	$("#bancoCheque").val($("#modalP"+I).attr("banco"));
	$("#numeroCheque").val($("#modalP"+I).attr("numero"));
	$("#montoCheque").val($("#modalP"+I).attr("monto"));
}
if(tipo == "Letra"){
	tipoP(2);
	$("#numeroLetra").val($("#modalP"+I).attr("numero"));
	$("#montoLetra").val($("#modalP"+I).attr("monto"));		
	}
if(tipo == "Efectivo"){
	tipoP(3);
	$("#montoEfectivo").val($("#modalP"+I).attr("efectivo"));
	}
if(I != 1)
{
	var A=I-1;
$("#copiar").children("button").attr("onClick","copiar("+A+")")
$("#copiar").css('display','block');	
}
$("#formP").attr("action","javascript:GuardarP("+I+")")
$('#myModalP').modal('show');
}
function copiar(I){
	A=I+1;
var tipo = $("#modalP"+I).attr("tipo");	
$("#myModalP").children(".modal-body").children().children(".btn-group").children("button[idval='"+tipo+"']").addClass("active");
if(tipo == "Cheque"){
	tipoP(1);
	$("#bancoCheque").val($("#modalP"+I).attr("banco"));
	$("#modalP"+A).attr("banco",$("#modalP"+I).attr("banco"))
	$("#numeroCheque").val(+$("#modalP"+I).attr("numero")+1);
	$("#modalP"+A).attr("banco",+$("#modalP"+I).attr("numero")+1)
	$("#montoCheque").val($("#modalP"+I).attr("monto"));
	$("#modalP"+A).attr("banco",$("#modalP"+I).attr("monto"))
}
if(tipo == "Letra"){
	tipoP(2);
	$("#numeroLetra").val(+$("#modalP"+I).attr("numero")+1);
	$("#modalP"+A).attr("banco",+$("#modalP"+I).attr("numero")+1)
	$("#montoLetra").val($("#modalP"+I).attr("monto"));	
	$("#modalP"+A).attr("banco",$("#modalP"+I).attr("monto"))	
	}
if(tipo == "Efectivo"){
	tipoP(3);
	$("#montoEfectivo").val($("#modalP"+I).attr("efectivo"));
	$("#modalP"+A).attr("banco",$("#modalP"+I).attr("efectivo"))
	}
}