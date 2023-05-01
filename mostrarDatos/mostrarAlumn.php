<?php
        include '../includes/conexion-BD.php';
        $usuarios ="SELECT * FROM datos_alumno 
        inner join datos_medicos on datos_alumno.CURP_alu=datos_medicos.CURPAlu";
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
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
<form class="tabla alumno" action="maestroCompletoP.php" method="post"  name="form">
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
    <div class="title"><p>Matricula</p></div>    
    <div class="title"><p>Nombre</p></div>   
    <div class="title"><p>Grado</p></div>    
    <div class="title"><p>Grupo</p></div>    
    <div class="title"><p>Turno</p></div>    
    <div class="title"><p>Telefono</p></div>
    <div class="title"><p>Tipo De Sangre</p></div>
    <div class="contenidoT colC-Complet">
        <?php $resultado = mysqli_query($conexion,$usuarios);
        $nrow=0;
        while($row=mysqli_fetch_assoc($resultado)){
        
        ?>
            <?php echo "<div class='alumno alumnoContenido ".($nrow++%2?'even':'odd')."'>"?>
            <?php echo "<div> <input name='buscaP' value='".$row['matricula']."' type='radio'></div>";?>
            <?php echo "<div><p>".$row['matricula']."  <input name='nombre' value='".$row['nomina']."' type='hidden'> </p></div>";?>
            <?php echo "<div><p>".$row["Nombre_alu"]." ".$row["Apellido_p"]." ".$row["Apellido_m"]."</p></div>";?>
            <?php echo "<div><p>".$row["grado"]."</p></div>";?>
            <?php echo "<div><p>".$row["grupo"]."</p></div>";?>
            <?php echo "<div><p>".$row["turno"]."</p></div>";?>
            <?php echo "<div><p>".$row["Tel_emergencia"]."</p></div>";?>
            <?php echo "<div><p>".$row["Tipo_sangre"]."</p></div>";?>
            <?php echo "</div>"?>      
        <?php }?>
    </div>
    <div class="colC-Complet footerTable"><p>Numero De Alumnos: <?php echo $nrow;  ?></p></div>  
    </div>
</form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>