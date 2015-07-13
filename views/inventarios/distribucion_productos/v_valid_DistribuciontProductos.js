/*
	@Autor : Nahum Martinez
	@Fecha : 2015-04-21
	@Task  : Validacion del Formulario y activacion de los eventos de los botones 
*/

function Incluir(){
var f = document.form_Tipos;
//campos		
	f[0].disabled = false;
	f[1].disabled = false;
	f[2].disabled = true;
	f[3].disabled = true;
	f.id_grupo.disabled = false;
	f.observaciones.disabled = false;
		
	f[0].value = '';
	f[1].value = '';
	f.observaciones.value = '';
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

// Funcion de Mayusculas		
function Upper(inn){
    var input = inn;
    input.value=input.value.toUpperCase();
}
                
// Funcion de Actualizar Valores de Cant. Disponible
function Act_Cant(){
        var no_fila    = $("#no_filas").val();
        var no_columna = $("#no_columnas").val();
	var input1     = $("#c_real").text();
        var input2 = $("#cant_articulos").val();
	var input3 = input1;
        var p_ret  = 0;
            
        if(input2 == '' ){  
            p_ret = 1;
            return;
        }else{
            // Valida que la Cant. no sea mayor que la Incial
            if(input2 > input1){
                //alert('No se puede asiganar mas Items de los Disponibles');
                p_ret = 2;
                return;
            }else{
                input1 = input1 - input2;
                // Actuliza el Valor Nuevo 
                $("#c_real").html(input1);
                p_ret = 0;
            }
            
        }
 return p_ret;       
}

// Funcion de Validacion de Campos
function ValidaCampos(){
    var no_fila        = document.getElementById("no_filas").value;
    var no_columna     = document.getElementById("no_columnas").value;
    var pos_Fila       = document.getElementById("pos_filas").value; 
    var pos_Columna    = document.getElementById("pos_columnas").value;
    var cant_articulos = document.getElementById("cant_articulos").value;
    
    if(no_fila == ''){
        alert('Falta Ingresar los Datos de las Filas del Estante'); 
        return false;
    }else if(no_columna == ''){
        alert('Falta Ingresar los Datos de las Columnas del Estante'); 
        return false;
    }else if(pos_Fila == ''){
        alert('Falta Ingresar la Fila que estara el Producto'); 
        return false;
    }else if(pos_Columna == ''){    
        alert('Falta Ingresar la Columna que estara el Producto');
        return false;
    } 
   return true; 
}
