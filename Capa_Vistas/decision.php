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

        <?php
            if ($_SESSION['idMatriculas'] != false){
			echo'<button class="btn btn-large btn-block" onClick="redireccionar(1)" type="button">Matricular</button>';
                
            }
            if ($_SESSION['idContabilidad'] != false){
               echo'<button class="btn btn-large btn-block" onClick="redireccionar(2)" type="button">Contabilidad</button>';
            }
			if ($_SESSION['idAdmin'] != false){
				echo '<button class="btn btn-large btn-block" onClick="redireccionar(3)" type="button">Administración</button>';
			}
        ?>
                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </form>



        </div> <!-- /container -->



    </body>
</html>
<script language="javascript">
    
    function redireccionar(I){
		if(I == 1){window.location.href = 'Matriculas/index.php';}
		if(I == 2){window.location.href = 'Contabilidad/index.php';}
		if(I == 3){window.location.href = 'Admin/index.php';}
		
   }
    
</script>
