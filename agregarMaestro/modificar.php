<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    //echo "hay sesion";
$user->setUser($userSession->getCurrentUser());


$datos = $mDatos->get_maestrosDatos();
$datosP=$mDP->get_datosProfecionales();
$datosA=$mDA->get_datosLaborales();
$modificarT=$modificados->get_modificado();

/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/

        $cons="Modifico";
        $insertarprof=" 
        datos_profecionales.RFC='".$datosP['RFC']."'
        ,datos_profecionales.Preparacion_Profecional='".$datosP['Preparacion_Profecional']."'
        ,datos_profecionales.Titulado='".$datosP['Titulado']."'
        ,datos_profecionales.Escuela_Procedencia='".$datosP['Escuela_Procedencia']."'
        ,datos_profecionales.No_Cédula_Profecional='".$datosP['No_Cédula_Profecional']."'
        ,datos_profecionales.Posgrado='".$datosP['Posgrado']."'
        ,datos_profecionales.Grado_Obtenido='".$datosP['Grado_Obtenido']."'
        ,datos_profecionales.Incorporacion_Carrera_Magistral='".$datosP['Incorporacion_Carrera_Magistral']."'
        ,datos_profecionales.Fecha_Dictamen='".date("Y-m-d", strtotime($datosP['Fecha_Dictamen']))."'
        ,datos_profecionales.Numero_Dicatamen='".$datosP['Numero_Dicatamen']."'
        ,datos_profecionales.Nivel_Variante='".$datosP['Nivel_Variante']."'
        ,datos_profecionales.Otros_Estudios='".$datosP['Otros_Estudios']."'";


        $insertaadmin="        
        ,datos_laborales.CURP='".$datosA['CURP']."'
        ,datos_laborales.Nombre_Dependencia='".$datosA['Nombre_Dependencia']."'
        ,datos_laborales.CCT='".$datosA['CCT']."'
        ,datos_laborales.Domicilio_Particular='".$datosA['Domicilio_Particular']."'
        ,datos_laborales.No_Int='".$datosA['No_Int']."'
        ,datos_laborales.Colonia_Fracc='".$datosA['Colonia_Fracc']."'
        ,datos_laborales.Ciudad_laboral='".$datosA['Ciudad_laboral']."'
        ,datos_laborales.Localidad_laboral='".$datosA['Localidad_laboral']."'
        ,datos_laborales.Municipio_laboral='".$datosA['Municipio_laboral']."'
        ,datos_laborales.CP_laboral='".$datosA['CP_laboral']."'
        ,datos_laborales.TEL_Celular_laboral='".$datosA['TEL_Celular_laboral']."'
        ,datos_laborales.Fecha_Ingreso_GEM='".date("Y-m-d", strtotime($datosA['Fecha_Ingreso_GEM']))."'
        ,datos_laborales.Numero_Prelación='".$datosA['Numero_Prelación']."'
        ,datos_laborales.Antiguedad='".$datosA['Antiguedad']."'
        ,datos_laborales.Puesto_Profeciona='".$datosA['Puesto_Profeciona']."'
        ,datos_laborales.Categoria_TalonCheque='".$datosA['Categoria_TalonCheque']."'
        ,datos_laborales.Estado_Categoria='".$datosA['Estado_Categoria']."'
        ,datos_laborales.Plaza_Principal='".$datosA['Plaza_Principal']."'
        ,datos_laborales.Plaza_Secundaria='".$datosA['Plaza_Secundaria']."'
        ,datos_laborales.Clave_S_Plublico='".$datosA['Clave_S_Plublico']."'
        ,datos_laborales.H_Lt1='".$datosA['H_Lt1']."'
        ,datos_laborales.H_Lt1_2='".$datosA['H_Lt1_12']."'
        ,datos_laborales.CCT_S_Plaza='".$datosA['CCT_S_Plaza']."'
        ,datos_laborales.H_Lt2='".$datosA['H_Lt2']."'
        ,datos_laborales.H_Lt2_2='".$datosA['H_Lt2_2']."' ";


        $insertar="
        ,profesor.nomina='".$datos['nomina']."'
        ,profesor.nombre='".ucfirst(strtolower($datos['nombre']))."'
        ,profesor.apellidoP='".ucfirst(strtolower($datos['apellidoP']))."'
        ,profesor.apellidoM='".ucfirst(strtolower($datos['apellidoM']))."'
        ,profesor.ColoniaFracc='".$datos['ColoniaFracc']."'
        ,profesor.Direccion='".$datos['Direccion']."'
        ,profesor.Ciudad='".$datos['Ciudad']."'
        ,profesor.no_int='".$datos['no_int']."'
        ,profesor.no_ext='".$datos['no_ext']."'
        ,profesor.municipio='".$datos['municipio']."'
        ,profesor.CP='".$datos['CP']."'
        ,profesor.localidadProfesor='".$datos['localidadProfesor']."'
        ,profesor.gradoMEstudio='".$datos['gradoMEstudio']."'
        ,profesor.telefonoPersonal='".$datos['telefonoPersonal']."'
        ,profesor.telefonoCasa='".$datos['telefonoCasa']."'
        ,profesor.correoElectronico='".$datos['correoElectronico']."'
        ,profesor.edad='".$datos['edad']."' 
        ,profesor.sexo='".$datos['sexo']."'
        ,profesor.Lugar_De_Nacimiento='".$datos['Lugar_De_Nacimiento']."'
        ,profesor.EstadoCivil='".$datos['EstadoCivil']."'
        ,profesor.nombrePareja='".$datos['pareja']."'
        ,profesor.redSocial ='".$datos['redSocial']."'
        ,profesor.CURP='".$datosA['CURP']."'
        ,profesor.RFC='".$datosP['RFC']."'";
    try {
        $db = new DB();
        $pdo = $db->connect();
        $queryUpdate="UPDATE profesor
        inner JOIN datos_laborales on profesor.CURP=datos_laborales.CURP
        inner join datos_profecionales on profesor.RFC=datos_profecionales.RFC 
        set ".$insertarprof.$insertaadmin.$insertar." WHERE datos_profecionales.RFC='".$datosP['RFC']."'";

        $stmt = $pdo->prepare($queryUpdate);
        $stmt->execute();
        echo "<script> alert(' se Modifico con exito'); window.location='/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    } catch (PDOException $e) {
        // Ocurrió un error, manejarlo aquí
        echo "Error en la consulta: " . $e->getMessage();
    }

}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/base-de-datos-escuela/'</script>";
}
?>