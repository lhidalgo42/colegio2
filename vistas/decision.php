<?php
/*
 * Pagina de decision de un usuario a elegir su perfil de entrada. se ignora si el usuario es solo paciente
 * input: id de Medico o Funcionario en caso de existir
 * output: ninguno, se traslada a otra pagina
 */

include '../ajax/sessionCheck.php';
include '../datos/llamarQuery.php';
iniciarCookie();
verificarIP();
$sql="SELECT * FROM  persona WHERE  RUT = ".$_SESSION['RUT'];
$data=SelectSql($sql);
$data=$data[0];
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
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/font-awesome/css/font-awesome.min.css">
        <link href="../css/decision-css.css" rel="stylesheet">
        <!--[if lt IE 9]>
             <script src="../js/admin/html5.js"></script>
        <![endif]-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </head>

    <body>
        <div class="container-fluid" style="padding-top: 100px;">
            <form class="form-signin" >
                <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
                <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>

        <?php
            if ($_SESSION['idMatriculas'] != false){
			echo'<a href="decision2.php" class="btn btn-large btn-block">Matricular</a>';
               
            }
            if ($_SESSION['idContabilidad'] != false){
               echo'<a href="Contabilidad/index.php" class="btn btn-large btn-block">Contabilidad</a>';
            }
			if ($_SESSION['idAdmin'] != false){
				echo '<a href="Admin/index.php" class="btn btn-large btn-block">Administración</a>';
			}
        ?>
                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </form>



        </div>
    </body>
</html>