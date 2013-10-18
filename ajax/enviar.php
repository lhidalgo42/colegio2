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
   
 print_r($_POST); 
 // inserta la familia en la bbdd y te devuelve el id de esta
 if($_POST['familia'][0]!="" && $_POST['familia'][1]!=""){
 //$idFamilia=Query::InsertarFamilia($_POST['familia'][0],$_SESSION['RUT']); 
 $idFamilia=1;
 if($idFamilia)
 {
	echo "Familia  ".$_POST['familia'][0]." insertada correctamente<br>";
 }
 }
 if($_POST['familia'][1]=="Mama")
 {$ae=0;} else {$ae=1;}
 // inserta los datos de los 2 papas 

 for($i=0;$i<2;$i++)
 { if($i==1){$a="papa";$s=1;}else{$a="mama";$s=0;}
 if($a=="mama" && $ae==0){$b=1;} else if($a=="papa" && $ae==1){$b=1;}else{$b=0;}
 $_POST[$a][0]=validadorRUT($_POST[$a][0]);
 //$papa=Query::InsertarPapa( $_POST[$a][0], $_POST[$a][1], $_POST[$a][2], $_POST[$a][3],$s,$_POST[$a][4],$b,$_POST[$a][5],$idFamilia,$_POST[$a][6],$_POST[$a][7],$_POST[$a][8],$_POST[$a][9],$_POST[$a][10],$_POST[$a][11]);
 if($papa)
 {
	echo "".$_POST[$a][1]." ".$_POST[$a][2]." ".$_POST[$a][3]." insertado de manera exitosa en la Base de Datos<br>";
 }
 }

 
 //[alumnos] => Array ( [0] => Array ( [0] => 11.111.111-1 [1] => Juanito Alcachofa [2] => 1° Basico [3] => 100 [4] => 200000 [5] => 2013-10-18 [6] => 30 [7] => CA [8] => Clinica Alemana [9] => 42000 [10] => 2013-10-18 [11] => 10 [12] => 10 ) [1] => Array ( [0] => 22.222.222-2 [1] => Pedro Blowme [2] => 7° Basico [3] => 200 [4] => 200000 [5] => 2013-10-20 [6] => 60 [7] => CSM [8] => Clinica Santa Maria [9] => 39000 [10] => 2013-10-20 [11] => 20 [12] => 20 )
 ?>