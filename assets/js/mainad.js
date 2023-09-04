
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
$(document).ready(function() {
  $('#timeInput').timepicker({
      timeFormat: 'hh:mm', // Formato de hora y minutos
      interval: 15, // Intervalo de minutos
      scrollbar: true // Agregar una barra de desplazamiento para minutos
  });
  $('#timeInput2').timepicker({
    timeFormat: 'hh:mm', // Formato de hora y minutos
    interval: 15, // Intervalo de minutos
    scrollbar: true // Agregar una barra de desplazamiento para minutos
});
$('#timeInput3').timepicker({
  timeFormat: 'hh:mm', // Formato de hora y minutos
  interval: 15, // Intervalo de minutos
  scrollbar: true // Agregar una barra de desplazamiento para minutos
});
$('#timeInput4').timepicker({
  timeFormat: 'hh:mm', // Formato de hora y minutos
  interval: 15, // Intervalo de minutos
  scrollbar: true // Agregar una barra de desplazamiento para minutos
});
});

$(function() {
  $.datepicker.setDefaults({
    dayNames: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    dayNamesMin: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    dateFormat: "yy/mm/dd",
    prevText: "<", // Símbolo para el botón "prev" (anterior)
    nextText: ">"
  });

});