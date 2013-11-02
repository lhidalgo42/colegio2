<?php 
include '../../ajax/sessionCheck.php';
iniciarCookie();
verificarIP(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contabilidad</title>
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
    <table class="table table-condensed">
    	<tr>
        <td><h3>Buscar Pagos por Fecha</h3></td>
        <td><select class="input-large" id="mes" name="mes">
        <option>Sleccione un Mes</option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        </select></td>
        </tr>
    </table>

	</body>
</html>
