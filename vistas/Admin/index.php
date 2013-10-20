<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administracion</title>
<link rel="stylesheet" href="../../css/bootstrap-combined.min.css">
<link rel="stylesheet" href="../../css/bootstrap-formhelpers.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.js"></script>
<script src="../../js/bootstrap-formhelpers-datepicker.en_US.js"></script>
</head>
<body>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div id="menu-admin" class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><h4><strong>Seleccione Opcion</strong></h4></li>
              <li class="nav-header">Padres</li>
              <li><a href="#">Familias</a></li>
              <li><a href="#">Padres</a></li>
              <li><a href="#">Niños</a></li>
              <li class="nav-header">Administracion</li>
              <li><a href="#">Matriculas</a></li>
              <li><a href="#">Contabilidad</a></li>
              <li><a href="#">Administradores</a></li>
              <li class="nav-header">Pagos</li>
              <li><a href="#">Cuotas</a></li>
              <li><a href="#">Cheques</a></li>
              <li><a href="#">Letras</a></li>
              <li><a href="#">Pagos en Efectivo</a></li>
              <li class="nav-header">Otros</li>
              <li><a href="#">Comunas</a></li>
              <li><a href="#">Bancos</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
         <div class="row-fluid">
          <div id="contenido">
          </div>        
         </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>© Company 2013</p>
      </footer>

    </div>
    <script>
	$("#menu-admin").children("ul").children("li").children("a").click(function(){
		$.ajax({
		  url: "../../ajax/admin.php",
		  type:"get",
		  data: { var:$(this).html()
		  },
		  beforeSend: function(){
			  $("#contenido").html("<h3 style='text-align:center;'>Cargando...</h3>");
		  },
		  success: function( data ) {
			$("#contenido").html( data );
		  }
		});		
	});
	</script>
</body>
</html>