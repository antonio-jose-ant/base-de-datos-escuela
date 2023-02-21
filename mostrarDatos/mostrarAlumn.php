<?php
        include '../includes/conexion-BD.php';
        $usuarios ="SELECT * FROM datos_alumno";
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

        <div>
            <div>
                <div><p>Matricula</p></div>    
                <div><p>nombre Alumno</p></div>    
                <div><p>Apellido Paterno</p></div>    
                <div><p>Apellido Materno</p></div>    
                <div><p>Grado</p></div>    
                <div><p>Grupo</p></div>    
                <div><p>Turno</p></div>    
                <div><p>Telefono</p></div>    
                <div><p>Domicilio</p></div>    
                <div><p>CURP</p></div>    
                <div><p>C_P</p></div>    
                <div><p>Edad</p></div>    
                    <?php $resultado = mysqli_query($conexion,$usuarios);
                    while($row=mysqli_fetch_assoc($resultado)){
                    
                    ?>
                        <div><?php echo $row["Nombre_alu"];?></div>    
                        <div><?php echo $row["nombreAlumno"];?></div>    
                        <div><?php echo $row["ApellidoPaterno"];?></div>    
                        <div><?php echo $row["ApellidoMaterno"];?></div>    
                        <div><?php echo $row["Grado"];?></div>    
                        <div><?php echo $row["Grupo"];?></div>    
                        <div><?php echo $row["Turno"];?></div>    
                        <div><?php echo $row["Telefono"];?></div>
                        <div><?php echo $row["Domicilio"];?></div>    
                        <div><?php echo $row["CURP"];?></div>    
                        <div><?php echo $row["C_P"];?></div>    
                        <div><?php echo $row["Edad"];?></div>        
                    <?php }?>
                </div>

</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>