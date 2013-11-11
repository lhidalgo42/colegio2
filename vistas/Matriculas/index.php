<?php 
include '../../ajax/sessionCheck.php';
include '../../datos/Select.php';
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
input[type=date]::-webkit-outer-spin-button,
input[type=date]::-webkit-writing-mode{
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
<!-- <script>
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script> -->
</head>
<body>
<div class="container-fluid">
<form  action="javascript:preguntar()">
<!--Despliega Errores-->
 <p><span id="mensaje" class="alert-danger"></span></p><br>
<div id="padres"><?php include'padres.php'; ?></div>
<div class="clearfix"></div>
<div id="ninos"><?php include'Alumnos.php'; ?></div>
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
<button type="submit" class="btn btn-success btn-block btn-large"><strong>Siguente</strong></button> 
</form>
</div>

<script src="../../js/Matriculas/pagos.js"></script>
<script src="../../js/Matriculas/clinicas.js"></script>
<script src="../../js/Matriculas/papa.js"></script>
<script src="../../js/Matriculas/nino.js"></script>
<script src="../../js/Matriculas/utilidades.js"></script>
<script src="../../js/Matriculas/precios.js"></script>
<script src="../../js/Matriculas/validacion.js"></script>

<script>

var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
$("#hoy").html(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
var fechaPago = f.getFullYear() + 1;
$(".fixedDateClinica").val(fechaPago+"-03-15");
$(".fixedDateMatricula").val(fechaPago+"-01-07");
$("#cIncBtn").click(function() { $("#cInc").slideToggle() });
$("#cDocBtn").click(function() { $("#cDoc").slideToggle() });
$("#cAlmBtn").click(function() { $("#cAlm").slideToggle() });
function preguntar(){ 
 confirmar=confirm("¿Esta seguro que desea continuar?"); 
if (confirmar){
siguente()
}
}
$(document).ready(function(){
    $("input").change(
        function(){
            var id = $(this.id)
            alert(id)
            $("#ayuda").html(id)


        }
        );
});

</script>
<?php include("modal.php"); ?>
<?php include_once"../../datos/Querys.php";
if(!Query::BuscarUFDate(date('Y-m-d'))){ ?>
    <script>
        $(document).ready(function() {
            $("#modalUF").modal('show');
        });
    </script>
<?php } ?>
<div id="modalUF" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Valores UF</h3>
    </div>
    <div class="modal-body">
        <form action="javascript:GUF()"
        <h4>El valor de la UF se encuentra desactualizado .</h4>
        <p>Ingrese el valor de la UF del Dia de Hoy .</p>
       <a href="#"><input type="text" placeholder="ej 12345.67" id="valuf" class="input-large" pattern=".{7,10}" ></a>
        <p><small>Valores los puede encontrar en</small> <a href="http://www.sii.cl/pagina/valores/uf/uf2013.htm#contenido" target="_blank" onClick="window.open(this.href, this.target, 'width=870,height=700'); return false;">SII Valores UF</a></p>
       </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>
<script>
    function GUF(){
        var UF = $("#valuf").val();
        $.ajax({
            url: "../../ajax/uf.php",
            data: {UF:UF},
            type: "POST",
            success: function(data) {
            if(data==1){
                alert('Cambios Guardados Correctamente');
                $('#modalUF').modal('hide');
            }
            else{
                $("#modalUF").html("Ha Ocurrido un Error");
                location.reload();


            }
        }
        });
    }
    $(function () {
        $('#valuf').popover({
            title: 'Ultimo Valor Conocido',
            <?php $ufpasada=Query::BuscarUF();?>
            content: '<?php echo "".$ufpasada['Valor']." - ".$ufpasada['Fecha'].""; ?>',
            placement: 'right'
        });
    });

</script>
</body>
</html >;