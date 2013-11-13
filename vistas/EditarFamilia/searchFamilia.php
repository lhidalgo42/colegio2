><?php
//Iniciar Coneccion Base de Datos
include('../../datos/dbconfig.php');

$con = mysql_connect($servidor, $nombre_usuario, $contrasena);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($base_de_datos);

//Buscar Datos

$keyword = $_REQUEST['keyword'];

$familiaSQL = mysql_query("SELECT DISTINCT ID, Familia FROM familia F JOIN papas P ON F.ID = P.Familia_ID WHERE Familia LIKE '%$keyword%'");

//Mostrar Resultados

echo "<table class='table table-striped'>";

while($results = mysql_fetch_assoc($familiaSQL)){
	$id = $results['ID'];
	$familia = $results['Familia'];
	$familiaUpper = strtoupper($familia);
	echo "<tr>
			<td class='span4'>FAMILIA $familiaUpper</td>
			<td class='span1'><button id='$id' class='editar btn btn-primary'>Editar</button></td>
		</tr>";
}

echo "</table>";
echo "<script src='../../js/EditarFamilia/functions.js'></script>";

//Cerrar Coneccion
mysql_close($con);
?>