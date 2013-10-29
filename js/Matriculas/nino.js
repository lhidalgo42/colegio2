function MostrarNino(I)
{	
	var tipo =$("#modalNino"+I).attr("sexo")
	$("#SelectSexoMN").children("button[idval='"+tipo+"']").addClass("active");
	$("#guardarNino").attr("onClick","GuardarNino("+I+")")
	$("#inputRutN").val($("#modalNino"+I).attr("rut"));
	$("#inputNombreN").val($("#modalNino"+I).attr("nombre"));
	$("#inputApellidoPN").val($("#modalNino"+I).attr("apellidop"));
	$("#inputApellidoMN").val($("#modalNino"+I).attr("apellidom"));
	$("#inputFechaNacN").val($("#modalNino"+I).attr("fechanac"));
	$("#inputCPast").val($("#modalNino"+I).attr("colegioanterior"));
	$('#myModalNino').modal('show');
}
function CerrarNino()
{ 	$("#inputRutN").val('');
	$("#inputNombreN").val('');
	$("#inputApellidoPN").val('');
	$("#inputApellidoMN").val('');
	$("#inputFechaNacN").val('');
	$("#inputCPast").val('');
	$("#SelectSexoMN").children(".active").removeClass("active");
}
function GuardarNino(I)
{
var Nombre = $("#inputNombreN").val();
var Apellido = $("#inputApellidoPN").val();
if(Nombre != "" || Apellido != "")
{
	$("#modalNino"+I).html(Nombre+" "+Apellido);
}
 //$("#modalNino"+I).attr("almuerzo",$("#bodyNino").children().children(".btn-group").children("button[idval='AL']").hasClass("active"));
// $("#modalNino"+I).attr("ama",$("#bodyNino").children().children(".btn-group").children("button[idval='AMA']").hasClass("active"));
 //$("#modalNino"+I).attr("ami",$("#bodyNino").children().children(".btn-group").children("button[idval='AMI']").hasClass("active"));
// $("#modalNino"+I).attr("aj",$("#bodyNino").children().children(".btn-group").children("button[idval='AJ']").hasClass("active"));
 //$("#modalNino"+I).attr("av",$("#bodyNino").children().children(".btn-group").children("button[idval='AV']").hasClass("active"));
 $("#modalNino"+I).attr("rut",$("#inputRutN").val());
 $("#modalNino"+I).attr("nombre",$("#inputNombreN").val());
 $("#modalNino"+I).attr("apellidoP",$("#inputApellidoPN").val());
 $("#modalNino"+I).attr("apellidoM",$("#inputApellidoMN").val());
 $("#modalNino"+I).attr("fechanac",$("#inputFechaNacN").val());
 $("#modalNino"+I).attr("colegioanterior",$("#inputCPast").val());
 $("#modalNino"+I).attr("sexo",$("#SelectSexoMN").children(".active").attr("idval"));
$('#myModalNino').modal('hide');
 CerrarNino()
}
function tipoPM(I){
	if(I == 1){
		$('#tipoPM1').css('display','block');
		$('#tipoPM2').css('display','none');
		$('#tipoPM3').css('display','none');
	}
	if (I == 2){
		$('#tipoPM1').css('display','none');
		$('#tipoPM2').css('display','block');
		$('#tipoPM3').css('display','none');
	}
	if (I == 3){
		$('#tipoPM1').css('display','none');
		$('#tipoPM2').css('display','none');
		$('#tipoPM3').css('display','block');
	}
}
function CerrarPM(){
	$("#myModalPM").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
	$('#tipoPM1').css('display','none');
	$("#bancoChequePM").val("");
	$("#numeroChequePM").val("");
	$("#montoChequePM").val("");		
	$('#tipoPM2').css('display','none');
	$("#numeroLetraPM").val("");
	$("#montoLetraPM").val("");
	$('#tipoPM3').css('display','none');
	$("#montoEfectivoPM").val("");
}
function GuardarPM(I){
	$("#modalPM"+I).html($("#mymodalPM").children(".modal-body").children().children(".btn-group").children(".active").html());
	$("#modalPM"+I).attr("tipo",$("#myModalPM").children(".modal-body").children().children(".btn-group").children(".active").attr("idval"));
	if($("#myModalPM").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Cheque"){
	$("#modalPM"+I).attr("banco",$("#bancoChequePM").val());
	$("#modalPM"+I).attr("numero",$("#numeroChequePM").val());
	$("#modalPM"+I).attr("monto",$("#montoChequePM").val());
	}
	else if ($("#myModalPM").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Letra"){
	$("#modalPM"+I).attr("banco","");
	$("#modalPM"+I).attr("numero",$("#numeroLetraPM").val());
	$("#modalPM"+I).attr("monto",$("#montoLetraPM").val());
	}
	else if ($("#myModalPM").children(".modal-body").children().children(".btn-group").children(".active").attr("idval") == "Efectivo"){
	$("#modalPM"+I).attr("banco","");
	$("#modalPM"+I).attr("numero","");
	$("#modalPM"+I).attr("monto",$("#montoEfectivoPM").val());
	}
	CerrarPM();
	$('#myModalPM').modal('hide');
}
function MostrarPM(I){
var tipo =$("#modalPM"+I).attr("tipo")
$("#myModalPM").children(".modal-body").children().children(".btn-group").children("button[idval='"+tipo+"']").addClass("active");
if(tipo == "Cheque"){
	tipoPM(1);
	$("#bancoChequePM").val($("#modalPM"+I).attr("banco"));
	$("#numeroChequePM").val($("#modalPM"+I).attr("numero"));
	$("#montoChequePM").val($("#modalPM"+I).attr("monto"));
}
if(tipo == "Letra"){
	tipoPM(2);
	$("#numeroLetraPM").val($("#modalPM"+I).attr("numero"));
	$("#montoLetraPM").val($("#modalPM"+I).attr("monto"));		
	}
if(tipo == "Efectivo"){
	tipoPM(3);
	$("#montoEfectivoPM").val($("#modalPM"+I).attr("efectivo"));
	}
$("#guardarPM").attr("onClick","GuardarPM("+I+")")
$('#myModalPM').modal('show');
	
}