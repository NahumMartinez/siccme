// Funciones de Calculos Matematicos para La Compra

// Funcion para El Calculo Total de la Venta
function SumaTotal()
{
    var sub_total  = document.getElementById('sub_total').value;
    var descuento  = document.getElementById('imp_descuento').value;
    var total_neto = document.getElementById('imp_total').value;
    var total;
    if(descuento == '')
    {
        descuento = 0;
    }else if(descuento > sub_total){
        document.getElementById('imp_descuento').value = 0;
        document.getElementById('sub_total').value = 0;
        document.getElementById('imp_total').value = 0;
                
    }

    if(sub_total == '')
    {
        sub_total = 0;
    }
    
    if(sub_total > descuento){
        total = parseFloat(sub_total) - parseFloat(descuento);
        total = total.toFixed(2);
        document.getElementById('imp_total').value = total;
        
    }
    total = parseFloat(sub_total) - parseFloat(descuento);
    total = total.toFixed(2);
    document.getElementById('imp_total').value = total;
}
		
// Funcion para Hacer el Calculo del Sub Total_Importe
function SumaTabla()
{
    var tabla 	= document.getElementById("table_tran");
    var sub_total   = document.getElementById("sub_total");

    var total = 0;
    for(var i = 1; tabla.rows[i]; i++)
    total += Number(tabla.rows[i].cells[6].innerHTML);
    total = total.toFixed(2);
    sub_total.value = total;
    //alert(total);
}	

// Verificacion de Numero de Filas de la Tabla de Productos
function countProds()
{
    var count = $('#table_tran >tbody >tr').length;
    
    if (count == 0){
        $('#cod_prod').focus();
        return false;
    }else{
        return true;
    }
    
    return false;
}