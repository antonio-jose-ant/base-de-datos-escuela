<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    $tipo_usuario = $user->getTipoUsuario();
    $usuarioPri= $tipo_usuario['tipo_usuario'];
    if ($usuarioPri=="administrador"){
        $cons="Modifico";
        $secionusuariosA = $secionusuarios ->get_usuarioDef();

        try {
            $db = new DB();
            $pdo = $db->connect();
            $agregarUserSesion=" DELETE FROM usuario           
            WHERE UserName='".$secionusuariosA['secionUsr']."'";

            $stmt = $pdo->prepare($agregarUserSesion);
            $stmt->execute();
            echo "<script> alert('se a Elimino con exito'); window.location='/base-de-datos-escuela/usuario/mostraraUsuario.php'</script>";
        } catch (PDOException $e) {
                echo "Ocurrió un error en la consulta: " . $e->getMessage();
        }

    }else{
        echo "<script>alert('no cuentas con los permisos para esta opción');window.location='/base-de-datos-escuela/inicio.php'</script>";
    }
}else{
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>