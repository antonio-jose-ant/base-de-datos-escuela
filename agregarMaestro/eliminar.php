<?php
$datosP=$mDP->get_datospersonales();
    $queryUpdate= "DELETE profesor 
    FROM profesor 
    INNER JOIN datosadministracion ON profesor.CURP = datosadministracion.CURP 
    INNER JOIN datospersonales ON profesor.RFC = datospersonales.RFC 
    WHERE datospersonales.RFC = '".$datosP['RFC']."'";
    $resultado=mysqli_query($conexion,$queryUpdate);
    if($resultado){
        echo "<script> alert(' se Elimino con exito'); window.location='/test/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }
?>