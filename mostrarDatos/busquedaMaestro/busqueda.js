$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
        url: 'busquedaMaestro/App/buscar.php',
        type: 'POST',
        dataType: 'html',
        data: { consulta: consulta }
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    });
}

$(document).on('keyup', '#caja_busqueda',function(){
    var valor = $(this).val();
    if(valor != "")
    {
        buscar_datos(valor);
        console.log(valor);
    }else{
        buscar_datos();
    }
})