<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    //echo "hay sesion";
$user->setUser($userSession->getCurrentUser());

$secionusuariosA = $secionusuarios ->get_usuarioDef();

foreach ($secionusuariosA as $key => $value) {
    if (empty($value)) {
        $insert = false;
        echo "<script>alert('Todos Los Campos Deben Tener Información ');window.location='/base-de-datos-escuela/usuario/usuarios.php'</script>";
        exit;
        break;
    }
}


try {
    $db = new DB();
    $pdo = $db->connect();
    $agregarUserSesion=" INSERT INTO usuario(Nombre,UserName,tipo_usuario,RFCUser,password)
    VALUES(
        '".$secionusuariosA['secionNom']."',
        '".$secionusuariosA['secionUsr']."',
        '".$secionusuariosA['seciontipoUser']."',
        '".$secionusuariosA['RFCUser']."',
        '".$secionusuariosA['secionPass']."'
    )";
    
    $stmt = $pdo->prepare($agregarUserSesion);
    $stmt->execute();
    echo "<script> alert('se a registrado con exito'); window.location='/base-de-datos-escuela/usuario/usuarios.php'</script>";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), "Duplicate entry") !== false && strpos($e->getMessage(), "for key 'UserName'") !== false) {
        echo "<script> alert('Usuario duplicado. Por favor, elige otro nombre de usuario.'); window.location='/base-de-datos-escuela/usuario/usuarios.php'</script>";

    } else {
        echo "Ocurrió un error en la consulta: " . $e->getMessage();
    }
}
}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>