/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/
function BuscarProd(){
var f = document.form_Compras;
    // Validacion de Codigo antes de Buscar
    f.op.value = 'buscaProd';
    	//f.cod_prod.focus();
    	
}

function BuscarProv(){
var f = document.form_Compras;
    // Validacion de codigo antes de Mandar
    if (document.getElementById("cod_proveedor").value=='')
    {
        alert("Falta el Codigo del Proveedor");
    }else{   
        f.op.value = 'buscaProv';
    }		
}
	
function Incluir(){
var f = document.form_Compras;
//campos		
	
	//var x=document.getElementById("myHeader");
	
}

function Buscar(){
var f = document.form_Compras;
	if(f[0].value =='')
	{
		alert('Falta Ingresar el Codigo');
		f[0].focus();
	}
	else
	{
	//campos		
	f[0].disabled = false;
	f[1].disabled = true;
	f[2].disabled = true;
		
	// Datos Generales
	f.desc_prod.disabled = false;
	f.id_color.disabled = false;
	f.altura.disabled = false;
	f.anchura.disabled = false;
	f.peso.disabled = false;
	f.id_medida.disabled = false;
	// Datos Calidad
	f.f_elaboracion.disabled = false;
	f.f_vencimiento.disabled = false;
	f.id_tipo_prod.disabled = false;
	// Datos Economicos
	f.p_costo.disabled = false;
	f.p_venta_1.disabled = false;
	f.p_venta_2.disabled = false;
	f.p_venta_3.disabled = false;
	f.id_descuento.disabled = false;
	f.id_impto.disabled = false;
	// Datos de Inventario
	f.cant_ini.disabled = true;
	f.cant_max.disabled = false;
	f.cant_real.disabled = true;
	f.cant_re_orden.disabled = false;
	f.ind_fact.disabled = false;
	f.id_proveedor.disabled = false;
	f.obs_prod.disabled = false;
				
	//botones	
	f.op.value = 'buscar';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = false;
	f.btneliminar.disabled = false;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = true;
	//f.botonbc.disabled = false;
	
	}
}

function Modificar(){
var f = document.form_Compras;
	if(f[0].value =='')
	{
		alert('Falta Ingresar el Codigo');
		f[0].focus();
	}
	else{
	//campos		
	f[0].disabled = false;
	f[1].disabled = true;
	f[2].disabled = true;
		
	// Datos Generales
	f.desc_prod.disabled = true;
	f.id_color.disabled = true;
	f.altura.disabled = true;
	f.anchura.disabled = true;
	f.peso.disabled = true;
	f.id_medida.disabled = true;
	// Datos Calidad
	f.f_elaboracion.disabled = true;
	f.f_vencimiento.disabled = true;
	f.id_tipo_prod.disabled = true;
	// Datos Economicos
	f.p_costo.disabled = true;
	f.p_venta_1.disabled = true;
	f.p_venta_2.disabled = true;
	f.p_venta_3.disabled = true;
	f.id_descuento.disabled = true;
	f.id_impto.disabled = true;
	// Datos de Inventario
	f.cant_ini.disabled = true;
	f.cant_max.disabled = true;
	f.cant_real.disabled = true;
	f.cant_re_orden.disabled = true;
	f.ind_fact.disabled = true;
	f.id_proveedor.disabled = true;
	f.obs_prod.disabled = true;
	
	f[0].focus();		
	//botones	
	f.op.value = 'modificar';
	f.btnincluir.disabled = false;
	f.btnbuscar.disabled = false;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = true;
	f.btnguardar.disabled = true;
	//f.botonbc.disabled = true;
	
	}
}

function perderfocus(){

var f = document.form_Compras;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}

// Funcion para Validar Campos
function validaCampos()
{
   var f = document.form_Compras;
   var fecha_entrega = document.getElementById("f_entrega");
   var rDev2 = 'Good';
	  // f.op.value = 'incluir';
	   if(f.cod_proveedor2.value == ''){
	   alert('Falta Ingresar el Codigo del Proveedor, para continuar');
	   f.cod_proveedor2.focus();
           rDev2 = 'Bad';
	   return rDev2;
	   }else if(f.nombre_proveedor2.value == ''){
	   alert('Los Datos del Proveedor no pueden ser Nulos ingreselos, para continuar');
	   f.cod_proveedor2.focus();
	   rDev2 = 'Bad';
	   return rDev2;
	   }else if(f.documento_id.value == ''){
	   alert('Falta Ingresar el Numero de Documento, para continuar');
	   f.documento_id.focus();
	   rDev2 = 'Bad';
	   return rDev2;
	   }else if(countProds() == false){
	   alert('No ha Ingresado un Listado de Productos, para continuar');
	   //f.cant_prod.focus();
	   rDev2 = 'Bad';
	   return rDev2;
	   }else if(fecha_entrega.value == ''){
	   alert('No ha Ingresado la Fecha de Entrega, para continuar');
	   //f.cant_prod.focus();
	   rDev2 = 'Bad';
	   return rDev2;
	   }else{
	   //f[0].disabled = false;
                f.op.value = 'incluir';
	   //f.submit();
	   }

    return rDev2;
}

function Guardar()
{
    validaCampos();
    //var f = document.form_Compras;
	//f.op.value = 'incluir';

}

