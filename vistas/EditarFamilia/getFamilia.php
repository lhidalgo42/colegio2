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
$estudiantesSQL = mysql_query("SELECT * FROM nino WHERE Familia_ID = '$id'");

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
					<button id='submitApoderado$i' class='submitApoderado btn btn-primary' helper_id='$rut' helper_c='$i'>
						Enviar
					</button>
					<br><br>
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
			</div>";															
			
			$estudiantesMatriculaSQL = mysql_query("SELECT * 
													FROM nino N
													JOIN pago_matricula PM ON N.Pago_Matricula_ID = PM.ID
													JOIN pago_matricula_has_pago PMHP ON PM.ID = PMHP.pago_matricula_ID
													JOIN pago P ON P.ID = PMHP.pago_ID
													WHERE RUT = '$rut'");
			
			while($results2 = mysql_fetch_array($estudiantesMatriculaSQL)){
				$matriculaBoleta = $results2['N_de_Boleta'];
				$matriculaTipo = $results2['tipo_ID'];
				$matriculaBanco = $results2['Bancos_ID'];
				$matriculaNumero = $results2['Numero'];
				$matriculaMonto = $results2['Monto'];
				$matriculaFecha = $results2['Fecha'];
				$matriculaBoleta = $results2['N_de_Boleta'];
				$seguroTipo = $results2['tipo_ID'];
				$seguroBanco = $results2['Bancos_ID'];
				$seguroNumero = $results2['Numero'];
				$seguroMonto = $results2['Monto'];
				$seguroFecha = $results2['Fecha'];
				
				if($matriculaTipo == 1){$matriculaTipo = "Cheque";}
				else if($matriculaTipo == 2){$matriculaTipo = "Letra";}
				else{$matriculaTipo = "Efectivo";}
				
				echo "<div>
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
					</div>";
			}
			
			$estudiantesSeguroSQL = mysql_query("SELECT * 
													FROM nino N
													JOIN pago_seguro_escolar PSE ON PSE.ID = N.Pago_seguro_escolar_ID
													JOIN pago_seguro_escolar_has_pago PSEHP ON PSEHP.pago_seguro_escolar_ID = PSE.ID
													JOIN pago P ON P.ID = PSEHP.pago_ID
													WHERE RUT = '$rut'");
			
			while($results3 = mysql_fetch_array($estudiantesSeguroSQL)){
				$seguroBoleta = $results3['Vale_N'];
				$seguroTipo = $results3['tipo_ID'];
				$seguroBanco = $results3['Bancos_ID'];
				$seguroNumero = $results3['Numero'];
				$seguroMonto = $results3['Monto'];
				$seguroFecha = $results3['Fecha'];
				$nombreClinica = $results3['Lugar'];
				
				if($nombreClinica == "Clinica Alemana"){$tipoClinica = "CA";}
				else if($nombreClinica == "Clinica Santa Maria"){$tipoClinica = "CSM";}
				else{$tipoClinica = "OTRA";}
				
				if($seguroTipo == 1){$seguroTipo = "Cheque";}
				else if($seguroTipo == 2){$seguroTipo = "Letra";}
				else{$seguroTipo = "Efectivo";}
				
				echo "<div>
						<div class='span3'>Boleta de seguro:</div>
						<div class='span4'><input type='text' id='seguroBoletaHijo$i' value='$seguroBoleta'></div>
					</div>
					<div>
						<div class='span3'>Banco:</div>
						<div class='span4'><input type='text' id='seguroBancoHijo$i' value='$seguroBanco'></div>
					</div>
					<div>
						<div class='span3'>Tipo de Pago:</div>
						<div class='span4'><p id='seguroTipoHijo$i' value='$seguroTipo'>$seguroTipo</p></div>
					</div>
					<div>
						<div class='span3'>Numero de Pagoseguro:</div>
						<div class='span4'><input type='text' id='seguroNumeroHijo$i' value='$seguroNumero'></div>
					</div>
					<div>
						<div class='span3'>Monto:</div>
						<div class='span4'><input type='text' id='seguroMontoHijo$i' value='$seguroMonto'></div>
					</div>
					<div>
						<div class='span3'>Fecha:</div>
						<div class='span4'><input type='text' id='seguroFechaHijo$i' value='$seguroFecha'></div>
					</div>
					<div>
						<div class='span3'>Clinica:</div>
						<div class='span4'><p id='seguroClinicaHijo$i' value='$nombreClinica'>$nombreClinica</p></div>
					</div>
					<div>
						<div class='span3'>Tipo Clinica:</div>
						<div class='span4'><input type='text' id='seguroTipoClinicaHijo$i' value='$tipoClinica'></div>
					</div>";
			}
	
		echo "</div>";
}

$pagoSQL = mysql_query("SELECT * FROM documentos D
						JOIN pago_has_documentos PHD ON D.ID = PHD.documentos_ID
						JOIN pago P ON P.ID = PHD.pago_ID
						WHERE Familia_ID = '$id'");
$cuotas = mysql_num_rows($pagoSQL);

echo "<table class='apoderado table'>
			<tr>
				<td class='span4'>Pagos</td>
				<td class='span1'><button id='$rut' class='editarInfo btn'>Editar</button></td>
			</tr>
		</table>
		<div class='pagoInfo $rut'>
			<div>
				<div class='span3'>Cuotas:</div>
				<div class='span4'><input type='text' id='cuotasPagos' value='$cuotas'></div>
			</div>";

$j = 0;

while($results4 = mysql_fetch_array($pagoSQL)){

	$j = $j + 1;
	$numeroBoleta = $results4['NBoleta'];
	$colegiatura = $results4['Colegiatura'];
	$materiales = $results4['Materiales'];
	$cuotaInc = $results4['cuotaInc'];
	$almuerzo = $results4['Almuerzo'];
	$deuda = $results4['Deuda'];
	$fecha = $results4['Fecha'];
	$pagoTipo = $results4['tipo_ID'];
	$banco = $results4['Bancos_ID'];
	$numero = $results4['Numero'];
	$monto = $results4['Monto'];
	$fechaDeposito = $results4['Fecha_Deposito'];
				
	if($pagoTipo == 1){$pagoTipo = "Cheque";}
	else if($pagoTipo == 2){$pagoTipo = "Letra";}
	else{$pagoTipo = "Efectivo";}
	
	echo	"<div>
				<div class='span3'>Numero de Boleta:</div>
				<div class='span4'><input type='text' id='boletaCuota$j' value='$numeroBoleta'></div>
			</div>
			<div>
				<div class='span3'>Colegiatura:</div>
				<div class='span4'><input type='text' id='colegiaturaCuota$j' value='$colegiatura'></div>
			</div>
			<div>
				<div class='span3'>Materiales</div>
				<div class='span4'><input type='text' id='materialesCuota$j' value='$materiales'></div>
			</div>
			<div>
				<div class='span3'>Cuota Incorporacion:</div>
				<div class='span4'><input type='text' id='cuotaIncCuota$j' value='$cuotaInc'></div>
			</div>
			<div>
				<div class='span3'>Almuerzo:</div>
				<div class='span4'><input type='text' id='almuerzoCuota$j' value='$almuerzo'></div>
			</div>
			<div>
				<div class='span3'>Deuda:</div>
				<div class='span4'><input type='text' id='deudaCuota$j' value='$deuda'></div>
			</div>
			<div>
				<div class='span3'>Monto:</div>
				<div class='span4'><input type='text' id='montoCuota$j' value='$monto'></div>
			</div>
			<div>
				<div class='span3'>Fecha:</div>
				<div class='span4'><input type='text' id='fechaCuota$j' value='$fecha'></div>
			</div>
			<div>
				<div class='span3'>Pago Tipo:</div>
				<div class='span4'><p id='pagoTipo$j' value='$pagoTipo'>$pagoTipo</p></div>
			</div>
			<div>
				<div class='span3'>Banco:</div>
				<div class='span4'><input type='text' id='bancoCuota$j' value='$banco'></div>
			</div>
			<div>
				<div class='span3'>Numero:</div>
				<div class='span4'><input type='text' id='numeroCuota$j' value='$numero'></div>
			</div>
			<div>
				<div class='span3'>Fecha Deposito:</div>
				<div class='span4'><input type='text' id='fechaDepositoCuota$j' value='$fechaDeposito'></div>
			</div>";
}

echo "</div>";

echo "<input id='numberChildren' type='hidden' value='$i'>";

//Cerrar Coneccion
mysql_close($con);
?>