    wow = new WOW({
        animateClass: 'animated',
        offset: 100,
        callback: function(box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
    });
    wow.init();
    document.getElementById('moar').onclick = function() {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
    };

    function desplegar() {
        var desplega = document.getElementById("desplega");
        if (desplega.className == "colapsado") {
            desplega.className += " mostrar";
        } else {
            desplega.className = "colapsado";
        }
    }

