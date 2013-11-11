<?php 
include '../../ajax/sessionCheck.php';
iniciarCookie();
verificarIP(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Familia</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-combined.min.css">
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

.searchCointainer{
	margin-top: 50px;
}

.table{
	margin-top: 30px;
	margin-bottom: 15px;
}

.alumnoInfo, .apoderadoInfo{
	display: none;
}

.familiaID{
	margin-bottom: 30px;
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
		<div class="searchCointainer">
			<div class="span3 offset2">BUSCAR FAMILIA</div>
			<div class="span2"><input type="text" id="searchBar" name="keyword"></div>
		</div>
		<div class="results">
			<div class="span8 offset2" id="results"><?php include "getFamilia.php"; ?></div>
		</div>
	</div>
	<div class="familiaID"><input type="hidden" id="familiaID" value="<?php echo $id?>"></div>
	<div id="dialog" title="Basic dialog">
		<p>Actualizando Informacion</p>
	</div>
<script src="../../js/EditarFamilia/functions.js"></script>
</body>
</html>