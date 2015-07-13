$(document).ready(function () {  
    // Funcion para la Insercion de Items en los Almacenes
    // Parametros Enviados desde el Formulario -- Boton de Distribucion
    $( "#btnDistribucion" ).click(function() {
        
	// Validacion de la Funcion de Campos
        // Campo Booleano.
        if(Calc_Item() == true){ 
            
            var p_CodProd		= $("#cod_prod").val();
                var p_Limit 		= $("#cant_articulos").val();
		var p_IdAlmacen		= $("#id_almacen_p").val();
		var p_IdEstante 	= $("#combo_almacen").val();
		var p_NoFila 		= $("#pos_filas").val();
		var p_NoColumna 	= $("#pos_columnas").val();
		var p_Op		= "InsertItemsCantidades";
		
                var data = "gp_CodProd="+p_CodProd+"&gp_Limit="+p_Limit+"&gp_IdAlmacen="+p_IdAlmacen+
                           "&gp_IdEstante="+p_IdEstante+"&gp_NoFila="+p_NoFila+"&gp_NoColumna="+p_NoColumna+"&gp_Op="+p_Op;
		
                // Ejecucion del Llamado a Ajax con los Parametros *************************
		$.ajax({
                    type: "POST",
                    url: "../../../ctrl/ctrlDistribucionProductos/ctrlDistribucionProductos.php",
                    data: data,
                    cache: true,
                    //timeout:5000, Se Comenta Debido a que hay Procesos que tienen un Intervalo de Respuesta mas Grande
                    dataType: 'json',
                    beforeSend: function () {
                                $("#alert_error").slideUp("slow");
                                // Efecto de Carga en Espera
                                $("#div_carga").show();
                            },
                    success: function(response) {
			    var find	= response.find;
                            if (find == "ok" ) {
				setTimeout(function () 
				{
                                    $("#alert_success").slideDown("slow");
                                    $("#alert_success").text(response.msg);
				    // Limpiamos el Formulario
                                    Clean();
                                    
                                    setTimeout(function () 
                                    {
                                      //$(location).attr('href',"v_mant_distribucion_productos.php");
                                      $("#alert_success").slideUp("slow");
                                    }, 2000);
				});
                                $("#div_carga").hide();
                                 
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
                			
		Clean();		
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
            }

            },error: 
                // Llamado a la Funcion AjaxFailed, Cuando Exista un Error      
		AjaxFailed	  
            	
            }); // Fin del Ajax
        }// Fin de Condicion de Validacion de Campos
                               
                
        
    });// Fin de Funcion de Insercion
    
    
    // Funcion que Evalua un Error de Peticion Ajax, pero su Estado sea (200ok),
    // La Solicitud ha sido Procesada Exitosamente a Nivel de Modelo *********** 
    function AjaxFailed(result) {
        
        // Evalua que el Estado de la Peticion sea (200 ok) Hecho
        if (result.status == 200){
            // Aviso de Operacion Exitosa
               $("#alert_success").slideDown("slow");
               $("#alert_success").text("La Distribucion al Almacen, se ha Realizado Exitosamente");
            // Limpiamos el Formulario
               Clean();
            // Escondemos el Div, del Loader 
               $("#div_carga").hide();
        }else{ 
            $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
            $("#alert_error").text("La Distribucion del Producto ha Fallado pulse F5, para reintertarlo");
        }
    }
	

// Funcion de Limpiar Campos ***************************************************
function Clean(){
    // Primera Parte
    $("#cod_prod").val('');    
    $("#desc_prod").val('');    
    $("#desc_tipo").val('');    
    $("#txt_preci_costo").val('');    
    $("#txt_preci_venta").val('');    
    
    // Segunda Parte
    $("#cod_almacen").val('');
    $("#cod_almacen_1").val('');
    $("#nom_almacen").val('');
    $("#sucursal").val('');
    $("#num_estantes").val('');
    $("#emple_almacen").val('');
    $("#id_almacen").val('0');
    
    $("#c_real").text('0');
    $("#c_reord").text('0');
    $("#c_max").text('0');
    var c_combo = '<option value="0">Seleccione un Estante ...</option>';
        
    $("#combo_almacen").html(c_combo);
    
    // Pasa Valores al Formulario Principal
    $("#cod_almacen_p").val('');
    $("#id_almacen_p").val('0');    
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
    $("#pos_filas").val('');
    $("#pos_columnas").val('');
    $("#cant_articulos").val('');
    
}
        
// Funcion de Calculo de Items en Alamcen **************************************
function Calc_Item(){
    // Variables a Utilizar
    var input1 = parseInt($("#c_real").text());
    var input2 = parseInt($("#cant_articulos").val());
    var v_fn = Act_Cant();
    var v_return = false;
        
    if(ValidaCampos() == false){
        //Regresa al Formulario 
        return;
    }else if(v_fn == '0' || v_fn == '1'){
        alert('Ingrese la Cantidad de Productos, para continuar');
        return;
    }else if(v_fn == '2'){
        alert('La Cantidad Solicitada sobrepasa la Existente en Inventario');
        return;
    }else if(v_fn == '3'){
        input1 = input1 - input2;
        // Actuliza el Valor Nuevo 
        $("#c_real").html(input1);
        v_return = true;
        return v_return; 
    }
    
}

// Funcion de Actualizar Valores de Cant. Disponible ***************************
function Act_Cant(){
    var input1 = parseInt($("#c_real").text());
    var input2 = parseInt($("#cant_articulos").val());
    
    var p_ret  = '0';

    if(input2 == null ){  
        p_ret = '1';
        return p_ret;
    }else if (input2 > input1){
        // Valida que la Cant. no sea mayor que la Incial
        p_ret = '2';
        return p_ret;
    }else if(input2 > 0 && input2 <= input1 ){
        p_ret = '3';
        return p_ret;
    }else{ p_ret = '0';
        return p_ret;}
    
}

        
});//Fin del Script