function Eliminar(){
			var f = document.form_Compras;
			if(confirm('Desea Eliminar este Empleado '))
			{
				if(f[0].value == '') 
			{
				alert('Falta Ingresar el Codigo del Empleado, para continuar');
				f[0].focus();
				return;
			}else if(f.desc_prod.value == ''){
				alert('Falta Ingresar la descripcion, para continuar');
				f.desc_prod.focus();
				return;
			}else if(f.id_tipo_prod.value == ''){
				alert('Falta Seleccionar el Tipo de Producto, para continuar');
				f.id_tipo_prod.focus();
				return;
			}else if(f.id_descuento.value == ''){
				alert('Falta Seleccionar el Descuento, para continuar');
				f.id_descuento.focus();
				return;
			}else if(f.id_impto.value == ''){
				alert('Falta Seleccionar el Impuesto, para continuar');
				f.id_impto.focus();
				return;
			}else{
					f[0].disabled = false;
					f.op.value = 'eliminar';
					//f.submit();
				}
			}
			else
			{
				//location.href='../vistas/vistaPersona.php';
			}
		}
		
function Cancelar(){
							
			var f = document.form_Compras;
			//campos		
				f[0].disabled = false;
				f[1].disabled = true;
				f[2].disabled = true;
								
				// Datos Generales
	f.desc_prod.disabled = true;
	f.id_color.disabled = true;
	f.altura.disabled = true;
	f.anchura.disabled = true;
	f.peso.disabled = true;
	f.id_medida.disabled = true;
	// Datos Calidad
	f.f_elaboracion.disabled = true;
	f.f_vencimiento.disabled = true;
	f.id_tipo_prod.disabled = true;
	// Datos Economicos
	f.p_costo.disabled = true;
	f.p_venta_1.disabled = true;
	f.p_venta_2.disabled = true;
	f.p_venta_3.disabled = true;
	f.id_descuento.disabled = true;
	f.id_impto.disabled = true;
	// Datos de Inventario
	f.cant_ini.disabled = true;
	f.cant_max.disabled = true;
	f.cant_real.disabled = true;
	f.cant_re_orden.disabled = true;
	f.ind_fact.disabled = true;
	f.id_proveedor.disabled = true;
	f.obs_prod.disabled = true;
			
	f[0].value = '';
	
	// Datos Generales
	f.desc_prod.value = '';
	f.altura.value = '';
	f.anchura.value = '';
	f.peso.value = '';
	// Datos Calidad
	f.f_elaboracion.value = '';
	f.f_vencimiento.value = '';
	// Datos Economicos
	f.p_costo.value = '';
	f.p_venta_1.value = '';
	f.p_venta_2.value = '';
	f.p_venta_3.value = '';
	// Datos de Inventario
	f.cant_ini.value = '';
	f.cant_max.value = '';
	f.cant_real.value = '';
	f.cant_re_orden.value = '';
	f.ind_fact.value = 0;
	f.obs_prod.value = '';
					
	f[0].focus();
				
			//botones	
				f.op.value = 'cancelar';
				f.btnincluir.disabled = false;
				f.btnbuscar.disabled = false;
				f.btnmodificar.disabled = true;
				f.btneliminar.disabled = true;
				f.btncancelar.disabled = true;
				f.btnguardar.disabled = true;
				//f.botonbc.disabled = true;
		}
		
function Upper(inn){
			var input = inn;
			input.value=input.value.toUpperCase();
		}
		
function SumarColumna(grilla, columna) {
 
    var resultVal = 0.0; 
         
    $("#" + grilla + " tbody tr").not(':first').not(':last').each(
        function() {
         
            var celdaValor = $(this).find('td:eq(' + columna + ')');
            
            if (celdaValor.val() != null)
                    resultVal += parseFloat(celdaValor.html().replace(',','.'));
                     
        } //function
         
    ) //each
    
    $("#" + grilla + " tbody tr:last td:eq(" + columna + ")").html(resultVal.toFixed(2).toString().replace('.',','));   
 
}   
		
function Tecla(e)
{   
    var e = e || event;
    var tecla =  e.keyCode ;
   
    if(tecla==37)
    {
        //foto anterior
       //alert("37");
	   var Importe;
			//Importe = Math.round((Precio * p_CanProd) + (((Precio * p_CanProd) * 12) / 100));
			Importe = (Precio * p_CanProd) + (((Precio * p_CanProd) * 12) / 100);
		    Importe = Importe.toFixed(2);

    }

    if(tecla==113)
    {
        //foto siguiente
       //alert("113");
	   SumaTotal();
    }
}

// Sumar Totales
function SumaTabla()
{
        alert('total');
	/*tabla 	    = document.getElementById("table_tran");
	sub_total   = document.getElementById("sub_total");

	var total = 0;
	for(var i = 1; tabla.rows[i]; i++)
    	total += Number(tabla.rows[i].cells[5].innerHTML);
		total = total.toFixed(2);
		sub_total.value = total;
			alert(total);*/
}

// Funcion para El Calculo Total de la Compra
function SumaTotal()
{
	var sub_total  = document.getElementById('sub_total').value;
	var descuento  = document.getElementById('imp_descuento').value;
	var total_neto = document.getElementById('imp_total').value;
	var total;
        
	if(descuento == '')
	{
           alert('rowCount'); 
	   descuento = 0;
	}

	total = parseFloat(sub_total) - parseFloat(descuento);
	total = total.toFixed(2);
	document.getElementById('imp_total').value = total;

}

// Funcion de Suma de Items de Tabla
function SumaItems(){
    var rDev  = 'Good';
    var tabla = document.getElementById("table_tran");
    var total = 0;
    for(var i = 1; tabla.rows[i]; i++)
        total += Number(tabla.rows[i].cells[2].innerHTML);
        //total = total.toFixed(2);
        if(total > 1000){
            //alert('El Numero total de Productos es mayor al permitido(1000) '+total+' ');
            rDev = 'Bad';
            return rDev;
        }
    return rDev;    
}

// Funcion de Borrado de Filas
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("table_tran").deleteRow(i);
    SumaTabla();
    SumaTotal();
}

