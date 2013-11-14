function GuardarPapa(I){
var Nombre = $("#inputNombre").val();
var Apellido = $("#inputApellidoP").val();
	if(I==0)
	{
		if(Nombre != "" || Apellido != "")
		{
			$("#modalMAMA").html(Nombre+" "+Apellido);
		}
		$("#modalMAMA").attr("rut",$("#inputRUT").val());
		$("#modalMAMA").attr("nombre",$("#inputNombre").val());
		$("#modalMAMA").attr("apellido1",$("#inputApellidoP").val());
		$("#modalMAMA").attr("apellido2",$("#inputApellidoM").val());
		$("#modalMAMA").attr("fechaNac",$("#inputFechaNac").val());
		$("#modalMAMA").attr("profesion",$("#inputProfesion").val());
		$("#modalMAMA").attr("direccion",$("#inputDireccion").val());
		if($("#modalPAPA").attr("direccion")==""){
		$("#modalPAPA").attr("direccion",$("#inputDireccion").val());}
		$("#modalMAMA").attr("comuna",$("#inputComuna").val());
		$("#modalMAMA").attr("email",$("#inputEmail").val());
		$("#modalMAMA").attr("lugarTrabajo",$("#inputLugarTrabajo").val());
		$("#modalMAMA").attr("direccionTrabajo",$("#inputDireccionT").val());
		$("#modalMAMA").attr("telefonos",$("#inputTelefonos").val());
		$("a[id*='modalNino']").attr("apellidom",$("#inputApellidoP").val());
	}
	if(I==1)
	{
		if(Nombre != "" || Apellido != "")
		{
			$("#modalPAPA").html(Nombre+" "+Apellido);
		}
		$("#modalPAPA").attr("rut",$("#inputRUT").val());
		$("#modalPAPA").attr("nombre",$("#inputNombre").val());
		$("#modalPAPA").attr("apellido1",$("#inputApellidoP").val());
		$("#modalPAPA").attr("apellido2",$("#inputApellidoM").val());
		$("#modalPAPA").attr("fechaNac",$("#inputFechaNac").val());
		$("#modalPAPA").attr("profesion",$("#inputProfesion").val());
		$("#modalPAPA").attr("direccion",$("#inputDireccion").val());
		if($("#modalMAMA").attr("direccion")=="")
		{$("#modalMAMA").attr("direccion",$("#inputDireccion").val());}
		$("#modalPAPA").attr("comuna",$("#inputComuna").val());
		$("#modalPAPA").attr("email",$("#inputEmail").val());
		$("#modalPAPA").attr("lugarTrabajo",$("#inputLugarTrabajo").val());
		$("#modalPAPA").attr("direccionTrabajo",$("#inputDireccionT").val());
		$("#modalPAPA").attr("telefonos",$("#inputTelefonos").val());
		$("a[id*='modalNino']").attr("apellidop",$("#inputApellidoP").val());
	}
	CerrarPapa();
	$('#myModalPapa').modal('hide');
    $("#ninos").removeClass("opaco");
}
function MostrarPadre(I){
	$("#guardarPapa").attr("onClick","GuardarPapa("+I+")");
	if(I==0)
	{
		$("#tittlePapa").html("<center>Complete los Datos de la Madre</center>");
		$("#inputRUT").val($("#modalMAMA").attr("rut"));
		$("#inputNombre").val($("#modalMAMA").attr("nombre"));
		$("#inputApellidoP").val($("#modalMAMA").attr("apellido1"));
		$("#inputApellidoM").val($("#modalMAMA").attr("apellido2"));
		$("#inputFechaNac").val($("#modalMAMA").attr("fechaNac"));
		$("#inputProfesion").val($("#modalMAMA").attr("profesion"));
		$("#inputDireccion").val($("#modalMAMA").attr("direccion"));
		$("#inputComuna").val($("#modalMAMA").attr("comuna"));
		$("#inputEmail").val($("#modalMAMA").attr("email"));
		$("#inputLugarTrabajo").val($("#modalMAMA").attr("lugarTrabajo"));
		$("#inputDireccionT").val($("#modalMAMA").attr("direccionTrabajo"));
		$("#inputTelefonos").val($("#modalMAMA").attr("telefonos"));
	}
	if(I==1)
	{
		$("#tittlePapa").html("<center>Complete los Datos del Padre</center>");
		$("#inputRUT").val($("#modalPAPA").attr("rut"));
		$("#inputNombre").val($("#modalPAPA").attr("nombre"));
		$("#inputApellidoP").val($("#modalPAPA").attr("apellido1"));
		$("#inputApellidoM").val($("#modalPAPA").attr("apellido2"));
		$("#inputFechaNac").val($("#modalPAPA").attr("fechaNac"));
		$("#inputProfesion").val($("#modalPAPA").attr("profesion"));
		$("#inputDireccion").val($("#modalPAPA").attr("direccion"));
		$("#inputComuna").val($("#modalPAPA").attr("comuna"));
		$("#inputEmail").val($("#modalPAPA").attr("email"));
		$("#inputLugarTrabajo").val($("#modalPAPA").attr("lugarTrabajo"));
		$("#inputDireccionT").val($("#modalPAPA").attr("direccionTrabajo"));
		$("#inputTelefonos").val($("#modalPAPA").attr("telefonos"));
	}
		$('#myModalPapa').modal('show');
}
function CerrarPapa(){
$("#inputRUT").val('');
$("#inputNombre").val('');
$("#inputApellidoP").val('');
$("#inputApellidoM").val('');
$("#inputFechaNac").val('');
$("#inputProfesion").val('');
$("#inputDireccion").val('');
$("#inputComuna").val('');
$("#inputEmail").val('');
$("#inputLugarTrabajo").val('');
$("#inputDireccionT").val('');
$("#inputTelefonos").val('');
}