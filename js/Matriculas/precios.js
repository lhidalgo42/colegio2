// JavaScript Document	
var actualizar3 = setInterval(function(){
 var val = new Array();
 var c= 0;
 var length = $( "select[id*='Curso'] option:selected" ).length;
  for (var i = 0; i < length; i++){
	var dato = $( "select[id*='Curso'] option:selected" )[i];
	val.push($(dato).val());
  if(val[i]=="Kinder" || val[i]==""){
  c++;	
  }//fin if
 }//fin for
 var cantidad = length-c;
 if(cantidad==0)
 var valor = 0;
 else if(cantidad== 1)
 var valor = 32;
 else if(cantidad==2)
 var valor = 42;
 else
 var valor = 50;
 $("#valor").html(valor+" UF");
 var uf = $("#uf").attr("uf");
 cuotas = $("#cuotaInc").val()
 if(cuotas != 0)
 total = (uf*valor)/cuotas;
 else
 total = 0;
 total=parseFloat(total);
 total=Math.round(total);
 $("input[id*='Cou']").val(total)
 c=0;
},500);//fin de funcion

var actualizar4 = setInterval(function(){
 var val = new Array();
var total = 0;
var monto = new Array();
 var length = $( "select[id*='Curso'] option:selected" ).length;
  for (var i = 0; i < length; i++){
	var dato = $( "select[id*='Curso'] option:selected" )[i];
	val.push($(dato).val());
	var b =i+1;
  if(val[i]=="Kinder"){
   monto[i]=228800;
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
  else if(val[i]=="1ro Basico" || val[i]=="2do Basico"){
   monto[i]=280800;
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
  else if(val[i]==""){
   monto[i]=0;}
  else{
   monto[i]=310000;
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
      total=total+monto[i]; 
 }
 cuotas=$("#cuotas").val()
 total=total/cuotas;
 total=total*10
  total=Math.round(total);
  $("input[id*='Col']").val(total)
},500);
