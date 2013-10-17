<?php
//las queries especificas de este controladorm están documentadas más abajo
include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Persona {

    static $nombreTabla = "persona";
    static $nombreIdTabla = "RUT";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['Nombre']),
            array('Apellido1', $_POST['Apellido1']),
            array('Apellido2', $_POST['Apellido2']),
            array('Sexo', $_POST['Sexo']),
			array('Clave', $_POST['Clave']),
			array('FechaNac', $_POST['FechaNac']),
			array('FechaIns', 'Now()')
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    private static function BorrarPorId() {
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
        $atributosASeleccionar = array(
			'RUT',
            'Nombre',
            'Apellido1',
            'Apellido2',
            'Sexo',
			'Clave',
            'FechaNac',
        );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    private static function Actualizar() {
        $id = $_POST['id_persona'];
        $datosActualizacion = array(
            array('Nombre', $_POST['Nombre']),
            array('Apelldio1', $_POST['Apellido1']),
            array('Apellido2', $_POST['Apellido2']),
            array('Sexo', $_POST['Sexo']),
			array('Clave', $_POST['Clave']),
			array('FechaNac', $_POST['FechaNac']),
			array('FechaIns', 'Now()')
        );


        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //verifica la clave del usuario con su rut y clave ingresada
    //devuelve verdadero o falso
    public static function VerificarClave($rut, $pass) {
        $pass = md5($pass);
        $queryString = "SELECT * FROM persona WHERE RUT = '$rut' AND Clave = '$pass';";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }


}

?>