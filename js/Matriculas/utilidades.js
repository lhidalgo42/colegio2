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
function sumar(){//variable que suma la totalidad de las columnas del documento
	var cuotas = +$('#cuotas').val();
    var col = 0;
    var mat = 0;
    var cou = 0;
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
	   	cou = +$('#Cou'+i).val() + cou;
	   	alm = +$('#Alm'+i).val() + alm;
	   	deu = +$('#Deu'+i).val() + deu;
	   	totalC1 = +$('#Col'+i).val() + +$('#Mat'+i).val() + +$('#Cou'+i).val();
	   	totalC2 = +$('#Alm'+i).val() + +$('#Deu'+i).val();
	   	totalCol = totalC1 + totalC2;
	   	totalReal = totalCol + totalReal
	   	$('#Total'+i).html(totalCol);
	   
	}
    $('#ColT').html(col);
    $('#MatT').html(mat);
    $('#CouT').html(cou);
    $('#AlmT').html(alm);
    $('#DeuT').html(deu);
    $('#TotalT').html(totalReal);
    
}
function clickButton(I){
if(I ==0){
$("#AEconomico").children("button:first").addClass("btn-success active");
$("#AEconomico").children("button:last").removeClass("btn-success active");}
if(I==1){
$("#AEconomico").children("button:last").addClass("btn-success active");
$("#AEconomico").children("button:first").removeClass("btn-success active");}	
}
function bodyfuntion()
{
sumar();
$("#familia").val(""+$("#modalPAPA").attr("apellido1")+" "+$("#modalMAMA").attr("apellido1")+"");
}
function boleta(){
	var boleta = parseFloat($("#bolM1").val());
	$("#bolM2").val(boleta);
	$("#bolM3").val(boleta);
	$("#bolM4").val(boleta);
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