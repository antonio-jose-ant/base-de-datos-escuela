<?php 
include_once 'includes/user.php';
include_once 'includes/user_session.php';
$usuarioPri= $tipo_usuario['tipo_usuario'];
$nombreUsuarioS=$tipo_usuario['nombre'];
$RFCU=$tipo_usuario['RFC'];
if ($user->compUser($RFCU)) {
    $maestroDI="mostrarDatos/maestroCompletoP.php";
} else {
    $maestroDI="agregarMaestro/maestros.php";

}

?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div id="menu-container" class="menu-contenedor"> 
        <header class="menu">
            <div class="harmburger" id="harmburger">
                <div></div>
                <div></div>
                <div></div>
            </div> 
            <nav class="nav-menu">
                <div>
                    <p>¡Bienvenido!  <?php echo $nombreUsuarioS;?></p>
                </div>
                <ul id="menuOpciones">
                    <li>
                        <p><img src="assets/img/iconos/Agregar.png"><span><?php if ($usuarioPri=="Docente"){ echo "Modifcar Datos";}else{echo "Agregar Datos";}?> </span></p>
                        <div class="oculta">
                            <?php if ($usuarioPri!="Docente"){
                                echo "<a onclick=\"changueContentH('#divContentNav','agregarAlumno/alumno.php')\" ><img src=\"assets/img/iconos/Vacantes.png\"><span>Agregar Alumno</span></a>";
                            }elseif ($usuarioPri=="Docente"){
                                echo "<a onclick=\"changueContentH('#divContentNav','mostrarDatos/maestroCompletoP.php')\"><img src=\"assets/img/iconos/Vacantes.png\"><span>Mostrar Docente</span></a>";
                            }
                            ?> 
                            <?php if ($usuarioPri!="Docente" && $usuarioPri!="Alumno"){
                            echo "<a onclick=\"changueContentH('#divContentNav','agregarMaestro/maestros.php')\" ><img src=\"assets/img/iconos/Vacantes.png\"><span>Agregar Docente</span></a>";
                            }
                            ?>
                        </div>
                    </li>    

                            <?php if ($usuarioPri!="Docente" && $usuarioPri!="Alumno"){
                                echo"<li>
                                        <p><img src=\"assets/img/iconos/expediente.png\"><span> Mostrar Datos</span></p>
                                        <div class=\"oculta\">
                                            <a onclick=\"changueContentH('#divContentNav','mostrarDatos/mostrarAlumn.php')\" ><img src=\"assets/img/iconos/Vacantes.png\"><span>Mostrar Alumno</span></a>
                                            <a onclick=\"changueContentH('#divContentNav','mostrarDatos/mosrarprofeor.php')\"><img src=\"assets/img/iconos/Vacantes.png\"><span>Mostrar Docente</span></a>
                                        </div>
                                    </li>";
                                }
                            ?>

                    <?php if ($usuarioPri=="administrador" || $usuarioPri=="sub-administrador"){
                        echo "<li>
                            <p ><img src=\"assets/img/iconos/address-book.png\"><span> usuarios</span></p>
                            <div class=\"oculta\">
                                <a onclick=\"changueContentH('#divContentNav','usuario/usuarios.php')\" ><img src=\"assets/img/iconos/Vacantes.png\"><span>Agregar Usiario</span></a>
                                <a onclick=\"changueContentH('#divContentNav','usuario/mostraraUsuario.php')\"><img src=\"assets/img/iconos/Vacantes.png\"><span>Mostrar Usiario</span></a>
                            </div>
                        </li>";
                    }
                    ?>
                </ul>
                <div class="menu-salir">
                    <a href="includes/logout.php">
                        <img src="assets/img/iconos/salir.png">
                        <span>Salir</span>
                    </a>
                </div>
            </nav>
        </header>
        <div class="cont">
            <iframe   <?php if ($usuarioPri=="Docente"){echo "src='".$maestroDI."'";}else{echo "src=\"inicio.php\"";}?> src="inicio.php" id="divContentNav"> 
            </iframe>
        </div>
    </div>
</body>
</html>
    
</body>
</html>

