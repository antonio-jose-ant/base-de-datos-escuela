
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