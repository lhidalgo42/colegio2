<?php
/*
 * Pagina de decision de un usuario a elegir su perfil de entrada. se ignora si el usuario es solo paciente
 * input: id de Medico o Funcionario en caso de existir
 * output: ninguno, se traslada a otra pagina
 */

include '../ajax/sessionCheck.php';
iniciarCookie();
verificarIP();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ingresar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fafaf0;
                border: 3px solid #0b72b5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;

            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" rel="text/javascript"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script> 
    </head>

    <body>
        <div class="container-fluid">
            <form class="form-signin" >
                <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
                <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>
				<a href="Matriculas/index.php" class="btn btn-large btn-block">Matricular Alumnos Nuevos</a>
				<a href="#" class="btn btn-large btn-block" disabled>Matricular Alumnos Antiguos</a>
                <a href="#" class="btn btn-large btn-block" disabled>Agregar Detalles alumnos Matriculados</a>
                <a href="logout.php" class="btn btn-large btn-block btn-danger">Salir</a>
                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </form>
        </div> <!-- /container -->
	</body>
</html>
