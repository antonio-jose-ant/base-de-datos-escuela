<?php
        $conexion=mysqli_connect("localhost", "root", "TOYOTS99", "escuela");
        mysqli_set_charset($conexion, "utf8");
        $usuarios ="SELECT * FROM   profesor";
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
    <div class="Acontainer">
        <div>
            <div>
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
            </div>
            <div><p>Nomina </p></div>    
            <div><p>Nombre </p></div>    
            <div><p>Apeido Paterno</p></div>    
            <div><p>Apellido Materno</p></div>    
            <div><p>Localidad o Colonia</p></div>    
            <div><p>Dirección</p></div>    
            <div><p>Municipio</p></div>    
            <div><p>C.P</p></div>       
            <div><p>TEL. Celular</p></div>    
            <div><p>Correo Electrónico</p></div>    
            <div><p>Edad</p></div>    
            <?php $resultado = mysqli_query($conexion,$usuarios);
            while($row=mysqli_fetch_assoc($resultado)){
                $cont=1;
                $cont++;
                $table="table";
            ?>
                <div><?php echo $row["nomina"];?></div>    
                <div><?php echo $row["nombre"];?></div>    
                <div><?php echo $row["apellidoP"];?></div>    
                <div><?php echo $row["apellidoM"];?></div>    
                <div><?php echo $row["localidadOcolonia"];?></div>    
                <div><?php echo $row["Direccion"];?></div>    
                <div><?php echo $row["municipio"];?></div>    
                <div><?php echo $row["CP"];?></div>    
                <div><?php echo $row["telefonoPersonal"];?></div>  
                <div><?php echo $row["correoElectronico"];?></div>    
                <div><?php echo $row["edad"];?></div>          
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