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
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
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
            th{
                background-color:#ddd;
                width:200px;
                padding:10px;
            }
		</style>
	</head>
	<body>

    <div style="padding-top:115px; " class="container-fluid">
        <div class="span12 alert">
            <div class="span5">
                <h3>Filtrar por curso o Familia</h3>
            </div>
            <div class="span6">
                <select class="span6" id="curso" name="curso">
                    <option>Seleccione Curso</option>
                    <option value="Todo">Todos</option>

                </select>
            </div>
            <div class="span6">
                <input class="typeahead span6" type="text" data-provide="typeahead" id="familia" autocomplete="off" placeholder="Nombre de la Familia">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="span12 alert">
        <div class="span5">
            <h3>Filtrar por Fecha</h3>
        </div>
        <div class="span3">
            <select class="span3" id="anio" name="mes">
                <option>Seleccione</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
            </select>
            </div>
        <div class="span3">
        <select class="span3" id="mes" name="mes">
            <option value="0">Seleccione</option>
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
        </select>
        </div>
         </div>
<div class="clearfix"></div>
        <div class="span12 alert">
            <div class="span5">
                <h3>Filtrar por Informacion</h3>
            </div>
            <div class="span6">
                <select class="span6" id="info" name="info">
                    <option>Seleccione</option>
                    <option value="Materiales">Materiales</option>
                    <option value="Colegiatura">Colegiatura</option>
                    <option value="Cuota_Inc">Cuota Incorporación</option>
                    <option value="Almuerzo">Almuerzos</option>
                    <option value="Seguro">Seguro Escolar</option>
                    <option value="Matriculas">Matriculas</option>
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="span12">
            <button type="button" class="btn btn-block btn-primary" onclick="Buscar()"><span style="font-size: 2em;font-style:italic; ">Buscar</span></button>
        </div>

        <br><br>
    <div id="data">

    </div>
  </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'POST',
                url: "../../ajax/ajaxPago.php",
                data: {tipo:2},
                success:  function(respuesta){
                    $("#curso").html("<option value='null'>Seleccione un Curso</option>");
                    $("#curso").append(respuesta);
                },
                beforeSend:function(){
                    $("#curso").html("<option>Cargando...</option>")
                },
                error:function(objXMLHttpRequest){
                    $("#data").html("<option>"+objXMLHttpRequest+"</option>")
                }
            });
            $('input.typeahead').typeahead({
                source: function (query, process) {
                    $.ajax({
                        url: '../../ajax/ajaxPagoAutocomplete.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 'query=' + query,
                        success: function(data) {
                            process(data);
                        }
                    });
                }
            });
        });
        function Buscar() {
            var mes = $("#mes").val();
            var anio = $("#anio").val();
            var curso = $("#curso").val();
            var familia = $("#familia").val();
            var info = $("#info").val();
            $.ajax({
                async:false,
                dataType:"html",
                type: 'POST',
                url: "../../ajax/ajaxPago.php",
                data: {info:info,familia:familia,curso:curso,mes:mes,anio:anio,tipo:3},
                success:  function(respuesta){
                    $("#data").html(respuesta);
                },
                beforeSend:function(){
                    $("#data").html("<img src='../../img/ajax-loading.gif'>")
                },
                error:function(objXMLHttpRequest){
                    $("#data").html(objXMLHttpRequest)
                }
            });
        };
        $("#familia").keyup(function(){
            $("#curso").val("null");
        });
        $("#curso").change(function(){
            $("#familia").val("");
        })
    </script>
	</body>
</html>
