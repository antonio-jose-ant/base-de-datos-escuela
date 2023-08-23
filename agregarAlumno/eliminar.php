<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User(); 
if(isset($_SESSION['user'])){
    $Datos_AlumnoE = $Datos_Alumno->get_alumnoDatos();
    $user->setUser($userSession->getCurrentUser());
    $DatosGeneralesDelete="DELETE Datos_generales from Datos_generales where matricula='".$Datos_AlumnoE['matricula']."'";
    $domicilioDelete = "DELETE domicilio  from domicilio  where matricula='".$Datos_AlumnoE['matricula']."'";
    $tutor2Delete="DELETE tutor2  from tutor2  where matricula='".$Datos_AlumnoE['matricula']."'";
    $tutor1Delete="DELETE tutor1  from tutor1  where matricula='".$Datos_AlumnoE['matricula']."'";
    $DatosAlumnodelete="DELETE Datos_Alumno  from Datos_Alumno where CURPAlu='".$Datos_AlumnoE['CURP']."'";
    $datosmedicosDelete="DELETE datos_medicos   from datos_medicos   where CURPAlu='".$Datos_AlumnoE['CURP']."'";
    try {
        $db = new DB();
        $pdo = $db->connect();
    
        // Iniciar la transacción
        $pdo->beginTransaction();
        $stmtGeneralesD= $pdo->prepare($DatosGeneralesDelete);
        $stmtGeneralesD->execute();

        $stmtDomicilioD= $pdo->prepare($domicilioDelete);
        $stmtDomicilioD->execute();

        $stmtTutor2D= $pdo->prepare($tutor2Delete);
        $stmtTutor2D->execute();

        $stmtTutor1D= $pdo->prepare($tutor1Delete);
        $stmtTutor1D->execute();

        $stmtDatosD= $pdo->prepare($DatosAlumnodelete);
        $stmtDatosD->execute();

        $stmtMedicosD= $pdo->prepare($datosmedicosDelete);
        $stmtMedicosD->execute();
        $pdo->commit();


        echo "<script> alert(' Se Elimino con exito:::::'); window.location='/base-de-datos-escuela/mostrarDatos/mostrarAlumn.php';</script>";
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        echo "<br>".$queryDelate;
        //echo "<script> alert(' no se elimino el registro'); window.location='/base-de-datos-escuela/mostrarDatos/mostrarAlumn.php';</script>";
    }
}else{
//echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/base-de-datos-escuela/'</script>";
}
?>