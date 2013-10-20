<?php
include_once('llamarQuery.php');
class Banco {
    public static function Mostrar() {
        $queryString = "SELECT * FROM banco";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
	public static function Insertar($nombre) {
        $queryString = "INSERT INTO banco (Nombre) VALUES(".$nombre.")";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}		
	public static function Actualizar($ID,$nombre) {
        $queryString = "UPDATE banco SET  Nombre =  '".$nombre."'   WHERE ID = '".$ID."'";
        $query = CallQuery($queryString);
		return $query; 
	}	
	public static function Borrar($ID) {
        $queryString = "DELETE FROM banco WHERE ID = '".$ID."'";
        $query = CallQuery($queryString);
		return $query; 
	}	 
}
class Comuna {
    public static function Mostrar() {
        $queryString = "SELECT * FROM banco";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
			$resultArray=$resultArray[0];
        }
        return $resultArray;
    }
	public static function Insertar($nombre) {
        $queryString = "INSERT INTO banco (Nombre) VALUES(".$nombre.")";
        $query = CallQueryReturnID($queryString);
		return $query; 
	}		
	public static function Actualizar($ID,$nombre) {
        $queryString = "UPDATE banco SET  Nombre =  '".$nombre."'   WHERE ID = '".$ID."'";
        $query = CallQuery($queryString);
		return $query; 
	}	
	public static function Borrar($ID) {
        $queryString = "DELETE FROM banco WHERE ID = '".$ID."'";
        $query = CallQuery($queryString);
		return $query; 
	}	 
}
?>