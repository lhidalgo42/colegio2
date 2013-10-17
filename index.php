<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ingresar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="css/bootstrap-combined.min.css" rel="stylesheet">
       	<link href="css/index.css" rel="stylesheet">
        <style>
		.form-signin {
		       background-image: url(img/bg_nav_left.png);
			   background-repeat: no-repeat;	
		}
		</style>
        <!-- le js -->
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
        <script src="js/index.js"></script>
        <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="container-fluid">
            <form class="form-signin" id="usuario" method="post" action="javascript:enviar()">
                <fieldset>
                <br><br><br><br>

					<center>
    				<input type="text" placeholder="Rut" id="rut" maxlength="15"  name="rut">
   				 <br>
   				<input type="password" placeholder="Contraseña" onfocus="verificarRut(rut)" id="pass" name="pass">
					</center>
					<center>   
 					 <button class="btn btn-large" disabled="disabled" id="ingresar" type="submit"><strong>Ingresar</strong></button></center>
                    <p><span id="mensaje" class="alert-danger"></span></p>
                </fieldset>
            </form>
	

        </div> <!-- /container -->



    </body>
</html>
