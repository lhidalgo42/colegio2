<br>
<br>
<table class='table table-hover' border=1 >
<thead>
<tr>
<td><b style="text-align:center;">ID</b></td> 
<td><b style="text-align:center;">Nombre</b></td>
<td><b style="text-align:center;">Editar</b></td>
<td><b style="text-align:center;">Borrar</b></td>
</tr>
</thead>
<?php
$datos=Banco::Mostrar();
foreach($datos as $dato) { 
echo "<tr id='".$dato['ID']."'>";  
echo "<td><center>".$dato['ID']."</center></td>";  
echo "<td><center>".$dato['Nombre']."</center></td>";  
echo "<td><center><a href=edit.php?ID=".$dato['ID']."><i class='icon-pencil'></i></a></center></td>";
echo "<td><center><a href=delete.php?ID=".$dato['ID']."><i class='icon-remove'></i></a></center></td> "; 
echo "</tr>"; 
}
echo "</table>"; 
echo "<a href=new.php><i class='icon-plus'></i></a>"; 
?>