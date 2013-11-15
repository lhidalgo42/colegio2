<html>
<body>
<?php 
session_start();
$data=$_SESSION['envio'];

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
	$Apoderado_Economico = $data[Papas][$i][12];
	
	echo "<br><br><br><br>";
	echo "UPDATE papas 
	SET 
		Nombre = '$Nombre', 
		Apellido1 = '$Apellido1', 
		Apellido2 = '$Apellido2', 
		FechaNac = '$FechaNac', 
		Apoderado_Economico = '$Apoderado_Economico', 
		Profesion = '$Profesion', 
		Direccion = '$Direccion', 
		Email = '$Email', 
		Lugar_Trabajo = '$Lugar_Trabajo', 
		Direccion_Trabajo = '$Direccion_Trabajo', 
		Telefonos = '$Telefonos', 
		comunas_ID = '$comunas_ID' 
		WHERE RUT = '$RUT'"; 
	echo "<br><br><br><br>";
}
?>
</body>
</html>

Array ( 
	[familia] => Array ( [0] => CASTRO BLANCO ) 
	[Papas] => Array ( 
		[0] => Array 
			( 
			[0] => 134358483 
			[1] => BEATRIZ 
			[2] => BLANCO 
			[3] => PARADA 
			[4] => 2013-11-12 
			[5] => DISEÃ±ADORA 
			[6] => EL BELLOTO 6106 CASA H 
			[7] => 34 
			[8] => BEABLAP@GMAIL.COM 
			[9] => 
			[10] => 
			[11] => 
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
					[0] => 228509175 
					[1] => SIMON 
					[2] => CASTRO 
					[3] => BLANCO 
					[4] => 2013-11-12 
					[5] => 
					[6] => 1 
					[7] => Kinder 
					[8] => 13930 
					[9] => Cheque 
					[10] => 4 
					[11] => 630 
					[12] => 190000 
					[13] => 2014-01-05 
					[14] => 
					[15] => 
					[16] => 
					[17] => 
					[18] => 
					[19] => 
					[20] => 
					[21] => 
					[22] => 10 
					[23] => 20 
					[24] => 1 ) 
			) 
			[documentos] => Array ( [0] => Array ( [0] => [1] => [2] => [3] => 0 [4] => [5] => [6] => [7] => [8] => [9] => [10] => [11] => [12] => [13] => ) [1] => Array ( [0] => [1] => 0 [2] => 0 [3] => [4] => [5] => 0 [6] => [7] => [8] => [9] => [10] => [11] => [12] => [13] => ) [2] => Array ( [0] => [1] => [2] => [3] => [4] => 0 [5] => [6] => [7] => [8] => [9] => [10] => [11] => [12] => [13] => ) ) )