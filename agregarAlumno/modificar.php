<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    $cons="Modifico";
    $DatosAlumno=$Datos_Alumno ->get_alumnoDatos();
    $datosmedicos=$datos_medicos -> get_datosMedicosA();
    $tutor1Alu=$tutor1 ->get_tutor1A();
    $tutor2aluM=$tutor2 ->get_tutor2A();
    $domicilioAlu=$domicilio ->get_DomicilioA();
    $DatosgeneralesAlu=$Datos_generales -> get_datosGeneralesA();

    $conexion = mysqli_connect("localhost", "root", "TOYOTS99", "escuela");
    mysqli_set_charset($conexion, "utf8");
    $matriculaMC;
    $matriculaC = "SELECT matricula FROM datos_alumno WHERE CURPAlu = '" . $DatosAlumno['CURP'] . "'";
    $resultado = mysqli_query($conexion, $matriculaC);
    
    if ($resultado) {
        // Extraer el valor de la matrícula
        $fila = mysqli_fetch_assoc($resultado);
        $matriculaMC = $fila['matricula'];
    
        // Imprimir en la consola de JavaScript
        echo "<script>console.log('Matrícula: " . $matriculaMC . "');</script>";
    
        // Liberar el resultado
        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);

        $datosMedicosUpdate="datos_medicos.CURPAlu='".strtoupper($DatosAlumno['CURP'])."'
        ,datos_medicos.Tel_emergencia='".$datosmedicos['numEmergencia']."'
        ,datos_medicos.Talla='".$datosmedicos['Talla']."'
        ,datos_medicos.Peso='".$datosmedicos['peso']."'
        ,datos_medicos.Tipo_sangre='".$datosmedicos['tipoSangre']."'
        ,datos_medicos.Alergias='".$datosmedicos['alergia']."'
        ,datos_medicos.padecimiento='".$datosmedicos['padecimiento']."'
        ,datos_medicos.Pie_plano='".$datosmedicos['piePlano']."'
        ,datos_medicos.lentes='".$datosmedicos['lentes']."'
        ";
        $DatosAlumnoUpdate=",Datos_Alumno.matricula='".strtoupper($matriculaMC)."'
            ,Datos_Alumno.Nombre_alu='".ucwords($DatosAlumno['Nombre'])."'
            ,Datos_Alumno.Apellido_p='".ucwords($DatosAlumno['ApeidoP'])."'
            ,Datos_Alumno.Apellido_m='".ucwords($DatosAlumno['ApeidoM'])."'
            ,Datos_Alumno.CURPAlu='".strtoupper($DatosAlumno['CURP'])."'
            ,Datos_Alumno.Fecha_n_alu='".date("Y-m-d", strtotime($DatosAlumno['Fecha_n']))."'
            ,Datos_Alumno.Edad_alu='".$DatosAlumno['edad']."'
            ,Datos_Alumno.Correo_alu='".$DatosAlumno['CorreoAlu']."'
            ,Datos_Alumno.grado='".$DatosAlumno['Grado']."'
            ,Datos_Alumno.grupo='".$DatosAlumno['Grupo']."'
            ,Datos_Alumno.turno='".$DatosAlumno['Turno']."'
        ";
        $tutor1Update=",tutor1.CURP_tutor1='".strtoupper($tutor1Alu['CURPT1'])."'
            ,tutor1.NombreT1='".ucwords($tutor1Alu['nombreT1'])."'
            ,tutor1.Apellido_pT1='".ucwords($tutor1Alu['apellidoPT1'])."'
            ,tutor1.Apellido_mT1='".ucwords($tutor1Alu['apellidoMT1'])."'
            ,tutor1.EdadT1='".$tutor1Alu['edadT1']."'
            ,tutor1.ParentescoT1='".$tutor1Alu['parentescoT1']."'
            ,tutor1.Estado_civilT1='".$tutor1Alu['Estado_civilT1']."'
            ,tutor1.OcupacionT1='".$tutor1Alu['ocupacionT1']."'
            ,tutor1.Grado_estudiosT1='".$tutor1Alu['estudioT1']."'
            ,tutor1.matricula='".$matriculaMC."'
        ";
        $tutor2Update=",tutor2.CURP_tutor2='".strtoupper($tutor2aluM['CURPT2'])."'
            ,tutor2.NombreT2='".ucwords($tutor2aluM['nombreT2'])."'
            ,tutor2.Apellido_pT2='".ucwords($tutor2aluM['apellidoPT2'])."'
            ,tutor2.Apellido_mT2='".ucwords($tutor2aluM['apellidoMT2'])."'
            ,tutor2.EdadT2='".$tutor2aluM['edadT2']."'
            ,tutor2.ParentescoT2='".$tutor2aluM['parentescoT2']."'
            ,tutor2.Estado_civilT2='".$tutor2aluM['Estado_civilT2']."'
            ,tutor2.OcupacionT2='".$tutor2aluM['ocupacionT2']."'
            ,tutor2.Grado_estudiosT2='".$tutor2aluM['estudioT2']."'
            ,tutor2.matricula='".$matriculaMC."'
        ";

        $domicilioUpdate=",domicilio.Calle='".$domicilioAlu['Calle']."'
            ,domicilio.Numero='".$domicilioAlu['No']."'
            ,domicilio.CP='".$domicilioAlu['CP']."'
            ,domicilio.Calle1='".$domicilioAlu['Calle1']."'
            ,domicilio.Calle2='".$domicilioAlu['Calle2']."'
            ,domicilio.Referencia='".$domicilioAlu['referencia']."'
            ,domicilio.Colonia='".$domicilioAlu['Colonia']."'
            ,domicilio.Municipio='".$domicilioAlu['Municipio']."'
            ,domicilio.Tel_casa='".$domicilioAlu['TelCasa']."'
            ,domicilio.matricula='".$matriculaMC."'
        ";
        $DatosGeneralesUpdate=",Datos_generales.personas_Viven='".$DatosgeneralesAlu['vivenC']."'
            ,Datos_generales.sosten_H='".$DatosgeneralesAlu['sostenHogar']."'
            ,Datos_generales.INTERNET='".$DatosgeneralesAlu['internet']."'
            ,Datos_generales.TELEVISIÓN='".$DatosgeneralesAlu['television']."'
            ,Datos_generales.CELULAR='".$DatosgeneralesAlu['celular']."'
            ,Datos_generales.TABLET='".$DatosgeneralesAlu['tablet']."'
            ,Datos_generales.COMPUTADORA='".$DatosgeneralesAlu['computadora']."'
            ,Datos_generales.matricula='".$matriculaMC."'
        ";
    try {
        $db = new DB();
        $pdo = $db->connect();
        $queryUpdate=" UPDATE datos_medicos
        JOIN Datos_Alumno ON datos_medicos.CURPAlu = Datos_Alumno.CURPAlu
        JOIN tutor1 ON tutor1.matricula = Datos_Alumno.matricula
        JOIN tutor2 ON tutor2.matricula = Datos_Alumno.matricula
        JOIN domicilio ON domicilio.matricula = Datos_Alumno.matricula
        JOIN Datos_generales ON Datos_generales.matricula = Datos_Alumno.matricula
        set ".$datosMedicosUpdate.$DatosAlumnoUpdate.$tutor1Update.$tutor2Update.$domicilioUpdate.$DatosGeneralesUpdate."
        WHERE Datos_Alumno.matricula='".$matriculaMC."'";
        $stmt = $pdo->prepare($queryUpdate);
        $stmt->execute();
        echo "<script> alert(' se Modifico con exito'); window.location='/base-de-datos-escuela/mostrarDatos/mostrarAlumn.php';</script>";
    } catch (PDOException $e) {
        echo "Error en las inserciones: " . $e->getMessage();
    }
}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>