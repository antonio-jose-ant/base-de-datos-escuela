<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
?>
<form action="agruser.php" method="post" class="usuarios">
    <div>
        nombre
        <input type="text" name="secionNom">
    </div>
    <div>
        usuario
        <input type="text" name="secionUsr">
    </div>
    <div>tipo
        <select name="seciontipoUser">
            <option> </option>
            <option value="administrador">administrador</option>
            <option value="administrador">sub administrador</option>
            <option value="Invitado">Doncete</option>
            <option value="Basico">Alumno</option>
        </select>
    </div>
    <div>
        Contraseña
        <input type="text" name="secionPass">
    </div>
    <input type="submit" >
</form>

<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window..history.go(-1);</script>";
}
?>