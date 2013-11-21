$( document ).ready(function() {
	
	function escribirNino(I){
		var tipo =$("#modalNino"+I).attr("sexo")
		$("#SelectSexoMN").children("button[idval='"+tipo+"']").addClass("active");
		$("#guardarNino").attr("onClick","GuardarNino("+I+")")
		$("#inputRutN").val($("#modalNino"+I).attr("rut"));
		$("#inputNombreN").val($("#modalNino"+I).attr("nombre"));
		$("#inputApellidoPN").val($("#modalNino"+I).attr("apellidop"));
		$("#inputApellidoMN").val($("#modalNino"+I).attr("apellidom"));
		$("#inputFechaNacN").val($("#modalNino"+I).attr("fechanac"));
		$("#inputCPast").val($("#modalNino"+I).attr("colegioanterior"));
		var Nombre = $("#inputNombreN").val();
		var Apellido = $("#inputApellidoPN").val();
		if(Nombre != "" || Apellido != "")
		{
			$("#modalNino"+I).html(Nombre+" "+Apellido);
		}
		$("#modalNino"+I).attr("rut",$("#inputRutN").val());
		$("#modalNino"+I).attr("nuevo",$("#ANuevo").children(".active").attr("idval"));
		$("#modalNino"+I).attr("nombre",$("#inputNombreN").val());
		$("#modalNino"+I).attr("apellidoP",$("#inputApellidoPN").val());
		$("#modalNino"+I).attr("apellidoM",$("#inputApellidoMN").val());
		$("#modalNino"+I).attr("fechanac",$("#inputFechaNacN").val());
		$("#modalNino"+I).attr("colegioanterior",$("#inputCPast").val());
		$("#modalNino"+I).attr("sexo",$("#SelectSexoMN").children(".active").attr("idval"));
		$('#myModalNino').modal('hide');
	}
	
	function escribirPadre(I){
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
			if($("#modalPAPA").attr("direccion")=="")
			{
				$("#modalPAPA").attr("direccion",$("#inputDireccion").val());
			}
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
			{
				$("#modalMAMA").attr("direccion",$("#inputDireccion").val());
			}
			$("#modalPAPA").attr("comuna",$("#inputComuna").val());
			$("#modalPAPA").attr("email",$("#inputEmail").val());
			$("#modalPAPA").attr("lugarTrabajo",$("#inputLugarTrabajo").val());
			$("#modalPAPA").attr("direccionTrabajo",$("#inputDireccionT").val());
			$("#modalPAPA").attr("telefonos",$("#inputTelefonos").val());
			$("a[id*='modalNino']").attr("apellidop",$("#inputApellidoP").val());
		}
	}

	
	//Obtener datos Papas	
	for(var i=0; i<2; i++){
		if(i == 0){ 
			var rol = "PAPA"; 
			var identificador = "1";
		}
		else{ 
			var rol = "MAMA"; 
			var identificador = "0";
		}
		
		//Obtener Datos
		
		var rut = $("#rut"+rol).val();
		var nombre = $("#nombre"+rol).val();
		var apellidoPa = $("#apellidoPa"+rol).val();
		var apellidoMa = $("#apellidoMa"+rol).val();
		var fechaN = $("#fechaN"+rol).val();
		var profesion = $("#profesion"+rol).val();
		var direccion = $("#direccion"+rol).val();
		var comuna = $("#comuna"+rol).val();
		var email = $("#email"+rol).val();
		var lugarT = $("#lugarT"+rol).val();
		var direccionT = $("#direccionT"+rol).val();
		var telefonos = $("#telefonos"+rol).val();
		var apoderadoAE = $("#apoderadoAE"+rol).val();
				
		//Inyectar Datos
		
		$("#modal"+rol).attr('rut', rut);
		$("#modal"+rol).attr('nombre', nombre);
		$("#modal"+rol).attr('apellido1', apellidoPa);
		$("#modal"+rol).attr('apellido2', apellidoMa);
		$("#modal"+rol).attr('fechanac', fechaN);
		$("#modal"+rol).attr('profesion', profesion);
		$("#modal"+rol).attr('direccion', direccion);
		$("#modal"+rol).attr('comuna', comuna);
		$("#modal"+rol).attr('email', email);
		$("#modal"+rol).attr('lugartrabajo', lugarT);
		$("#modal"+rol).attr('direcciontrabajo', direccionT);
		$("#modal"+rol).attr('telefonos', telefonos);
		
		escribirPadre(identificador);
		
		if(apoderadoAE == "1"){
			$("#"+rol+"AEbtn").trigger("click");
		}
	}
	
	//Obtener datos hijos
	hijos = +$("#numberChildren").val();
	for(var k=1; k<hijos+1; k++){
		
		//Obtener Datos
		
		var rutHijo = $("#rutHijo"+k).val();
		var nombreHijo = $("#nombreHijo"+k).val();
		var apellidoPaHijo = $("#apellidoPaHijo"+k).val();
		var apellidoMaHijo = $("#apellidoMaHijo"+k).val();
		var fechaNHijo = $("#fechaNHijo"+k).val();
		var colegioAntHijo = $("#colegioAntHijo"+k).val();
		var sexoHijo = $("#sexoHijo"+k).val();
		var nuevoHijo = $("#nuevoHijo"+k).val(); 
		var curso = $("#cursoHijo"+k).attr('value');
		var beca1 = $("#beca1Hijo"+k).val();
		var beca2 = $("#beca2Hijo"+k).val();
		var matriculaBoleta = $("#matriculaBoletaHijo"+k).val();
		var matriculaTipo = $("#matriculaTipoHijo"+k).attr('value');
		var matriculaBanco = $("#matriculaBancoHijo"+k).val();
		var matriculaNumero = $("#matriculaNumeroHijo"+k).val();
		var matriculaMonto = $("#matriculaMontoHijo"+k).val();
		var matriculaFecha = $("#matriculaFechaHijo"+k).val();
		var seguroBoleta = $("#seguroBoletaHijo"+k).val();
		var seguroTipo = $("#seguroTipoHijo"+k).attr('value');
		var seguroBanco = $("#seguroBancoHijo"+k).val();
		var seguroNumero = $("#seguroNumeroHijo"+k).val();
		var seguroMonto = $("#seguroMontoHijo"+k).val();
		var seguroFecha = $("#seguroFechaHijo"+k).val();
		var tipoClinica = $("#seguroTipoClinicaHijo"+k).val();
		var nombreClinica = $("#seguroClinicaHijo"+k).attr('value');

		
		//Inyectar Datos
		
		$("#modalNino"+k).attr('rut', rutHijo);
		$("#modalNino"+k).attr('nombre', nombreHijo);
		$("#modalNino"+k).attr('apellidoP', apellidoPaHijo);
		$("#modalNino"+k).attr('apellidom', apellidoMaHijo);
		$("#modalNino"+k).attr('fechanac', fechaNHijo);
		$("#modalNino"+k).attr('colegioanterior', colegioAntHijo);
		$("#modalNino"+k).attr('almuerzo', '');
		$("#modalNino"+k).attr('sexo', sexoHijo);
		$("#modalNino"+k).attr('nuevo', nuevoHijo);
		$("#Curso"+k).val(curso);
		$("#1sem"+k).val(beca1);
		$("#2sem"+k).val(beca2);
		$("#bolM"+k).val(matriculaBoleta);
		$("#modalPM"+k).attr('tipo', matriculaTipo);
		$("#modalPM"+k).attr('banco', matriculaBanco);
		$("#modalPM"+k).attr('numero', matriculaNumero);
		$("#modalPM"+k).attr('monto', matriculaMonto);
		$("#fechaM"+k).val(matriculaFecha);
		$("#valeS"+k).val(seguroBoleta);
		$("#modalC"+k).attr('tipoc', tipoClinica);
		$("#modalC"+k).attr('nombre', nombreClinica);
		$("#modalC"+k).attr('tipop', seguroTipo);
		$("#modalC"+k).attr('banco', seguroBanco);
		$("#modalC"+k).attr('numero', seguroNumero);
		$("#modalC"+k).attr('monto', seguroMonto);
		$("#fechaS"+k).val(seguroFecha);

		escribirNino(k);
	}
	
	//Obtener pagos
	var cuotasCI = +$("#cuotasIncPagos").val();
	var cuotasD = +$("#cuotasPagosDoc").val();
	var cuotasA = +$("#cuotasPagosAlm").val();
	$("#cuotaInc").val(cuotasCI);
	$("#cuotas").val(cuotasD);
	$("#almuerzoCuotas").val(cuotasA);
	cambio();
	cambio2();
	cambio3();
	
	var cantidadPrimero = cuotasCI;
	var cantidadSegundo = cuotasCI + 1;
	var cantidadTercero = cuotasCI + cuotasD + 1;
	var cantidadFinal = cantidadTercero + cuotasA ;
	
	for(var l=1; l< cantidadPrimero + 1; l++){
		var boleta = +$("#boletaCuotaInc"+l).val();
		var fecha = $("#fechaCuotaInc"+l).val();
		var pagoTipo = $("#pagoTipoCI"+l).attr('value');
		var banco = $("#bancoCuotaInc"+l).val();
		var numero = $("#numeroCuotaInc"+l).val();
		var monto = $("#montoCuotaInc"+l).val();
		var fechaDeposito = $("#fechaDepositoCuotaInc"+l).val();
		var observaciones = $("#observacionesCuotaInc"+l).val();
		
		$("#Nbol"+l).val(boleta);
		$("#FechaBol"+l).val(fecha);
		$("#modalP"+l).attr('tipo', pagoTipo);
		$("#modalP"+l).attr('banco', banco);
		$("#modalP"+l).attr('numero', numero);
		$("#modalP"+l).attr('monto', monto);
		$("#Cou"+l).val(monto);
		$("#obs"+l).val(observaciones);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+l).val(fechaDeposito);
		}
		
	}

	for(var m=cantidadSegundo; m<cantidadTercero; m++){
		
		var igualador = cantidadSegundo - 1;
		var adaptador = m - igualador;
		
		var boleta = +$("#boletaCuotaDoc"+adaptador).val();
		var colegiatura = $("#colegiaturaCuotaDoc"+adaptador).val();
		var materiales = $("#materialesCuotaDoc"+adaptador).val();
		var deuda = $("#deudaCuotaDoc"+adaptador).val();
		var fecha = $("#fechaCuotaDoc"+adaptador).val();
		var pagoTipo = $("#pagoTipoD"+adaptador).attr('value');
		var banco = $("#bancoCuotaDoc"+adaptador).val();
		var numero = $("#numeroCuotaDoc"+adaptador).val();
		var monto = $("#montoCuotaDoc"+adaptador).val();
		var fechaDeposito = $("#fechaDepositoCuotaDoc"+adaptador).val();
		var observaciones = $("#observacionesCuotaDoc"+adaptador).val();
		
		$("#Nbol"+m).val(boleta);
		$("#FechaBol"+m).val(fecha);
		$("#modalP"+m).attr('tipo', pagoTipo);
		$("#modalP"+m).attr('banco', banco);
		$("#modalP"+m).attr('numero', numero);
		$("#modalP"+m).attr('monto', monto);
		$("#Col"+m).val(colegiatura);
		$("#Mat"+m).val(materiales);
		$("#Deu"+m).val(deuda);
		$("#obs"+m).val(observaciones);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+adaptador).val(fechaDeposito);
		}
		
		igualador = igualador + 1;

	}
	
	for(var n=cantidadTercero; n<cantidadFinal+1; n++){
	
		var igualador = cantidadTercero - 1;
		var adaptador = n - igualador;
		var boleta = +$("#boletaCuotaAlm"+adaptador).val();
		var almuerzo = $("#almuerzoCuotaAlm"+adaptador).val();
		var fecha = $("#fechaCuotaAlm"+adaptador).val();
		var pagoTipo = $("#pagoTipoA"+adaptador).attr('value');
		var banco = $("#bancoCuotaAlm"+adaptador).val();
		var numero = $("#numeroCuotaAlm"+adaptador).val();
		var monto = $("#montoCuotaAlm"+adaptador).val();
		var fechaDeposito = $("#fechaDepositoCuotaAlm"+adaptador).val();
		var observaciones = $("#observacionesCuotaAlm"+adaptador).val();
		
		$("#Nbol"+n).val(boleta);
		$("#FechaBol"+n).val(fecha);
		$("#modalP"+n).attr('tipo', pagoTipo);
		$("#modalP"+n).attr('banco', banco);
		$("#modalP"+n).attr('numero', numero);
		$("#modalP"+n).attr('monto', monto);
		$("#Alm"+n).val(almuerzo);
		$("#obs"+n).val(observaciones);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+adaptador).val(fechaDeposito);
		}
		igualador = igualador + 1;
	}
});