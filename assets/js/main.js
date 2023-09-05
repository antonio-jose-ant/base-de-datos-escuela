window.addEventListener('load',desplegar1)

function desplegar1() { 
    var formulario = document.getElementById('menuOpciones');
    var liContenido = formulario.getElementsByTagName("li");

    for (var i = 0; i < liContenido.length; i++) {
        liContenido[i].addEventListener("click", function(event) {
            var div = this.querySelector(".oculta");
            if(div==null){
                var divD = this.querySelector(".deplegado");

                if (divD.classList.contains("oculta")) {
                    divD.classList.remove("oculta");
                    divD.classList.add("deplegado");
                } else {
                    divD.classList.remove("deplegado");
                    divD.classList.add("oculta");
                }
            }else{
                if (div.classList.contains("deplegado")) {
                    div.classList.remove("deplegado");
                    div.classList.add("oculta");
                } else {
                    div.classList.remove("oculta");
                    div.classList.add("deplegado");
                }
            }

        });
        var links = liContenido[i].getElementsByTagName("a");
        for (var j = 0; j < links.length; j++) {
            links[j].addEventListener("click", function(event) {
                event.stopPropagation();
            });
        }
    }
    

    let harmburger = document.getElementById('harmburger');
    harmburger.addEventListener('click', toggleMenu);

    let menuContainer = document.getElementById('menu-container');

    var menuLinks = menuContainer.getElementsByTagName("a");

    for (var i = 0; i < menuLinks.length; i++) {
        if (window.innerWidth <= 750) {
            menuLinks[i].addEventListener('click', toggleMenu);
        }
    }
    function toggleMenu() {
        if (menuContainer.classList.contains("menu-cont-dep")) {
            menuContainer.classList.remove("menu-cont-dep");
        } else {
            menuContainer.classList.add("menu-cont-dep");
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
