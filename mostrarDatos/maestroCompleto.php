<?php
        include '../includes/conexion-BD.php';
        $nomina=$_POST['buscaP'];
        $conMaestro ="SELECT * FROM profesor 
        inner JOIN datosadministracion 
        on profesor.CURP=datosadministracion.CURP
        inner join datospersonales 
        on profesor.RFC=datospersonales.RFC 
        where profesor.nomina='$nomina'";

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
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <script src="../assets/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="../assets/js/mainad.js"></script>
    <title>escuela</title> 
</head>
<body>
    <form action="./modificar/modificarM.php" method="post" name="form" class="form">
        <?php 
            $resultado=mysqli_query($conexion,$conMaestro);
            while($row=mysqli_fetch_assoc($resultado)){
        ?>
            <div class="colC-Complet">
                <h2>Datos personales</h2>
            </div>
            <div class="colC-2">
                <span> Nomina:</span>
                <input type="text" name="nomina" value="<?php echo $row['nomina'];?>"/>
            </div>
            <div class="colC-4">
                <span> Nombre:</span>
                <input type="text" name="nombre" value="<?php echo $row['nombre'];?>"/>
            </div>
            <div class="colC-3">
                <span> Apeido Paterno:</span>
                <input type="text" name="apellidoP" value="<?php echo $row['apellidoP']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Apeido Materno:</span>
                <input type="text" name="apellidoM" value="<?php echo $row['apellidoM']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Localidad o Colonia:</span>
                <input type="text" name="localidad" value="<?php echo $row['localidadOcolonia']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Dirección:</span>
                <input type="text" name="direccion" value="<?php echo $row['Direccion']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Municipio:</span>
                <input type="text" name="municipioDocente" value="<?php echo $row['municipio']; ?>"/>
            </div>
            <div class="colC-2">
                <span> C.P:</span>
                <input type="text" name="CP" value="<?php echo $row['CP']; ?>"/>
            </div>
            <div class="colC-2">
                <span> TEL. Casa:</span>
                <input type="tel" name="telCasa" value="<?php echo $row['telefonoPersonal']; ?>"/>
            </div>
            <div class="colC-2">
                <span> TEL. Celular:</span>
                <input type="tel" name="telCel" value="<?php echo $row['telefonoCasa']; ?>"/>
            </div>
            <div class="colC-5">
                <span> Correo Electrónico:</span>
                <input type="Email" name="emailpersonal" value="<?php echo $row['correoElectronico']; ?>"/>
            </div>
            <div>
                <span> Edad:</span>
                <input type="number" name="edad" value="<?php echo $row['edad']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Estado Civil:</span>
                <input type="text" name="estadoC" value="<?php echo $row['EstadoCivil']; ?>"/>
            </div>
            <div class="colC-7">
                <span> Red Social:</span>
                <input type="text" name="RedSocial" value="<?php echo $row['redSocial']; ?>"/>
            </div>
            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet">
                <h2>Datos Profesionales</h2>
            </div> 
            <div class="colC-4">
                <span>Categoria: </span>
                <input type="text" name="CategoriaProfesor" value="<?php echo $row['categoria']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Estado De Categoria:</span>
                <input type="text" name="EstadCategoria" value="<?php echo $row['EstadoCategoria']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Preparación Profecional:</span>
                <input type="text" name="PreparaciónP" value="<?php echo $row['preparacionPersonal']; ?>"/>
            </div>
            <div class="colC-3">
                <span> CURP:</span>
                <input type="text" name="CURP" value="<?php echo $row['CURP']; ?>"  class="mayusculas" disabled/>
            </div>
            <div class="colC-3">
                <span> RFC:</span>
                <input type="text" name="RFC" value="<?php echo $row['RFC']; ?>"  class="mayusculas" disabled/>
            </div>
            <div class="colC-4">
                <span> Años de Servicio:</span>
                <input type="number" name="AnosS" value="<?php echo $row['AñosServico']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Clave Servidor:</span>
                <input type="text" name="ClaveS" value="<?php echo $row['ClaevServidor']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Número De plaza:</span>
                <input type="number" name="NumeroP" value="<?php echo $row['NumeroPlaza']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Código Puesto:</span>
                <input type="number" name="CoddigoPuesto" value="<?php echo $row['CodigoPuesto']; ?>"/>
            </div>
            <div class="colC-5">
                <span> Años De Servicio En La Función:</span>
                <input type="number" name="AnosSerFUncion" value="<?php echo $row['AñosServicoEnFuncion']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Prepaaración Profecional:</span>
                <input type="text" name="PreparacionPro" value="<?php echo $row['PreparacionProfecional']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Fecha De Ingreso A La Funcion Actual:</span>
                <input type="text" id="date2" name="FechaINgreso" value="<?php echo $row['fechaIngresoFuncionActual']; ?>"/>
            </div>
            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet"><h2>Datos Adscripción</h2></div> 
            <div class="colC-5">
                <span>Sede o Lugar De Administración: </span>
                <input type="text" name="SedeLugarAD" value="<?php echo $row['CedeLugarAdminitracion']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Domicilio:</span>
                <input type="text" name="Domicilio" value="<?php echo $row['Domicilio']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Localidad o Colonia:</span>
                <input type="text" name="LocalidadColonia" value="<?php echo $row['LocalidadColonia']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Municipio:</span>
                <input type="text" name="MunicipioEscuela" value="<?php echo $row['MunicipioEscuela']; ?>"/>
            </div>
            <div>
                <span> CCT:</span>
                <input type="text" name="CCT" value="<?php echo $row['C_C_T']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Telefono:</span>
                <input type="tel" name="Telefono" value="<?php echo $row['Telefono']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Correo Oficial:</span>
                <input type="Email" name="emailInstituto" value="<?php echo $row['CorreoInstituto']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Fecha de Ingreso:</span>
                <input type="text" id="date3" name="FechaFuncionA" value="<?php echo $row['FechaIngreso']; ?>"/>
            </div>
            <div class="colC-4">
                <input type="submit" value="PDF" class="btn btnPDF" />
            </div>
            <div class="colC-4">
                <input type="submit" value="Modificar Datos" class="btn btnModificar" />
            </div>
            <div class="colC-4">
                <input type="submit" value="Eliminar Datos" class="btn btnEliminar" />
            </div>
        <?php 
            }
        ?>
    </form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>