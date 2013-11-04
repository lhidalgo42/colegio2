<?php
	/*+ 
	 * Descripcion: Envia todos los datos a la base de datos
	 * los datos se almacenan y devuelve respuesta si todo salio exitoso
	 * Input (POST)
	 * array(todos los datos del formulario de inscripcion de alumnos) 
	 * Output: int de estado 
	 */
	 
include'../datos/insert.php';
include_once'utilidades.php';
session_start();  
$_POST=$_SESSION['envio'];
 if($_POST['familia'][0]!="" && $_POST['familia'][1]!=""){
$idFamilia=Insert::Familia($_POST['familia'][0],$_SESSION['RUT']); 
 }
 if($_POST['familia'][1]=="Mama")
 {$ae=0;} else {$ae=1;}
 for($i=0;$i<2;$i++)
 {
if($_POST['Papas'][$i][0]!=""){
 if($ae==$i){$s=1;} else{$s=0;}
 $_POST['Papas'][$i][0]=validadorRUT($_POST['Papas'][$i][0]);
$papa=Insert::Papa($_POST['Papas'][$i][0], $_POST['Papas'][$i][1], $_POST['Papas'][$i][2], $_POST['Papas'][$i][3],$i,$_POST['Papas'][$i][4],$s,$_POST['Papas'][$i][5],$idFamilia,$_POST['Papas'][$i][6],$_POST['Papas'][$i][7],$_POST['Papas'][$i][8],$_POST['Papas'][$i][9],$_POST['Papas'][$i][10],$_POST['Papas'][$i][11],$_POST['Papas'][$i][11]);
 }
}
 
 for($i=0;$i<4;$i++){
	if($_POST['alumnos'][$i][0]!=="")
	{ 
	 if($_POST['alumnos'][$i][9]=="Cheque"){$tipo=1;}
	 if($_POST['alumnos'][$i][9]=="Letra"){$tipo=2;}
	 if($_POST['alumnos'][$i][9]=="Efectivo"){$tipo=3;}
$pagoMatricula=Insert::PagoMatricula($_POST['alumnos'][$i][8],$_POST['alumnos'][$i][12],$_POST['alumnos'][$i][13]);
$pago=Insert::Pago($_POST['alumnos'][$i][11],$_POST['alumnos'][$i][12],$_POST['alumnos'][$i][13],$_POST['alumnos'][$i][10],$tipo);
 	 if($_POST['alumnos'][$i][17]=="Cheque"){$tipo=1;}
	 if($_POST['alumnos'][$i][17]=="Letra"){$tipo=2;}
	 if($_POST['alumnos'][$i][17]=="Efectivo"){$tipo=3;}
$relacion=Insert::R_PagoMatricula($pago,$pagoMatricula);	 
 $pagoSeguro=Insert::PagoSeguroEscolar($_POST['alumnos'][$i][14],$_POST['alumnos'][$i][20],$_POST['alumnos'][$i][21],$_POST['alumnos'][$i][16]);
 $pago=Insert::Pago($_POST['alumnos'][$i][19],$_POST['alumnos'][$i][20],$_POST['alumnos'][$i][21],$_POST['alumnos'][$i][18],$tipo);
 $relacion=Insert::R_PagoSeguro($pago,$pagoSeguro);
$nino=Insert::Nino($_POST['alumnos'][$i][0],$_POST['alumnos'][$i][1],$_POST['alumnos'][$i][2],$_POST['alumnos'][$i][3],$_POST['alumnos'][$i][6],$_POST['alumnos'][$i][4],$_POST['alumnos'][$i][7],$pagoMatricula,$pagoSeguro,$idFamilia,$_POST['alumnos'][$i][22],$_POST['alumnos'][$i][23],$_POST['alumnos'][$i][5],$_POST['alumnos'][$i][24]);
	}
 }
$a=count($_POST['documentos']);
echo $a;
 for ($i=0; $i < count($_POST['documentos']);$i++){
	 if($_POST['documentos'][$i][8]=="Cheque"){$tipo=1;}
	 if($_POST['documentos'][$i][8]=="Letra"){$tipo=2;}
	 if($_POST['documentos'][$i][8]=="Efectivo"){$tipo=3;}
$documento=Insert::Documento($_POST['documentos'][$i][12],$idFamilia,$_POST['documentos'][$i][1],$_POST['documentos'][$i][2],$_POST['documentos'][$i][3],$_POST['documentos'][$i][4],$_POST['documentos'][$i][5],$_POST['documentos'][$i][7],$_POST['documentos'][$i][13]);
$pago=Insert::Pago($_POST['documentos'][$i][10],$_POST['documentos'][$i][11],$_POST['documentos'][$i][0],$_POST['documentos'][$i][9],$tipo);
 $relacion=Insert::R_PagoDocumento($pago,$documento);
 }
 ?>