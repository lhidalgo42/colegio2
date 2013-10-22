<?php
include_once('llamarQuery.php');
class Query {
/* verifica la Clave del Login */
    public static function VerificarClave($rut, $pass) {
        $pass = md5($pass);
        $queryString = "SELECT * FROM persona WHERE RUT = '$rut' AND Clave = '$pass';";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }
	/* Buscca si la Persona que ingreso esta en la Tabla Matriculas */
    public static function BuscarMatriculas($where) {
        $queryString = "SELECT Persona_RUT, Ultimo_Login
						FROM matriculas
						WHERE ".$where."";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
		/* Buscca si la Persona que ingreso esta en la Tabla Contabilidad */
	public static function BuscarContabilidad($where) {
        $queryString = "SELECT Persona_RUT, Ultimo_Login
						FROM contabilidad
						WHERE ".$where."";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	public static function BuscarAdmin($where) {
        $queryString = "SELECT Persona_RUT, Ultimo_Login
						FROM admin
						WHERE ".$where."";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	/** inicio de la insercion de datos de la familia a la base de datos **/
		public static function InsertarFamilia($familiaNombre,$rutMatricula) {
        $queryString = "INSERT INTO familia(Familia, Matriculas_Persona_RUT) 
		VALUES ( '".$familiaNombre."', '".$rutMatricula."')";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}	
	public static function InsertarPapa($rutPapa,$nombrepapa,$apellido1Papa,$apellido2Papa,$sexo,$fechaNac,$aEconomico,$profesionPapa,$FamiliaID,$direccionCasa,$comunaCasa,$email,$trabajoLugar,$direccionTrabajo,$telefonos) {
        $queryString = "INSERT INTO papas (RUT, Nombre, Apellido1, Apellido2, Sexo,FechaNac, FechaIns, Apoderado_Economico, Profesion, Familia_ID, Direccion, Comuna, Email, Lugar_Trabajo, Direccion_Trabajo, Telefonos) 
						VALUES ('".$rutPapa."', '".$nombrepapa."', '".$apellido1Papa."', '".$apellido2Papa."', UNHEX('".$sexo."'), '".$fechaNac."', NOW(), UNHEX('".$aEconomico."'), '".$profesionPapa."', '".$FamiliaID."', '".$direccionCasa."', '".$comunaCasa."', '".$email."', '".$trabajoLugar."', '".$direccionTrabajo."', '".$telefonos."')";
        $query = CallQuery($queryString);
	}	
		public static function InsertarPagoMatricula($nBoleta,$monto,$fecha) {
        $queryString = "INSERT INTO pago_matricula (N_de_Boleta, Monto, Fecha) 
						VALUES ('".$nBoleta."', '".$monto."', '".$fecha."')";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}
		public static function InsertarPagoSeguroEscolar($nVale,$monto,$fecha,$lugar) {
        $queryString = "INSERT INTO pago_seguro_escolar (Vale_N, Monto, Fecha, Lugar) 
						VALUES ('".$nVale."', '".$monto."', '".$fecha."', '".$lugar."')";
			$query = CallQueryReturnID($queryString);
			return $query; 
	}
		public static function InsertarNino($ninoRUT,$ninoNombre,$ninoApellido1,$ninoApellido2,$sexo,$fechaNac,$curso,$PagoMatriculaID,$pagoSeguroEscolarID,$familiaID,$beca1,$beca2,$colegioAnterior) {
        $queryString = "INSERT INTO nino (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Curso, Pago_Matricula_ID, Pago_seguro_escolar_ID, Familia_ID, Beca_1, Beca_2, Colegio_anterior) 
						VALUES ('".$ninoRUT."', '".$ninoNombre."', '".$ninoApellido1."', '".$ninoApellido2."', UNHEX('".$sexo."'), '".$fechaNac."', NOW(), '".$curso."', '".$PagoMatriculaID."', '".$pagoSeguroEscolarID."', '".$familiaID."', '".$beca1."', '".$beca2."', '".$colegioAnterior."')";
        $query = CallQuery($queryString);
	}
		public static function R_AlmuerzoNino($almuerzoID,$ninoRut) {
        $queryString = "INSERT INTO almuerzos_nino (almuerzos_ID, nino_RUT) VALUES ('".$almuerzoID."', '".$ninoRut."')";
        $query = CallQuery($queryString);
	}
			public static function InsertarDocumento($cuota,$familiaID,$col,$mat,$cuoINC,$alm,$deu,$observaciones) {
        $queryString = "INSERT INTO documentos (Cuota, familia_ID, Colegiatura, Materiales, Cuota_Inc, Almuerzo, Deuda, Vencimiento, Observaciones) VALUES ('".$cuota."', '".$familiaID."', '".$col."', '".$mat."', '".$cuotaINC."', '".$alm."', '".$deu."', 'NULL', '".$observaciones."');";
			$query = CallQueryReturnID($queryString);
			return $query; 
	}
	/** fin del despliege de las comunas **/
   }
?>