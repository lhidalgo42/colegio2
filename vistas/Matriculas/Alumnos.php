<table border="1" class="table table-bordered">
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
  <td class="span"><input type="text" style="width:85px;" id="<?php echo"rut".$i.""?>" placeholder="Rut"></td>
  
    <td class="span2"><a id="modalNino<?php echo $i; ?>" role="button" onClick="MostrarNino(<?php echo $i; ?>)"class="btn" data-toggle="modal" nombre="" apellidoP="" apellidoM="" fechanac="" colegioanterior="">Nombre</a></td>
    
    <td class="span1"><select id="Curso<?php echo $i; ?>" onChange="curso(<?php echo $i; ?>)" class="input-small"><option></option>
    <?php for($e=0;$e<9;$e++){ ?><<option value="<?php echo $cursos[$e]; ?>"><?php echo $cursos[$e]; ?></option> <?php } ?></select></td>
    
    <td class="span1"><input type="number" class="span1" min="0" id="<?php echo"bolM".$i.""?>" <?php if($i==1){?> onKeyUp="boleta()" <?php } ?> placeholder="0"></td>
    
    <td class="span1"><div class="input-prepend">
  <span class="add-on">$</span>
<input type="number" style="width:50px;" valorMonto="" min="0" id="<?php echo"montoM".$i.""?>" placeholder="Monto"></div></td>
    
    <td><div class="bfh-datepicker" data-format="d-m-y">
  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
    <span class="add-on"><i class="icon-calendar"></i></span>
    <input type="text" style="width:77px;"  id="<?php echo"fechaM".$i.""?>" placeholder="Fecha"  readonly>
  </div>
  <div class="bfh-datepicker-calendar">
    <table class="calendar table table-bordered">
      <thead>
        <tr class="months-header">
          <th class="month" colspan="4">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
          <th class="year" colspan="3">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
        </tr>
        <tr class="days-header">
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div></td>
    
    <td><input type="number" style="width:30px;" class="span1" min="0" <?php if($i==1){?> onKeyUp="vale()" <?php } ?> id="<?php echo"valeS".$i.""?>" placeholder="0"></td>
    
    <td><a id="modalC<?php echo $i; ?>" role="button" onClick="MostrarC(<?php echo $i; ?>)"class="btn" data-toggle="modal" tipo="" nombre="" valor="">Clinica</a></td>
    
    <td><div class="bfh-datepicker" data-format="d-m-y">
  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
    <span class="add-on"><i class="icon-calendar"></i></span>
    <input type="text" style="width:77px;" id="<?php echo"fechaS".$i.""?>" placeholder="Fecha"  readonly>
  </div>
  <div class="bfh-datepicker-calendar">
    <table class="calendar table table-bordered">
      <thead>
        <tr class="months-header">
          <th class="month" colspan="4">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
          <th class="year" colspan="3">
            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
            <span></span>
            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
          </th>
        </tr>
        <tr class="days-header">
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div></td>
    
    <td><div class="input-prepend">
  <span class="add-on">%</span>
<input type="number" style="width:30px;" max="100" min="0" onChange="beca(<?php echo $i; ?>)" id="<?php echo"1sem".$i.""?>"></div></td>
    
    <td><div class="input-prepend">
  <span class="add-on">%</span>
<input type="number" style="width:30px;" max="100" min="0" id="<?php echo"2sem".$i.""?>" ></div></td>
    
  </tr>
  <?php 
  }
  ?>
</table>