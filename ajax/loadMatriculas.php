<?php

	/*+ 
	 * Descripcion: Envia todos los datos a la base de datos
	 * los datos se almacenan y devuelve respuesta si todo salio exitoso
	 * Input (POST)
	 * array(todos los datos del formulario de inscripcion de alumnos) 
	 * Output: int de estado 
	 */
	 
include'../datos/Querys.php';
include_once'utilidades.php';
session_start();
$comunas=Query::MostrarComunas();


?>