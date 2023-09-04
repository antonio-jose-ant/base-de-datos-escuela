<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    session_start();
    
    $DatosAlumno=$Datos_Alumno ->get_alumnoDatos();
    $datosmedicos=$datos_medicos -> get_datosMedicosA();
    $tutor1Alu=$tutor1 ->get_tutor1A();
    $tutor2alu=$tutor2 ->get_tutor2A();
    $domicilioAlu=$domicilio ->get_DomicilioA();
    $DatosgeneralesAlu=$Datos_generales -> get_datosGeneralesA();

    $_SESSION['alumnoDatos'] = $Datos_Alumno->get_alumnoDatos();
    $_SESSION['datosMedicosA'] = $datos_medicos->get_datosMedicosA();
    $_SESSION['tutor1A'] = $tutor1->get_tutor1A();
    $_SESSION['tutor2A'] = $tutor2->get_tutor2A();     
    $_SESSION['DomicilioA'] = $domicilio->get_DomicilioA();
    $_SESSION['datosGeneralesA'] = $Datos_generales->get_datosGeneralesA();
    $insert = true;
    foreach ($DatosAlumno as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        }
    }
    foreach ($datosmedicos as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        }
    }
    foreach ($tutor1Alu as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        }
    }
    foreach ($tutor2alu as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        }
    }
    foreach ($domicilioAlu as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        } 
    }
    foreach ($DatosgeneralesAlu as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('Existen campos vacios');window.location='/base-de-datos-escuela/agregarAlumno/campoV.php'</script>";
            exit;
            break;
        }
    }
    if($insert){
        $datosMedicosInsert="INSERT INTO datos_medicos (CURPAlu, Tel_emergencia, Talla, Peso, Tipo_sangre, Alergias, padecimiento, Pie_plano,lentes)
        VALUES('".strtoupper($DatosAlumno['CURP'])."'
            ,'".$datosmedicos['numEmergencia']."'
            ,'".$datosmedicos['Talla']."'
            ,'".$datosmedicos['peso']."'
            ,'".$datosmedicos['tipoSangre']."'
            ,'".$datosmedicos['alergia']."'
            ,'".$datosmedicos['padecimiento']."'
            ,'".$datosmedicos['piePlano']."'
            ,'".$datosmedicos['lentes']."'
        )";
        $DatosAlumnoInsert="INSERT INTO Datos_Alumno (matricula,Nombre_alu,Apellido_p,Apellido_m,CURPAlu,Fecha_n_alu,Edad_alu,Correo_alu,grado,grupo,turno)
        VALUES('".$DatosAlumno['matricula']."'
            ,'".ucwords($DatosAlumno['Nombre'])."'
            ,'".ucwords($DatosAlumno['ApeidoP'])."'
            ,'".ucwords($DatosAlumno['ApeidoM'])."'
            ,'".strtoupper($DatosAlumno['CURP'])."'
            ,'".date("Y-m-d", strtotime($DatosAlumno['Fecha_n']))."'
            ,'".$DatosAlumno['edad']."'
            ,'".$DatosAlumno['CorreoAlu']."'
            ,'".$DatosAlumno['Grado']."'
            ,'".$DatosAlumno['Grupo']."'
            ,'".$DatosAlumno['Turno']."'
        )";
        $tutor1Insert="INSERT INTO tutor1 (CURP_tutor1,NombreT1,Apellido_pT1,Apellido_mT1,EdadT1,ParentescoT1,Estado_civilT1,OcupacionT1,Grado_estudiosT1,matricula)
        VALUES('".strtoupper($tutor1Alu['CURPT1'])."'
            ,'".ucwords($tutor1Alu['nombreT1'])."'
            ,'".ucwords($tutor1Alu['apellidoPT1'])."'
            ,'".ucwords($tutor1Alu['apellidoMT1'])."'
            ,'".$tutor1Alu['edadT1']."'
            ,'".$tutor1Alu['parentescoT1']."'
            ,'".$tutor1Alu['Estado_civilT1']."'
            ,'".$tutor1Alu['ocupacionT1']."'
            ,'".$tutor1Alu['estudioT1']."'
            ,'".$DatosAlumno['matricula']."'
        )";
        $tutor2Insert="INSERT INTO tutor2 (CURP_tutor2,NombreT2,Apellido_pT2,Apellido_mT2,EdadT2,ParentescoT2,Estado_civilT2,OcupacionT2,Grado_estudiosT2,matricula)
        VALUES('".strtoupper($tutor2alu['CURPT2'])."'
            ,'".ucwords($tutor2alu['nombreT2'])."'
            ,'".ucwords($tutor2alu['apellidoPT2'])."'
            ,'".ucwords($tutor2alu['apellidoMT2'])."'
            ,'".$tutor2alu['edadT2']."'
            ,'".$tutor2alu['parentescoT2']."'
            ,'".$tutor2alu['Estado_civilT2']."'
            ,'".$tutor2alu['ocupacionT2']."'
            ,'".$tutor2alu['estudioT2']."'
            ,'".$DatosAlumno['matricula']."'
        )";
        $domicilioInsert="INSERT INTO domicilio(Calle,Numero,CP,Calle1,Calle2,Referencia,Colonia,Municipio,Tel_casa,matricula)
        VALUES('".$domicilioAlu['Calle']."'
            ,'".$domicilioAlu['No']."'
            ,'".$domicilioAlu['CP']."'
            ,'".$domicilioAlu['Calle1']."'
            ,'".$domicilioAlu['Calle2']."'
            ,'".$domicilioAlu['referencia']."'
            ,'".$domicilioAlu['Colonia']."'
            ,'".$domicilioAlu['Municipio']."'
            ,'".$domicilioAlu['TelCasa']."'
            ,'".$DatosAlumno['matricula']."'
        )";
        $DatosGeneralesInsert="INSERT INTO Datos_generales (personas_Viven,sosten_H,INTERNET,TELEVISIÓN,CELULAR,TABLET,COMPUTADORA,matricula)
        VALUES('".$DatosgeneralesAlu['vivenC']."'
            ,'".$DatosgeneralesAlu['sostenHogar']."'
            ,'".$DatosgeneralesAlu['internet']."'
            ,'".$DatosgeneralesAlu['television']."'
            ,'".$DatosgeneralesAlu['celular']."'
            ,'".$DatosgeneralesAlu['tablet']."'
            ,'".$DatosgeneralesAlu['computadora']."'
            ,'".$DatosAlumno['matricula']."'
        )";
    }
    try {
        $db = new DB();
        $pdo = $db->connect();
    
        // Iniciar la transacción
        $pdo->beginTransaction();

        $stmtMedicos= $pdo->prepare($datosMedicosInsert);
        $stmtMedicos->execute();
        $stmtDatos= $pdo->prepare($DatosAlumnoInsert);
        $stmtDatos->execute();
        $stmtTutor1= $pdo->prepare($tutor1Insert);
        $stmtTutor1->execute();
        $stmtTutor2= $pdo->prepare($tutor2Insert);
        $stmtTutor2->execute();
        $stmtDomicilio= $pdo->prepare($domicilioInsert);
        $stmtDomicilio->execute();
        $stmtGenerales= $pdo->prepare($DatosGeneralesInsert);
        $stmtGenerales->execute();
        // Confirmar la transacción
        $pdo->commit();
        echo "<script> alert('se Agrego con exito'); window.location='/base-de-datos-escuela/agregarAlumno/alumno.php';</script>";
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