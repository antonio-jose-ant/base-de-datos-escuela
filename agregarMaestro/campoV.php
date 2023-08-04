<?php

        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        session_start();
        $maestroDatos = $_SESSION['maestroDatos'];
        $datosPersonales = $_SESSION['datosPersonales'];
        $datosAdministracion = $_SESSION['datosAdministracion'];
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
    <form action="./maestro_C.php" method="post" name="form" class="form">

            <div class="colC-Complet">
                <h2>Datos personales</h2>
            </div>
            <div class="colC-2">
                <span> Nomina:</span>
                <input type="text" name="nomina" value="<?php echo  $maestroDatos['nomina'];?>"/>
            </div>
            <div class="colC-4">
                <span> Nombre:</span>
                <input type="text" name="nombre" value="<?php echo $maestroDatos['nombre'];?>"/>
            </div>
            <div class="colC-3">
                <span> Apeido Paterno:</span>
                <input type="text" name="apellidoP" value="<?php echo $maestroDatos['apellidoP']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Apeido Materno:</span>
                <input type="text" name="apellidoM" value="<?php echo $maestroDatos['apellidoM']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Localidad o Colonia:</span>
                <input type="text" name="localidad" value="<?php echo $maestroDatos['localidadOcolonia']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Dirección:</span>
                <input type="text" name="direccion" value="<?php echo $maestroDatos['Direccion']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Municipio:</span>
                <input type="text" name="municipioDocente" value="<?php echo $maestroDatos['municipio']; ?>"/>
            </div>
            <div class="colC-2">
                <span> C.P:</span>
                <input type="text" name="CP" value="<?php echo $maestroDatos['CP']; ?>"/>
            </div>
            <div class="colC-2">
                <span> TEL. Casa:</span>
                <input type="tel" name="telCasa" value="<?php echo $maestroDatos['telefonoPersonal']; ?>"/>
            </div>
            <div class="colC-2">
                <span> TEL. Celular:</span>
                <input type="tel" name="telCel" value="<?php echo $maestroDatos['telefonoCasa']; ?>"/>
            </div>
            <div class="colC-5">
               <span> Correo Electrónico:</span>
                <input type="Email" name="emailpersonal" value="<?php echo $maestroDatos['correoElectronico']; ?>"/>
            </div>
            <div>
                <span> Edad:</span>
                <input type="number" name="edad" value="<?php echo $maestroDatos['edad']; ?>"/>
            </div>
            <div>
                <span> Sexo:</span>
                <select name="sexo">
                    <option></option>
                    <option value="F">F</option>
                    <option value="M">M</option>
                </select>
            </div>
            <div class="colC-2">
                <span> Estado Civil:</span>
                <input type="text" name="estadoC" value="<?php echo $maestroDatos['EstadoCivil']; ?>"/>
            </div>
            <div class="colC-7">
                <span> Red Social:</span>
                <input type="text" name="RedSocial" value="<?php echo $maestroDatos['redSocial']; ?>"/>
            </div>
            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet">
                <h2>Datos Profesionales</h2>
            </div> 
            <div class="colC-4">
                <span>Categoria: </span>
                <input type="text" name="CategoriaProfesor" value="<?php echo $datosPersonales['Categoria']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Estado De Categoria:</span>
                <input type="text" name="EstadCategoria" value="<?php echo $datosPersonales['EstadCategoria']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Preparación Profecional:</span>
                <input type="text" name="PreparaciónP" value="<?php echo $datosPersonales['PreparacionPro']; ?>"/>
            </div>
            <div class="colC-3">
                <span> CURP:</span>
                <input type="text" name="CURP" value="<?php echo $datosAdministracion['CURP']; ?>"  class="mayusculas"/>
            </div>
            <div class="colC-3">
                <span> RFC:</span>
                <input type="text" name="RFC" value="<?php echo $datosPersonales['RFC']; ?>"  class="mayusculas"/>
            </div>
            <div class="colC-4">
                <span> Años de Servicio:</span>
                <input  type="text" name="AnosS" value="<?php echo $datosPersonales['AnosS']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Clave Servidor:</span>
                <input type="text" name="ClaveS" value="<?php echo $datosPersonales['ClaveS']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Número De plaza:</span>
                <input type="number" name="NumeroP" value="<?php echo $datosPersonales['NumeroPa']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Código Puesto:</span>
                <input type="number" name="CoddigoPuesto" value="<?php echo $datosPersonales['CoddigoPuesto']; ?>"/>
            </div>
            <div class="colC-5">
                <span> Años De Servicio En La Función:</span>
                <input type="number" name="AnosSerFUncion" value="<?php echo $datosPersonales['AnosSerFUnciona']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Prepaaración Profecional:</span>
                <input type="text" name="PreparacionPro" value="<?php echo $datosPersonales['PreparaciónPa']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Fecha De Ingreso A La Funcion Actual:</span>
                <input type="text" id="date2" name="FechaINgreso" value="<?php echo $datosPersonales['FechaINgreso']; ?>"/>
            </div>
            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet"><h2>Datos Adscripción</h2></div> 
            <div class="colC-5">
                <span>Sede o Lugar De Administración: </span>
                <input type="text" name="SedeLugarAD" value="<?php echo $datosAdministracion['SedeLugarAD']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Domicilio:</span>
                <input type="text" name="Domicilio" value="<?php echo $datosAdministracion['Domicilio']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Localidad o Colonia:</span>
                <input type="text" name="LocalidadColonia" value="<?php echo $datosAdministracion['LocalidadColonia']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Municipio:</span>
                <input type="text" name="MunicipioEscuela" value="<?php echo $datosAdministracion['MunicipioEscuela']; ?>"/>
            </div>
            <div>
                <span> CCT:</span>
                <input type="text" name="CCT" value="<?php echo $datosAdministracion['CCT']; ?>"/>
            </div>
            <div class="colC-2">
                <span> Telefono:</span>
                <input type="tel" name="Telefono" value="<?php echo $datosAdministracion['Telefono']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Correo Oficial:</span>
                <input type="Email" name="emailInstituto" value="<?php echo $datosAdministracion['EmailInstituto']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Fecha de Ingreso:</span>
                <input type="text" value="<?php echo $datosPersonales['FechaFuncionActual'] ?>" id="date3" name="FechaFuncionActual"/>
            </div>
            <div class="colC-Complet">
                <input type="submit" value="Guardar Datos" class="btn" name="acction" />
            </div>
    </form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/test/base-de-datos-escuela/maestroCompletoP'</script>";
}
?>