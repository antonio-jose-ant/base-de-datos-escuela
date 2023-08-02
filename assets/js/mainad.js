
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


$(function() {
  $.datepicker.setDefaults({
    dayNames: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    dayNamesMin: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    dateFormat: "dd/mm/yy",
    prevText: "<", // Símbolo para el botón "prev" (anterior)
    nextText: ">"
  });

});