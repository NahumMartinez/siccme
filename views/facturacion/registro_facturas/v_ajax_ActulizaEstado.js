$(document).ready(function () {
		
		// Funcion para El Calculo Total de la Factura
		function SumaTotalA()
		{
			var sub_total  = document.getElementById('sub_total').value;
			var descuento  = document.getElementById('imp_descuento').value;
			var total_neto = document.getElementById('imp_total');
			var total      = 0;

			if(descuento == '')
			{
			   descuento = 0;
			}

			total = parseFloat(sub_total) - parseFloat(descuento);
			total = total.toFixed(2);
			total_neto.value = total;

		}
		
		// Funcion para Limpiar Parametros
		function reset_campos(){
			$("#cod_prod").val("");
			$("#cant_prod").val("1");
			
		}
		
		// Funcion para Calcular los Importes
		function calc_importe(precio){
			var Cant_Prod   =  $("#cant_prod").val("");
			var Total_Importe;
			
			Total_Importe = precio * Cant_Prod;
		}
		
		// Funcion para Formatos de Numeros
		
		// Funcion para Hacer el Calculo del Sub Total_Importe
		function SumaTablaA()
		{
			var tabla 	= document.getElementById("table_tran");
			var sub_total   = document.getElementById("sub_total");
			
			var total = 0;
			for(var i = 1; tabla.rows[i]; i++)
			total += Number(tabla.rows[i].cells[6].innerHTML);
			total = total.toFixed(2);
			sub_total.value = total;
			//alert(total);
		}

		// Funcion de Calculo Automatico
		
		function Tecla(e)
		{
                    $('#dto').keypress(function(e){   
                    if(e.which == 9){      
                        //SumaTabla(); 
				 /*var Importe;
						//Importe = Math.round((Precio * p_CanProd) + (((Precio * p_CanProd) * 12) / 100));
						Importe = (Precio * p_CanProd) + (((Precio * p_CanProd) * 12) / 100);
					Importe = Importe.toFixed(2);*/ alert('Hola');	
                    }   
                    });
		}
		
		// Funcion para la Busqueda
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#actProd" ).click(function() {
                    
		var p_CodProd 		= $("#cod_prod").val();
                var p_CanProd		= $("#cant_prod").val();
		var p_Op	 	= $("#op").val();
		
                // Verificamos si El Campo de Codigo de Producto esta Vacio ****
                if(p_CodProd == ''){
                    alert('Falta Ingresar el Codigo del Producto.');
                    $("#cod_prod").focus();
                    return;
                }
                
                // Llamado al Metodo Ajax **************************************
                var data = "gp_CodProd="+p_CodProd+"&gp_CantProd="+p_CanProd+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
                        url: "../../../ctrl/ctrlRegistroFacturas/ctrlBuscarProducto.php",
                        data: data,
                        //timeout:3000,
                        dataType: 'json',
                        beforeSend: function () {
                                    $("#alert_error").slideUp("slow");
                                    // Efecto de Carga en Espera
                                    $("#div_carga").show();
                                    },
                        success: function(response) {
				 var find  = response.find;
                                if (find == "ok" ) {
					setTimeout(function () 
                                        {
                                            // Resultados y Asignacion de los Datos del Json ****************
                                            var Codigo		= response.valor1;
                                            var Descripcion	= response.valor2;
                                            var Precio		= response.valor3;
                                            var Impuesto	= response.valor4;
                                            var Porc_Descuento	= response.valor5;
                                            
                                            // Calculo del Importe Total de los Productos *******************
                                            var Imp_Tot         = ((Precio * p_CanProd) * (Impuesto / 100) );
                                            // Redondea a dos Dogitos el Calculo
                                            Imp_Tot = Math.round(Imp_Tot * 100)/100;
                                            // Ponemos el Foco en el Siguiente Producto a Ingresar ***********
                                            $('#cod_prod').focus();

                                            // Calculo del Importe de Descuento ******************************
                                             var Imp_Descuento  =   (Precio * Porc_Descuento) / 100;
                                                 Imp_Descuento  =   Math.round(Imp_Descuento * 100)/100;  
                                                
                                            // Calculo del Importe del Articulo ******************************
                                            // Seria : (Precio - Descuento) + Impuesto 
                                            var Importe;
                                                Importe = ((Precio - Imp_Descuento) * p_CanProd) + (((Precio * p_CanProd) * Impuesto) / 100);
                                                //Importe = Importe.toFixed(2);
                                                Importe = Math.round(Importe * 100)/100;
                                                  
                                              
                                            // LLenado de la Tabla de Productos de Facturacion ****************
                                            var tablaDatos	= $("#table_tran");

                                            if(Codigo!="" || Descripcion!="" || Precio!=""  ){		
                                                // Llena la Tabla de Facturacion con los Datos Provenientes del Json  
                                                // Y los Calculos Usados de esa Informacion
                                                tablaDatos.append("<tr><td>"+Codigo+"</td><td>"+Descripcion+"</td><td>"+p_CanProd+
                                                        "</td><td>"+Precio+"</td><td>"+Imp_Tot+"</td><td>"+Imp_Descuento+"</td><td>"+Importe+
                                                        "</td><td><a onclick='deleteRow(this)'>\n\
                                                        <center><img  src='../../../img/developers/Knob Cancel.png'></center></a></td></tr>");
                                                // Limpiamos los Campos ************************
                                                reset_campos();
                                                // Sumamos los Importes de la Tabla ************
                                                SumaTablaA();
                                                // Suma Todos Los Totales de la Tabla **********
                                                SumaTotalA();		
                                            }
					
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
						
					}, 2000);
                                    });
                                    
                                    $("#div_carga").hide();
                                    
                                }else{
                                    $("#alert_error").slideDown("slow");
                                    $("#alert_error").text(response.error);
                                    // Controles del Formulario
                                    $('#botonbp').attr('disabled','-1');

                                    $('#cod_prod').val('');
                                    //$('#cod_prod').attr('disabled','-1');		
                                    $('#cant_prod').val('1');
                                    //$('#cant_prod').attr('disabled','-1');
                                    $('#cod_prod').focus();
                                    setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                                    $("#div_carga").hide();
                                }

                        },error: function () {
                          $("#alert_error").slideDown("slow");
                          setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                          $("#alert_error").text("A Ocurrido un Problema en la Comunicacion");
                          $('#cod_prod').focus();
                          $('#botonbp').attr('disabled','-1');

                        }
		
		});
		
		});
                
                
                
                // Funcion para la Actualizacion del Estado al Produto que sea Eliminado del Listado
                // de la Venta 
		// Parametros Enviados desde el Formulario -- Boton de Eliminar
		$( "#actDelProd" ).click(function() {
                    alert("Hola Prieba");
		var p_CodProd 		= $("#cod_prod").val();
                var p_CanProd		= $("#cant_prod").val();
                var p_Correlativo	= $("#op_corr").val();
		var p_Op	 	= $("#op").val();
		                                
                // Llamado al Metodo Ajax **************************************
                var data = "gp_Correlativo="+p_Correlativo+"gp_CodProd="+p_CodProd+"&gp_CantProd="+p_CanProd+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
                        url: "../../../ctrl/ctrlRegistroFacturas/ctrlBuscarProducto.php",
                        data: data,
                        //timeout:3000,
                        dataType: 'json',
                        beforeSend: function () {
                                    $("#alert_error").slideUp("slow");
                                    // Efecto de Carga en Espera
                                    $("#div_carga").show();
                                    },
                        success: function(response) {
				var mod  = response.mod;
                                if (mod == "si" ) {
					setTimeout(function () 
                                        {
                                            /*// Resultados y Asignacion de los Datos del Json ****************
                                            var Codigo		= response.valor1;
                                            var Descripcion	= response.valor2;
                                            var Precio		= response.valor3;
                                            var Impuesto	= response.valor4;
                                            var Porc_Descuento	= response.valor5;
                                            
                                            // Calculo del Importe Total de los Productos *******************
                                            var Imp_Tot         = ((Precio * p_CanProd) * (Impuesto / 100) );
                                            // Redondea a dos Dogitos el Calculo
                                            Imp_Tot = Math.round(Imp_Tot * 100)/100;
                                            // Ponemos el Foco en el Siguiente Producto a Ingresar ***********
                                            $('#cod_prod').focus();

                                            // Calculo del Importe de Descuento ******************************
                                             var Imp_Descuento  =   (Precio * Porc_Descuento) / 100;
                                                 Imp_Descuento  =   Math.round(Imp_Descuento * 100)/100;  
                                                
                                            // Calculo del Importe del Articulo ******************************
                                            // Seria : (Precio - Descuento) + Impuesto 
                                            var Importe;
                                                Importe = ((Precio - Imp_Descuento) * p_CanProd) + (((Precio * p_CanProd) * Impuesto) / 100);
                                                //Importe = Importe.toFixed(2);
                                                Importe = Math.round(Importe * 100)/100;
                                                  
                                              
                                            // LLenado de la Tabla de Productos de Facturacion ****************
                                            var tablaDatos	= $("#table_tran");

                                            if(Codigo!="" || Descripcion!="" || Precio!=""  ){		
                                                // Llena la Tabla de Facturacion con los Datos Provenientes del Json  
                                                // Y los Calculos Usados de esa Informacion
                                                tablaDatos.append("<tr><td>"+Codigo+"</td><td>"+Descripcion+"</td><td>"+p_CanProd+
                                                        "</td><td>"+Precio+"</td><td>"+Imp_Tot+"</td><td>"+Imp_Descuento+"</td><td>"+Importe+
                                                        "</td><td><a onclick='deleteRow(this)'>\n\
                                                        <center><img  src='../../../img/developers/Knob Cancel.png'></center></a></td></tr>");
                                                // Limpiamos los Campos ************************
                                                reset_campos();
                                                // Sumamos los Importes de la Tabla ************
                                                SumaTablaA();
                                                // Suma Todos Los Totales de la Tabla **********
                                                SumaTotalA();*/
                                                alert("Hola Mindo"); 
                                            //}
					
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
						
					}, 2000);
                                    });
                                    
                                    $("#div_carga").hide();
                                    
                                }else{
                                    $("#alert_error").slideDown("slow");
                                    $("#alert_error").text(response.error);
                                    // Controles del Formulario
                                    $('#botonbp').attr('disabled','-1');

                                    $('#cod_prod').val('');
                                    //$('#cod_prod').attr('disabled','-1');		
                                    $('#cant_prod').val('1');
                                    //$('#cant_prod').attr('disabled','-1');
                                    $('#cod_prod').focus();
                                    setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                                    $("#div_carga").hide();
                                }

                        },error: function () {
                          $("#alert_error").slideDown("slow");
                          setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                          $("#alert_error").text("A Ocurrido un Problema en la Comunicacion");
                          $('#cod_prod').focus();
                          $('#botonbp').attr('disabled','-1');

                        }
		
		});
		
		});
                
                
                // Funcion de Prueba
                $(function (){
                    all();
                });
                
		function all(){alert("Funcion Allert desde Jquery");}
});//Fin del Script		