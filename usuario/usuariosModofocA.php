<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();


if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    $cons="Modifico";
    $secionusuariosA = $secionusuarios ->get_usuarioDef();

    $modificaUser= "usuario.Nombre='".$secionusuariosA['secionNom']."'
            ,usuario.UserName='".$secionusuariosA['secionUsr']."'
            ,usuario.tipo_usuario='".$secionusuariosA['seciontipoUser']."'
            ,usuario.RFCUser='".$secionusuariosA['RFCUser']."'
            ,usuario.password='".$secionusuariosA['secionPass']."'"
        ;

    try {
        $db = new DB();
        $pdo = $db->connect();
        $agregarUserSesion=" UPDATE usuario
        SET ".$modificaUser."            
        WHERE UserName='".$secionusuariosA['secionUsr']."'";

        
        $stmt = $pdo->prepare($agregarUserSesion);
        $stmt->execute();
        echo "<script> alert('se a Modificado con exito'); window.location='/base-de-datos-escuela/usuario/mostraraUsuario.php'</script>";
    } catch (PDOException $e) {
            echo "Ocurrió un error en la consulta: " . $e->getMessage();
    }


}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>