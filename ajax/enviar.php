<?php
include_once'utilidades.php';
include_once'../datos/llamarQuery.php';
session_start();  
 $_POST=$_SESSION['envio'];
 if($_POST['familia'][0]!="" && $_POST['familia'][1]!=""){
 $sql ="INSERT INTO familia(Familia,Matriculas_Persona_RUT,Fecha_Ins) VALUES ( '".$_POST['familia'][0]."', '".$_SESSION['RUT']."',NOW())";
 $idFamilia=CallQueryReturnID($sql);}
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
   $sql="INSERT INTO papas (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Apoderado_Economico, Profesion,Familia_ID, Direccion, comunas_ID, Email, Lugar_Trabajo, Direccion_Trabajo, Telefonos) VALUES ('".$_POST['Papas'][$i][0]."', '".$_POST['Papas'][$i][1]."', '".$_POST['Papas'][$i][2]."', '".$_POST['Papas'][$i][3]."', UNHEX('".$i."'),'".$_POST['Papas'][$i][4]."', NOW(), UNHEX('".$s."'), '".$_POST['Papas'][$i][5]."', '".$idFamilia."', '".$_POST['Papas'][$i][6]."', '".$_POST['Papas'][$i][7]."', '".$_POST['Papas'][$i][8]."', '".$_POST['Papas'][$i][9]."', '".$_POST['Papas'][$i][10]."', '".$_POST['Papas'][$i][11]."')";
    $idPadre=CallQueryReturnID($sql);{
    if($s==1)
    $rutE=$idPadre;
    }
    if($idPadre)
        echo "padre $idPadre insertado<br>";

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
     $sql = "INSERT INTO pago_matricula (N_de_Boleta, Monto, Fecha) VALUES ('".$_POST['alumnos'][$i][8]."', '".$_POST['alumnos'][$i][12]."', '".$_POST['alumnos'][$i][13]."')";
     $pagoMatricula=CallQueryReturnID($sql);
        if($pagoMatricula)
            echo " pago de matricula $pagoMatricula insertado<br>";
     $sql="INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_RUT) VALUES ('".$_POST['alumnos'][$i][11]."','".$_POST['alumnos'][$i][12]."', '".$_POST['alumnos'][$i][13]."', '".$_POST['alumnos'][$i][10]."', '".$tipo."',NOW(), '".$rutE."');";
     $pago=CallQueryReturnID($sql);
        if($pago)
            echo "pago $pago insertado<br>";

     $sql="INSERT INTO pago_has_documentos (pago_ID, documentos_ID) VALUES ('".$pago."', '".$pagoMatricula."');";
     CallQuery($sql);
 	 if($_POST['alumnos'][$i][17]=="Cheque"){
         $tipo=1;
     }
	 if($_POST['alumnos'][$i][17]=="Letra"){
         $tipo=2;
     }
	 if($_POST['alumnos'][$i][17]=="Efectivo"){
         $tipo=3;
     }
     $sql = "INSERT INTO pago_seguro_escolar (Vale_N, Monto, Fecha, Lugar) VALUES ('".$_POST['alumnos'][$i][14]."', '".$_POST['alumnos'][$i][20]."', '".$_POST['alumnos'][$i][21]."', '".$_POST['alumnos'][$i][16]."')";
     $pagoSeguro=CallQueryReturnID($sql);
        if($pagoSeguro)
            echo "pago seguro $pagoSeguro insertado<br>";
     $sql="INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_RUT) VALUES ('".$_POST['alumnos'][$i][19]."','".$_POST['alumnos'][$i][20]."', '".$_POST['alumnos'][$i][21]."', '".$_POST['alumnos'][$i][18]."', '".$tipo."',NOW(), '".$rutE."');";
     $pago=CallQueryReturnID($sql);
        if($pago)
            echo "pago $pago insertado<br>";
     $sql="INSERT INTO pago_seguro_escolar_has_pago (pago_seguro_escolar_ID, pago_ID) VALUES ('".$pagoSeguro."','".$pago."');";
     CallQuery($sql);
     $sql="INSERT INTO nino (RUT, Nombre, Apellido1, Apellido2, Sexo, FechaNac, FechaIns, Curso, Pago_Matricula_ID, Pago_seguro_escolar_ID, Familia_ID, Beca_1, Beca_2, Colegio_anterior,Nuevo)	VALUES ('".$_POST['alumnos'][$i][0]."', '".$_POST['alumnos'][$i][1]."', '".$_POST['alumnos'][$i][2]."', '".$_POST['alumnos'][$i][3]."', UNHEX('".$_POST['alumnos'][$i][6]."'), '".$_POST['alumnos'][$i][4]."', NOW(), '".$_POST['alumnos'][$i][7]."', '".$pagoMatricula."', '".$pagoSeguro."', '".$idFamilia."', '".$_POST['alumnos'][$i][22]."', '".$_POST['alumnos'][$i][23]."', '".$_POST['alumnos'][$i][5]."','".$_POST['alumnos'][$i][24]."')";
     $nino=CallQueryReturnID($sql);
        echo $sql."<br>";
        if($nino)
            echo "nino $nino insertado<br>";
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
     $sql="INSERT INTO documentos (NBoleta, familia_ID, Colegiatura, Materiales, Cuota_Inc, Almuerzo, Deuda, Observaciones, UF_ID) VALUES ('".$_POST['documentos'][$i][12]."', '".$idFamilia."', '".$_POST['documentos'][$i][1]."', '".$_POST['documentos'][$i][2]."', '".$_POST['documentos'][$i][3]."', '".$_POST['documentos'][$i][4]."', '".$_POST['documentos'][$i][5]."', '".$_POST['documentos'][$i][7]."','".$_POST['documentos'][$i][13]."');";
    $documento=CallQueryReturnID($sql);
     if($documento)
         echo "documento $documento insertado<br>";
    $sql="INSERT INTO pago (Numero, Monto, Fecha, Bancos_ID, tipo_ID,Fecha_Ins,papas_RUT) VALUES ('".$_POST['documentos'][$i][10]."','".$_POST['documentos'][$i][11]."', '".$_POST['documentos'][$i][0]."', '".$_POST['documentos'][$i][9]."', '".$tipo."',NOW(), '".$rutE."');";
    $pago=CallQueryReturnID($sql);
     if($pago)
         echo "pago $pago insertado<br>";
    $sql ="INSERT INTO pago_has_documentos (pago_ID, documentos_ID) VALUES ('".$pago."', '".$documento."');";
    CallQuery($sql);

 }
 ?>