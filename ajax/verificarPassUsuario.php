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

	include_once(dirname(__FILE__).'/utilidades.php');
    include_once(dirname(__FILE__).'/../Capa_Controladores/persona.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/matriculas.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/contabilidad.php');
	include_once(dirname(__FILE__).'/../Capa_Controladores/admin.php');
	
	session_start();
	session_unset();        
         
	$rut = validadorRUT($_POST['rut']);
	$pass = $_POST['pass'];
	if(!Persona::VerificarClave($rut,$pass)){
		echo "0";
	}
	else{
		$_SESSION['RUT'] = $rut;

		$idMatriculas = Matriculas::Encontrar($rut);
		if($idMatriculas){
		$idMatriculas=$idMatriculas[0];}
                if($idMatriculas != false){
                    $_SESSION['idMatriculas'] = $idMatriculas;
                } else $_SESSION['idMatriculas'] = false;

		$idContabilidad= Contabilidad::Encontrar($rut);
		if($idContabilidad){
		$idContabilidad=$idContabilidad[0];}
                if($idContabilidad != false){
                    $_SESSION['idContabilidad'] = $idContabilidad;
                } else $_SESSION['idContabilidad'] = false;
        $idAdmin = Admin::Encontrar($rut);
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
