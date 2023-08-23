<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User(); 
if(isset($_SESSION['user'])){
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
            <span> CURP:</span>
            <input type="text" name="CURP"  class="mayusculas" maxlength="18"/>
        </div>
        <div class="colC-3">
            <span> RFC:</span>
            <input type="text" name="RFC"  class="mayusculas" maxlength="13"/>
        </div>
        <div class="colC-3">
            <span>Colonia y/o Fracc:</span>
            <input type="text" name="ColoniaFracc"/>
        </div>
        <div class="colC-3">
            <span> Ciudad:</span>
            <input type="text" name="Ciudad"/>
        </div>
        <div class="colC-4">
            <span> Localidad:</span>
            <input type="text" name="localidadProfesor"/>
        </div>
        <div class="colC-4">
            <span> Dirección:</span>
            <input type="text" name="direccion"/>
        </div>
        <div class="colC-2">
                <span> No. Int.:</span>
                <input type="text" name="no_int" />
            </div>
            <div class="colC-2">
                <span> No. Ext.:</span>
                <input type="text" name="no_ext" />
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
        <div class="colC-3">
            <span> Lugar De Nacimiento:</span>
            <input type="text" name="Lugar_De_Nacimiento"/>
        </div>
        <div class="colC-4">
            <span>Grado Maximo de Estudios:</span>
            <select name="gradoMEstudio">
                    <option></option>
                    <option value="Media Superior">Media Superior</option>
                    <option value="Superior">Superior</option>
                    <option value="Maestria">Maestria</option>
                    <option value="Doctorado">Doctorado</option>
                </select>
        </div>
        <div class="colC-5">
            <span> Estado Civil:</span>
            <select name="estadoC" id="parejaSelection" onchange="seleccionEstadoC();">
                <option></option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Conviviente(a)">Conviviente</option>
                <option value="Anulado(a)">Anulado(a)</option>
                <option value="Separado(a) de unión legal">Separado(a) de unión legal</option>
                <option value="SSeparado(a) de unión de hecho">Separado(a) de unión de hecho</option>
                <option value="Viudo(a)">Viudo(a)</option>
                <option value="Soltero(a)">Soltero(a)</option>
            </select>
        </div>
        <div class="colC-6" id="pareja_EC" style="display: none;">
                <span>Nombre completo del esposo(a) o pareja:</span>
                <input type="text" name="pareja">
            </div>
        <div class="colC-7">
            <span> Red Social:</span>
            <input type="text" name="RedSocial"/>
        </div>
        <!--aqui empieza datos profecionales -->
        <div class="colC-Complet">
            <h2>DATOS LABORALES</h2>
        </div> 
        <div class="colC-4">
            <span>Nombre De La Dependencia: </span>
            <input type="text" name="Nombre_Dependencia"/>
        </div>
        <div class="colC-2">
            <span> CCT:</span>
            <input type="text" name="CCT"/>
        </div>
        <div class="colC-4">
            <span> Domicilio Particular</span>
            <input type="text" name="Domicilio_Particular"/>
        </div>

        <div class="colC-2">
            <span> No. Int.:</span>
            <input type="number" name="No_Int"/>
        </div>
        <div class="colC-3">
            <span> Colonia y/o Fracc.:</span>
            <input type="text" name="Colonia_Fracc"/>
        </div>
        <div class="colC-3">
            <span> Ciudad:</span>
            <input type="text" name="Ciudad_laboral"/>
        </div>
        <div class="colC-2">
            <span> Localidad:</span> 
            <input type="text" name="Localidad_laboral"/>
        </div>
        <div class="colC-3">
            <span> Municipio:</span>
            <input type="text" name="Municipio_laboral"/>
        </div>
        <div class="colC-2">
            <span> CP:</span>
            <input type="text" name="CP_laboral"/>
        </div>
        <div class="colC-3">
            <span> TEL. Celular:</span>
            <input type="text"  name="TEL_Celular_laboral"/>
        </div>
        <div class="colC-4">
            <span> Fecha De Ingreso al G.E.M:</span>
            <input type="text"  id="date2" name="Fecha_Ingreso_GEM"/>
        </div>
        <div class="colC-3">
            <span> Numero De Prelación:</span>
            <input type="text"  name="Numero_Prelación"/>
        </div>
        <div class="colC-2">
            <span> Antiguedad:</span>
            <input type="text"  name="Antiguedad"/>
        </div>
        <div class="colC-3">
            <span> Puesto Profecional:</span>
            <input type="text" name="Puesto_Profeciona"/>
        </div>
        <div class="colC-4">
            <span> Categoria:</span>
            <input type="text"  name="Categoria_TalonCheque" placeholder="Segun Talon De Cheque"/>
        </div>
        <div class="colC-3">
            <span> Estado Categoria:</span>
            <input type="text"  name="Estado_Categoria"/>
        </div>
        <div class="colC-5">
            <span> No. De Plaza:</span>
            <input type="text"  name="Plaza_Principal" placeholder="Principal"/>
        </div>
        <div class="colC-5">
            <span> No. De Plaza:</span>
            <input type="text"  name="Plaza_Secundaria" placeholder="Secundaria"/>
        </div>
        <div class="colC-5">
            <span>Clave De Servidor Plublico:</span>
            <input type="text"  name="Clave_S_Plublico"/>
        </div>
        <div class="">
            <span>Horario</span>
            <input type="text" id="timeInput" title="Horario Laboral De:" name="H_Lt1"/>
        </div>
        <div class="ceterText">
            <h2>a:</h2>
        </div>
        <div class="">
            <span>Horas.</span>
            <input type="text" id="timeInput2" name="H_Lt1_12"/>
        </div>
        <div></div>
        <div class="colC-5">
            <span>C.C.T. Otra Plaza:</span>
            <input type="text" name="CCT_S_Plaza"/>
        </div>
        <div class="">
            <span>Horario</span>
            <input type="text" id="timeInput3" title="Horario Laboral De:" name="H_Lt2"/>
        </div>
        <div class="ceterText">
            <h2>a:</h2>
        </div>
        <div class="">
            <span>Horas.</span>
            <input type="text" id="timeInput4" name="H_Lt2_2"/>
        </div>

         <!--aqui empieza datos profecionales -->
        <div class="colC-Complet">
            <h2>DATOS PROFECIONALES</h2>
        </div> 
        <div class="colC-5">
            <span>Preparacion Profecional: </span>
            <input type="text" name="Preparacion_Profecional"/>
        </div>
        <div class="colC-3">
            <span> Titulado:</span>
            <input type="text" name="Titulado"/>
        </div>
        <div class="colC-4">
            <span> Escuela de Procedencia:</span>
            <input type="text" name="Escuela_Procedencia"/>
        </div>
        <div class="colC-4">
            <span> No. De Cédula Profecional:</span>
            <input type="text" name="No_Cédula_Profecional"/>
        </div>
        <div class="colC-5">
            <span> Posgrado:</span>
            <input type="text" name="Posgrado"/>
        </div>
        <div class="colC-3">
            <span> Grado Obtenido:</span>
            <input type="tel" name="Grado_Obtenido"/>
        </div>
        <div class="colC-5">
            <span> Incorporacion a Carrera Magistra:</span>
            <input type="text" name="Incorporacion_Carrera_Magistral"/>
        </div>
        <div class="colC-3">
            <span> Fecha De Dictamen:</span>
            <input type="text" id="date3" name="Fecha_Dictamen" />
        </div>
        <div class="colC-4">
            <span> Numero De Dicatamen:</span>
            <input type="text" name="Numero_Dicatamen"/>
        </div>
        <div class="colC-4">
            <span> Nivel y Variante:</span>
            <input type="text" name="Nivel_Variante"/>
        </div>
        <div class="colC-4">
            <span> Otros Estudios:</span>
            <input type="text" name="Otros_Estudios"/>
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