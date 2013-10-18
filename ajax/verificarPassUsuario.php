<?php

	/*+ 
	 * Descripcion: Verifica la clave de un usuario y verifica
	 * el nivel de credenciales, las guarda en sesion y entrega
	 * estado
	 * Input (POST)
	 * 	int rutUsuario
	 *	int passUsuario
	 * Output: int de estado 
	 */
include("../datos/Querys.php");
include_once('utilidades.php');
	
	session_start();
	session_unset();        
         
	$rut = validadorRUT($_POST['rut']);
	$pass = $_POST['pass'];
	if(!Query::VerificarClave($rut,$pass)){
		echo "0";
	}
	else{
		$_SESSION['RUT'] = $rut;

		$idMatriculas = Query::BuscarMatriculas("Persona_RUT = $rut");
		if($idMatriculas){
		$idMatriculas=$idMatriculas[0];}
                if($idMatriculas != false){
                    $_SESSION['idMatriculas'] = $idMatriculas;
                } else $_SESSION['idMatriculas'] = false;

		$idContabilidad= Query::BuscarContabilidad("Persona_RUT = $rut");
		if($idContabilidad){
		$idContabilidad=$idContabilidad[0];}
                if($idContabilidad != false){
                    $_SESSION['idContabilidad'] = $idContabilidad;
                } else $_SESSION['idContabilidad'] = false;
        $idAdmin = Query::BuscarAdmin("Persona_RUT = $rut");
		if($idAdmin){
		$idAdmin=$idAdmin[0];
		}
                if($idAdmin != false){
                    $_SESSION['idAdmin'] = $idAdmin;
                } else $_SESSION['idAdmin'] = false;

		echo "1";
	}
       // print_r($_SESSION);
?>
