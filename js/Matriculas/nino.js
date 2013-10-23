function MostrarNino(I)
{
	$("#guardarNino").attr("onClick","GuardarNino("+I+")")
	$("#inputNombreN").val($("#modalNino"+I).attr("nombre"));
	$("#inputApellidoPN").val($("#modalNino"+I).attr("apellidop"));
	$("#inputApellidoMN").val($("#modalNino"+I).attr("apellidom"));
	$("#inputFechaNacN").val($("#modalNino"+I).attr("fechanac"));
	$("#inputColegioPast").val($("#modalNino"+I).attr("colegioanterior"));
	$('#myModalNino').modal('show');
}
function CerrarNino()
{
	$("#inputNombreN").val('');
	$("#inputApellidoPN").val('');
	$("#inputApellidoMN").val('');
	$("#inputFechaNacN").val('');
	$("#inputColegioPast").val('');
}
function GuardarNino(I)
{
var Nombre = $("#inputNombreN").val();
var Apellido = $("#inputApellidoPN").val();
if(Nombre != "" || Apellido != "")
{
	$("#modalNino"+I).html(Nombre+" "+Apellido);
}
 $("#modalNino"+I).attr("nombre",$("#inputNombreN").val());
 $("#modalNino"+I).attr("apellidoP",$("#inputApellidoPN").val());
 $("#modalNino"+I).attr("apellidoM",$("#inputApellidoMN").val());
 $("#modalNino"+I).attr("fechanac",$("#inputFechaNacN").val());
 $("#modalNino"+I).attr("colegioanterior",$("#inputColegioPast").val());
$('#myModalNino').modal('hide');
}