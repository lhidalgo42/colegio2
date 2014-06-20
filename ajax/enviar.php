<?php
include_once'utilidades.php';
include '../sql/sql.php';
$cccc=new sql();
$exito=1;
session_start();
$_SESSION['envio']=$_POST;
 if($_POST['familia'][0]!="" && $_POST['familia'][1]!="")
 $idFamilia = $cccc->sql_id("INSERT INTO familia(Familia,Matriculas_Persona_RUT,Fecha_Ins) VALUES ( '".$_POST['familia'][0]."', '".$_SESSION['RUT']."',NOW())");
if(!$idFamilia)
die("0");
 if($_POST['familia'][1]=="Mama")
 $ae=0; //Apoderado Economico
 else
 $ae=1; //Apoderado Economico
  for($i=0;$i<2;$i++)
 {
 if($ae==$i){
  $s=1;
 }
 else{
  $s=0;
 }
 $_POST['Papas'][$i][0]=validadorRUT($_POST['Papas'][$i][0]);
   $idPadre=$cccc->sql_id("INSERT INTO papas (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Apoderado_Economico, Profesion,Familia_ID, Direccion, comunas_ID, Email, Lugar_Trabajo, Direccion_Trabajo, Telefonos) VALUES ('".$_POST['Papas'][$i][0]."', '".$_POST['Papas'][$i][1]."', '".$_POST['Papas'][$i][2]."', '".$_POST['Papas'][$i][3]."', UNHEX('".$i."'),'".$_POST['Papas'][$i][4]."', NOW(), UNHEX('".$s."'), '".$_POST['Papas'][$i][5]."', '".$idFamilia."', '".$_POST['Papas'][$i][6]."', '".$_POST['Papas'][$i][7]."', '".$_POST['Papas'][$i][8]."', '".$_POST['Papas'][$i][9]."', '".$_POST['Papas'][$i][10]."', '".$_POST['Papas'][$i][11]."')");
    if($s==1){
    $rutE=$idPadre;
    }
    if(!$idPadre){
        $exito=0;
    }
}
 
 for($i=0;$i<4;$i++){
	if($_POST['alumnos'][$i][0]!=="")
	{
	 if($_POST['alumnos'][$i][9]=="Cheque")
     $tipo=1;
	 if($_POST['alumnos'][$i][9]=="Letra")
     $tipo=2;
     if($_POST['alumnos'][$i][9]=="Efectivo")
     $tipo=3;
     $pagoMatricula =$cccc->sql_id("INSERT INTO pago_matricula (N_de_Boleta, Monto, Fecha) VALUES ('".$_POST['alumnos'][$i][8]."', '".$_POST['alumnos'][$i][12]."', '".$_POST['alumnos'][$i][13]."')");
        if(!$pagoMatricula){
            $exito=0;
        }
     $pago=$cccc->sql_id("INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_ID) VALUES ('".$_POST['alumnos'][$i][11]."','".$_POST['alumnos'][$i][12]."', '".$_POST['alumnos'][$i][13]."', '".$_POST['alumnos'][$i][10]."', '".$tipo."',NOW(), '".$rutE."');");
        if(!$pago){
            $exito=0;
        }
     $cccc->sql_i("INSERT INTO pago_has_documentos (pago_ID, documentos_ID) VALUES ('".$pago."', '".$pagoMatricula."');");
 	 if($_POST['alumnos'][$i][17]=="Cheque"){
         $tipo=1;
     }
	 if($_POST['alumnos'][$i][17]=="Letra"){
         $tipo=2;
     }
	 if($_POST['alumnos'][$i][17]=="Efectivo"){
         $tipo=3;
     }
     $pagoSeguro = $cccc->sql_id("INSERT INTO pago_seguro_escolar (Vale_N, Monto, Fecha, Lugar) VALUES ('".$_POST['alumnos'][$i][14]."', '".$_POST['alumnos'][$i][20]."', '".$_POST['alumnos'][$i][21]."', '".$_POST['alumnos'][$i][16]."')");
        if(!$pagoSeguro){
            $exito=0;
        }
     $pago=$cccc->sql_id("INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_ID) VALUES ('".$_POST['alumnos'][$i][19]."','".$_POST['alumnos'][$i][20]."', '".$_POST['alumnos'][$i][21]."', '".$_POST['alumnos'][$i][18]."', '".$tipo."',NOW(), '".$rutE."');");
        if(!$pago){
            $exito=0;
        }
     $cccc->sql_i("INSERT INTO pago_seguro_escolar_has_pago (pago_seguro_escolar_ID, pago_ID) VALUES ('".$pagoSeguro."','".$pago."');");
     $nino=$cccc->sql_i("INSERT INTO nino (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Curso, Pago_Matricula_ID, Pago_seguro_escolar_ID, Familia_ID, Beca_1, Beca_2, Colegio_anterior,Nuevo)	VALUES ('".$_POST['alumnos'][$i][0]."', '".$_POST['alumnos'][$i][1]."', '".$_POST['alumnos'][$i][2]."', '".$_POST['alumnos'][$i][3]."', UNHEX('".$_POST['alumnos'][$i][6]."'), '".$_POST['alumnos'][$i][4]."', NOW(), '".$_POST['alumnos'][$i][7]."', '".$pagoMatricula."', '".$pagoSeguro."', '".$idFamilia."', '".$_POST['alumnos'][$i][22]."', '".$_POST['alumnos'][$i][23]."', '".$_POST['alumnos'][$i][5]."','".$_POST['alumnos'][$i][24]."')");
        if(!$nino){
            $exito=0;
	}
   }
 }
$a=count($_POST['documentos']);
 for ($i=0; $i < count($_POST['documentos']);$i++){
	 if($_POST['documentos'][$i][8]=="Cheque"){
         $tipo=1;
     }
	 if($_POST['documentos'][$i][8]=="Letra"){
         $tipo=2;
     }
	 if($_POST['documentos'][$i][8]=="Efectivo"){
         $tipo=3;
     }
     $documento= $cccc->sql_id("INSERT INTO documentos (NBoleta, familia_ID, Colegiatura, Materiales, Cuota_Inc, Almuerzo, Deuda, Observaciones, UF_ID) VALUES ('".$_POST['documentos'][$i][12]."', '".$idFamilia."', '".$_POST['documentos'][$i][1]."', '".$_POST['documentos'][$i][2]."', '".$_POST['documentos'][$i][3]."', '".$_POST['documentos'][$i][4]."', '".$_POST['documentos'][$i][5]."', '".$_POST['documentos'][$i][7]."','".$_POST['documentos'][$i][13]."');");
     if(!$documento){
         $exito=0;
     }
    $pago= $cccc->sql_id("INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_ID) VALUES ('".$_POST['documentos'][$i][10]."','".$_POST['documentos'][$i][11]."', '".$_POST['documentos'][$i][0]."', '".$_POST['documentos'][$i][9]."', '".$tipo."',NOW(), '".$rutE."');");
     if(!$pago){
         $exito=0;
     }
    $cccc->sql_i("INSERT INTO pago_has_documentos (pago_ID, documentos_ID) VALUES ('".$pago."', '".$documento."');");
 }
echo $exito;
 ?>