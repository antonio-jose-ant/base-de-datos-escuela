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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <script src="../assets/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <title>Agregar</title>
</head>
<body>
    <form class="tabla profesor" action="maestroCompletoP.php" method="post"  name="form">
        <div class="colR-3 colC-Complet tabla busquedaP">
            <div>
                <p>Nombre:</p>
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
            <div class="colC-Complet">
                <input type="submit" value="Buscar" name="Buscar"  class="btn">
            </div>
        </div>
        <div class="title"><p>Sel </p></div> 
        <div class="title"><p>Nomina </p></div>    
        <div class="title"><p>Nombre </p></div>        
        <div class="title"><p>TEL. Celular</p></div>   
        <div class="title"><p>CURP</p></div> 
        <div class="title"><p>RFC</p></div>       
        <div class="title"><p>PREPARAION</p></div>
        <div class="contenidoT colC-Complet">       
            <?php
                $nrow=0;
                $resultado = mysqli_query($conexion,$consultaMaestro);
                while($row=mysqli_fetch_assoc($resultado)){
            ?>
            <?php echo "<div class='profesor profesorContenido ".($nrow++%2?'even':'odd')."'>"?>
            <?php echo "<div> <input name='buscaP' value='".$row['nomina']."' type='radio'></div>";?>
            <?php echo "<div><p>".$row['nomina']."  <input name='nomina' value='".$row['nomina']."' type='hidden'> </p></div>";?>
            <?php echo "<div><p>".$row["nombre"]." ".$row["apellidoP"]." ".$row["apellidoM"]."</p></div>";?>
            <?php echo "<div><p>".$row["telefonoPersonal"]."</p></div>";?>
            <?php echo "<div><p class=\"mayusculas\">".$row["CURP"]."<input name='curpProfe' value='".$row['CURP']."' type='hidden'> </p></div>";?>
            <?php echo "<div><p class=\"mayusculas\">".$row["RFC"]."<input name='rfcProfe' value='".$row['RFC']."' type='hidden'></p></div>";?>
            <?php echo "<div><p>".$row["PreparacionProfecional"]."</p></div>";?>
            <?php echo "</div>"?>
            <?php }?>
        </div>
        <div class="colC-Complet footerTable"><p>Numero De Docentes: <?php echo $nrow;  ?></p></div>  
    </form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/test/base-de-datos-escuela/mostrarDatos/maestroCompletoP'</script>";
}
?>