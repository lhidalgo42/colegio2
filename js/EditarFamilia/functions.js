$("#searchBar").keyup(function(){
	var keyword = $("#searchBar").val();
	$.ajax({
		url: "searchFamilia.php",
		data: {keyword: keyword},
		beforeSend : function (){
			$("#results").html("Cargando <img scr='../img/ajax-loader.gif' alt='loading'>");
		},
		success : function (returnData) {
			$("#results").html(returnData);
		},
	});
});

$(".editar").click(function(){
	var id = $(this).attr('id');
	window.location.href = "editFamilia.php?id="+id;
});

$(".editarInfo").click(function(){
	var id = $(this).attr('id');
	$("."+id).slideToggle();
});

$(".submitApoderado").click(function(){
	var button = $(this).attr('id');
	var rut = $(this).attr('helper_id');
	var i = $(this).attr('helper_c');
	var fechaNac = $("#fechaN"+i).val()
	var fechaIns = $("#fechaI"+i).val()
	var profesion = $("#profesion"+i).val()
	var direccion = $("#direccion"+i).val()
	var email = $("#email"+i).val()
	var lugarT = $("#lugarT"+i).val()
	var direccionT = $("#direccionT"+i).val()
	var telefonos =  $("#telefonos"+i).val()
	
	$.ajax({
		url: "successFamilia.php",
		data: {
			rut: rut,
			fechaNac: fechaNac,
			fechaIns: fechaIns,
			profesion: profesion,
			direccion: direccion,
			email: email,
			lugarT: lugarT,
			direccionT: direccionT,
			telefonos: telefonos
			},
		beforeSend : function (){
			//$( "#dialog" ).dialog();
		},
		success : function (returnData) {
			if(returnData == 0){
				alert("Error al Actualizar los Datos");
				$("#"+button).removeClass().addClass("submitApoderado").addClass("btn").addClass("btn-danger");
			}
			else{
				alert("Datos Actualizados Correctamente");
				$("#"+button).removeClass().addClass("submitApoderado").addClass("btn").addClass("btn-success");
			}
		},
	});

});

$(".submitAlumno").click(function(){
	var button = $(this).attr('id');
	var rut = $(this).attr('helper_id');
	var i = $(this).attr('helper_c');
	var fechaNac = $("#fechaN"+i).val()
	var fechaIns = $("#fechaI"+i).val()
	var curso = $("#curso"+i).val()
	var colegioAnt = $("#colegioAnt"+i).val()
	
	$.ajax({
		url: "successAlumno.php",
		data: {
			rut: rut,
			fechaNac: fechaNac,
			fechaIns: fechaIns,
			curso: curso,
			colegioAnt: colegioAnt
			},
		beforeSend : function (){
			//$( "#dialog" ).dialog();
		},
		success : function (returnData) {
			if(returnData == 0){
				alert("Error al Actualizar los Datos");
				$("#"+button).removeClass().addClass("submitAlumno").addClass("btn").addClass("btn-danger");
			}
			else{
				alert("Datos Actualizados Correctamente");
				$("#"+button).removeClass().addClass("submitAlumno").addClass("btn").addClass("btn-success");
			}
		},
	});

});
