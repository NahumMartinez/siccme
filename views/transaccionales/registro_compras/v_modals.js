$(function () {
		// Ventana de Proveedores
		$("#dialog").dialog({
		autoOpen: false,
		modal: true,
		buttons: {
		"Aceptar": function () {
		nombre_proveedor2.value = nom_proveedor.value;
		tipo_proveedor2.value   = tipo_proveedor.value;
		cod_proveedor2.value    = cod_proveedor.value;
		id_proveedor2.value  	= id_proveedor.value;
		
		$(this).dialog("close");
		},
		"Cerrar": function () {
		$(this).dialog("close");
		}
		}
		});
		
		$("#btnopen")
		.button()
		.click(function () {
		nom_proveedor.value  = nombre_proveedor2.value;
		tipo_proveedor.value = tipo_proveedor2.value;
		cod_proveedor.value  = cod_proveedor2.value;
		id_proveedor.value   = id_proveedor2.value;
		
		$("#dialog").dialog("option", "width", 700);
		$("#dialog").dialog("option", "height", 350);
		$("#dialog").dialog("option", "resizable", false);
		$("#dialog").dialog("open");
		});
    });
	// Fin Ventana de Proveedores
	

		// Ventana de Obervaciones
		$("#dialog_obs").dialog({
		autoOpen: false,
		modal: true,
		buttons: {
		"Aceptar": function () {
				
		$(this).dialog("close");
		},
		
		}
		});
		
		$("#btnopen_obs")
		.button()
		.click(function () {
		
		$("#dialog_obs").dialog("option", "width", 700);
		$("#dialog_obs").dialog("option", "height", 300);
		$("#dialog_obs").dialog("option", "resizable", false);
		$("#dialog_obs").dialog("open");
		});		
		
    
	// Fin Ventana de Obervaciones	