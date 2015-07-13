/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/

function Incluir(){
var f = document.form_Tipos;
//campos		
	f[0].disabled = false;
	f[1].disabled = true;
	f[2].disabled = true;
	
	f.id_sexo.disabled = false;
	f.id_estado_civil.disabled = false;
	f.id_est_per.disabled = false;
	f.id_munic.disabled = false;
	f.num_identidad.disabled = false;
	f.num_rtn.disabled = false;
	f.num_pas.disabled = false;
	f.nombre_1.disabled = false;
	f.nombre_2.disabled = false;
	f.apellido_1.disabled = false;
	f.apellido_2.disabled = false;
	f.telefono.disabled = false;
	f.celular.disabled = false;
	f.email.disabled = false;
	f.skype.disabled = false;
	f.facebook.disabled = false;
	f.twitter.disabled = false;
	f.id_tipo_cli.disabled = false;
	f.id_estado_cli.disabled = false;
	f.id_cond_fiscal.disabled = false;
		
	f.ref_dir.disabled = false;
	f.f_nacimiento.disabled = false;
	
	f[0].value = '';
	
	f.num_identidad.value = '';
	f.num_rtn.value = '';
	f.num_pas.value = '';
	f.nombre_1.value = '';
	f.nombre_2.value = '';
	f.apellido_1.value = '';
	f.apellido_2.value = '';
	f.telefono.value = '';
	f.celular.value = '';
	f.email.value = '';
	f.skype.value = '';
	f.facebook.value = '';
	f.twitter.value = '';
	f.ref_dir.value = '';
	f.f_nacimiento.value = '';
		
	f[0].focus();
	
//botones	
	f.op.value = 'incluir';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = false;
}

function Buscar(){
var f = document.form_Tipos;
	//f[0].value = '';
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
		
	f.id_sexo.disabled = false;
	f.id_estado_civil.disabled = false;
	f.id_est_per.disabled = false;
	f.id_munic.disabled = false;
	f.num_identidad.disabled = false;
	f.num_rtn.disabled = false;
	f.num_pas.disabled = false;
	f.nombre_1.disabled = false;
	f.nombre_2.disabled = false;
	f.apellido_1.disabled = false;
	f.apellido_2.disabled = false;
	f.telefono.disabled = false;
	f.celular.disabled = false;
	f.email.disabled = false;
	f.skype.disabled = false;
	f.facebook.disabled = false;
	f.twitter.disabled = false;
	f.id_tipo_cli.disabled = false;
	f.id_estado_cli.disabled = false;
	f.ref_dir.disabled = false;
	f.id_cond_fiscal.disabled = false;
	f.f_nacimiento.disabled = false;
			
	//botones	
	f.op.value = 'buscar';
	f.btnincluir.disabled = true;
	f.btnbuscar.disabled = true;
	f.btnmodificar.disabled = false;
	f.btneliminar.disabled = false;
	f.btncancelar.disabled = false;
	f.btnguardar.disabled = true;
	}
}

function Modificar(){
var f = document.form_Tipos;
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
		
	f.id_sexo.disabled = true;
	f.id_estado_civil.disabled = true;
	f.id_est_per.disabled = true;
	f.id_munic.disabled = true;
	f.num_identidad.disabled = true;
	f.num_rtn.disabled = true;
	f.num_pas.disabled = true;
	f.nombre_1.disabled = true;
	f.nombre_2.disabled = true;
	f.apellido_1.disabled = true;
	f.apellido_2.disabled = true;
	f.telefono.disabled = true;
	f.celular.disabled = true;
	f.email.disabled = true;
	f.skype.disabled = true;
	f.facebook.disabled = true;
	f.twitter.disabled = true;
	f.id_tipo_cli.disabled = true;
	f.id_estado_cli.disabled = true;
	f.ref_dir.disabled = true;
	f.id_cond_fiscal.disabled = true;
	f.f_nacimiento.disabled = true;
	
	//botones	
	f.op.value = 'modificar';
	f.btnincluir.disabled = false;
	f.btnbuscar.disabled = false;
	f.btnmodificar.disabled = true;
	f.btneliminar.disabled = true;
	f.btncancelar.disabled = true;
	f.btnguardar.disabled = true;
	}
}

function perderfocus(){

var f = document.form_Tipos;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}

function Guardar(){
			var f = document.form_Tipos;
			
			if(f[0].value == '') 
			{
				alert('Falta Ingresar el Codigo para continuar');
				f[0].focus();
				return;
			}else if(f[1].value == ''){
				alert('Falta Ingresar la Descripcion para continuar');
				f[1].focus();
				return;
			}else{
			f[0].disabled = false;}
			//f[0].value = '';}
			//f.submit();}
		}
		
function Eliminar(){
			var f = document.form_Tipos;
			if(confirm('Desea Eliminar este Tipo de Producto '))
			{
				if(f[0].value == '') 
				{
					alert('Falta Ingresar el Codigo para continuar');
					f[0].focus();
					return;
				}else if(f[1].value == ''){
					alert('Falta Ingresar la Descripcion para continuar');
					f[1].focus();
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
			
			//location.href='v_mant_categorias.php';	
			var f = document.form_Tipos;
			//campos		
				f[0].disabled = false;
				f[1].disabled = true;
				f[2].disabled = true;
								
				f.id_sexo.disabled = true;
				f.id_estado_civil.disabled = true;
				f.id_est_per.disabled = true;
				f.id_munic.disabled = true;
				f.num_identidad.disabled = true;
				f.num_rtn.disabled = true;
				f.num_pas.disabled = true;
				f.nombre_1.disabled = true;
				f.nombre_2.disabled = true;
				f.apellido_1.disabled = true;
				f.apellido_2.disabled = true;
				f.telefono.disabled = true;
				f.celular.disabled = true;
				f.email.disabled = true;
				f.skype.disabled = true;
				f.facebook.disabled = true;
				f.twitter.disabled = true;
				f.id_tipo_cli.disabled = true;
				f.id_estado_cli.disabled = true;
				f.ref_dir.disabled = true;
				f.id_cond_fiscal.disabled = true;
				f.f_nacimiento.disabled = true;
						
				f[0].value = '';
	
				f.num_identidad.value = '';
				f.num_rtn.value = '';
				f.num_pas.value = '';
				f.nombre_1.value = '';
				f.nombre_2.value = '';
				f.apellido_1.value = '';
				f.apellido_2.value = '';
				f.telefono.value = '';
				f.celular.value = '';
				f.email.value = '';
				f.skype.value = '';
				f.facebook.value = '';
				f.twitter.value = '';
				f.ref_dir.value = '';
				f.f_nacimiento.value = '';	
					
				f[0].focus();
				
			//botones	
				f.op.value = 'cancelar';
				f.btnincluir.disabled = false;
				f.btnbuscar.disabled = false;
				f.btnmodificar.disabled = true;
				f.btneliminar.disabled = true;
				f.btncancelar.disabled = true;
				f.btnguardar.disabled = true;
		}
		
function Upper(inn){
			var input = inn;
			input.value=input.value.toUpperCase();
		}
		
function mensajes(operacion,listo){
			var f = document.form_Tipos;
			
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