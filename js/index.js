//validacion del rut ingresado
                function disableIngresar(){                    
                    $('#ingresar').attr('disabled','disabled');                    
                }            
                function verificarRut( Objeto )
                {
                    var tmpstr = "";
                    $('#mensaje').html("");
                    var intlargo = Objeto.value
                    if (intlargo.length> 0)
                    {
                        crut = Objeto.value
                        largo = crut.length;
                        if ( largo <2 )
                        {
                            $('#mensaje').html("<small><h4>El rut ingresado no es válido</h4></small>");
                            Objeto.focus()
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
                        else
                            rut = crut.charAt(0);
	
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
                            else
                                mul++;
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
                            $('#mensaje').html("<small><h4>El rut ingresado no es válido</h4></small>");
                            Objeto.focus();
                            return false;
                        }
                        //alert('El Rut Ingresado es Correcto!')
                        $('#ingresar').removeAttr('disabled');
                        return true;
                    }
                }                       
                $("usuario").validator();
		
                                function enviar(){
                    var postData = $("#usuario").serialize();
					
                    $.ajax({ url: 'ajax/verificarPassUsuario.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {	
							if(output == 1) {	
                                window.location.href = "vistas/decision.php";
                            }
                            else{
                                $('#mensaje').html("<small><h4>usuario o Clave incorrecta</h4></small>");
                            }
                        }
                    });
                }