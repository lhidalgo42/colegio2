
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">CRUD</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    Logeado como <a href="#" class="navbar-link">ADMIN</a>
                </p>
       <!--         <ul class="nav">
                    <li class="active"><a href="#">inicio</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                -->
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Familia</li>
                    <li><a href="Familia/index.php">Lista</a></li>
                    <li class="nav-header">Papas</li>
                    <li><a href="Papas/index.php">Lista</a></li>
                    <li class="nav-header">Niños</li>
                    <li><a href="Nino/index.php">Lista</a></li>
                    <li class="nav-header">Documentos</li>
                    <li><a href="Documentos/index.php">Lista</a></li>
                    <li class="nav-header">Pagos</li>
                    <li><a href="Pago/index.php">Lista</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" id="dom">
            <div class="hero-unit">
                <h1>Bienvenido</h1>
                <p>Este es un panel <b>DEMO</b> para la revision de los datos
                    <br> <span class="alert">Todos los datos Desplegados se encuentran sin depurar</span>
                    <br>por ende se ven bastante desordenados y sin sentido.</p>
                <p><a href="../index.php" class="btn btn-success btn-large">Volver al panel de Inicio &raquo;</a></p>
            </div>
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Colegio 2013</p>
    </footer>

</div><!--/.fluid-container-->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $("a").click(function(){
        var href= $(this).attr("href");
        $( "#dom" ).load(href);
    })
</script>


</body>
</html>
