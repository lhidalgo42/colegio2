<?php
include_once('llamarQuery.php');
class Select {
    public static function BuscarBanco($where) {
        $queryString = "SELECT Nombre
						FROM  bancos
						WHERE  ID =".$where."";
        $result = CallQuery($queryString);
		$fila = $result->fetch_assoc();
        return $fila['Nombre'];
    }
       public static function BuscarUF($where) {
        $queryString = "	SELECT *
							FROM  uf 
							WHERE  Fecha =  '".$where."'";
        $result = CallQuery($queryString);
		$fila = $result->fetch_assoc();
        return $fila;
    }
	    public static function Bancos() {
        $queryString = "SELECT * 
						FROM  bancos";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
   }
?>