<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        session_start(); 
        $maestroDatos = $_SESSION['maestroDatos'];
        $datosProfecionales = $_SESSION['datosProfecionales'];
        $datosLaborales = $_SESSION['datosLaborales'];
        $userSession = new UserSession();
        $user = new User(); 
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
?>
<!DOCTYPE html>
<html lang="es">
    <?php include '../assets/header.php'?>
<body>
    <form action="./maestro_C.php" method="post" name="form" class="form">

            <div class="colC-Complet">
                <h2>DATOS PERSONALES</h2>
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
                <span> CURP:</span>
                <input type="text" name="CURP"  class="mayusculas" value="<?php echo $datosLaborales['CURP']; ?>" maxlength="18"/>
            </div>
            <div class="colC-3">
                <span> RFC:</span>
                <input type="text" name="RFC"  class="mayusculas"  value="<?php echo $datosProfecionales['RFC']; ?>" maxlength="13"/>
            </div>
            <div class="colC-3">
                <span> Colonia y/o Fracc</span>
                <input type="text" name="ColoniaFracc" value="<?php echo $maestroDatos['ColoniaFracc']; ?>"/>
            </div>
            <div class="colC-3">
                <span> Ciudad:</span>
                <input type="text" name="Ciudad" value="<?php echo $maestroDatos['Ciudad']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Localidad:</span>
                <input type="text" name="localidadProfesor" value="<?php echo $maestroDatos['localidadProfesor']; ?>"/>
            </div>
            <div class="colC-4">
                <span> Dirección:</span>
                <input type="text" name="direccion" value="<?php echo $maestroDatos['Direccion']; ?>"/>
            </div>
            <div class="colC-2">
                <span> No. Int.:</span>
                <input type="text" name="no_int" value="<?php echo $maestroDatos['no_int']; ?>"/>
            </div>
            <div class="colC-2">
                <span> No. Ext.:</span>
                <input type="text" name="no_ext" value="<?php echo $maestroDatos['no_ext']; ?>"/>
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
                    <option value="F" <?php if($maestroDatos['sexo']=="F")  echo "selected";?>>F</option>
                    <option value="M" <?php if($maestroDatos['sexo']=="M")  echo "selected";?>>M</option>
                </select>
            </div>
            <div class="colC-3">
                <span> Lugar De Nacimiento:</span>
                <input type="text" name="Lugar_De_Nacimiento" value="<?php echo $maestroDatos['Lugar_De_Nacimiento']; ?>"/>
            </div>
            <div class="colC-4">
                <span>Grado Maximo de Estudios:</span>
                <select name="gradoMEstudio">
                        <option></option>
                        <option value="Media Superior" <?php if($maestroDatos['gradoMEstudio']=="Media Superior")  echo "selected";?>>Media Superior</option>
                        <option value="Superior" <?php if($maestroDatos['gradoMEstudio']=="Superior")  echo "selected";?>>Superior</option>
                        <option value="Maestria" <?php if($maestroDatos['gradoMEstudio']=="Maestria")  echo "selected";?>>Maestria</option>
                        <option value="Doctorado" <?php if($maestroDatos['gradoMEstudio']=="Doctorado")  echo "selected";?>>Doctorado</option>
                    </select>
            </div>
            <div class="colC-5">
                <span> Estado Civil:</span>
                <select name="estadoC" id="parejaSelection" onchange="seleccionEstadoC();">
                    <option></option>
                    <option value="Casado(a)" <?php if($maestroDatos['EstadoCivil']=="Casado(a)")  echo "selected";?>>Casado(a)</option>
                    <option value="Conviviente(a)" <?php if($maestroDatos['EstadoCivil']=="Conviviente(a)")  echo "selected";?>>Conviviente</option>
                    <option value="Anulado(a)" <?php if($maestroDatos['EstadoCivil']=="Anulado(a)")  echo "selected";?>>Anulado(a)</option>
                    <option value="Separado(a) de unión legal" <?php if($maestroDatos['EstadoCivil']=="Separado(a) de unión legal")  echo "selected";?>>Separado(a) de unión legal</option>
                    <option value="Separado(a) de unión de hecho" <?php if($maestroDatos['EstadoCivil']=="Separado(a) union")  echo "selected";?>>Separado(a) de unión de hecho</option>
                    <option value="Viudo(a)" <?php if($maestroDatos['EstadoCivil']=="Viudo(a)")  echo "selected";?>>Viudo(a)</option>
                    <option value="Soltero(a)" <?php if($maestroDatos['EstadoCivil']=="Soltero(a)")  echo "selected";?>>Soltero(a)</option>
                </select>
            </div>
            <div class="colC-6" id="pareja_EC" style="display: none;">
                <span>Nombre completo del esposo(a) o pareja:</span>
                <input type="text" name="pareja">
            </div>
            <div class="colC-7">
                <span> Red Social:</span>
                <input type="text" name="RedSocial" value="<?php echo $maestroDatos['redSocial']; ?>"/>
            </div>        
        
        <div class="colC-Complet">
            <h2>DATOS LABORALES</h2>
        </div> 
        <div class="colC-4">
            <span>Nombre De La Dependencia: </span>
            <input type="text"  value="<?php echo $datosLaborales['Nombre_Dependencia']; ?>" name="Nombre_Dependencia"/>
        </div>
        <div class="colC-2">
            <span> CCT:</span>
            <input type="text" value="<?php echo $datosLaborales['CCT']; ?>" name="CCT"/>
        </div>
        <div class="colC-4">
            <span> Domicilio Particular</span>
            <input type="text" value="<?php echo $datosLaborales['Domicilio_Particular']; ?>" name="Domicilio_Particular"/>
        </div>

        <div class="colC-2">
            <span> No. Int.:</span>
            <input type="number" value="<?php echo $datosLaborales['No_Int']; ?>" name="No_Int"/>
        </div>
        <div class="colC-3">
            <span> Colonia y/o Fracc.:</span>
            <input type="text" value="<?php echo $datosLaborales['Colonia_Fracc']; ?>" name="Colonia_Fracc"/>
        </div>
        <div class="colC-3">
            <span> Ciudad:</span>
            <input type="text" value="<?php echo $datosLaborales['Ciudad_laboral']; ?>" name="Ciudad_laboral"/>
        </div>
        <div class="colC-2">
            <span> Localidad:</span> 
            <input type="text" value="<?php echo $datosLaborales['Localidad_laboral']; ?>" name="Localidad_laboral"/>
        </div>
        <div class="colC-3">
            <span> Municipio:</span>
            <input type="text" value="<?php echo $datosLaborales['Municipio_laboral']; ?>" name="Municipio_laboral"/>
        </div>
        <div class="colC-2">
            <span> CP:</span>
            <input type="text" value="<?php echo $datosLaborales['CP_laboral']; ?>" name="CP_laboral"/>
        </div>
        <div class="colC-3">
            <span> TEL. Celular:</span>
            <input type="text" value="<?php echo $datosLaborales['TEL_Celular_laboral']; ?>"  name="TEL_Celular_laboral"/>
        </div>
        <div class="colC-4">
            <span> Fecha De Ingreso al G.E.M:</span>
            <input type="text" id="date2" value="<?php echo $datosLaborales['Fecha_Ingreso_GEM']; ?>"  name="Fecha_Ingreso_GEM"/>
        </div>
        <div class="colC-3">
            <span> Numero De Prelación:</span>
            <input type="text" value="<?php echo $datosLaborales['Numero_Prelación']; ?>"  name="Numero_Prelación"/>
        </div>
        <div class="colC-2">
            <span> Antiguedad:</span>
            <input type="text"  value="<?php echo $datosLaborales['Antiguedad']; ?>" name="Antiguedad"/>
        </div>
        <div class="colC-3">
            <span> Puesto Profecional:</span>
            <input type="text" value="<?php echo $datosLaborales['Puesto_Profeciona']; ?>" name="Puesto_Profeciona"/>
        </div>
        <div class="colC-4">
            <span> Categoria:</span>
            <input type="text" value="<?php echo $datosLaborales['Categoria_TalonCheque']; ?>"  name="Categoria_TalonCheque" placeholder="Segun Talon De Cheque"/>
        </div>
        <div class="colC-3">
            <span> Estado Categoria:</span>
            <input type="text"  value="<?php echo $datosLaborales['Estado_Categoria']; ?>" name="Estado_Categoria"/>
        </div>
        <div class="colC-5">
            <span> No. De Plaza:</span>
            <input type="text"  value="<?php echo $datosLaborales['Plaza_Principal']; ?>" name="Plaza_Principal" placeholder="Principal"/>
        </div>
        <div class="colC-5">
            <span> No. De Plaza:</span>
            <input type="text"  value="<?php echo $datosLaborales['Plaza_Secundaria']; ?>" name="Plaza_Secundaria" placeholder="Secundaria"/>
        </div>
        <div class="colC-5">
            <span>Clave De Servidor Plublico:</span>
            <input type="text"  value="<?php echo $datosLaborales['Clave_S_Plublico']; ?>" name="Clave_S_Plublico"/>
        </div>
        <div class="">
            <span>Horario</span>
            <input type="text" id="timeInput" title="Horario Laboral De:" value="<?php echo $datosLaborales['H_Lt1']; ?>" name="H_Lt1"/>
        </div>
        <div class="ceterText">
            <h2>a:</h2>
        </div>
        <div class="">
            <span>Horas.</span>
            <input type="text" id="timeInput2" value="<?php echo $datosLaborales['H_Lt1_12']; ?>" name="H_Lt1_12"/>
        </div>
        <div></div>
        <div class="colC-5">
            <span>C.C.T. Otra Plaza:</span>
            <input type="text" value="<?php echo $datosLaborales['CCT_S_Plaza']; ?>" name="CCT_S_Plaza"/>
        </div>
        <div class="">
            <span>Horario</span>
            <input type="text" id="timeInput3" title="Horario Laboral De:" value="<?php echo $datosLaborales['H_Lt2']; ?>" name="H_Lt2"/>
        </div>
        <div class="ceterText">
            <h2>a:</h2>
        </div>
        <div class="">
            <span>Horas.</span>
            <input type="text" id="timeInput4" value="<?php echo $datosLaborales['H_Lt2_2']; ?>" name="H_Lt2_2"/>
        </div>

         <!--aqui empieza datos profecionales -->
        <div class="colC-Complet">
            <h2>DATOS PROFECIONALES</h2>
        </div> 
        <div class="colC-5">
            <span>Preparacion Profecional: </span>
            <input type="text" value="<?php echo $datosProfecionales['Preparacion_Profecional']; ?>" name="Preparacion_Profecional"/>
        </div>
        <div class="colC-3">
            <span> Titulado:</span>
            <input type="text" value="<?php echo $datosProfecionales['Titulado']; ?>" name="Titulado"/>
        </div>
        <div class="colC-4">
            <span> Escuela de Procedencia:</span>
            <input type="text" value="<?php echo $datosProfecionales['Escuela_Procedencia']; ?>" name="Escuela_Procedencia"/>
        </div>
        <div class="colC-4">
            <span> No. De Cédula Profecional:</span>
            <input type="text" value="<?php echo $datosProfecionales['No_Cédula_Profecional']; ?>" name="No_Cédula_Profecional"/>
        </div>
        <div class="colC-5">
            <span> Posgrado:</span>
            <input type="text" value="<?php echo $datosProfecionales['Posgrado']; ?>" name="Posgrado"/>
        </div>
        <div class="colC-3">
            <span> Grado Obtenido:</span>
            <input type="tel" value="<?php echo $datosProfecionales['Grado_Obtenido']; ?>" name="Grado_Obtenido"/>
        </div>
        <div class="colC-5">
            <span> Incorporacion a Carrera Magistra:</span>
            <input type="text" value="<?php echo $datosProfecionales['Incorporacion_Carrera_Magistral']; ?>" name="Incorporacion_Carrera_Magistral"/>
        </div>
        <div class="colC-3">
            <span> Fecha De Dictamen:</span>
            <input type="text" id="date3" value="<?php echo $datosProfecionales['Fecha_Dictamen']; ?>" name="Fecha_Dictamen" />
        </div>
        <div class="colC-4">
            <span> Numero De Dicatamen:</span>
            <input type="text" value="<?php echo $datosProfecionales['Numero_Dicatamen']; ?>" name="Numero_Dicatamen"/>
        </div>
        <div class="colC-4">
            <span> Nivel y Variante:</span>
            <input type="text" value="<?php echo $datosProfecionales['Nivel_Variante']; ?>" name="Nivel_Variante"/>
        </div>
        <div class="colC-4">
            <span> Otros Estudios:</span>
            <input type="text" value="<?php echo $datosProfecionales['Otros_Estudios']; ?>" name="Otros_Estudios"/>
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
    echo "<script> alert('no existe un inicio de secion'); window.location='/base-de-datos-escuela/'</script>";
}
?>