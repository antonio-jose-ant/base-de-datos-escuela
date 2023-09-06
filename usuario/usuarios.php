<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
    <div class="usuarios">
        <form action="userC.php" method="post" class="form">
            <div class="colC-Complet colR-2">
                <h2> Agregar Usuario</h2>
            </div>
            <div class="colC-Complet">
                <span> Nombre</span>
                <input type="text" name="secionNom">
            </div>
            <div class="colC-Complet">
                <span> Usuario</span>
                <input type="text" name="secionUsr">
            </div>
            <div class="colC-Complet">
                <span> Tipo</span>
                <select name="seciontipoUser" id="tipoUser" onchange="seleccionEstadoC();">
                    <option> </option>
                    <option value="administrador">Administrador</option>
                    <option value="sub-administrador">Sub administrador</option>
                    <option value="Encargado">Encargado</option>
                    <option value="Docente">Docente</option>
                    <option value="Alumno">Alumno</option>
                </select>
            </div>
            <div class="colC-Complet" id="RFCUser" style="display: none;">
                <span> RFC</span>
                <input type="text" name="RFCUser">
            </div>
            <div class="colC-Complet">
                <span> Contraseña</span>
                <input type="text" name="secionPass">
            </div>
            <div class="colC-Complet">
                <input type="submit"  class="btn" name="agr" value="Agregar">
            </div>
        </form>
    </div>
    <script>
        window.addEventListener('load',seleccionEstadoC)
        function seleccionEstadoC(){
            var estadoCivil=document.getElementById('tipoUser');
            var parejaR=document.getElementById('RFCUser');
            estadoCivil.addEventListener('change',parejaName());
            function parejaName(){
                if(estadoCivil.value==='Docente'){
                    parejaR.style.display = "flex";
                }else{
                    parejaR.style.display = "none";
                }
            }
        }
    </script>
    </body>
</html>
<?php
}else{
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>