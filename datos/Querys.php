<?php
include_once('llamarQuery.php');
class Query {
/* verifica la Clave del Login */
    public static function VerificarClave($rut, $pass) {
        $pass = md5($pass);
        $queryString = "SELECT * FROM persona WHERE RUT = '".$rut."' AND Clave = '".$pass."';";
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
    public static function BuscarPagoEntre($fecha1,$fecha2) {
        $queryString = "SELECT *
                        FROM pago
                        WHERE Fecha
                        BETWEEN  '".$fecha1."'
                        AND  '".$fecha2."'";
        $result = CallQuery($queryString);
        echo $queryString;
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    public static function BuscarUFDate($fecha) {
        $queryString = "SELECT *
                        FROM  uf
                        WHERE  Fecha =  '".$fecha."'";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }
    public static function BuscarUF() {
        $queryString = 'SELECT *
                        FROM uf
                        ORDER BY Fecha DESC';
        $result = CallQuery($queryString);
        $fila = $result->fetch_assoc();
        return $fila;
    }
   }
?>