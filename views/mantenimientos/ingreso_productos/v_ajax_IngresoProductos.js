$(document).ready(function () {  
		// Funcion para la Busqueda
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodProd 				= $("#cod_prod").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso					= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+"&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+"&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+"&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+"&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
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
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
										
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#desc_prod").val(response.valor3);
					$("#altura").val(response.valor4);
					$("#anchura").val(response.valor5);
					$("#peso").val(response.valor6);
					$("#id_medida").val(response.valor7);
					$("#f_elaboracion").val(response.valor8);
					$("#f_vencimiento").val(response.valor9);
					$("#id_tipo_prod").val(response.valor10);
					$("#id_color").val(response.valor11);
					$("#p_costo").val(response.valor12);
					$("#p_venta_1").val(response.valor13);
					$("#p_venta_2").val(response.valor14);
					$("#p_venta_3").val(response.valor15);
					$("#id_descuento").val(response.valor16);
					$("#id_impto").val(response.valor17);
					$("#cant_ini").val(response.valor18);
					$("#cant_max").val(response.valor19);
					$("#cant_real").val(response.valor20);
					$("#cant_re_orden").val(response.valor21);
					$("#ind_fact").val(response.valor22);
					$("#id_proveedor").val(response.valor23);
					$("#obs_prod").val(response.valor24);
															
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				  // Controles del Formulario
				  $('#botonc').attr('disabled','-1');
				  $('#botong').attr('disabled','-1');
				  $('#botone').attr('disabled','-1');
				  $('#botonm').attr('disabled','-1');
				  $('#boton').removeAttr('disabled');
				  $('#botonb').removeAttr('disabled');
				  //$('#botonbc').attr('disabled','-1'); 	
				
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#cod_prod').val('');
					$('#cod_prod').attr('disabled','-1');		
					$('#desc_prod').val('');
					$('#desc_prod').attr('disabled','-1');
					$('#altura').val('');
					$('#altura').attr('disabled','-1');
					$('#anchura').val('');
					$('#anchura').attr('disabled','-1');
					$('#peso').val('');
					$('#peso').attr('disabled','-1');
					$('#id_medida').val('');
					$('#id_medida').attr('disabled','-1');
					$('#f_elaboracion').val('');
					$('#f_elaboracion').attr('disabled','-1');
					$('#f_vencimiento').val('');
					$('#f_vencimiento').attr('disabled','-1');
					$('#id_tipo_prod').val('');
					$('#id_tipo_prod').attr('disabled','-1');
					$('#id_color').val('');
					$('#id_color').attr('disabled','-1');
					$('#p_costo').val('');
					$('#p_costo').attr('disabled','-1');
					$('#p_venta_1').val('');
					$('#p_venta_1').attr('disabled','-1');
					$('#p_venta_2').val('');
					$('#p_venta_2').attr('disabled','-1');
					$('#p_venta_3').val('');
					$('#p_venta_3').attr('disabled','-1');
					$('#id_descuento').val(0);
					$('#id_descuento').attr('disabled','-1');
					$('#id_impto').val(0);
					$('#id_impto').attr('disabled','-1');
					$('#cant_ini').val('');
					$('#cant_ini').attr('disabled','-1');
					$('#cant_max').val('');
					$('#cant_max').attr('disabled','-1');
					$('#cant_real').val('');
					$('#cant_real').attr('disabled','-1');
					$('#cant_re_orden').val('');
					$('#cant_re_orden').attr('disabled','-1');
					$('#ind_fact').val(0);
					$('#ind_fact').attr('disabled','-1');
					$('#id_proveedor').val(0);
					$('#id_proveedor').attr('disabled','-1');
					$('#obs_prod').val('');
					$('#obs_prod').attr('disabled','-1');
				
				
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se encontraron Datos");
			  $("#desc_tipo").val('');
			  $('#botonc').attr('disabled','-1');
			  $('#botong').attr('disabled','-1');
			  $('#botone').attr('disabled','-1');
			  $('#botonm').attr('disabled','-1');
			  $('#boton').removeAttr('disabled');
			  $('#botonb').removeAttr('disabled');	
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodProd 				= $("#cod_prod").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso					= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+"&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+"&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+"&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+"&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var status = response.status
				var find	= response.find
                if (status == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					//$('#botonbc').attr('disabled','-1');
					
					$('#cod_prod').val('');
							
					$('#desc_prod').val('');
					$('#desc_prod').attr('disabled','-1');
					$('#altura').val('');
					$('#altura').attr('disabled','-1');
					$('#anchura').val('');
					$('#anchura').attr('disabled','-1');
					$('#peso').val('');
					$('#peso').attr('disabled','-1');
					$('#id_medida').val(0);
					$('#id_medida').attr('disabled','-1');
					$('#f_elaboracion').val('');
					$('#f_elaboracion').attr('disabled','-1');
					$('#f_vencimiento').val('');
					$('#f_vencimiento').attr('disabled','-1');
					$('#id_tipo_prod').val(0);
					$('#id_tipo_prod').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#p_costo').val('');
					$('#p_costo').attr('disabled','-1');
					$('#p_venta_1').val('');
					$('#p_venta_1').attr('disabled','-1');
					$('#p_venta_2').val('');
					$('#p_venta_2').attr('disabled','-1');
					$('#p_venta_3').val('');
					$('#p_venta_3').attr('disabled','-1');
					$('#id_descuento').val(0);
					$('#id_descuento').attr('disabled','-1');
					$('#id_impto').val(0);
					$('#id_impto').attr('disabled','-1');
					$('#cant_ini').val('');
					$('#cant_ini').attr('disabled','-1');
					$('#cant_max').val('');
					$('#cant_max').attr('disabled','-1');
					$('#cant_real').val('');
					$('#cant_real').attr('disabled','-1');
					$('#cant_re_orden').val('');
					$('#cant_re_orden').attr('disabled','-1');
					$('#ind_fact').val(0);
					$('#ind_fact').attr('disabled','-1');
					$('#id_proveedor').val(0);
					$('#id_proveedor').attr('disabled','-1');
					$('#obs_prod').val('');
					$('#obs_prod').attr('disabled','-1');
				
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				//$("#po").val(response.Codigo);
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  
            }

      });

    });
		
		// Funcion para la Modificacion
		// Parametros Enviados desde el Formulario -- Boton de Modificar
		$( "#botonm" ).click(function() {
        var p_CodProd 				= $("#cod_prod").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso					= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+"&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+"&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+"&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+"&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var mod = response.mod;
				if (mod == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					
					$('#cod_prod').val('');
					
					$('#desc_prod').val('');
					$('#desc_prod').attr('disabled','-1');
					$('#altura').val('');
					$('#altura').attr('disabled','-1');
					$('#anchura').val('');
					$('#anchura').attr('disabled','-1');
					$('#peso').val('');
					$('#peso').attr('disabled','-1');
					$('#id_medida').val(0);
					$('#id_medida').attr('disabled','-1');
					$('#f_elaboracion').val('');
					$('#f_elaboracion').attr('disabled','-1');
					$('#f_vencimiento').val('');
					$('#f_vencimiento').attr('disabled','-1');
					$('#id_tipo_prod').val(0);
					$('#id_tipo_prod').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#p_costo').val('');
					$('#p_costo').attr('disabled','-1');
					$('#p_venta_1').val('');
					$('#p_venta_1').attr('disabled','-1');
					$('#p_venta_2').val('');
					$('#p_venta_2').attr('disabled','-1');
					$('#p_venta_3').val('');
					$('#p_venta_3').attr('disabled','-1');
					$('#id_descuento').val(0);
					$('#id_descuento').attr('disabled','-1');
					$('#id_impto').val(0);
					$('#id_impto').attr('disabled','-1');
					$('#cant_ini').val('');
					$('#cant_ini').attr('disabled','-1');
					$('#cant_max').val('');
					$('#cant_max').attr('disabled','-1');
					$('#cant_real').val('');
					$('#cant_real').attr('disabled','-1');
					$('#cant_re_orden').val('');
					$('#cant_re_orden').attr('disabled','-1');
					$('#ind_fact').val(0);
					$('#ind_fact').attr('disabled','-1');
					$('#id_proveedor').val(0);
					$('#id_proveedor').attr('disabled','-1');
					$('#obs_prod').val('');
					$('#obs_prod').attr('disabled','-1');
				
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  
            }

      });

    });
		
		// Funcion para la Eliminacion
		// Parametros Enviados desde el Formulario -- Boton de Eliminar
		$( "#botone" ).click(function() {
        var p_CodProd 				= $("#cod_prod").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso					= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+"&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+"&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+"&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+"&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var del = response.del;
				if (del == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#botonm').attr('disabled','-1');
					$('#botone').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					
					$('#cod_prod').val('');
					
					$('#desc_prod').val('');
					$('#desc_prod').attr('disabled','-1');
					$('#altura').val('');
					$('#altura').attr('disabled','-1');
					$('#anchura').val('');
					$('#anchura').attr('disabled','-1');
					$('#peso').val('');
					$('#peso').attr('disabled','-1');
					$('#id_medida').val(0);
					$('#id_medida').attr('disabled','-1');
					$('#f_elaboracion').val('');
					$('#f_elaboracion').attr('disabled','-1');
					$('#f_vencimiento').val('');
					$('#f_vencimiento').attr('disabled','-1');
					$('#id_tipo_prod').val(0);
					$('#id_tipo_prod').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#p_costo').val('');
					$('#p_costo').attr('disabled','-1');
					$('#p_venta_1').val('');
					$('#p_venta_1').attr('disabled','-1');
					$('#p_venta_2').val('');
					$('#p_venta_2').attr('disabled','-1');
					$('#p_venta_3').val('');
					$('#p_venta_3').attr('disabled','-1');
					$('#id_descuento').val(0);
					$('#id_descuento').attr('disabled','-1');
					$('#id_impto').val(0);
					$('#id_impto').attr('disabled','-1');
					$('#cant_ini').val('');
					$('#cant_ini').attr('disabled','-1');
					$('#cant_max').val('');
					$('#cant_max').attr('disabled','-1');
					$('#cant_real').val('');
					$('#cant_real').attr('disabled','-1');
					$('#cant_re_orden').val('');
					$('#cant_re_orden').attr('disabled','-1');
					$('#ind_fact').val(0);
					$('#ind_fact').attr('disabled','-1');
					$('#id_proveedor').val(0);
					$('#id_proveedor').attr('disabled','-1');
					$('#obs_prod').val('');
					$('#obs_prod').attr('disabled','-1');
				
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  			  
            }

      });

    });
	
		// Funcion para el Boton Cancelar
		$( "#botonc" ).click(function() {
        var p_CodProd 				= $("#cod_prod").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso					= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+"&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+"&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+"&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+"&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var cancel = response.cancel;
				if (cancel == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
										
					$('#cod_prod').val('');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					
					$('#cod_prod').val('');
					
					$('#desc_prod').val('');
					$('#desc_prod').attr('disabled','-1');
					$('#altura').val('');
					$('#altura').attr('disabled','-1');
					$('#anchura').val('');
					$('#anchura').attr('disabled','-1');
					$('#peso').val('');
					$('#peso').attr('disabled','-1');
					$('#id_medida').val(0);
					$('#id_medida').attr('disabled','-1');
					$('#f_elaboracion').val('');
					$('#f_elaboracion').attr('disabled','-1');
					$('#f_vencimiento').val('');
					$('#f_vencimiento').attr('disabled','-1');
					$('#id_tipo_prod').val(0);
					$('#id_tipo_prod').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#p_costo').val('');
					$('#p_costo').attr('disabled','-1');
					$('#p_venta_1').val('');
					$('#p_venta_1').attr('disabled','-1');
					$('#p_venta_2').val('');
					$('#p_venta_2').attr('disabled','-1');
					$('#p_venta_3').val('');
					$('#p_venta_3').attr('disabled','-1');
					$('#id_descuento').val(0);
					$('#id_descuento').attr('disabled','-1');
					$('#id_impto').val(0);
					$('#id_impto').attr('disabled','-1');
					$('#cant_ini').val('');
					$('#cant_ini').attr('disabled','-1');
					$('#cant_max').val('');
					$('#cant_max').attr('disabled','-1');
					$('#cant_real').val('');
					$('#cant_real').attr('disabled','-1');
					$('#cant_re_orden').val('');
					$('#cant_re_orden').attr('disabled','-1');
					$('#ind_fact').val(0);
					$('#ind_fact').attr('disabled','-1');
					$('#id_proveedor').val(0);
					$('#id_proveedor').attr('disabled','-1');
					$('#obs_prod').val('');
					$('#obs_prod').attr('disabled','-1');
					
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 1000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  			  
            }

      });

    });

		// Funcion para el Boton Buscar Persona
		$( "#botonbc" ).click(function() {
        var p_PrecioVenta_3 				= $("#cod_pers").val();
        var p_DescProd 			= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso				= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion				= $("#f_elaboracion").val();
		var p_FeVencimiento 				= $("#f_vencimiento").val();
		var p_IdTipoProd					= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioVenta_2			= $("#f_nacimiento").val();
		var p_IdDescuento				= $("#id_descuento").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+"&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+"&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+"&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioVenta_2="+p_PrecioVenta_2+"&gp_IdDescuento="+p_IdDescuento+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEmpleados/ctrlBuscarPersonas.php",
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
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
										
					$("#desc_prod").val(response.valor2);
					$("#altura").val(response.valor3);
					$("#anchura").val(response.valor4);
					$("#peso").val(response.valor5);
					$("#id_medida").val(response.valor6);
					$("#f_elaboracion").val(response.valor7);
					$("#f_vencimiento").val(response.valor8);
					$("#id_tipo_prod").val(response.valor9);
					$("#id_color").val(response.valor10);
					$("#f_nacimiento").val(response.valor11);
					$("#id_descuento").val(response.valor12);
																		
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 1000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				$('#desc_prod').val('');
				$('#desc_prod').attr('disabled','-1');
				$('#altura').val('');
				$('#altura').attr('disabled','-1');
				$('#anchura').val('');
				$('#anchura').attr('disabled','-1');
				$('#peso').val('');
				$('#peso').attr('disabled','-1');
				$('#id_medida').val('');
				$('#id_medida').attr('disabled','-1');
				$('#f_elaboracion').val('');
				$('#f_elaboracion').attr('disabled','-1');
				$('#f_vencimiento').val('');
				$('#f_vencimiento').attr('disabled','-1');
				$('#id_tipo_prod').val('');
				$('#id_tipo_prod').attr('disabled','-1');
				$('#id_color').val('');
				$('#id_color').attr('disabled','-1');
				$('#f_nacimiento').val('');
				$('#f_nacimiento').attr('disabled','-1');
				$('#id_descuento').val('');
				$('#id_descuento').attr('disabled','-1');
				
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  			  
            }

      });

    });
		
});//Fin del Script

