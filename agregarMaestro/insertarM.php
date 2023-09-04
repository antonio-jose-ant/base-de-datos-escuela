<?php 
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User(); 
if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    session_start();
    $insert = true; 
    $datos = $mDatos->get_maestrosDatos();
    $datosP=$mDP->get_datosProfecionales();
    $datosA=$mDA->get_datosLaborales(); 
     
    $_SESSION['maestroDatos'] = $mDatos->get_maestrosDatos();
    $_SESSION['datosProfecionales'] = $mDP->get_datosProfecionales();
    $_SESSION['datosLaborales'] = $mDA->get_datosLaborales();

    foreach ($datos as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');window.location='/base-de-datos-escuela/agregarMaestro/campoV.php'</script>";
            exit;
            break;
        }
    }
    foreach ($datosP as $key2 => $value2) {
        if (empty($value2)) {
            $insert = false;
            echo "<script>alert('El campo $key2 está vacío');window.location='/base-de-datos-escuela/agregarMaestro/campoV.php'</script>";
            break;
        }
    }
    foreach ($datosA as $key1 => $value1) {
        if (empty($value1)) {
            $insert = false;
            echo "<script>alert('El campo $key1 está vacío');window.location='/base-de-datos-escuela/agregarMaestro/campoV.php'</script>";
            break; 
        }
    }
    if($insert){
/******************base datos maestrosDatos***********************/
        /******************base datos datos_laborales***********************/
        $insertarprof= "INSERT INTO datos_profecionales (RFC,Preparacion_Profecional,Titulado,Escuela_Procedencia,No_Cédula_Profecional,Posgrado,Grado_Obtenido,Incorporacion_Carrera_Magistral,Fecha_Dictamen,Numero_Dicatamen,Nivel_Variante,Otros_Estudios)
        values ('".strtoupper($datosP['RFC'])."'
        ,'".$datosP['Preparacion_Profecional']."'
        ,'".$datosP['Titulado']."'
        ,'".$datosP['Escuela_Procedencia']."'
        ,'".$datosP['No_Cédula_Profecional']."'
        ,'".$datosP['Posgrado']."'
        ,'".$datosP['Grado_Obtenido']."'
        ,'".$datosP['Incorporacion_Carrera_Magistral']."'
        ,'".date("Y-m-d", strtotime($datosP['Fecha_Dictamen']))."'
        ,'".$datosP['Numero_Dicatamen']."'
        ,'".$datosP['Nivel_Variante']."'
        ,'".$datosP['Otros_Estudios']."')";
        /**********base datos datos_laborales***************/
        $insertaadmin = "INSERT INTO datos_laborales (CURP,Nombre_Dependencia,CCT,Domicilio_Particular,No_Int,Colonia_Fracc,Ciudad_laboral,Localidad_laboral,Municipio_laboral,CP_laboral,TEL_Celular_laboral,Fecha_Ingreso_GEM,Numero_Prelación,Antiguedad,Puesto_Profeciona,Categoria_TalonCheque,Estado_Categoria,Plaza_Principal,Plaza_Secundaria,Clave_S_Plublico,H_Lt1,H_Lt1_2,CCT_S_Plaza,H_Lt2,H_Lt2_2)
        values ('".strtoupper($datosA['CURP'])."'
        ,'".$datosA['Nombre_Dependencia']."'
        ,'".$datosA['CCT']."'
        ,'".$datosA['Domicilio_Particular']."'
        ,'".$datosA['No_Int']."'
        ,'".$datosA['Colonia_Fracc']."'
        ,'".$datosA['Ciudad_laboral']."'
        ,'".$datosA['Localidad_laboral']."'
        ,'".$datosA['Municipio_laboral']."'
        ,'".$datosA['CP_laboral']."'
        ,'".$datosA['TEL_Celular_laboral']."'
        ,'".$datosA['Fecha_Ingreso_GEM']."'
        ,'".$datosA['Numero_Prelación']."'
        ,'".$datosA['Antiguedad']."'
        ,'".$datosA['Puesto_Profeciona']."'
        ,'".$datosA['Categoria_TalonCheque']."'
        ,'".$datosA['Estado_Categoria']."'
        ,'".$datosA['Plaza_Principal']."'
        ,'".$datosA['Plaza_Secundaria']."'
        ,'".$datosA['Clave_S_Plublico']."'
        ,'".$datosA['H_Lt1']."'
        ,'".$datosA['H_Lt1_12']."'
        ,'".$datosA['CCT_S_Plaza']."'
        ,'".$datosA['H_Lt2']."'
        ,'".$datosA['H_Lt2_2']."')";
        $insertar= "INSERT INTO profesor (nomina,nombre,apellidoP,apellidoM,ColoniaFracc,Direccion,Ciudad,no_int,no_ext,municipio,CP,telefonoPersonal,telefonoCasa,correoElectronico,edad,sexo,Lugar_De_Nacimiento,EstadoCivil,nombrePareja,redSocial,CURP,RFC) 
        values ('".$datos['nomina']."'
        ,'".ucfirst(strtolower($datos['nombre']))."'
        ,'".ucfirst(strtolower($datos['apellidoP']))."'
        ,'".ucfirst(strtolower($datos['apellidoM']))."'
        ,'".$datos['ColoniaFracc']."'
        ,'".$datos['Direccion']."'
        ,'".$datos['Ciudad']."'
        ,'".$datos['no_int']."'
        ,'".$datos['no_ext']."'
        ,'".$datos['municipio']."'
        ,'".$datos['CP']."'
        ,'".$datos['telefonoPersonal']."'
        ,'".$datos['telefonoCasa']."'
        ,'".$datos['correoElectronico']."'
        ,'".$datos['edad']."'
        ,'".$datos['sexo']."'
        ,'".$datos['Lugar_De_Nacimiento']."'
        ,'".$datos['EstadoCivil']."'
        ,'".$datos['pareja']."'
        ,'".$datos['redSocial']."'
        ,'".strtoupper($datosA['CURP'])."'
        ,'".strtoupper($datosP['RFC'])."')";
    }
    
    try {
        $db = new DB();
        $pdo = $db->connect();
    
        // Iniciar la transacción
        $pdo->beginTransaction();
    
        // Insertar en la primera base de datos
        $stmtProf = $pdo->prepare($insertarprof);
        $stmtProf->execute();
    
        // Insertar en la segunda base de datos
        $stmtAdmin = $pdo->prepare($insertaadmin);
        $stmtAdmin->execute();
    
        // Insertar en la tercera base de datos
        $stmtProfesor = $pdo->prepare($insertar);
        $stmtProfesor->execute();
    
        // Confirmar la transacción
        $pdo->commit();
        echo "<script> alert('se Agrego con exito'); window.location='/base-de-datos-escuela/agregarMaestro/maestros.php';</script>";

    
    } catch (PDOException $e) {
        // Algo salió mal, realizar rollback y manejar el error
        $pdo->rollBack();
        echo "Error en las inserciones: " . $e->getMessage();
    }


}else{
//echo "login";
echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>