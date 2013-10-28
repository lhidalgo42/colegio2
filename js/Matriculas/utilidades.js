  	var actualizar = setInterval(function(){
		var cuotas = +$('#cuotas').val();
		var col = 0;
		var mat = 0;
		var alm = 0;
		var deu = 0;
		var totalC1 = 0;
		var totalC2 = 0;
		var totalCol = 0;
		var	totalReal= 0;
		for(var i=1; i< cuotas +1; i++)
		{
			total1 = 0;
			total2 = 0;
			col = +$('#Col'+i).val() + col;
			mat = +$('#Mat'+i).val() + mat;
			alm = +$('#Alm'+i).val() + alm;
			deu = +$('#Deu'+i).val() + deu;
			totalC1 = +$('#Col'+i).val() + +$('#Mat'+i).val();
			totalC2 = +$('#Alm'+i).val() + +$('#Deu'+i).val();
			totalCol = totalC1 + totalC2;
			totalReal = totalCol + totalReal
			$('#Total'+i).html(totalCol);	   
		}
		$('#ColT').html(col);
		$('#MatT').html(mat);
		$('#AlmT').html(alm);
		$('#DeuT').html(deu);
		$('#TotalT').html(totalReal);
		$("#familia").val(""+$("#modalPAPA").attr("apellido1")+" "+$("#modalMAMA").attr("apellido1")+"");		
	},500);
	
	  	var actualizar2 = setInterval(function(){
		var cuotas = +$('#cuotaInc').val();
		var cuo = 0;
		var totalCol = 0;
		var	totalReal= 0;
		for(var i=1; i< cuotas +1; i++)
		{
			cuo = +$('#Col'+i).val() + cuo;
			totalCuo = cuo;
			totalReal = totalCuo + totalReal;
			$('#TotalInc'+i).html(totalCuo);	   
		}
		$('#CuoTInc').html(cuo);
		$('#TotalTInc').html(totalReal);		
	},500);
	
