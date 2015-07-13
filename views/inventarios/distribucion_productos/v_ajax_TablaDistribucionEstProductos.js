$(document).ready(function () {  
		// Funcion para la Busqueda
		filtrar();

});//Fin del Script

// funcion general para hacer el filtro
function filtrar()
{	
	// funcion ajax de jquery, hara la peticion enviandole
	// los parametros, y este devolvera resultado en formato
	// json
	$.ajax({
		//data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "../../../ctrl/ctrlTiposProductos/ctrlTablaTipos_2.php",
			success: function(response){
				var find	= response.find;
				var html = '';
				// si la consulta ajax devuelve datos
				//(find == 'ok'){
					// hacemos un bucle al json, para recorrer cada registro
					// e irlos almacenando en filas html
					$.each(response, function(i,item){
						html += '<tr>'
							html += '<td>'+item.id+'</td>'
							html += '<td>'+item.codigo+'</td>'
							html += '<td>'+item.nombre+'</td>'
							html += '<td>'+item.f_creacion+'</td>'
							html += '<td>'+item.observaciones+'</td>'
							html += '<td>'+item.grupo+'</td>'
						html += '</tr>';
 
					});					
				//}
				// si no hay datos mostramos mensaje de no encontraron registros
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				// añadimos  a nuestra tabla todos los datos encontrados mediante la funcion html
				$("#example1 tbody").html(html);
			}
	  });
}

