<?php
session_start();
$data=$_SESSION['envio'];

//Iniciar Coneccion Base de Datos
include('../../datos/dbconfig.php');

$con = mysql_connect($servidor, $nombre_usuario, $contrasena);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($base_de_datos);

//Update Papas

for($i = 0; $i<2; $i++){
	$RUT = $data[Papas][$i][0];
	$Nombre = $data[Papas][$i][1];
	$Apellido1 = $data[Papas][$i][2];
	$Apellido2 = $data[Papas][$i][3];
	$FechaNac = $data[Papas][$i][4];
	$Profesion = $data[Papas][$i][5];
	$Direccion = $data[Papas][$i][6];
	$comunas_ID = $data[Papas][$i][7];
	$Email = $data[Papas][$i][8];
	$Lugar_Trabajo = $data[Papas][$i][9];
	$Direccion_Trabajo = $data[Papas][$i][10];
	$Telefonos = $data[Papas][$i][11];
	
	$updatePapas =  mysql_query("UPDATE papas 
								SET 
								Nombre = '$Nombre', 
								Apellido1 = '$Apellido1', 
								Apellido2 = '$Apellido2', 
								FechaNac = '$FechaNac', 	
								Profesion = '$Profesion', 
								Direccion = '$Direccion', 
								Email = '$Email', 
								Lugar_Trabajo = '$Lugar_Trabajo', 
								Direccion_Trabajo = '$Direccion_Trabajo', 
								Telefonos = '$Telefonos', 
								comunas_ID = '$comunas_ID' 
								WHERE RUT = '$RUT'");
	echo "<br><br><br><br>";
}

//Update Niños

for($i = 0; $i<1; $i++){
	$RUT = $data[alumnos][$i][0];
	$Nombre = $data[alumnos][$i][1];
	$Apellido1 = $data[alumnos][$i][2];
	$Apellido2 = $data[alumnos][$i][3];
	$FechaNac = $data[alumnos][$i][4];
	$Colegio_anterior = $data[alumnos][$i][5];
	$Curso = $data[alumnos][$i][7];
	
	$updateNino =  mysql_query("UPDATE nino
								SET 
								Nombre = '$Nombre', 
								Apellido1 = '$Apellido1', 
								Apellido2 = '$Apellido2', 
								FechaNac = '$FechaNac', 
								Curso = '$Curso', 
								Colegio_anterior = '$Colegio_anterior'
								WHERE RUT = '$RUT'");
								
	$Algo = "UPDATE nino
								SET 
								Nombre = '$Nombre', 
								Apellido1 = '$Apellido1', 
								Apellido2 = '$Apellido2', 
								FechaNac = '$FechaNac', 
								Curso = '$Curso', 
								Colegio_anterior = '$Colegio_anterior'
								WHERE RUT = '$RUT'";
}

//Cerrar Coneccion
mysql_close($con);
?>

<html>
<body>
	<?php echo $Algo ?>
</body>
</html>
Array ( 
	[familia] => Array ( 
		[0 - Familia] => CASTRO BLANCO 
		[1 - A. Economico] => Papa) 
	[Papas] => Array ( 
		[0] => Array 
			( 
			[0 - Rut] => 134358483 
			[1 - Nombre] => BEATRIZ 
			[2 - Apellido1] => BLANCO 
			[3 - Apellido2] => PARADA 
			[4 - Fecha Nac] => 2013-11-12 
			[5 - Profesion] => DISEÃ±ADORA 
			[6 - Direccion] => EL BELLOTO 6106 CASA H 
			[7 - Comuna] => 34 
			[8 - Mail] => BEABLAP@GMAIL.COM 
			[9 - Lugar Trabajo] => 
			[10 - Direccion Trabajo] => 
			[11 - Telefonos] => 
			) 
		[1] => Array ( 
			[0] => 145329990 
			[1] => FABIAN 
			[2] => CASTRO 
			[3] => CAMACHO 
			[4] => 4234-03-31 
			[5] => ING COMERCIAL 
			[6] => EL BELLOTO 6106 CASA H 
			[7] => 34 
			[8] => SOLOFA@GMAIL.COM 
			[9] => 
			[10] => 
			[11] => 8819359 ) 
		) 
		
	[alumnos] => Array ( 
		[0] => Array ( 
			[0 - Rut] => 228509175 
			[1 - Nombre] => SIMON 
			[2 - Apellido1] => CASTRO 
			[3 - Apellido2] => BLANCO 
			[4 - Fecha Nac] => 2013-11-12 
			[5 - Colegio Ant] => 
			[6 - Sexo] => 1 
			[7 - Curso] => Kinder 
			[8 - Nº Boleta Mat] => 13930 
			[9 - Tipo Mat] => Cheque 
			[10 - Banco Mat] => 4 
			[11 - Numero Mat] => 630 
			[12 - Monto Mat] => 190000 
			[13 - Fecha Mat] => 2014-01-05 
			[14 - Vale Seg] => 
			[15 - Tipo Cli Seg] => 
			[16 - Nombre Cli Seg] => 
			[17 - Tipo Pago Seg] => 
			[18 - Banco Seg] => 
			[19 - Numero Seg] => 
			[20 - Monto Seg] => 
			[21 - Fecha Seg] => 
			[22 - Beca 1] => 10 
			[23 - Beca 2] => 20 
			[24 - Nuevo] => 1 ) 
		) 
	[documentos] => Array ( 
		[0] => Array ( 
			[0 - Fecha Bol] => 2014-03-05 
			[1 - Colegiatura] => 
			[2 - Matricula] => 
			[3 - Cuota Inc] => 
			[4 - Almuerzo] => 
			[5 - Deuda] => 
			[6 - Fecha Deposito] => 
			[7 - Observacion] => 
			[8 - Tipo Pago] => Cheque 
			[9 - Banco] => 4 
			[10 - Numero] => 620 
			[11 - Monto] => 228800 
			[12 - Boleta] => 13930 
			[13 - ID UF] => ) 
		[1] => Array ( 
			[0] => 2014-04-05 
			[1] => 
			[2] => 
			[3] => 
			[4] => 
			[5] => 
			[6] => 
			[7] => 
			[8] => Cheque 
			[9] => 4 
			[10] => 621 
			[11] => 228800 
			[12] => 13930 
			[13] => )  
	) 
)			
			
			
			
			
			
			
			
			
			
			