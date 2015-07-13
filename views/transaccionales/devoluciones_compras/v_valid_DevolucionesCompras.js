/*
	@Autor : Nahum Martinez
	@Fecha : 2014-10-13
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/
function BuscarAlmacen(){
var opcion = document.getElementById("op1");
    opcion.value = 'buscaAlmacen';
}

function RecepcionCompra()
{
   //var op = document.getElementById("op1");
   var f = document.form_Recepcion;
   f.op.value = 'RecepcionCompra'; 
}

// Funcion para Mostrar los Datos del Almacen
function showAlmacen()
{
   //var op = document.getElementById("op1");
   var f = document.form_Recepcion;
   //f.op.value = 'RecepcionCompra'; 
   var codigo = document.getElementById("cod_almacen_p").value;
   var codigo2 = document.getElementById("cod_almacen_1");
   codigo2.value = codigo;
}

function Buscar(){
var f = document.form_Recepcion;
	if(f.rdb_busca.checked == false )
	{
		alert('Debe Seleccionar una opcion');
		f.cod_compra.focus();
	}
	else
	{
	
	//f.botonbc.disabled = false;
	
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

		
function Upper(inn){
			var input = inn;
			input.value=input.value.toUpperCase();
		}
		
                
// Funcion de Focus a la Opcion del Criterio Seleccionado
function buscarPor()
{
    //var value = $("#rdb_busca").;
    var value = document.form_Recepcion.rdb_busca.checked;
    //alert(value);
        if(value == true){
            alert("Pulsa la Opcion :");
        }else{
            alert("Pulsa la Opcion 2 :");
        }
    
    
}
