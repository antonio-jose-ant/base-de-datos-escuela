<?php
    include '../includes/conexion-BD.php';
    $insert = true;
    $datos = $mDatos->get_maestrosDatos();
    $datosP=$mDP->get_datospersonales();
    $datosA=$mDA->get_datosadministracion();

    foreach ($datos as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($datosP as $key2 => $value2) {
        if (empty($value2)) {
            $insert = false;
            echo "<script>alert('El campo $key2 está vacío');</script>";
            break;
        }
    }
    foreach ($datosA as $key1 => $value1) {
        if (empty($value1)) {
            $insert = false;
            echo "<script>alert('El campo $key1 está vacío');</script>";
            break;
        }
    }
    
    if($insert){
/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/
        $insertarprof="INSERT INTO DatosPersonales (RFC,categoria,EstadoCategoria,AñosServico,AñosServicoEnFuncion,preparacionPersonal,ClaevServidor,FechaIngreso,NumeroPlaza,fechaIngresoFuncionActual,CodigoPuesto,PreparacionProfecional)
        values ('".$datosP['RFC']."'
        ,'".$datosP['Categoria']."'
        ,'".$datosP['EstadCategoria']."'
        ,'".$datosP['AnosS']."'
        ,'".$datosP['AnosSerFUnciona']."'
        ,'".$datosP['PreparaciónPa']."'
        ,'".$datosP['ClaveS']."'
        ,'".$datosP['FechaINgreso']."'
        ,'".$datosP['NumeroPa']."'
        ,'".$datosP['FechaFuncionA']."'
        ,'".$datosP['CoddigoPuesto']."'
        ,'".$datosP['PreparacionPro']."')";
        $resultadoo=mysqli_query($conexion,$insertarprof);
        /**********base datos datosadministracion***************/
        $insertaadmin="INSERT INTO datosadministracion (CURP,CedeLugarAdminitracion,Domicilio,LocalidadColonia,MunicipioEscuela,C_C_T,Telefono,CorreoInstituto)
        values ('".$datosA['CURP']."'
        ,'".$datosA['SedeLugarAD']."'
        ,'".$datosA['Domicilio']."'
        ,'".$datosA['LocalidadColonia']."'
        ,'".$datosA['MunicipioEscuela']."'
        ,'".$datosA['CCT']."'
        ,'".$datosA['Telefono']."'
        ,'".$datosA['EmailInstituto']."')";
        $resultadooo=mysqli_query($conexion,$insertaadmin);
        $insertar="INSERT INTO profesor (nomina,nombre,apellidoP,apellidoM,localidadOcolonia,Direccion,municipio,CP,telefonoPersonal,telefonoCasa,correoElectronico,edad,EstadoCivil,redSocial,CURP,RFC) 
        values ('".$datos['nomina']."'
        ,'".$datos['nombre']."'
        ,'".$datos['apellidoP']."'
        ,'".$datos['apellidoM']."'
        ,'".$datos['localidadOcolonia']."'
        ,'".$datos['Direccion']."'
        ,'".$datos['municipio']."'
        ,'".$datos['CP']."'
        ,'".$datos['telefonoPersonal']."'
        ,'".$datos['telefonoCasa']."'
        ,'".$datos['correoElectronico']."'
        ,'".$datos['edad']."'
        ,'".$datos['EstadoCivil']."'
        ,'".$datos['redSocial']."'
        ,'".$datosA['CURP']."'
        ,'".$datosP['RFC']."')";
        $resultado=mysqli_query($conexion,$insertar);
    }
    if($resultado && $resultadoo && $resultadooo){
        echo "<script> alert('se a registrado con exito'); window.location='/test/base-de-datos-escuela/agregarMaestro/maestros.php'</script>";
    }else{
        echo "<script> alert('no se registro');</script>";
    }
?>