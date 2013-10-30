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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
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

.pago{
	display: none;
	margin-top: 10px;
}

.pagosContainer{
	margin-top: 10px;
	margin-bottom: 10px;
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

<body>
<div class="container-fluid">
<form  action="javascript:enviar()">
<!--Despliega Errores-->
 <p><center><span id="mensaje" class="alert-danger"></span></center></p><br>
<div id="padres"><?php include'padres.php'; ?></div>
<div class="clearfix"></div>
<div id="ninos"><center><?php include'Alumnos.php'; ?></center></div>
<div class="clearfix"></div>
<div id="coutaIncorporacion" class="pagosContainer">
	<div><input type="button" id="cIncBtn" class="btn btn-block btn-large" value="PAGAR CUOTA INCORPORACION"></div>
	<div id="cInc" class="pago"><?php include'cuotaInc.php'; ?></div>
</div>
<div id="documentos" class="pagosContainer">
	<div><input type="button" id="cDocBtn" value="PAGAR DOCUMENTOS" class="btn btn-block btn-large"></div>
	<div id="cDoc" class="pago"><?php include'Documentos.php'; ?></div>
</div>
<div id="almuerzos" class="pagosContainer">
	<div><input type="button" id="cAlmBtn" class="btn btn-block btn-large" value="PAGAR ALMUERZOS"></div>
	<div id="cAlm" class="pago"><?php include'Almuerzos.php'; ?></div>
</div>
<button type="submit" class="btn btn-primary btn-block btn-large"><strong>Enviar</strong></button> 
</form>
</div>
<script src="../../js/Matriculas/pagos.js"></script>
<script src="../../js/Matriculas/clinicas.js"></script>
<script src="../../js/Matriculas/papa.js"></script>
<script src="../../js/Matriculas/nino.js"></script>
<script src="../../js/Matriculas/utilidades.js"></script>
<script src="../../js/Matriculas/precios.js"></script>
<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
$("#hoy").html(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
$( "input[type=date]" ).val(f.getYear()+"-"+f.getMonth()+"-"+f.getDate());
var fechaPago = f.getFullYear() + 1;
$(".fixedDateClinica").val(fechaPago+"-03-15");
$(".fixedDateMatricula").val(fechaPago+"-01-07");
$("#cIncBtn").click(function() { $("#cInc").slideToggle() });
$("#cDocBtn").click(function() { $("#cDoc").slideToggle() });
$("#cAlmBtn").click(function() { $("#cAlm").slideToggle() });
$("#Nbol1").keyup(copiarNbol);
</script>
<?php include("modal.php"); ?>
<div id="ayuda"><?php print_r($_SESSION); ?></div>
</body>
</html>