function enviar(){
var familia = new Array();
familia[0] = $("#familia").val();
familia[1] = $("#AEconomico").children(".active").html()
var Papas = new Array();
for (var i = 0; i < 2; i++){
	 Papas[i] = new Array();
	  if (i == 1){var Data = "PAPA";}
	  if (i == 0){var Data = "MAMA";}
	 Papas[i][0] = $("#modal"+Data).attr("rut");
	 Papas[i][1] = $("#modal"+Data).attr("nombre");
	 Papas[i][2] = $("#modal"+Data).attr("apellido1");
	 Papas[i][3] = $("#modal"+Data).attr("apellido2");
	 Papas[i][4] = $("#modal"+Data).attr("fechaNac"); 
	 Papas[i][5] = $("#modal"+Data).attr("profesion");
	 Papas[i][6] = $("#modal"+Data).attr("direccion");
	 Papas[i][7] = $("#modal"+Data).attr("comuna");
	 Papas[i][8] = $("#modal"+Data).attr("email");
	 Papas[i][9] = $("#modal"+Data).attr("lugarTrabajo");
	 Papas[i][10] = $("#modal"+Data).attr("direccionTrabajo");
	 Papas[i][11] = $("#modal"+Data).attr("telefonos");  
}
  var alumnos = new Array();
 for( var i = 0; i < 4; i++){
   var b= i+1;
   alumnos[i] = new Array();
   alumnos[i][0] = $("#rut"+b).val(); 
   alumnos[i][1] = $("#modalNino"+b).attr("nombre");
   alumnos[i][2] = $("#modalNino"+b).attr("apellidop");
   alumnos[i][3] = $("#modalNino"+b).attr("apellidom");
   alumnos[i][4] = $("#modalNino"+b).attr("fechanac");
   alumnos[i][5] = $("#modalNino"+b).attr("colegioanterior");
   alumnos[i][7] = $("#Curso"+b).val(); 
   alumnos[i][8] = $("#bolM"+b).val(); 
   alumnos[i][9] = $("#montoM"+b).val(); 
   alumnos[i][10] = $("#fechaM"+b).val(); 
   alumnos[i][11] = $("#valeS"+b).val(); 
   alumnos[i][12] = $("#modalC"+b).attr("tipo"); 
   alumnos[i][13] = $("#modalC"+b).attr("nombre"); 
   alumnos[i][14] = $("#modalC"+b).attr("valor"); 
   alumnos[i][15] = $("#fechaS"+b).val(); 
   alumnos[i][16] = $("#1sem"+b).val(); 
   alumnos[i][17] = $("#2sem"+b).val(); 
} 
var cuotas = +$('#cuotas').val();
var cuotasInc = +$('#cuotaInc').val();
var documentos = new Array();
for(var i = 0;i < cuotas + cuotasInc; i++){
	var b = i + 1;
	documentos[i] = new Array();
	documentos[i][0] = $('#FechaBol'+b).val();
	documentos[i][1] = $('#Col'+b).val();
	documentos[i][2] = $('#Mat'+b).val();
	documentos[i][3] = $('#Cou'+b).val();
	documentos[i][4] = $('#Alm'+b).val();
	documentos[i][5] = $('#Deu'+b).val();
	documentos[i][6] = $('#FechaD'+b).val();
	documentos[i][7] = $('#obs'+b).val();
	documentos[i][8] = $("#modalP"+b).attr("tipo");
	documentos[i][9] = $("#modalP"+b).attr("banco");
	documentos[i][10] = $("#modalP"+b).attr("numero");
	documentos[i][11] = $("#modalP"+b).attr("monto");
	documentos[i][12] = $("#Nbol"+b).val();
}
$.ajax({
  url: "../../ajax/enviar.php",
  data: {familia:familia,Papas:Papas,alumnos:alumnos,documentos:documentos},
  type: "POST",
  beforeSend: function()
  {
  },
  success: function( data ) {
    $("#ayuda").html(data);
  }
});} 
	
	function curso(I){
    var curso = $('#Curso'+I).val();
	if(curso == "Kinder"){
	var valor=190000;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
   else if(curso == ""){
	var valor=0;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
 	 else{
	  var valor=200000;
	$("#montoM"+I).val(valor);
	$("#montoM"+I).attr("valorMonto",valor)
  }
}

function beca(I){
	var beca = parseFloat($("#1sem"+I).val());
	$("#2sem"+I).val(beca);
}
 function verificarRut( Objeto )
{
	var tmpstr = "";
	$('#mensaje').html("");
	$('#mensaje2').html("");
	var intlargo = Objeto.value;
	if (intlargo.length> 0)
	{
		crut = Objeto.value;
		largo = crut.length;
		if ( largo <2 )
		{
			$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");
			$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4><small>");
			Objeto.focus();
			return false;
		}
		for ( i=0; i <crut.length ; i++ )
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
		{
			tmpstr = tmpstr + crut.charAt(i);
		}
		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
		if ( largo> 2 )
		rut = crut.substring(0, largo - 1);	
		else rut = crut.charAt(0);
		dv = crut.charAt(largo-1);
		if ( rut == null || dv == null )
		return 0;
		var dvr = '0';
		suma = 0;
		mul  = 2;
		for (i= rut.length-1 ; i>= 0; i--)
		{
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
			mul = 2;
			else mul++;
		}
		res = suma % 11;
		if (res==1)
		dvr = 'k';
		else if (res==0)
		dvr = '0';
		else
		{
			dvi = 11-res;
			dvr = dvi + "";
		}
		if ( dvr != dv.toLowerCase() )
		{
			$('#mensaje').html("<h2>El rut ingresado no es válido</h2>");
			$('#mensaje2').html("<small><h4>El rut ingresado no es válido</h4></small>");
			Objeto.focus();
			return false;
		}
		return true;
	}
}
function clickButton(I){
if(I ==0){
$("#AEconomico").children("button:first").addClass("btn-success active");
$("#AEconomico").children("button:last").removeClass("btn-success active");}
if(I==1){
$("#AEconomico").children("button:last").addClass("btn-success active");
$("#AEconomico").children("button:first").removeClass("btn-success active");}	
}
$('#valeS1').keyup(function(){
	var vale = $("#valeS1").val();
	$("#valeS2").val(vale);
	$("#valeS3").val(vale);
	$("#valeS4").val(vale);
})

$('#bolM1').keyup(function(){
	var boleta = $('#bolM1').val();
	$('#bolM2').val(boleta);
	$('#bolM3').val(boleta);
	$('#bolM4').val(boleta);
})
function cambio2(){
	  	var cuotas = parseFloat($("#cuotaInc").val());
		if(cuotas >20){var cuotas = 20}	
		$("#cuotaInc").change(cambio);
		$('#pagoCuotasInc').html("");
		for(var i=1;i<cuotas+1;i++){
		$('#pagoCuotasInc').append('<tr><td><input style="width:115px;" type="number" id="Nbol'+i+'"></td><td><input style="width:115px;" type="date" id="FechaBol'+i+'"></td><td style="width:100px;"><center><a id="modalP'+i+'" role="button" onClick="MostrarP('+i+')"class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Seleccionar</a></center></td><!-- suma desde aqui--><td style="width:90px;"><input type="number" style="width:90px;" min="0" placeholder="0" id="Cou'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="TotalInc'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
		}		
}
function cambio(){
  		var cuotas = parseFloat($('#cuotas').val());
		var cuotasINC = parseFloat($("#cuotaInc").val());
		if(cuotas >20){var cuotas = 20}	
		$('#pagoCuotas').html("");
		for(var i=cuotasINC+1;i<cuotasINC+cuotas+1;i++){
			$('#pagoCuotas').append('<tr><td><input style="width:115px;" type="number" id="Nbol'+i+'"></td><td><input style="width:115px;" type="date" id="FechaBol'+i+'"></td><td style="width:100px;"><center><a id="modalP'+i+'" role="button" onClick="MostrarP('+i+')"class="btn" data-toggle="modal" tipo="" banco="" numero="" monto="">Seleccionar</a></center></td><!-- suma desde aqui--><td><input type="number" style="width:80px;" min="0"  placeholder="0" id="Col'+i+'" ></td><td><input type="number" style="width:80px;" min="0" placeholder="0" id="Mat'+i+'"></td><td><input type="number" style="width:60px;" min="0" placeholder="0" id="Alm'+i+'" ></td><td style="width:90px;"><input type="number" style="width:90px;" min="0" placeholder="0"  id="Deu'+i+'"></td><!-- hasta aqui --><td style="width:80px;"><center><div id="Total'+i+'">0</div></center></td><td><input type="date" style="width:115px;" id="fechaD'+i+'" disabled></td><td><input type="text" style="width:170px;" id="obs'+i+'"></td></tr>');
		}		
	}
$('#cuotaInc').keyup(cambio2)	
$('#cuotas').keyup(cambio)