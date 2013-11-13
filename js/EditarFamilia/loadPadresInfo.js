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

		
	}
});