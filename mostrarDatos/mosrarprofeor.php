<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //echo "hay sesion"; 
        $user->setUser($userSession->getCurrentUser());
        $tipo_usuario = $user->getTipoUsuario();
        $usuarioPri= $tipo_usuario['tipo_usuario'];
        if ($usuarioPri!="Docente" && $usuarioPri!="Alumno"){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Agregar</title>
</head>
<body>
    <form class="tableB" action="./maestroCompletoP.php" method="post"  name="form">
        <div class="busqueda form centrar">
            <div class="colC-10 colC-CompletMin">
                <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar">
            </div>
            <div class="colC-2">
                <input type="submit" value="Consultar" class="btn btnConsulta">
            </div>
        </div>
        <div id="datos">
        </div>
    </form>
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <script src="./busquedaMaestro/busqueda.js"></script>
</body>
</html>
<?php
    }else{
        echo "<script>alert('no cuentas con los permisos para esta opción');window.location='/base-de-datos-escuela/inicio.php'</script>";
    }
}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>