<table border="1" class="table table-bordered span9">
<thead>
  <tr>
    <td  colspan="2"><center><strong>NOMBRE DE LOS NIÑOS</strong></center></td>
    <td rowspan="2"><center><strong>CURSO</strong></center></td>
    <td colspan="3"><center><strong>PAGO DE MATRICULA</strong></center></td>
    <td colspan="3"><center><strong>PAGO DE SEGURO ESCOLAR</strong></center></td>
    <td colspan="2"><center><strong>BECAS</strong></center></td>
  </tr>
  <tr>
  	<td><center>RUT</center></td>
    <td><center>Nombre</center></td>  
    <td><center>N° de Boleta</center></td>
    <td><center>MONTO</center></td>
    <td><center>FECHA</center></td>
    <td><center>VALE N°</center></td>
    <td><center>MONTO</center></td>
    <td><center>FECHA</center></td>
    <td><center>1 SEMESTRE</center></td>
    <td><center>2 SEMESTRE</center></td>
  </tr>
  </thead>
  <?php 
  $cursos=array("Kinder","1° Basico","2° Basico","3° Basico","4° Basico", "5° Basico","6° Basico","7° Basico","8° Basico");
  for($i=1;$i<5;$i++)
  {?>
  <tr>
  <td class="span"><input type="text" style="width:100px;" id="<?php echo"rut".$i.""?>" placeholder="Rut"></td>
  
    <td class="span2"><input type="text" class="span2" onFocus="verificarRut(rut<?php echo $i; ?>)" id="<?php echo"name".$i.""?>" placeholder="Nombre"></td>
    
    <td class="span1"><select id="Curso<?php echo $i; ?>" onChange="curso(<?php echo $i; ?>)" class="input-small"><option></option>
    <?php for($e=0;$e<9;$e++){ ?><<option value="<?php echo $cursos[$e]; ?>"><?php echo $cursos[$e]; ?></option> <?php } ?></select></td>
    
    <td class="span1"><input type="number" class="span1" value="0" min="0" id="<?php echo"bolM".$i.""?>" placeholder="N° de Boleta"></td>
    
    <td class="span1"><input type="number" class="span1" valorMonto="" value="0" min="0" id="<?php echo"montoM".$i.""?>" placeholder="Monto"></td>
    
    <td><input type="date" style="width:115px;" id="<?php echo"fechaM".$i.""?>" placeholder="Fecha"></td>
    
    <td><input type="number" style="width:30px;" class="span1" value="0" min="0" id="<?php echo"valeS".$i.""?>" placeholder="VALE N°"></td>
    
    <td><a id="modal<?php echo $i; ?>" role="button" onClick="MostrarC(<?php echo $i; ?>)"class="btn" data-toggle="modal">Clinica</a></td>
    
    <td><input type="date" style="width:115px;" id="<?php echo"fechaS".$i.""?>" placeholder="Fecha"></td>
    
    <td><input type="number" style="width:50px;" onChange="beca(<?php echo $i; ?>)" id="<?php echo"1sem".$i.""?>" placeholder="% Beca"></td>
    
    <td><input type="number" style="width:50px;" id="<?php echo"2sem".$i.""?>" placeholder="% Beca"></td>
    
  </tr>
  <?php 
  }
  ?>
</table>