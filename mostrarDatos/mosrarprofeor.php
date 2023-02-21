<?php
        include '../includes/conexion-BD.php';
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
        $consultaMaestro = "SELECT 
        profesor.nomina,
        profesor.nombre,
        profesor.apellidoP,
        profesor.apellidoM, 
        profesor.telefonoPersonal,
        profesor.CURP,
        profesor.RFC,
        datospersonales.PreparacionProfecional
        FROM   profesor
        INNER JOIN datospersonales 
        ON profesor.RFC=datospersonales.RFC";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Agregar</title>
</head>
<body>
        <div class="tabla profesor">
            <!--<div>
                <form action="../mostrarDatos/maestroCompleto.php" method="post"  name="form" >
                    <div>
                        <p>ingresa nomina:</p>
                        <input type="text" name="profe"/>
                    </div>
                    <div>
                        <p>ingresa RFC</p>
                        <input type="text" name="datospersonales"/>
                    </div>
                    <div>
                        <p>ingresa CURP</p>
                        <input type="text" name="datosadministracion"/>
                    </div>
                    <div>
                        <input type="submit" value="buscar" class="bus">
                    </div>
                </form>
            </div>-->
            <div class="title"><p>Sel </p></div> 
            <div class="title"><p>Nomina </p></div>    
            <div class="title"><p>Nombre </p></div>        
            <div class="title"><p>TEL. Celular</p></div>   
            <div class="title"><p>CURP</p></div> 
            <div class="title"><p>RFC</p></div>       
            <div class="title"><p>PREPARAION</p></div>       
            <div class="colC-Complet contenidoT profesor">    

                <?php
                    $resultado = mysqli_query($conexion,$consultaMaestro);
                    while($row=mysqli_fetch_assoc($resultado)){
                ?>
                <?php echo "<div> <input name='buscaP' type='radio'></div>";?>
                <?php echo "<div><p>".$row['nomina']."</p></div>";?>
                <?php echo "<div><p>".$row["nombre"]." ".$row["apellidoP"]." ".$row["apellidoM"]."</p></div>";?>
                <?php echo "<div><p>".$row["telefonoPersonal"]."</p></div>";?>
                <?php echo "<div><p>".$row["CURP"]."</p></div>";?>
                <?php echo "<div><p>".$row["RFC"]."</p></div>";?>
                <?php echo "<div><p>".$row["PreparacionProfecional"]."</p></div>";?>
                <?php }?>
            </div>
        </div>

</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>