window.addEventListener('load',desplegar1)

function desplegar1() {
    var menu_desplega=document.getElementById('menu-desplega');
    menu_desplega.addEventListener('click',mostrar);
    var menu_desplega2=document.getElementById('menu-desplega2');
    menu_desplega2.addEventListener('click',mostrar2);
    var menu_desplega2=document.getElementById('menu-desplega3');
    menu_desplega2.addEventListener('click',mostrar3);
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
    function mostrar3(){
        if (menu_III.className == "deplegado") {
            menu_III.className = "oculta";
        } else{
            menu_III.className = "deplegado";
        }
        
    }
    function with700(){
        let  menu_contenedor=document.getElementById('menu-contenedor');
        if (menu_contenedor.className == "menu-contenedor") {
            menu_contenedor.className += " menu-cont-dep";
        }else{
            menu_contenedor.className = "menu-contenedor";
        }
    }
    
} 
function changueContentH(div,url){ 
    $(div).attr("src",url);
}