<table border="1" class="table table-bordered" id="tablaAlumnos">
<thead>
  <tr>
    <td  colspan="2"><center><strong>NOMBRE DE LOS NIÑOS</strong></center></td>
    <td rowspan="2"><center><strong>CURSO</strong></center></td>
    <td colspan="3"><center><strong>PAGO DE MATRICULA</strong></center></td>
    <td colspan="3"><center><strong>PAGO DE SEGURO ESCOLAR</strong></center></td>
    <td colspan="2"><center><strong>BECAS</strong></center></td>
  </tr>
  <tr>
    <td><center>Nombre</center></td>  
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
  <?php 
  $cursos=array("Kinder","1° Basico","2° Basico","3° Basico","4° Basico", "5° Basico","6° Basico","7° Basico","8° Basico");
  for($i=1;$i<5;$i++)
  {?>
  <tr>  
    <td class="span2"><a id="modalNino<?php echo $i; ?>" role="button" onClick="MostrarNino(<?php echo $i; ?>)"class="btn" data-toggle="modal" nombre="" apellidoP="" apellidoM="" fechanac="" colegioanterior="">Nombre</a></td>
    
    <td class="span1">
<select id="Curso<?php echo $i; ?>" onChange="curso(<?php echo $i; ?>)" class="input-small"><option></option>
    <?php for($e=0;$e<9;$e++){ ?><<option value="<?php echo $cursos[$e]; ?>"><?php echo $cursos[$e]; ?></option> <?php } ?></select></td>
    
    <td class="span1"><input type="number" class="span1" min="0" id="<?php echo"bolM".$i.""?>" value="0" ></td>
    
    <td><a id="modalPM<?php echo $i; ?>" role="button" onClick="MostrarPM(<?php echo $i; ?>)"class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Pago</a></td>
    
    <td>
    <input type="date" style="width:115px;"  id="<?php echo"fechaM".$i.""?>" placeholder="Fecha"  requiered></td>
    
    <td><input type="number" class="span1" min="0" id="<?php echo"valeS".$i.""?>" value="0"></td>
    
    <td><a id="modalC<?php echo $i; ?>" role="button" onClick="MostrarC(<?php echo $i; ?>)"class="btn" data-toggle="modal" tipoc="" nombre="" tipop="" banco="" numero="" monto="">Clinica</a></td>
    
    <td>
    <input type="date" style="width:115px;" id="<?php echo"fechaS".$i.""?>" placeholder="Fecha"  requiered>
	</td>
    
    <td><div class="input-prepend">
  <span class="add-on">%</span>
<input type="number" style="width:30px;" max="100" min="0" onChange="beca(<?php echo $i; ?>)" id="<?php echo"1sem".$i.""?>" value="0"></div></td>
    
    <td><div class="input-prepend">
  <span class="add-on">%</span>
<input type="number" style="width:30px;" max="100" min="0" id="<?php echo"2sem".$i.""?>" value="0"></div></td>
    
  </tr>
  <?php 
  }
  ?>
</table>