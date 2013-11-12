<?php
include_once('llamarQuery.php');
class Insert {
		public static function Familia($familiaNombre,$rutMatricula) {
        $queryString = "INSERT INTO familia(Familia, Matriculas_Persona_RUT,Fecha_Ins) 
		VALUES ( '".$familiaNombre."', '".$rutMatricula."',NOW())";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}	
	public static function Papa($rutPapa,$nombrepapa,$apellido1Papa,$apellido2Papa,$sexo,$fechaNac,$aEconomico,$profesionPapa,$FamiliaID,$direccionCasa,$comunaCasa,$email,$trabajoLugar,$direccionTrabajo,$telefonos) {
        $queryString = "INSERT INTO papas (RUT, Nombre, Apellido1, Apellido2, Sexo,FechaNac, FechaIns, Apoderado_Economico, Profesion, Familia_ID, Direccion, comunas_ID, Email, Lugar_Trabajo, Direccion_Trabajo, Telefonos) 
						VALUES ('".$rutPapa."', '".$nombrepapa."', '".$apellido1Papa."', '".$apellido2Papa."', UNHEX('".$sexo."'), '".$fechaNac."', NOW(), UNHEX('".$aEconomico."'), '".$profesionPapa."', '".$FamiliaID."', '".$direccionCasa."', '".$comunaCasa."', '".$email."', '".$trabajoLugar."', '".$direccionTrabajo."', '".$telefonos."')";
        $query = CallQueryReturnID($queryString);
        return $query;
		
	}	
		public static function PagoMatricula($nBoleta,$monto,$fecha) {
        $queryString = "INSERT INTO pago_matricula (N_de_Boleta, Monto, Fecha) 
						VALUES ('".$nBoleta."', '".$monto."', '".$fecha."')";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}
		public static function PagoSeguroEscolar($nVale,$monto,$fecha,$lugar) {
        $queryString = "INSERT INTO pago_seguro_escolar (Vale_N, Monto, Fecha, Lugar) 
						VALUES ('".$nVale."', '".$monto."', '".$fecha."', '".$lugar."')";
			$query = CallQueryReturnID($queryString);
			return $query; 
	}
		public static function Nino($ninoRUT,$ninoNombre,$ninoApellido1,$ninoApellido2,$sexo,$fechaNac,$curso,$PagoMatriculaID,$pagoSeguroEscolarID,$familiaID,$beca1,$beca2,$colegioAnterior,$nuevo) {
        $queryString = "INSERT INTO nino (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Curso, Pago_Matricula_ID, Pago_seguro_escolar_ID, Familia_ID, Beca_1, Beca_2, Colegio_anterior,Nuevo) 
						VALUES ('".$ninoRUT."', '".$ninoNombre."', '".$ninoApellido1."', '".$ninoApellido2."', UNHEX('".$sexo."'), '".$fechaNac."', NOW(), '".$curso."', '".$PagoMatriculaID."', '".$pagoSeguroEscolarID."', '".$familiaID."', '".$beca1."', '".$beca2."', '".$colegioAnterior."','".$nuevo."')";
        $query = CallQuery($queryString);
        return $query;
	}
		public static function R_Nino($almuerzoID,$ninoRut) {
        $queryString = "INSERT INTO almuerzos_nino (almuerzos_ID, nino_RUT) VALUES ('".$almuerzoID."', '".$ninoRut."')";
        $query = CallQuery($queryString);
        return $query;
	}
		public static function Documento($nboleta,$familiaID,$col,$mat,$cuoINC,$alm,$deu,$observaciones,$uf) {
        $queryString = "INSERT INTO documentos (NBoleta, familia_ID, Colegiatura, Materiales, Cuota_Inc, Almuerzo, Deuda, Observaciones, UF_ID) VALUES ('".$nboleta."', '".$familiaID."', '".$col."', '".$mat."', '".$cuoINC."', '".$alm."', '".$deu."', '".$observaciones."','".$uf."');";
		$query = CallQueryReturnID($queryString);
		return $query;
	}
		public static function Pago($numero,$monto,$fecha,$banco,$tipo,$rutPapa) {
        $queryString = "INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_RUT) VALUES ('".$numero."','".$monto."', '".$fecha."', '".$banco."', '".$tipo."',NOW(), '".$rutPapa."');";
		$query = CallQueryReturnID($queryString);
        return $query;
	}
		public static function R_PagoDocumento($pagoID,$documentoID) {
        $queryString = "INSERT INTO pago_has_documentos (pago_ID, documentos_ID) VALUES ('".$pagoID."', '".$documentoID."');";
		$query = CallQuery($queryString);
        return $query;
	}
		public static function R_PagoMatricula($pagoID,$PagoMatriculaID) {
        $queryString = "INSERT INTO pago_matricula_has_pago (pago_matricula_ID, pago_ID) VALUES ('".$PagoMatriculaID."','".$pagoID."');";
		$query = CallQuery($queryString);
        return $query;
	}
		public static function R_PagoSeguro($pagoID,$PagoSeguroID) {
        $queryString = "INSERT INTO pago_seguro_escolar_has_pago (pago_seguro_escolar_ID, pago_ID) VALUES ('".$PagoSeguroID."','".$pagoID."');";
	    $query = CallQuery($queryString);
        return $query;
	}
    public static function UF($valor,$fecha) {
        $queryString = "INSERT INTO uf (Valor ,Fecha) VALUES ('".$valor."',  '".$fecha."')";
        $query = CallQueryReturnID($queryString);
        return $query;
    }

   }
?>