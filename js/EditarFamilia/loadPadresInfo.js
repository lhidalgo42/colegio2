$( document ).ready(function() {
	for(var i=0; i<2; i++){
		if(i == 0){ var rol = "PAPA"; }
		else{ var rol = "MAMA"; }
		
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
	}
	
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

		
	}
	
	var cuotas = +$("#cuotasPagos").val();
	$("#cuotaInc").val(cuotas);
	$("#cuotas").val(cuotas);
	$("#almuerzoCuotas").val(cuotas);
	cambio();
	cambio2();
	cambio3();
	
	var cantidadPrimero = cuotas;
	var cantidadSegundo = cuotas + 1;
	var cantidadTercero = (cuotas*2) + 1;
	var cantidadFinal = cuotas*3;
	
	for(var l=1; l< cantidadPrimero + 1; l++){
		var boleta = +$("#boletaCuota"+l).val();
		var cuotaInc = $("#cuotaIncCuota"+l).val();
		var fecha = $("#fechaCuota"+l).val();
		var pagoTipo = $("#pagoTipo"+l).attr('value');
		var banco = $("#bancoCuota"+l).val();
		var numero = $("#numeroCuota"+l).val();
		var monto = $("#montoCuota"+l).val();
		var fechaDeposito = $("#fechaDepositoCuota"+l).val();
		
		$("#Nbol"+l).val(boleta);
		$("#FechaBol"+l).val(fecha);
		$("#modalP"+l).attr('tipo', pagoTipo);
		$("#modalP"+l).attr('banco', banco);
		$("#modalP"+l).attr('numero', numero);
		$("#modalP"+l).attr('monto', monto);
		$("#Cou"+l).val(cuotaInc);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+l).val(fechaDeposito);
		}
		
	}

	for(var m=cantidadSegundo; m<cantidadTercero; m++){
		
		var igualador = cantidadSegundo - 1;
		var adaptador = m - igualador;
		
		var boleta = +$("#boletaCuota"+adaptador).val();
		var colegiatura = $("#colegiaturaCuota"+adaptador).val();
		var materiales = $("#materialesCuota"+adaptador).val();
		var deuda = $("#deudaCuota"+adaptador).val();
		var fecha = $("#fechaCuota"+adaptador).val();
		var pagoTipo = $("#pagoTipo"+adaptador).attr('value');
		var banco = $("#bancoCuota"+adaptador).val();
		var numero = $("#numeroCuota"+adaptador).val();
		var monto = $("#montoCuota"+adaptador).val();
		var fechaDeposito = $("#fechaDepositoCuota"+adaptador).val();
		
		$("#Nbol"+m).val(boleta);
		$("#FechaBol"+m).val(fecha);
		$("#modalP"+m).attr('tipo', pagoTipo);
		$("#modalP"+m).attr('banco', banco);
		$("#modalP"+m).attr('numero', numero);
		$("#modalP"+m).attr('monto', monto);
		$("#Col"+m).val(colegiatura);
		$("#Mat"+m).val(materiales);
		$("#Deu"+m).val(deuda);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+adaptador).val(fechaDeposito);
		}
		
		igualador = igualador + 1;

	}
	
	for(var n=cantidadTercero; n<cantidadFinal+1; n++){
	
		var igualador = cantidadTercero - 1;
		var adaptador = n - igualador;
		var boleta = +$("#boletaCuota"+adaptador).val();
		var almuerzo = $("#almuerzoCuota"+adaptador).val();
		var fecha = $("#fechaCuota"+adaptador).val();
		var pagoTipo = $("#pagoTipo"+adaptador).attr('value');
		var banco = $("#bancoCuota"+adaptador).val();
		var numero = $("#numeroCuota"+adaptador).val();
		var monto = $("#montoCuota"+adaptador).val();
		var fechaDeposito = $("#fechaDepositoCuota"+adaptador).val();
		
		$("#Nbol"+n).val(boleta);
		$("#FechaBol"+n).val(fecha);
		$("#modalP"+n).attr('tipo', pagoTipo);
		$("#modalP"+n).attr('banco', banco);
		$("#modalP"+n).attr('numero', numero);
		$("#modalP"+n).attr('monto', monto);
		$("#Alm"+n).val(almuerzo);
		
		if(pagoTipo == "Efectivo"){
			$("#fechaD"+adaptador).val(fechaDeposito);
		}
		igualador = igualador + 1;
	}
});