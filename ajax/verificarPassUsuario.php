<?php
include_once('utilidades.php');
include "../sql/sql.php";
$sql = new sql();
	
	session_start();
	session_unset();        
         
	$rut = validadorRUT($_POST['rut']);
	$pass = md5($_POST['pass']);
    $query = $sql->sql_s("SELECT count(*) as C FROM persona WHERE RUT = '".$rut."' AND Clave = '".$pass."';");
	if($query[0]['C']!=1){
		echo "0";
	}
	else{
		$_SESSION['RUT'] = $rut;
$where = "Persona_RUT = $rut";
		$idMatriculas = $sql->sql_s("SELECT Persona_RUT, Ultimo_Login FROM matriculas WHERE Persona_RUT = ".$rut."");
		if($idMatriculas){
		$idMatriculas=$idMatriculas[0];
        }
                if($idMatriculas != false){
                    $_SESSION['idMatriculas'] = $idMatriculas;
                } else $_SESSION['idMatriculas'] = false;
		$idContabilidad = $sql->sql_s("SELECT Persona_RUT, Ultimo_Login FROM contabilidad WHERE Persona_RUT = ".$rut."");
		if($idContabilidad){
		$idContabilidad=$idContabilidad[0];}
                if($idContabilidad != false){
                    $_SESSION['idContabilidad'] = $idContabilidad;
                } else $_SESSION['idContabilidad'] = false;
        $idAdmin = $sql->sql_s("SELECT Persona_RUT, Ultimo_Login FROM admin WHERE Persona_RUT = ".$rut."");
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
