$(buscar_datos());
function buscar_datos(consulta){
    $.ajax({
        url:'busqueda.php',
        type: 'POST',
        dataType: 'html',
        data:{consulta: consulta},
    })
    .done(function (respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    })
}


$(document).on('keyup','#caja_busqueda',function() {
   var valor = $(this).val();
   if(valor !=""){

    buscar_datos(valor);
   }else{
       buscar_datos();
   }
    


});

/*LO mismo pero para el usuario estandar*/
$(buscar_datosus());
function buscar_datosus(consulta){
    $.ajax({
        url:'busquedaus.php',
        type: 'POST',
        dataType: 'html',
        data:{consulta: consulta},
    })
    .done(function (respuesta) {
        $("#datosus").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    })
}


$(document).on('keyup','#caja_busqueda',function() {
   var valor = $(this).val();
   if(valor !=""){

    buscar_datosus(valor);
   }else{
       buscar_datosus();
   }
    


});