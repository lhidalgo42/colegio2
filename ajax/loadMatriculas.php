<?php

	 
include'../datos/Querys.php';
include_once'utilidades.php';
session_start();
$comunas=Query::MostrarComunas();


?>