<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
$userSession = new UserSession();
$user = new User(); 
if(isset($_SESSION['user'])){
    $datos = $mDatos->get_maestrosDatos();
    $user->setUser($userSession->getCurrentUser());
    try {
        $db = new DB();
        $pdo = $db->connect();
        $queryDelate= "DELETE profesor, datos_laborales,datos_profecionales FROM profesor 
        inner JOIN datos_laborales 
        on profesor.CURP=datos_laborales.CURP
        inner join datos_profecionales 
        on profesor.RFC=datos_profecionales.RFC 
        where profesor.nomina = '".$datos['nomina']."'";
        $stmt = $pdo->prepare($queryDelate);
        $stmt->execute();
        echo "<script> alert(' se Elimino con exito'); window.location='/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    } catch (PDOException $e) {
        //echo "Error en la consulta: " . $e->getMessage();
        echo "<script> alert(' no se elimino el registro'); window.location='/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }
}else{
//echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/base-de-datos-escuela/'</script>";
}
?>