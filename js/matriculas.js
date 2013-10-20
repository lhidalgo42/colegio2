$('#cuotas').keyup(function(){
	alert("asdasd");
  		var cuotas = +$('#cuotas').val();			
		$('#pagoCuotas').html("");
		for(var i=1;i<cuotas+1;i++){
			$('#pagoCuotas').append('<tr><td><input style="width:115px;" type="date" id="FechaBol'+i+'; ?>"></td><td style="width:100px;"><center><a id="modalP'+i+'; ?>" role="button" onClick="MostrarP('+i+'; ?>)"class="btn" data-toggle="modal" tipo="" chequebanco="" chequenumero="" chequemonto="" chequefecha="" letranumero="" letramonto="" efectivomonto="">Seleccionar</a></center></td><!-- suma desde aqui--><td><input type="number" style="width:80px;" min="0"  value="0" id="Col'+i+'"></td><td><input type="number" style="width:80px;" min="0" value="0" id="Mat'+i+'"></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0" id="Cou'+i+'"></td><td><input type="number" style="width:60px;" min="0" value="0" id="Alm'+i+'" ></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" value="0"  id="Deu'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="Total'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
		}				
	})
