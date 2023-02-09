<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="contenedor-login"> 
    <form method="post" action="" class="formulario">
        <?php
                if(isset($errorLogin)){
                    echo "<script> alert("."'". $errorLogin."'"."); window.history.go(1);</script>";

                }
            ?>
        <div class="formulario-img">
            <img src="assets/img/logo/logo.png" class="img-login" alt="">
        </div>
        <div class="formulario-login">
            <div>
                <h2>INICIAR SESIÓN</h2>
            </div>
            <div>
                <div class="form-login">
                    <img src="assets/img/iconos/user.png" alt="">
                    <p>Usuario</p> 
                </div>
                <input class="inputC" placeholder="Usuario" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div>
                <div class="form-login">
                    <img src="assets/img/iconos/user.png" class="img-icons" alt="">
                    <p class="login-p">contraseña</p>
                </div>
                <input class="inputC" placeholder="contraseña " type="password" name="password" required />
            </div>
            <div>
                <input type="submit" class="btn btn-login" value="Acceder">
            </div>
        </div>
    </form>
</div>
</body>
</html>