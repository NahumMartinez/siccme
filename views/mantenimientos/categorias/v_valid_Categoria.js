/*
	@Autor : Nahum Martinez
	@Fecha : 2014-09-15
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/

function Incluir(){
var f = document.form_Categorias;
//campos		
	f[0].disabled = false;
	f[1].disabled = false;
	f[2].disabled = true;
	f[3].disabled = true;
	
	f[0].value = '';
	f[1].value = '';
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
var f = document.form_Categorias;
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
	f[1].disabled = false;
	f[2].disabled = true;
	f[3].disabled = true;
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
var f = document.form_Categorias;
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
	f[3].disabled = true;
		
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

var f = document.form_Categorias;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}

function Guardar(){
			var f = document.form_Categorias;
			
			if(f[0].value == '') 
			{
				alert('Falta Ingresar el codigo para continuar');
				f[0].focus();
				return;
			}else if(f[1].value == ''){
				alert('Falta Ingresar la descripcion para continuar');
				f[1].focus();
				return;
			}else{
			f[0].disabled = false;}
			//f[0].value = '';}
			//f.submit();}
		}
		
function Eliminar(){
			var f = document.form_Categorias;
			if(confirm('Desea Eliminar esta Categoria'))
			{
				if(f[0].value == '') 
				{
					alert('Falta Ingresar el codigo para continuar');
					f[0].focus();
					return;
				}else if(f[1].value == ''){
					alert('Falta Ingresar la descripcion para continuar');
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
			var f = document.form_Categorias;
			//campos		
				f[0].disabled = false;
				f[1].disabled = true;
				f[2].disabled = true;
				f[3].disabled = true;
				
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
			var f = document.form_Categorias;
			
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