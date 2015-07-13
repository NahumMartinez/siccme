$(document).ready(function () {
		
		// Funcion para El Calculo Total de la Compra
		function SumaTotal()
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
		function SumaTabla()
		{
			var tabla 	= document.getElementById("table_tran");
			var sub_total   = document.getElementById("sub_total");
			
			var total = 0;
			for(var i = 1; tabla.rows[i]; i++)
			total += Number(tabla.rows[i].cells[5].innerHTML);
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
		$( "#buscarp" ).click(function() {
		var p_CodProd 		= $("#cod_prod").val();
                var p_CanProd		= $("#cant_prod").val();
		var p_Op	 	= $("#op").val();
		
                var data = "gp_CodProd="+p_CodProd+"&gp_CantProd="+p_CanProd+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
                        url: "../../../ctrl/ctrlCompras/ctrlBuscarProducto.php",
                        data: data,
                        timeout:3000,
                        dataType: 'json',
                         beforeSend: function () {
                          $("#alert_error").slideUp("slow");
				},
                            success: function(response) {
				var find	= response.find;
                                if (find == "ok" ) {
					setTimeout(function () 
                                        {
                                            var Codigo		= response.valor1;
                                            var Descripcion	= response.valor2;
                                            var Precio		= response.valor3;
                                            var Impuesto	= response.valor4;
                                            var Imp_Tot         = ((Precio * p_CanProd) * (Impuesto / 100) );
                                            //Imp_Tot = Imp_Tot.toFixed(2);   Prueba para Redondear Bien
                                            Imp_Tot = Math.round(Imp_Tot * 100)/100;
                                            $('#cod_prod').focus();

                                            var Importe;
                                                    Importe = (Precio * p_CanProd) + (((Precio * p_CanProd) * Impuesto) / 100);
                                                    //Importe = Importe.toFixed(2);
                                                    Importe = Math.round(Importe * 100)/100;
                                                    
                                            var tablaDatos	= $("#table_tran");

                                            if(Codigo!="" || Descripcion!="" || Precio!=""  ){		
                                                    tablaDatos.append("<tr><td>"+Codigo+"</td><td>"+Descripcion+"</td><td>"+p_CanProd+
                                                            "</td><td>"+Precio+"</td><td>"+Imp_Tot+"</td><td>"+Importe+"</td><td><a onclick='deleteRow(this)'>\n\
                                                                <center><img  src='../../../img/developers/Knob Cancel.png'></center></a></td></tr>");
                                                    reset_campos();
                                                    SumaTabla();
                                                    SumaTotal();		
                                            }
					
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
						
					}, 2000);
                                    });
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				  // Controles del Formulario
				  $('#botonbp').attr('disabled','-1');
				  
					$('#cod_prod').val('');
					$('#cod_prod').attr('disabled','-1');		
					$('#cant_prod').val('1');
					$('#cant_prod').attr('disabled','-1');
					$('#cod_prod').focus();
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se encontraron Datos");
			  $('#cod_prod').focus();
			  $('#botonbp').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
});//Fin del Script		