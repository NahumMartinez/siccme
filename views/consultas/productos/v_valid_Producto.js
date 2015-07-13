/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/

function perderfocus(){

var f = document.form_Tipos;
			
	if(f.op.value=='buscar')
	{
	f[0].disabled = false;
	f.submit();
	}
}
		
function Upper(inn){
			var input = inn;
			input.value=input.value.toUpperCase();
		}
                
// Funcion de Reinicio de la ventana
function actConsulta(){
    
    location.href = 'v_consulta_productos.php';
} 

