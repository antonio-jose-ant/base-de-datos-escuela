<?php
    include '../includes/conexion-BD.php';
    $datos = $mDatos->get_maestrosDatos();
    $queryUpdate= "DELETE profesor, datosadministracion,datospersonales FROM profesor 
    inner JOIN datosadministracion 
    on profesor.CURP=datosadministracion.CURP
    inner join datospersonales 
    on profesor.RFC=datospersonales.RFC 
    where profesor.nomina = '".$datos['nomina']."'";

    $resultado=mysqli_query($conexion,$queryUpdate);
    if($resultado){
        echo "<script> alert(' se Elimino con exito'); window.location='/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }else{
        echo "<script> alert(' no se elimino el registro'); window.location='/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }
?>