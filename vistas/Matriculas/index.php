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

<body>
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
</script>
<?php include("modal.php"); ?>
<div id="ayuda"><?php print_r($_SESSION); ?></div>
<script>
var f = new Date();
var fecha = f.getFullYear() + "-" + (f.getMonth() +1) + "-" +f.getDate();	
$(".bfh-datepicker-toggle").children("input").val(fecha);
</script>
</body>
</html>