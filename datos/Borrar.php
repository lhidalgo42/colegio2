<?php
include_once('llamarQuery.php');
class Borrar {
		public static function Familia($id) {
        $queryString = "DELETE FROM familia WHERE ID = ".$id."";
        $query = CallQuery($queryString);
		return $query; 
	}	
	public static function Papa($id) {
        $queryString = "DELETE FROM papas WHERE RUT = ".$id."";
        $query = CallQuery($queryString);
		return $query; 
	}	
		public static function PagoMatricula($id) {
        $queryString = "DELETE FROM pago_matricula WHERE ID = ".$id."";
        $query = CallQuery($queryString);
		return $query; 
	}
		public static function PagoSeguroEscolar($id) {
        $queryString = "DELETE FROM pago_seguro_escolar WHERE ID = ".$id."";
		$query = CallQuery($queryString);
		return $query; 
	}
		public static function Nino($id) {
        $queryString = "DELETE FROM nino WHERE RUT = ".$id."";
        $query = CallQuery($queryString);
		return $query;
	}
		public static function Almuerzo($id) {
        $queryString = "DELETE FROM almuerzos WHERE ID = ".$id."";
        $query = CallQuery($queryString);
		return $query;
	}
		public static function NinoAlmuerzo($AID,$NID) {
        $queryString = "DELETE FROM almuerzos_nino WHERE almuerzos_ID = ".$AID." AND nino_RUT = ".$NID."";
        $query = CallQuery($queryString);
		return $query;
	}
		public static function Documento($nboleta,$familiaID,$col,$mat,$cuoINC,$alm,$deu,$observaciones) {
        $queryString = "DELETE FROM documentos WHERE ID = ".$id."";
		$query = CallQuery($queryString);
		echo $queryString;
		return $query; 
	}
		public static function Pago($numero,$monto,$fecha,$banco,$tipo) {
        $queryString = "DELETE FROM pago WHERE ID = ".$id."";
		$query = CallQuery($queryString);
		return $query; 
	}
		public static function R_PagoDocumento($PID,$DID) {
        $queryString = "DELETE FROM pago_has_documentos WHERE pago_ID = ".$PID." AND documentos_ID = ".$DID.";";
		$query = CallQuery($queryString);
		return $query; 
	}
		public static function R_PagoMatricula($PID,$MID) {
        $queryString = "DELETE FROM pago_matricula_has_pago WHERE pago_ID = ".$PID." AND pago_matricula_ID = ".$MID.";";
		$query = CallQuery($queryString);
		return $query;
	}
		public static function R_PagoSeguro($PID,$SID) {
        $queryString = "DELETE FROM pago_seguro_escolar_has_pago WHERE pago_ID = ".$PID." AND pago_seguro_escolar_ID = ".$SID.";";
		$query = CallQuery($queryString);
		return $query;
	}
    public static function SQL($SQL) {
        $query = CallQuery($SQL);
        return $query;
    }

   }
?>