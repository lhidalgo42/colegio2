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

$papasSQL = mysql_query("SELECT * FROM papas WHERE Familia_ID = '$id'");
$estudiantesSQL = mysql_query("SELECT * 
FROM nino N
JOIN pago_matricula PM ON N.Pago_Matricula_ID = PM.ID
JOIN pago_matricula_has_pago PMHP ON PM.ID = PMHP.pago_matricula_ID
JOIN pago P ON P.ID = PMHP.pago_ID
WHERE Familia_ID = '$id'");

//Generar Resultados

while($results = mysql_fetch_array($papasSQL)){	
	//Datos Necesarios
	$rut = $results['RUT'];
	$nombre = $results['Nombre'];
	$apellido1 = $results['Apellido1'];
	$apellido2 = $results['Apellido2'];
	$fechaNacimiento = $results['FechaNac'];
	$apoderadoEcono = $results['Apoderado_Economico'];
	$profesion = $results['Profesion'];
	$direccion = $results['Direccion'];
	$email = $results['Email'];
	$lugarTrabajo = $results['Lugar_Trabajo'];
	$direccionTrabajo = $results['Direccion_Trabajo'];
	$telefonos = $results['Telefonos'];
	$comuna = $results['comunas_ID'];
	$sexo = $results['Sexo'];

	
	//Cambiar a mayusculas
	$nombre = strtoupper($nombre);
	$apellido1 = strtoupper($apellido1);
	$apellido2 = strtoupper($apellido2);
	$profesion = strtoupper($profesion);
	$direccion = strtoupper($direccion);
	$lugarTrabajo = strtoupper($lugarTrabajo);
	$direccionTrabajo = strtoupper($direccionTrabajo);
	$email = strtoupper($email);
	
	if($sexo == 1){
		$sexo = "PAPA";
	}
	else{
		$sexo = "MAMA";
	}
	$i = $sexo;
	//Mostrar Resultados
	echo "<table class='apoderado table'>
			<tr>
				<td class='span4'>$nombre $apellido1 $apellido2</td>
				<td class='span1'><button id='$rut' class='editarInfo btn'>Editar</button></td>
			</tr>
		</table>
		<div class='apoderadoInfo $rut'>
			<div>
				<div class='span3'>Sexo:</div>
				<div class='span4'><input type='text' id='sexo$i' value='$sexo'></div>
			</div>
			<div>
				<div class='span3'>Rut:</div>
				<div class='span4'><input type='text' id='rut$i' value='$rut'></div>
			</div>
			<div>
				<div class='span3'>Nombre:</div>
				<div class='span4'><input type='text' id='nombre$i' value='$nombre'></div>
			</div>
			<div>
				<div class='span3'>Apellido Paterno:</div>
				<div class='span4'><input type='text' id='apellidoPa$i' value='$apellido1'></div>
			</div>
			<div>
				<div class='span3'>Apellido Materno:</div>
				<div class='span4'><input type='text' id='apellidoMa$i' value='$apellido2'></div>
			</div>
			<div>
				<div class='span3'>Fecha de Nacimiento:</div>
				<div class='span4'><input type='text' id='fechaN$i' value='$fechaNacimiento'></div>
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
				<div class='span3'>Comuna:</div>
				<div class='span4'><input type='text' id='comuna$i' value='$comuna'></div>
			</div>
						
			<div>
				<div class='span3'>Email:</div>
				<div class='span4'><input type='email' id='email$i' value='$email'></div>
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
				<div class='span4'><input type='number' id='telefonos$i' value='$telefonos'></div>
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
	$sexo = $results['Sexo'];
	$rut = $results['RUT'];
	$nombre = $results['Nombre'];
	$apellido1 = $results['Apellido1'];
	$apellido2 = $results['Apellido2'];
	$fechaNacimiento = $results['FechaNac'];
	$curso = $results['Curso'];
	$colegioAnterior = $results['Colegio_anterior'];
	$nuevo = $results['Nuevo'];
	$pagoMatruculaId = $results['Pago_Matricula_ID'];
	$pagoSeguro = $results['Pago_seguro_escolar_ID'];
	$beca1 = $results['Beca_1'];
	$beca2 = $results['Beca_2'];
	$matriculaBoleta = $results['N_de_Boleta'];
	$matriculaTipo = $results['tipo_ID'];
	$matriculaBanco = $results['Bancos_ID'];
	$matriculaNumero = $results['Numero'];
	$matriculaMonto = $results['Monto'];
	$matriculaFecha = $results['Fecha'];
	$matriculaBoleta = $results['N_de_Boleta'];
	$seguroTipo = $results['tipo_ID'];
	$seguroBanco = $results['Bancos_ID'];
	$seguroNumero = $results['Numero'];
	$seguroMonto = $results['Monto'];
	$seguroFecha = $results['Fecha'];
	
	
	if($matriculaTipo == 1){$matriculaTipo = "Cheque";}
	else if($matriculaTipo == 2){$matriculaTipo = "Letra";}
	else{$matriculaTipo = "Efectivo";}
	
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
				<div class='span3'>Sexo:</div>
				<div class='span4'><input type='text' id='sexoHijo$i' value='$sexo'></div>
			</div>
			<div>
				<div class='span3'>Rut:</div>
				<div class='span4'><input type='text' id='rutHijo$i' value='$rut'></div>
			</div>
			<div>
				<div class='span3'>Nombre:</div>
				<div class='span4'><input type='text' id='nombreHijo$i' value='$nombre'></div>
			</div>
			<div>
				<div class='span3'>Apellido Paterno:</div>
				<div class='span4'><input type='text' id='apellidoPaHijo$i' value='$apellido1'></div>
			</div>
			<div>
				<div class='span3'>Apellido Materno:</div>
				<div class='span4'><input type='text' id='apellidoMaHijo$i' value='$apellido2'></div>
			</div>
			<div>
				<div class='span3'>Fecha de Nacimiento:</div>
				<div class='span4'><input type='text' id='fechaNHijo$i' value='$fechaNacimiento'></div>
			</div>
			<div>
				<div class='span3'>Curso:</div>
				<div class='span4'><p id='cursoHijo$i' value='$curso'>$curso</p></div>
			</div>
			<div>
				<div class='span3'>Colegio Anterior:</div>
				<div class='span4'><input type='text' id='colegioAntHijo$i' value='$colegioAnterior'></div>
			</div>
			<div>
				<div class='span3'>Sexo:</div>
				<div class='span4'><input type='text' id='sexoHijo$i' value='$sexo'></div>
			</div>
			<div>
				<div class='span3'>Nuevo:</div>
				<div class='span4'><input type='text' id='nuevoHijo$i' value='$nuevo'></div>
			</div>
			<div>
				<div class='span3'>Matricula:</div>
				<div class='span4'><input type='text' id='matriculaHijo$i' value='$pagoMatruculaId'></div>
			</div>
			<div>
				<div class='span3'>Seguro:</div>
				<div class='span4'><input type='text' id='seguroHijo$i' value='$pagoSeguro'></div>
			</div>
			<div>
				<div class='span3'>Beca Semestre 1:</div>
				<div class='span4'><input type='text' id='beca1Hijo$i' value='$beca1'></div>
			</div>
			<div>
				<div class='span3'>Beca Semestre 2:</div>
				<div class='span4'><input type='text' id='beca2Hijo$i' value='$beca2'></div>
			</div>
			<div>
				<div class='span3'>Boleta de Matricula:</div>
				<div class='span4'><input type='text' id='matriculaBoletaHijo$i' value='$matriculaBoleta'></div>
			</div>
			<div>
				<div class='span3'>Banco:</div>
				<div class='span4'><input type='text' id='matriculaBancoHijo$i' value='$matriculaBanco'></div>
			</div>
			<div>
				<div class='span3'>Tipo de Pago:</div>
				<div class='span4'><p id='matriculaTipoHijo$i' value='$matriculaTipo'>$matriculaTipo</p></div>
			</div>
			<div>
				<div class='span3'>Numero de PagoMatricula:</div>
				<div class='span4'><input type='text' id='matriculaNumeroHijo$i' value='$matriculaNumero'></div>
			</div>
			<div>
				<div class='span3'>Monto:</div>
				<div class='span4'><input type='text' id='matriculaMontoHijo$i' value='$matriculaMonto'></div>
			</div>
			<div>
				<div class='span3'>Fecha:</div>
				<div class='span4'><input type='text' id='matriculaFechaHijo$i' value='$matriculaFecha'></div>
			</div>
		</div>";
}

echo "<input id='numberChildren' type='hidden' value='$i'>";

//Cerrar Coneccion
mysql_close($con);
?>