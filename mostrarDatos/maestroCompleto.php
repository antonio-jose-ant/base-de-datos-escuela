<?php
        $conexion=mysqli_connect("localhost", "root", "TOYOTS99", "escuela");
        mysqli_set_charset($conexion, "utf8");
        $profe=$_POST['profe'];
        $datospersonales=$_POST['datospersonales'];
        $datosadministracion=$_POST['datosadministracion'];
        $usuarios ="SELECT * from profesor where nomina='$profe'";
        $profeC="SELECT * from datospersonales where id_personal='$datospersonales'";
        $profea="SELECT * from datosadministracion where id_Adminitracion='$datosadministracion'";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>escuela</title>
</head>
<body>
    <form action="insertar.php" method="post" name="form" class="container">
        <div class="tituloForm">
                <h2>Datos personales</h2>
            </div>
            <?php $resultado = mysqli_query($conexion,$usuarios);
            while($row=mysqli_fetch_assoc($resultado)){
                $cont=1;
                $resu=$cont%2;
                $cont++;
                $table="table";
            ?>
            <div class="item">
                <span> Nomina:</span>
                <div class="items <? if($resu == 0){echo($table);}?>"><?php echo $row["nomina"];?></div>    
            </div>
            <div class="item">
                <span> Nombre:</span>
                <div class="items <? if($resu == 0){echo($table);}?>"><?php echo $row["nombre"];?></div>    
            </div>
            <div class="item">
                <span> Apeido Paterno:</span>
                <div class="items <?echo($table);?>"><?php echo $row["apellidoP"];?></div>    
            </div>
            <div class="item">
                <span> Apeido Materno:</span>
                <div class="items"><?php echo $row["apellidoM"];?></div>    
            </div>
            <div class="item">
                <span> Localidad o Colonia:</span>
                <div class="items"><?php echo $row["localidadOcolonia"];?></div>    
            </div>
            <div class="item">
                <span> Dirección:</span>
                <div class="items"><?php echo $row["Direccion"];?></div>    
            </div>
            <div class="item">
                <span> Municipio:</span>
                <div class="items"><?php echo $row["municipio"];?></div>    
            </div>
            <div class="item">
                <span> C.P:</span>
                <div class="items"><?php echo $row["CP"];?></div>    
            </div>
            <div class="item">
                <span> TEL. Casa:</span>
                <div class="items"><?php echo $row["telefonoPersonal"];?></div>
            </div>
            <div class="item">
                <span> TEL. Celular:</span>
                <div class="items"><?php echo $row["telefonoCasa"];?></div>    
            </div>
            <div class="item">
                <span> Correo Electrónico:</span>
                <div class="items"><?php echo $row["correoElectronico"];?></div>    
            </div>
            <div class="item">
                <span> Edad:</span>
                <div class="items"><?php echo $row["edad"];?></div>    
            </div>
            <div class="item">
                <span> Estado Civil:</span>
                <div class="items"><?php echo $row["EstadoCivil"];?></div>    
            </div>
            <div class="item">
                <span> Red Social:</span>
                <div class="items"><?php echo $row["redSocial"];?></div> 
            </div>
            <?php }?>
            <div class="tituloForm">
                    <h2>Datos Profesionales</h2>
                </div> 
            <?php $resultadoo = mysqli_query($conexion,$profeC);
            
            while($rowa=mysqli_fetch_assoc($resultadoo)){?>

                <div class="item">
                    <span>Categoria: </span>
                    <div class="items"><?php echo $rowa["categoria"];?></div>    
                </div>
                <div class="item">
                    <span> Estado De Categoria:</span>
                    <div class="items"><?php echo $rowa["EstadoCategoria"];?></div>    
                </div>
                <div class="item">
                    <span> Preparación Profecional:</span>
                    <div class="items"><?php echo $rowa["preparacionPersonal"];?></div>    
                </div>
                <div class="item may">
                    <span> CURP:</span>
                    <div class="items"><?php echo $rowa["CURP"];?></div>    
                </div>
                <div class="item">
                    <span> Años de Servicio:</span>
                    <div class="items"><?php echo $rowa["AñosServico"];?></div>    
                </div>
                <div class="item may">
                    <span> RFC:</span>
                    <div class="items"><?php echo $rowa["RFC"];?></div>    
                </div>
                <div class="item">
                    <span> Clave Servidor:</span>
                    <div class="items"><?php echo $rowa["ClaevServidor"];?></div>    
                </div>
                <div class="item">
                    <span> Número De plaza:</span>
                    <div class="items"><?php echo $rowa["NumeroPlaza"];?></div>    
                </div>
                <div class="item">
                    <span> Código Puesto:</span>
                    <div class="items"><?php echo $rowa["CodigoPuesto"];?></div>    
                </div>
                <div class="item">
                    <span> Años De Servicio En La Función</span>
                    <div class="items"><?php echo $rowa["fechaIngresoFuncionActual"];?></div>    
                </div>
                <div class="item">
                    <span> Prepaaración Profecional:</span>
                    <div class="items"><?php echo $rowa["PreparacionProfecional"];?></div>    
                </div>
                <div class="item">
                    <span> Fecha De Ingreso A La Funcion Actual:</span>
                    <div class="items"><?php echo $rowa["fechaIngresoFuncionActual"];?></div>    
                </div>
            <?php } ?>
            <div class="tituloForm">
                <h2>Datos Adscripción</h2>
            </div> 
        <?php 
            $resultadooa = mysqli_query($conexion,$profea);    
            while($rowa=mysqli_fetch_assoc($resultadooa)){?>
                <div class="item">
                    <span>Sede o Lugar De Administración: </span>
                    <div class="items"><?php echo $rowa["CedeLugarAdminitracion"];?></div>    
                </div>
                <div class="item">
                    <span> Domicilio:</span>
                    <div class="items"><?php echo $rowa["Domicilio"];?></div>    
                </div>
                <div class="item">
                    <span> Localidad o Colonia:</span>
                    <div class="items"><?php echo $rowa["LocalidadColonia"];?></div>    
                </div>
                <div class="item">
                    <span> Municipio:</span>
                    <div class="items"><?php echo $rowa["Municipio"];?></div>    
                </div>
                <div class="item">
                    <span> CCT:</span>
                    <div class="items"><?php echo $rowa["C_C_T"];?></div>    
                </div>
                <div class="item">
                    <span> Telefono:</span>
                    <div class="items"><?php echo $rowa["Telefono"];?></div>    
                </div>
                <div class="item">
                    <span> Correo Oficial:</span>
                    <div class="items"><?php echo $rowa["CorreoElectronico"];?></div>    
                </div>
        <?php } ?>
    </form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>