// Funciones de la Clinica
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
function CerrarC(){
$("#myModalC").children(".modal-body").children().children(".btn-group").children(".active").removeClass("active");
$("#tipoC").html("");	
}