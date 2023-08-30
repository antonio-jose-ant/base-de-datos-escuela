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
                <select name="seciontipoUser">
                    <option> </option>
                    <option value="administrador">administrador</option>
                    <option value="sub-administrador">sub administrador</option>
                    <option value="Invitado">Doncete</option>
                    <option value="Basico">Alumno</option>
                </select>
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
    </body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window..history.go(-1);</script>";
}
?>