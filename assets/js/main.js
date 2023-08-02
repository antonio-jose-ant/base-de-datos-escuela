window.addEventListener('load',desplegar1)

function desplegar1() { 
    var menu_desplega=document.getElementById('menu-desplega');
    menu_desplega.addEventListener('click',mostrar);
    var menu_desplega2=document.getElementById('menu-desplega2');
    menu_desplega2.addEventListener('click',mostrar2);
    let menu_I=document.getElementById('menu-I');
    let menu_II=document.getElementById('menu-II');
    let menu_III=document.getElementById('menu-III');
    let harmburger=document.getElementById('harmburger');
    harmburger.addEventListener('click',with700)

    function mostrar(){
        if (menu_I.className == "deplegado") {
            menu_I.className = "oculta";
        } else{
            menu_I.className = "deplegado";
        }
    }
    function mostrar2(){
        if (menu_II.className == "deplegado") {
            menu_II.className = "oculta";
        } else{
            menu_II.className = "deplegado";
        }
    }
    function with700(){
        
        let  menu_contenedor=document.getElementById('menu-container');
        let  contraeMenu700=document.getElementById('contraeMenu700');
        contraeMenu700.addEventListener('click',with700);
        let  contraeMenu600=document.getElementById('contraeMenu600');
        contraeMenu600.addEventListener('click',with700);
        let  contraeMenu500=document.getElementById('contraeMenu500');
        contraeMenu500.addEventListener('click',with700);
        let  contraeMenu400=document.getElementById('contraeMenu400');
        contraeMenu400.addEventListener('click',with700);
        if(screen.width <= 750){
            if (menu_contenedor.className == "menu-contenedor") {
                menu_contenedor.className += " menu-cont-dep";
            }else{
                menu_contenedor.className = "menu-contenedor";
            }
        }
    }
    
} 
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
