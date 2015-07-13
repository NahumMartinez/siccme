/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/
function BuscarEmple(){
var f = document.form_Producto;
    f.op.value = 'buscarc';
		
}

function Incluir(){
var f = document.form_Producto;
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
	f.op.value = 'incluir';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = false;
	//f.botonbc.disabled = false;
	
}

function Buscar(){
var f = document.form_Producto;
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
var f = document.form_Producto;
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

var f = document.form_Producto;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}

function Guardar(){
			var f = document.form_Producto;
			
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
				f.op.value = 'incluir';
				//f.botonbc.disabled = true;
			}
			
		}
		
function Eliminar(){
			var f = document.form_Producto;
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
							
			var f = document.form_Producto;
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
		
function mensajes(operacion,listo){
			var f = document.form_Producto;
			
			if(listo==1 && operacion=='buscar')
			{
				
				f.btnincluir.disabled = true;
				f.btnbuscar.disabled = true;
				f.btnmodificar.disabled = false;
				f.btneliminar.disabled = false;
				f.btncancelar.disabled = false;
			}
			
			if(listo==0 && operacion=='buscar')
			{
				alert('El Registro que Busca no Existe');
			}
			
			
			if(listo==1 && operacion=='incluir')
			{
				alert('Registro Incluido con Exito');
			}
			
			if(listo==0 && operacion=='incluir')
			{
				alert('El Registro que Intenta Incluir Ya existe');
			}
			
			if(listo==1 && operacion=='modificar')
			{
				alert('Registro Modificado con exito');
			}
			
			if(listo==1 && operacion=='eliminado')
			{
				alert('Registro Eliminado con exito');
			}
		}