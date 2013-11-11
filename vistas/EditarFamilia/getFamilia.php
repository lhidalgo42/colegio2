<?php
//Iniciar Coneccion Base de Datos
include('../../datos/dbconfig.php');

$con = mysql_connect($servidor, $nombre_usuario, $contrasena);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($base_de_datos);

//Buscar Familia Completa

$id = $_REQUEST['id'];

$papasSQL = mysql_query("SELECT * FROM PAPAS WHERE FAMILIA_ID = '$id'");
$estudiantesSQL = mysql_query("SELECT * FROM NINO WHERE FAMILIA_ID = '$id'");

//Generar Resultados y Contadores
	
$i = 0;

while($results = mysql_fetch_array($papasSQL)){

	$i = $i + 1;
	
	//Datos Necesarios
	$rut = $results['RUT'];
	$nombre = $results['Nombre'];
	$apellido1 = $results['Apellido1'];
	$apellido2 = $results['Apellido2'];
	$fechaNacimiento = $results['FechaNac'];
	$fechaInscripcion = $results['FechaIns'];
	$apoderadoEcono = $results['Apoderado_Economico'];
	$profesion = $results['Profesion'];
	$direccion = $results['Direccion'];
	$email = $results['Email'];
	$lugarTrabajo = $results['Lugar_Trabajo'];
	$direccionTrabajo = $results['Direccion_Trabajo'];
	$telefonos = $results['Telefonos'];
	
	//Cambiar a mayusculas
	$nombre = strtoupper($nombre);
	$apellido1 = strtoupper($apellido1);
	$apellido2 = strtoupper($apellido2);
	$profesion = strtoupper($profesion);
	$direccion = strtoupper($direccion);
	$lugarTrabajo = strtoupper($lugarTrabajo);
	$direccionTrabajo = strtoupper($direccionTrabajo);
	$email = strtoupper($email);
	
	//Mostrar Resultados
	echo "<table class='apoderado table'>
			<tr>
				<td class='span4'>$nombre $apellido1 $apellido2</td>
				<td class='span1'><button id='$rut' class='editarInfo btn'>Editar</button></td>
			</tr>
		</table>
		<div class='apoderadoInfo $rut'>
			<div>
				<div class='span3'>Fecha de Nacimiento:</div>
				<div class='span4'><input type='text' id='fechaN$i' value='$fechaNacimiento'></div>
			</div>
			<div>
				<div class='span3'>Fecha de Inscripcion:</div>
				<div class='span4'><input type='text' id='fechaI$i' value='$fechaInscripcion'></div>
			</div>
			<div>
				<div class='span3'>Profesion:</div>
				<div class='span4'><input type='text' id='profesion$i' value='$profesion'></div>
			</div>
			<div>
				<div class='span3'>Direccion:</div>
				<div class='span4'><input type='text' id='direccion$i' value='$direccion'></div>
			</div>
			<div>
				<div class='span3'>Email:</div>
				<div class='span4'><input type='text' id='email$i' value='$email'></div>
			</div>
			<div>
				<div class='span3'>Lugar de Trabajo:</div>
				<div class='span4'><input type='text' id='lugarT$i' value='$lugarTrabajo'></div>
			</div>
			<div>
				<div class='span3'>Direccion de Trabajo:</div>
				<div class='span4'><input type='text' id='direccionT$i' value='$direccionTrabajo'></div>
			</div>
			<div>
				<div class='span3'>Telefonos:</div>
				<div class='span4'><input type='text' id='telefonos$i' value='$telefonos'></div>
			</div>
			<div class='bottom'>
				<div class='span3'></div>
				<div class='span4'>
					<button id='submitApoderado$i' class='submitApoderado btn btn-primary' helper_id='$rut' helper_c='$i'>Enviar</button><br><br>
				</div>
			</div>
		</div>";
}

$i = 0;

while($results = mysql_fetch_array($estudiantesSQL)){

	$i = $i + 1;
	
	//Datos Necesarios
	$rut = $results['RUT'];
	$nombre = $results['Nombre'];
	$apellido1 = $results['Apellido1'];
	$apellido2 = $results['Apellido2'];
	$fechaNacimiento = $results['FechaNac'];
	$fechaInscripcion = $results['FechaIns'];
	$curso = $results['Curso'];
	$colegioAnterior = $results['Colegio_anterior'];
	
	//Cambiar a mayusculas
	$nombre = strtoupper($nombre);
	$apellido1 = strtoupper($apellido1);
	$apellido2 = strtoupper($apellido2);
	
	//Mostrar Resultados
	echo "<table class='alumno table'>
			<tr>
				<td class='span4'>$nombre $apellido1 $apellido2</td>
				<td class='span1'><button id='$rut' class='editarInfo btn'>Editar</button></td>
			</tr>
		</table>
		<div class='alumnoInfo $rut'>
			<div>
				<div class='span3'>Fecha de Nacimiento:</div>
				<div class='span4'><input type='text' id='fechaN$i' value='$fechaNacimiento'></div>
			</div>
			<div>
				<div class='span3'>Fecha de Inscripcion:</div>
				<div class='span4'><input type='text' id='fechaI$i' value='$fechaInscripcion'></div>
			</div>
			<div>
				<div class='span3'>Curso:</div>
				<div class='span4'><input type='text' id='curso$i' value='$curso'></div>
			</div>
			<div>
				<div class='span3'>Colegio Anterior:</div>
				<div class='span4'><input type='text' id='colegioAnt$i' value='$colegioAnterior'></div>
			</div>
			<div class='bottom'>
				<div class='span3'></div>
				<div class='span4'>
					<button id='submitAlumno$i' class='submitAlumno btn btn-primary' helper_id='$rut' helper_c='$i'>Enviar</button><br><br>
				</div>
			</div>
		</div>";
}

echo $apoderadoEcono;

//Cerrar Coneccion
mysql_close($con);
?>