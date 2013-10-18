<?php

/**
 * Descripcion: Comprobar si el usuario es Matriculas/Contabilidad, y en caso 
 * de que sea guardar informacion en SESSION y manejar las instituciones
 * correspondientes
 * Input (SESSION):
 *
 * Output: No hay, redireccion según ruteo correspondiente.
 */

include_once(dirname(__FILE__) . '/sessionCheck.php');
iniciarCookie();
verificarIP();

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');



header("Location: http://$host$uri/$page");
?>
