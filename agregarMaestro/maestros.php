<?php
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
    <form action="./maestro_C.php" method="post" name="form" class="form">
        <div class="colC-Complet">
            <h2>Datos personales</h2>
        </div>
        <div class="colC-2">
            <span> Nomina:</span>
            <input type="text" name="nomina"/>
        </div>
        <div class="colC-4">
            <span> Nombre:</span>
            <input type="text" name="nombre"/>
        </div>
        <div class="colC-3">
            <span> Apeido Paterno:</span>
            <input type="text" name="apellidoP"/>
        </div>
        <div class="colC-3">
            <span> Apeido Materno:</span>
            <input type="text" name="apellidoM"/>
        </div>
        <div class="colC-3">
            <span> Localidad o Colonia:</span>
            <input type="text" name="localidad"/>
        </div>
        <div class="colC-4">
            <span> Dirección:</span>
            <input type="text" name="direccion"/>
        </div>
        <div class="colC-3">
            <span> Municipio:</span>
            <input type="text" name="municipioDocente"/>
        </div>
        <div class="colC-2">
            <span> C.P:</span>
            <input type="text" name="CP"/>
        </div>
        <div class="colC-2">
            <span> TEL. Casa:</span>
            <input type="tel" name="telCasa"/>
        </div>
        <div class="colC-2">
            <span> TEL. Celular:</span>
            <input type="tel" name="telCel"/>
        </div>
        <div class="colC-5">
            <span> Correo Electrónico:</span>
            <input type="Email" name="emailpersonal"/>
        </div>
        <div>
            <span> Edad:</span>
            <input type="number" name="edad"/>
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
            <select name="estadoC">
                        <option></option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Conviviente">Conviviente</option>
                        <option value="Anulado">Anulado(a)</option>
                        <option value="Separado de unión legal">Separado de unión legal</option>
                        <option value="Separado_union">Separado(a) de unión de hecho</option>
                        <option value="Viudo">Viudo(a)</option>
                        <option value="Soltero">Soltero(a)</option>
                    </select>
        </div>
        <div class="colC-7">
            <span> Red Social:</span>
            <input type="text" name="RedSocial"/>
        </div>
        <!--aqui empieza datos profecionales -->
        <div class="colC-Complet">
            <h2>Datos Profesionales</h2>
        </div> 
        <div class="colC-4">
            <span>Categoria: </span>
            <input type="text" name="CategoriaProfesor"/>
        </div>
        <div class="colC-4">
            <span> Estado De Categoria:</span>
            <input type="text" name="EstadCategoria"/>
        </div>
        <div class="colC-4">
            <span> Preparación Profecional:</span>
            <input type="text" name="PreparaciónP"/>
        </div>
        <div class="colC-3">
            <span> CURP:</span>
            <input type="text" name="CURP"  class="mayusculas" maxlength="18"/>
        </div>
        <div class="colC-3">
            <span> RFC:</span>
            <input type="text" name="RFC"  class="mayusculas" maxlength="13"/>
        </div>
        <div class="colC-4">
            <span> Años de Servicio:</span>
            <input type="number" name="AnosS"/>
        </div>
        <div class="colC-2">
            <span> Clave Servidor:</span>
            <input type="text" name="ClaveS"/>
        </div>
        <div class="colC-3">
            <span> Número De plaza:</span>
            <input type="number" name="NumeroP"/>
        </div>
        <div class="colC-2">
            <span> Código Puesto:</span> 
            <input type="number" name="CoddigoPuesto"/>
        </div>
        <div class="colC-5">
            <span> Años De Servicio En La Función:</span>
            <input type="number" name="AnosSerFUncion"/>
        </div>
        <div class="colC-3">
            <span> Prepaaración Profecional:</span>
            <input type="text" name="PreparacionPro"/>
        </div>
        <div class="colC-4">
            <span> Fecha De Ingreso A La Funcion Actual:</span>
            <input type="text" id="date2" name="FechaINgreso" readonly/>
        </div>
         <!--aqui empieza datos profecionales -->
        <div class="colC-Complet"><h2>Datos Adscripción</h2></div> 
        <div class="colC-5">
            <span>Sede o Lugar De Administración: </span>
            <input type="text" name="SedeLugarAD"/>
        </div>
        <div class="colC-4">
            <span> Domicilio:</span>
            <input type="text" name="Domicilio"/>
        </div>
        <div class="colC-3">
            <span> Localidad o Colonia:</span>
            <input type="text" name="LocalidadColonia"/>
        </div>
        <div class="colC-2">
            <span> Municipio:</span>
            <input type="text" name="MunicipioEscuela"/>
        </div>
        <div>
            <span> CCT:</span>
            <input type="text" name="CCT"/>
        </div>
        <div class="colC-2">
            <span> Telefono:</span>
            <input type="tel" name="Telefono"/>
        </div>
        <div class="colC-4">
            <span> Correo Oficial:</span>
            <input type="Email" name="emailInstituto"/>
        </div>
        <div class="colC-3">
            <span> Fecha de Ingreso:</span>
            <input type="text" id="date3" name="FechaFuncionActual" readonly/>
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
    echo "<script> alert('se a registrado con exito'); window.location='/test/base-de-datos-escuela/'</script>";
}
?>