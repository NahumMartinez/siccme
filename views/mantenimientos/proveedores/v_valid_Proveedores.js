/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/
function BuscarProv(){
var f = document.form_Proveedores;
    f.op.value = 'buscarc';
		
}

function Incluir(){
var f = document.form_Proveedores;
//campos		
	f[0].disabled = false;
	f[1].disabled = true;
	f[2].disabled = true;
	
	f.cod_pers.disabled = false;
	f.num_identidad.disabled = false;
	f.id_tipo_prov.disabled = false;
	f.id_estado_prov.disabled = false;
	f.id_persona.disabled = false;
	f.id_rubro.disabled = false;
			
	f[0].value = '';
	
	f.num_identidad.value = '';
	f.nombre_1.value = '';
	f.nombre_2.value = '';
	f.apellido_1.value = '';
	f.apellido_2.value = '';
	f.telefono.value = '';
	f.celular.value = '';
	f.email.value = '';
	f.f_nacimiento.value = '';
	f.ref_dir.value = '';
	f.cod_pers.value = '';
	f.id_persona.value = '0';
					
	f[0].focus();
	
//botones	
	f.op.value = 'incluir';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = false;
	f.botonbc.disabled = false;
	
}

function Buscar(){
var f = document.form_Proveedores;
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
		
	f.cod_pers.disabled = false;
	f.num_identidad.disabled = false;
	f.id_tipo_prov.disabled = false;
	f.id_estado_prov.disabled = false;
	f.id_persona.disabled = false;
	f.id_rubro.disabled = false;
				
	//botones	
	f.op.value = 'buscar';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = false;
	f.btneliminar.disabled = false;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = true;
	f.botonbc.disabled = false;
	
	}
}

function Modificar(){
var f = document.form_Proveedores;
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
		
	f.cod_pers.disabled = true;
	f.num_identidad.disabled = true;
	f.id_tipo_prov.disabled = true;
	f.id_estado_prov.disabled = true;
	f.id_persona.disabled = true;
	f.id_rubro.disabled = true;
	
	f[0].focus();		
	//botones	
	f.op.value = 'modificar';
	f.btnincluir.disabled = false;
	f.btnbuscar.disabled = false;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = true;
	f.btnguardar.disabled = true;
	f.botonbc.disabled = true;
	
	}
}

function perderfocus(){

var f = document.form_Proveedores;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}

function Guardar(){
			var f = document.form_Proveedores;
			
			if(f[0].value == '') 
			{
				alert('Falta Ingresar el Codigo del Proveedor, para continuar');
				f[0].focus();
				return;
			}else if(f.cod_pers.value == ''){
				alert('Falta Ingresar el Codigo de Proveedor, para continuar');
				f.cod_pers.focus();
				return;
			}else if(f.num_identidad.value == ''){
				alert('Falta Ingresar la Identidad, para continuar');
				f.num_identidad.focus();
				return;
			}else{
				f[0].disabled = false;
				f.op.value = 'incluir';
				f.botonbc.disabled = true;
			}
			
		}
		
function Eliminar(){
			var f = document.form_Proveedores;
			if(confirm('Desea Eliminar este Empleado '))
			{
				if(f[0].value == '') 
				{
					alert('Falta Ingresar el Codigo para continuar');
					f[0].focus();
					return;
				}else if(f.cod_pers.value == ''){
					alert('Falta Ingresar el Codigo de Persona, para continuar');
					f.cod_pers.focus();
					return;
				}else if(f.num_identidad.value == ''){
					alert('Falta Ingresar la Identidad, para continuar');
					f.num_identidad.focus();
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
							
			var f = document.form_Proveedores;
			//campos		
				f[0].disabled = false;
				f[1].disabled = true;
				f[2].disabled = true;
								
				f.cod_pers.disabled = true;
				f.num_identidad.disabled = true;
				f.id_tipo_prov.disabled = true;
				f.id_estado_prov.disabled = true;
				f.id_persona.disabled = true;
				f.id_rubro.disabled = true;
										
				f[0].value = '';
	
				f.num_identidad.value = '';
				f.nombre_1.value = '';
				f.nombre_2.value = '';
				f.apellido_1.value = '';
				f.apellido_2.value = '';
				f.telefono.value = '';
				f.celular.value = '';
				f.email.value = '';
				f.f_nacimiento.value = '';
				f.ref_dir.value = '';
				f.cod_pers.value = '';
				f.id_persona.value = '0';
												
				f[0].focus();
				
			//botones	
				f.op.value = 'cancelar';
				f.btnincluir.disabled = false;
				f.btnbuscar.disabled = false;
				f.btnmodificar.disabled = true;
				f.btneliminar.disabled = true;
				f.btncancelar.disabled = true;
				f.btnguardar.disabled = true;
				f.botonbc.disabled = true;
		}
		
function Upper(inn){
			var input = inn;
			input.value=input.value.toUpperCase();
		}
		
function mensajes(operacion,listo){
			var f = document.form_Proveedores;
			
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