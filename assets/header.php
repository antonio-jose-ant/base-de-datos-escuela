<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <script src="../assets/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="../assets/js/mainad.js"></script>
    <script src="../assets/js/jquery-ui-timepicker-0.3.3/jquery.ui.timepicker.js"></script>
    <script>
        window.addEventListener('load',seleccionEstadoC)
        function seleccionEstadoC(){
            var estadoCivil=document.getElementById('parejaSelection');
            var parejaR=document.getElementById('pareja_EC');
            estadoCivil.addEventListener('change',parejaName());
            function parejaName(){
                if(estadoCivil.value==='Casado(a)' || estadoCivil.value==='Conviviente(a)'){
                    parejaR.style.display = "block";
                }else{
                    parejaR.style.display = "none";
                }
            }
        }
    </script>
    <title>escuela</title>
</head>