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
var papa = new Array();
var mama = new Array();
<?php $alumnos= array("rut","name","Curso","bolM","montoM","fechaM","valeS","tipo","nombre","valor","fechaS","1sem","2sem"); 
$papa=array(array("inputRUT","rut"),array("inputNombre","nombre"),array("inputApellidoP","apellido1"),array("inputApellidoM","apellido2"),array("inputFechaNac","fechaNac"),array("inputProfesion","profesion"),array("inputDireccion","direccion"),array("inputComuna","comuna"),array("inputEmail","email"),array("inputLugarTrabajo","lugarTrabajo"),array("inputDireccionT","direccionTrabajo"),array("inputTelefonos","telefonos"));
$nino=array(array("inputNombreN","nombre"),array("inputApellidoPN","apellidoP"),array("inputApellidoMN","apellidoM"),array("inputFechaNacN","fechanac"),array("inputColegioPast","colegioanterior")); ?>
<?php for($i=0;$i<12;$i++){?> 
 papa[<?php echo $i; ?>] = $("#modalPAPA").attr("<?php echo $papa[$i][1]; ?>");
 mama[<?php echo $i; ?>] = $("#modalMAMA").attr("<?php echo $papa[$i][1]; ?>");<?php }?> 
 <?php for($i=1;$i<5;$i++){ ?>
 var alumno<?php echo $i; ?> = new Array();
 <?php for($b=0;$b<13;$b++){ ?>
 <?php if($b==7 || $b==8 || $b==9){ ?>
 alumno<?php echo $i;?>[<?php echo $b; ?>] = $("#modalC<?php echo $i; ?>").attr("<?php echo $alumnos[$b]; ?>");<?php } //fin if 
  else { ?>
 alumno<?php echo $i;?>[<?php echo $b; ?>] = $("#<?php echo $alumnos[$b];echo $i; ?>").val();<?php } // fin else ?> 
 <?php } // fin for b ?>
 <?php } // fin for i?>
 var alumnos = new Array();
 <?php for($i=0;$i<4;$i++){
	 $b=$i+1;?> 
  alumnos[<?php echo $i; ?>]=alumno<?php echo $b; ?>;
<?php } ?>

var cuotas = +$('#cuotas').val();
var documentos = new Array();
for(var i = 1; i < cuotas +1; i++){
	documentos[i][0] = $('#FechaBol'+i).val();
	documentos[i][1] = $('#Col'+i).val();
	documentos[i][2] = $('#Mat'+i).val();
	documentos[i][3] = $('#Cou'+i).val();
	documentos[i][4] = $('#Alm'+i).val();
	documentos[i][5] = $('#Deu'+i).val();
	documentos[i][6] = $('#FechaD'+i).val();
	documentos[i][7] = $('#obs'+i).val();
	documentos[i][8] = $("#modalP"+i).attr("tipo");
	documentos[i][9] = $("#modalP"+i).attr("banco");
	documentos[i][10] = $("#modalP"+i).attr("numero");
	documentos[i][11] = $("#modalP"+i).attr("monto");
}



$.ajax({
  url: "../../ajax/enviar.php",
  data: {familia:familia,papa:papa,mama:mama,alumnos:alumnos,documentos:documentos},
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
			$('#pagoCuotas').append('<tr><td><input style="width:115px;" type="date" id="FechaBol'+i+'; ?>"></td><td style="width:100px;"><center><a id="modalP'+i+'" role="button" onClick="MostrarP('+i+')"class="btn" data-toggle="modal" tipo="" chequebanco="" chequenumero="" chequemonto="" chequefecha="" letranumero="" letramonto="" efectivomonto="">Seleccionar</a></center></td><!-- suma desde aqui--><td><input type="number" style="width:80px;" min="0"  value="0" id="Col'+i+'"></td><td><input type="number" style="width:80px;" min="0" value="0" id="Mat'+i+'"></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0" id="Cou'+i+'"></td><td><input type="number" style="width:60px;" min="0" value="0" id="Alm'+i+'" ></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0"  id="Deu'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="Total'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
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