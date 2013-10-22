<?php 
include '../../ajax/sessionCheck.php';
iniciarCookie();
verificarIP(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Matriculas</title>
<link rel="stylesheet" href="../../css/bootstrap-combined.min.css">
<link rel="stylesheet" href="../../css/bootstrap-formhelpers.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.es_ES.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.js"></script>

<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button,
input[type=date]::-webkit-inner-spin-button,
input[type=date]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
body {
				font-style:italic;
                font-weight:bold;
                font-size:1em;	
}
input{
text-transform:uppercase;	
}
.modal{
width: 600px;	
}
</style>
<script type="text/css">
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
</head>

<body onLoad="setInterval('bodyfuntion()',1000);">
<div class="container-fluid">
<form method="post" action="javascript:enviar()">
<!--Despliega Errores-->
 <p><center><span id="mensaje" class="alert-danger"></span></center></p><br>

<div id="padres">
<?php include("padres.php"); ?>

</div>
<!-- Datos de alumnos-->
<div id="ninos"><center><?php include("Alumnos.php"); ?></center></div>
<!-- fin datos alumnos-->
<br>
<br>
<!-- inicio Documentos -->
<div id="documentos"><?php include("Documentos.php"); ?></div>

</form>

</div>

<script src="../../js/Matriculas/pagos.js"></script>
<script src="../../js/Matriculas/clinicas.js"></script>
<script src="../../js/Matriculas/papa.js"></script>
<script src="../../js/Matriculas/nino.js"></script>
<script src="../../js/Matriculas/utilidades.js"></script>
<script>

function enviar()
{
var familia = new Array();
familia[0] = $("#familia").val();
familia[1] = $("#AEconomico").children(".active").html()
var Papas = new Array();
for (var i = 0; i < 2; i++){
	 Papas[i] = new Array();
	  if (i == 1){var Data = "PAPA";}
	  if (i == 0){var Data = "MAMA";}
	 Papas[i][0] = $("#modal"+Data).attr("rut");
	 Papas[i][1] = $("#modal"+Data).attr("nombre");
	 Papas[i][2] = $("#modal"+Data).attr("apellido1");
	 Papas[i][3] = $("#modal"+Data).attr("apellido2");
	 Papas[i][4] = $("#modal"+Data).attr("fechaNac"); 
	 Papas[i][5] = $("#modal"+Data).attr("profesion");
	 Papas[i][6] = $("#modal"+Data).attr("direccion");
	 Papas[i][7] = $("#modal"+Data).attr("comuna");
	 Papas[i][8] = $("#modal"+Data).attr("email");
	 Papas[i][9] = $("#modal"+Data).attr("lugarTrabajo");
	 Papas[i][10] = $("#modal"+Data).attr("direccionTrabajo");
	 Papas[i][11] = $("#modal"+Data).attr("telefonos");  
}
  var alumnos = new Array();
 for( var i = 0; i < 5; i++){
   var b= i+1;
   alumnos[i] = new Array();
   alumnos[i][0] = $("#rut"+b).val(); 
   alumnos[i][1] = $("#modalNino"+b).attr("nombre");
   alumnos[i][2] = $("#modalNino"+b).attr("apellidop");
   alumnos[i][3] = $("#modalNino"+b).attr("apellidom");
   alumnos[i][4] = $("#modalNino"+b).attr("fechanac");
   alumnos[i][5] = $("#modalNino"+b).attr("colegioanterior");
   alumnos[i][7] = $("#Curso"+b).val(); 
   alumnos[i][8] = $("#bolM"+b).val(); 
   alumnos[i][9] = $("#montoM"+b).val(); 
   alumnos[i][10] = $("#fechaM"+b).val(); 
   alumnos[i][11] = $("#valeS"+b).val(); 
   alumnos[i][12] = $("#modalC"+b).attr("tipo"); 
   alumnos[i][13] = $("#modalC"+b).attr("nombre"); 
   alumnos[i][14] = $("#modalC"+b).attr("valor"); 
   alumnos[i][15] = $("#fechaS"+b).val(); 
   alumnos[i][16] = $("#1sem"+b).val(); 
   alumnos[i][17] = $("#2sem"+b).val(); 
} 
var cuotas = +$('#cuotas').val();
var documentos = new Array();
for(var i = 0;i < cuotas; i++){
	var b = i + 1;
	documentos[i] = new Array();
	documentos[i][0] = $('#FechaBol'+b).val();
	documentos[i][1] = $('#Col'+b).val();
	documentos[i][2] = $('#Mat'+b).val();
	documentos[i][3] = $('#Cou'+b).val();
	documentos[i][4] = $('#Alm'+b).val();
	documentos[i][5] = $('#Deu'+b).val();
	documentos[i][6] = $('#FechaD'+b).val();
	documentos[i][7] = $('#obs'+b).val();
	documentos[i][8] = $("#modalP"+b).attr("tipo");
	documentos[i][9] = $("#modalP"+b).attr("banco");
	documentos[i][10] = $("#modalP"+b).attr("numero");
	documentos[i][11] = $("#modalP"+b).attr("monto");
}
$.ajax({
  url: "../../ajax/enviar.php",
  data: {familia:familia,Papas:Papas,alumnos:alumnos,documentos:documentos},
  type: "POST",
  beforeSend: function()
  {
  },
  success: function( data ) {
    $("#ayuda").html(data);
  }
});
} 
$('#cuotas').keyup(function(){
  		var cuotas = +$('#cuotas').val();
		if(cuotas >20){var cuotas = 20}	
		$('#pagoCuotas').html("");
		for(var i=1;i<cuotas+1;i++){
			$('#pagoCuotas').append('<tr><td><input style="width:115px;" type="date" id="FechaBol'+i+'"></td><td style="width:100px;"><center><a id="modalP'+i+'" role="button" onClick="MostrarP('+i+')"class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Seleccionar</a></center></td><!-- suma desde aqui--><td><input type="number" style="width:80px;" min="0"  value="0" id="Col'+i+'"></td><td><input type="number" style="width:80px;" min="0" value="0" id="Mat'+i+'"></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0" id="Cou'+i+'"></td><td><input type="number" style="width:60px;" min="0" value="0" id="Alm'+i+'" ></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0"  id="Deu'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="Total'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
		}				
	})	
</script>
<?php include("modal.php"); ?>
<div id="ayuda"><?php print_r($_SESSION); ?></div>
<script>
var f = new Date();
var fecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();	
$(".bfh-datepicker-toggle").children("input").val(fecha);
</script>
</body>
</html>