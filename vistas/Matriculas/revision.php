<?php 
include '../../ajax/sessionCheck.php';
include '../../datos/Select.php';
iniciarCookie();
verificarIP(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Matriculas - Revisión de datos</title>
<link rel="stylesheet" href="../../css/bootstrap-combined.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
body {
				font-style:italic;
                font-weight:bold;
                font-size:1em;	
}
</style>
<script type="text/css">
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
</head>

<body id="cuerpo">
<?php //print_r($_SESSION['envio']);
$data=$_SESSION['envio']; ?>
    <div class="container-fluid">
               <br>
        <br>

        <div class="span12" id="panel_superior">
            <div class="span2 pull-left"><button type="button" class="btn btn-info" onclick="pdf()"><i class="icon-print"></i><strong>Imprimir</strong></button></div>


            <table class="table  table-bordered" style="float: right;width: 370px;min-height: 1px;margin-left: 30px;">
                <tr>
                    <td><strong>FAMILIA</strong></td>
                    <td colspan="3"><?php echo $data['familia'][0]; ?></td>
                </tr>
                <tr>
                    <td><strong>MADRE</strong></td>
                    <td><?php echo "".$data['Papas'][0][1]." ".$data['Papas'][0][2].""; ?></td>
                    <td><strong>PADRE</strong></td>
                    <td><?php echo "".$data['Papas'][1][1]." ".$data['Papas'][1][2].""; ?></td>
                </tr>
            </table>
                <table style="margin-left: 230px;width: 170px;float: left;min-height: 1px;line-height: 20px;">
                    <tr>
                        <td><strong>AÑO</strong></td>
                        <td>&nbsp;&nbsp;<u>2014</u></td>
                    </tr>
                </table>
    	</div>
        <div class="span12">
        <table class="table table-bordered" border="1">
            <thead>
                 <tr>
                    <td rowspan="2"><br><center><strong>NOMBRE DE LOS NIÑOS</strong></center></td>
                    <td rowspan="2"><br><center><strong>CURSO</strong></center></td>
                    <td colspan="3"><center><strong>PAGO DE MATRICULA</strong></center></td>
                    <td colspan="3"><center><strong>PAGO DE SEGURO ESCOLAR</strong></center></td>
                    <td colspan="2"><center><strong>BECAS</strong></center></td>
                 </tr>
                 <tr> 
                    <td><center>N° Boleta</center></td>
                    <td><center>Monto</center></td>
                    <td><center>Fecha</center></td>
                    <td><center>N° Vale</center></td>
                    <td><center>Monto</center></td>
                    <td><center>Fecha</center></td>
                    <td><center>1 Semestre</center></td>
                    <td><center>2 Semestre</center></td>
                </tr>
          </thead>
          <?php $b=0;
		  for($a=0;$a<4;$a++){
			if($data['alumnos'][$a][0]!="")
			{
				$b++;
			}
		  }?>
          <tbody><?php for($i=0;$i<$b;$i++){?>
                <tr>
                    <td><?php echo "".$data['alumnos'][$i][1]." ".$data['alumnos'][$i][2].""; ?></td>
                    <td><?php echo $data['alumnos'][$i][7]; ?></td>
                    <td><?php echo $data['alumnos'][$i][8]; ?></td>
                    <td><?php echo $data['alumnos'][$i][12]; ?></td>
                    <td><?php echo $data['alumnos'][$i][13]; ?></td>
                    <td><?php echo $data['alumnos'][$i][14]; ?></td>
                    <td><?php echo $data['alumnos'][$i][20]; ?></td>
                    <td><?php echo $data['alumnos'][$i][21]; ?></td>
                    <td><?php echo $data['alumnos'][$i][22]; ?></td>
                    <td><?php echo $data['alumnos'][$i][23]; ?></td>
                </tr><?php }?>
            </tbody>
        </table>
        </div>
        <div class="span12">
        	<table  width="100%" border="1" class="table table-bordered">
                <thead>
                  <tr>
                    <td colspan="13"><center><strong>DOCUMENTOS GIRADOS O ACEPTADOS POR EL APODERADO POR CUOTAS REGULARES MENSUALES</strong></center></td>
                  </tr>
                  <tr>
                  	<td rowspan="2"><center>NUMERO BOLETA</center></td>
                    <td rowspan="2"><center>VENCIMINETO</center></td>
                    <td rowspan="2"><center>Cheque - Letra Mandado Tipo/Detalle Documento N°</center></td>
                    <td colspan="5"><center><strong>COMPONENTES DEL MONTO (PESOS)</strong></center></td>
                    <td rowspan="2"><center>
                    MONTO TOTAL POR DOC.
                    </center></td>
                    <td rowspan="2"><center>FECHA DE DEPOSITO</center></td>
                    <td rowspan="2"><center>OBSERVACIONES</center></td>
                  </tr>
                  <tr>
                    
                    <td><center>Colegiatura</center></td>
                    <td ><center>Materiales</center></td>
                    <td ><center>Cuota de Incorporación</center></td>    
                    <td><center>Almuerzo</center></td>
                    <td><center>Deuda Escolar 2013</center></td>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $a=0;
                  $b=0;
                  $c=0;
                  $d=0;
                  $e=0;
				  if($data['documentos'][$i][1]=="")$data['documentos'][$i][1]=0;
				  if($data['documentos'][$i][2]=="")$data['documentos'][$i][2]=0;
				  if($data['documentos'][$i][3]=="")$data['documentos'][$i][3]=0;
				  if($data['documentos'][$i][4]=="")$data['documentos'][$i][4]=0;
				  if($data['documentos'][$i][5]=="")$data['documentos'][$i][5]=0;
				  $g=count($data['documentos']);
				  for($i=0;$i<$g;$i++){ 
				  if($data['documentos'][$i][1]=="")$data['documentos'][$i][1]=0;
				  if($data['documentos'][$i][2]=="")$data['documentos'][$i][2]=0;
				  if($data['documentos'][$i][3]=="")$data['documentos'][$i][3]=0;
				  if($data['documentos'][$i][4]=="")$data['documentos'][$i][4]=0;
				  if($data['documentos'][$i][5]=="")$data['documentos'][$i][5]=0;
                      if($data['documentos'][$i][9])
				  $data['documentos'][$i][9]=Select::BuscarBanco($data['documentos'][$i][9]);
				  $a=$a+$data['documentos'][$i][1];
				  $b=$b+$data['documentos'][$i][2];
				  $c=$c+$data['documentos'][$i][3];
				  $d=$d+$data['documentos'][$i][4];
				  $e=$e+$data['documentos'][$i][5]; 
				  $tf=$data['documentos'][$i][1]+$data['documentos'][$i][2]+$data['documentos'][$i][3]+$data['documentos'][$i][4]+$data['documentos'][$i][5];
                  ?>
                  <tr>
                    <td><?php echo $data['documentos'][$i][12]; ?></td>
                    <td><?php echo $data['documentos'][$i][0]; ?></td>
                    <td><?php echo "".substr($data['documentos'][$i][9], 0,9)." #".$data['documentos'][$i][10]; ?></td>
                    <td><center><?php echo $data['documentos'][$i][1]; ?></center></td>
                    <td><center><?php echo $data['documentos'][$i][2]; ?></center></td>
                    <td><center><?php echo $data['documentos'][$i][3]; ?></center></td>
                    <td><center><?php echo $data['documentos'][$i][4]; ?></center></td>
                    <td><center><?php echo $data['documentos'][$i][5]; ?></center></td>
                    <td><center><?php echo $tf; ?></center></td>
                    <td><center>-</center></td>
                    <td><?php echo $data['documentos'][$i][7]; ?></td>
                  </tr>
                  <?php
                  }

				  $t=$a+$b+$c+$d+$e;
                  ?> </tbody>
                  <tfoot>
                  <tr>
                  <td height="38" colspan="3"><center><strong>Totales :</strong></center></td>
                  <td><center><?php echo $a; ?></center></td>
                  <td><center><?php echo $b; ?></center></td>
                  <td><center><?php echo $c; ?></center></td>
                  <td><center><?php echo $d; ?></center></td>
                  <td><center><?php echo $e; ?></center></td>
                  <td><center><?php echo $t; ?></center></td>
                  </tfoot>
                </table>
        </div>
        <div class="clearfix"></div>
        <div class="span12" style="text-align:center;">
            <button onClick='window.location.href = "edit.php";' class="btn btn-danger btn-large span5">Volver y Corregir Datos</button>
           <button onClick="preguntar()" class="btn btn-success btn-large span5">Terminar</button>
           </div>
       </div>
    </div>
    <div id="ayuda"></div>
    <script>
        function preguntar(){
            confirmar=confirm("¿Esta seguro que desea continuar?");
            if (confirmar){
                $.ajax({
                    url: "../../ajax/enviar.php",
                    success: function( data ) {
                        if(data==1){
                            window.location.href = "../../vistas/decision2.php";
                        }
                        else{
                            $("#ayuda").html("ha Ocurrido un error<br>"+data);
                        }
                    }
                });
            }
        }
        function pdf(){

                var data =$("html");
            $.ajax({
                url: "../../ajax/pdf.php",
                data: {data:data},
                type: "POST",
                beforeSend: function(){},
                success: function( data ) {
                    $("#ayuda").html(data);
                }
            });}
    </script>
</body>
</html>