<?php 
include_once 'includes/user.php';
include_once 'includes/user_session.php';
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
    <title>Agregar</title>
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
                    <p>¡Bienvenido!  <?php echo $user->getNombre();?></p>
                </div>
                <ul>
                    <li>
                            <p id="menu-desplega"><img src="assets/img/iconos/Agregar.png"><span> Agregar Datos</span></p>
                            <div id="menu-I" class="oculta">
                                <a onclick="changueContentH('#divContentNav','agregarAlumno/alumno.php')"  id="contraeMenu700"><img src="assets/img/iconos/Vacantes.png"><span>Agregar Alumno</span></a>
                                <a onclick="changueContentH('#divContentNav','agregarMaestro/maestros.php')"  id="contraeMenu600"><img src="assets/img/iconos/Vacantes.png"><span>Agregar Docente</span></a>
                            </div>
                    </li>
                    <li>
                        <p id="menu-desplega2"><img src="assets/img/iconos/expediente.png"><span> Mostrar Datos</span></p>
                        <div id="menu-II" class="oculta">
                            <a onclick="changueContentH('#divContentNav','mostrarDatos/mostrarAlumn.php')" id="contraeMenu500"><img src="assets/img/iconos/Vacantes.png"><span>Mostrar Alumno</span></a>
                            <a onclick="changueContentH('#divContentNav','mostrarDatos/mosrarprofeor.php')" id="contraeMenu400"><img src="assets/img/iconos/Vacantes.png"><span>Mostrar Docente</span></a>
                        </div>
                    </li>
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
            <iframe src="inicio.php" id="divContentNav"> 
            </iframe>
        </div>
    </div>
</body>
</html>
    
</body>
</html>

