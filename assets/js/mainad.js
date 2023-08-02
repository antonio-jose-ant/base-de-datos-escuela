
function changueContentH(div,url){ 
    $(div).attr("src",url);
}
$( function() {
  $( "#date1" ).datepicker({
    changeMonth: true,
    changeYear: true
  });
  $( "#date2" ).datepicker({
    changeMonth: true,
    changeYear: true
  });
  $( "#date3" ).datepicker({
    changeMonth: true,
    changeYear: true
  });
} );

$( function() {
  // Obtener el año actual
  var anioActual = (new Date()).getFullYear();

  // Configurar el Datepicker para cada campo de fecha
  $("#date1, #date2, #date3").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: (anioActual - 60) + ":" + anioActual,
    minDate: "-" + 60 + "Y", // 60 años atrás desde el año actual
    maxDate: 0 // Fecha máxima: hoy
  });
});