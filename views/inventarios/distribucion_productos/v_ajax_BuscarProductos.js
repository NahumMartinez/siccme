/* 
 * @autor : Nahum Martinez
 * @Fecha : 2015-03-07
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery 
 */

$(document).ready(function () {  
    // Funcion para la Definir los Criterios de la Busqueda de las Compras
    // Parametros Enviados desde el Input (cod_prod) -- Boton de Busqueda
	$("#botonbProd").click(function () {
            
            var p_CodProd   = $("#cod_prod").val();
            var p_Op        = $("#op").val();
            
            // Serializar los Datos de Envio
            var data = "gp_CodProd="+p_CodProd+"&gp_Op="+p_Op;
            
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlDistribucionProductos/ctrlBuscarProductos.php",
              data: data,
              timeout:3000,
              dataType: 'json',
                beforeSend: function () {
                        $("#alert_error").slideUp("slow");
                        //$("#load").show();
			},
                success: function(response) {
				var find = response.find;
				if (find == "ok" ) {
					setTimeout(function () 
				{
				    //$("#alert_success").slideDown("slow");
				    //$("#alert_success").text(response.msg);
				    //$("#demo12").click();	
                                    // Seteo del Contenido del ctrlDistribucionProductos        
				    //$("#cod_prod").val(response.valor1);
                                    $("#desc_prod").val(response.valor2);
                                    $("#desc_tipo").val(response.valor3);
                                    $("#txt_preci_costo").val(response.valor4);
                                    $('#txt_preci_venta').val(response.valor5);
                                    limpiar();
                                    													
				setTimeout(function () 
				{
				    $("#alert_success").slideUp("slow");
				}, 2000);
				});//$("#load").hide();
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
		// Limpiado de Varibles
                //$("#cod_prod").val(response.valor1);
                $("#desc_prod").val('');
                $("#desc_tipo").val('');
                $("#txt_preci_costo").val('');
                
                $("#txt_preci_venta").val('');
                $("#cod_proveedor").val('');
                
		setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
		}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo Procesar su Solicitud / Los Datos no se Encuentran");
			  			  
            }

        }); // Fin de Llamado del Ajax Principal
            
    }); //Fin de Funcion de Busqueda *******************************************************	
    
    
    function limpiar(){
        $("#cod_almacen_1").val('');
        $("#cod_almacen").val('');
        $("#nom_almacen").val('');
        $("#sucursal").val('');
        $("#num_estantes").val('');
        $("#emple_almacen").val('');
        $("#id_almacen").val('');

        // Pasa Valores al Formulario Principal
        $("#cod_almacen_p").val('');
        $("#nom_almacen_p").val('');
        $("#sucursal_p").val('');
        $("#num_estantes_p").val('');
        $("#encargado_p").val('');
        $("#id_almacen_p").val('');
        $("#cant_real_p").val('');
        $("#cant_max_p").val('');
        $("#cant_min_p").val('');
        $("#cant_reord_p").val('');
        $("#ult_compra_p").val('');
                                    
        $("#no_filas").val('');
        $("#no_columnas").val('');
        
        $("#c_real").text(0);  
        $("#c_max").text(0);
        $("#c_reord").text(0); 
        
        $("#pos_filas").val(''); 
        $("#pos_columnas").val(''); 
        $("#cant_articulos").val(''); 
        
        // Reseteo de los Valores del Combo
        var c_ini = '<option value="0">Seleccione un Estante ...</option>';
        $("#combo_almacen").html(c_ini);
        
        
    } // Fin de Funcion Limpiar
    
		
});//Fin del Script

