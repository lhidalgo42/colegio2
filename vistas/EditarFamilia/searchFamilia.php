<?php
//Iniciar Coneccion Base de Datos
include('../../datos/dbconfig.php');
$mysqlCon = new mysqli($servidor,$nombre_usuario,$contrasena,$base_de_datos);
$mysqlCon->set_charset("utf8");
if($mysqlCon->errno) {
	printf("Conexion fallida: %s\n", $mysqli->connect_error);
	exit();
}

//Buscar Datos

$keyword = $_REQUEST['keyword'];

$familia = mysql_query("SELECT * 
						FROM familia F 
						JOIN papas P 
						ON F.id = P.familia_ID 
						WHERE FAMILIA LIKE '%$keyword%'
						AND P.Apoderado_Economico = 1");
						
while($results = mysql_fetch_array($familia)){
	$id = $results['ID'];
	$familia = $results['Familia'];
	$sostenedor = $results['Nombre']." ".$results['Apellido1']." ".$results['Apellido2'];
	echo "<div class='result'>
			<div class='span4'>Familia $familia</div>
			<div class='span4'>Sostenedor Economico: $sostenedor</div>
			<div class='span4'><button class='editar btn btn-primary'>Editar</button></div>
		</div>";
}

//Cerrar Coneccion
mysql_close($mysqlCon);
?>