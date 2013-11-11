var actualizar3 = setInterval(function(){
 var val = new Array();
 var c= 0;
 var length = $( "select[id*='Curso'] option:selected" ).length;
  for (var i = 0; i < length; i++){
	  var b = i+1;
	var dato = $( "select[id*='Curso'] option:selected" )[i];
	val.push($(dato).val());
  if(val[i]=="Kinder" || val[i]==""){
  c++;	
  }//fin if
 }//fin for
 var cantidad = length-c;
 if(cantidad==0)
 var debe = 0;
 else if(cantidad== 1)
 var debe = 32;
 else if(cantidad==2)
 var debe = 42;
 else{
 var debe = 50;
 }
    var n =0;
 for (var b = 0;b<length;b++)
    {
        var i = b+1;
    var nuevo = parseFloat($("#modalNino"+i).attr("nuevo"));
        console.log(nuevo)
        if(nuevo==0){
            n++;
        }
    }
    if(n==0)
    var pago = 0;
    else if(n==1)
    var pago = 32;
    else if(n==2)
    var pago = 42;
    else
    var pago = 50;
    var valor = debe-pago;
    if(valor<0)
    var valor =0;
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
 var val = new Array();
var total = 0;
var totalMat = 0;
    var cuotas=$("#cuotas").val()
var monto = new Array();
var mat = new Array();
 var length = $( "select[id*='Curso'] option:selected" ).length;
  for (var i = 0; i < length; i++){
	var dato = $( "select[id*='Curso'] option:selected" )[i];
	val.push($(dato).val());
	var b =i+1;
  if(val[i]=="Kinder"){
   monto[i]=228800;
   mat[i]=110000
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
  else if(val[i]=="1ro Basico" || val[i]=="2do Basico"){
   monto[i]=280800;
   mat[i]=175000
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
 else if(val[i]=="3ro Basico" || val[i]=="4to Basico" || val[i]=="5to Basico"){
   monto[i]=310000;
   mat[i]=189000
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
  else if(val[i]==""){
   monto[i]=0;
   mat[i] = 0;}
  else{
   monto[i]=310000;
   mat[i]=202000
   var beca = parseFloat($("#1sem"+b).val());
   monto[i]=monto[i]*(100-beca)/100;}
   total=total+monto[i];
   totalMat =totalMat+mat[i];
  }
 total=total*10/cuotas;
 totalMat = totalMat/cuotas;
  total=Math.round(total);
  totalMat=Math.round(totalMat);
  $("input[id*='Col']").val(total)
  $("input[id*='Mat']").val(totalMat)
},500)

