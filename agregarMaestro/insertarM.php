<?php
    include '../includes/conexion-BD.php';
    session_start();
    $insert = true;
    $datos = $mDatos->get_maestrosDatos();
    $datosP=$mDP->get_datospersonales();
    $datosA=$mDA->get_datosadministracion();
    $_SESSION['maestroDatos'] = $mDatos->get_maestrosDatos();
    $_SESSION['datosPersonales'] = $mDP->get_datospersonales();
    $_SESSION['datosAdministracion'] = $mDA->get_datosadministracion();
    foreach ($datos as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            header("Location: ./campoV.php");
            exit;
            break;
        }
    }
    foreach ($datosP as $key2 => $value2) {
        if (empty($value2)) {
            $insert = false;
            echo "<script>alert('El campo $key2 está vacío');</script>";
            header("Location: ./campoV.php");
            break;
        }
    }
    foreach ($datosA as $key1 => $value1) {
        if (empty($value1)) {
            $insert = false;
            echo "<script>alert('El campo $key1 está vacío');</script>";
            header("Location: ./campoV.php");
            break; 
        }
    }
    if($insert){
/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/
        $insertarprof= "INSERT INTO DatosPersonales (RFC,categoria,EstadoCategoria,AñosServico,AñosServicoEnFuncion,preparacionPersonal,ClaevServidor,FechaIngreso,NumeroPlaza,fechaIngresoFuncionActual,CodigoPuesto,PreparacionProfecional)
        values ('".strtoupper($datosP['RFC'])."'
        ,'".$datosP['Categoria']."'
        ,'".$datosP['EstadCategoria']."'
        ,'".$datosP['AnosS']."'
        ,'".$datosP['AnosSerFUnciona']."'
        ,'".$datosP['PreparaciónPa']."'
        ,'".$datosP['ClaveS']."'
        ,'".date("Y-m-d", strtotime($datosP['FechaINgreso']))."'
        ,'".$datosP['NumeroPa']."'
        ,'".date("Y-m-d", strtotime($datosP['FechaFuncionActual']))."'
        ,'".$datosP['CoddigoPuesto']."'
        ,'".$datosP['PreparacionPro']."')";
        $resultadooo=mysqli_query($conexion,$insertarprof);
        /**********base datos datosadministracion***************/
        $insertaadmin = "INSERT INTO datosadministracion (CURP,CedeLugarAdminitracion,Domicilio,LocalidadColonia,MunicipioEscuela,C_C_T,Telefono,CorreoInstituto)
        values ('".strtoupper($datosA['CURP'])."'
        ,'".$datosA['SedeLugarAD']."'
        ,'".$datosA['Domicilio']."'
        ,'".$datosA['LocalidadColonia']."'
        ,'".$datosA['MunicipioEscuela']."'
        ,'".$datosA['CCT']."'
        ,'".$datosA['Telefono']."'
        ,'".$datosA['EmailInstituto']."')";
        $resultadoo=mysqli_query($conexion,$insertaadmin);
        $insertar= "INSERT INTO profesor (nomina,nombre,apellidoP,apellidoM,localidadOcolonia,Direccion,municipio,CP,telefonoPersonal,telefonoCasa,correoElectronico,edad,sexo,EstadoCivil,redSocial,CURP,RFC) 
        values ('".$datos['nomina']."'
        ,'".ucfirst(strtolower($datos['nombre']))."'
        ,'".ucfirst(strtolower($datos['apellidoP']))."'
        ,'".ucfirst(strtolower($datos['apellidoM']))."'
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
        ,'".strtoupper($datosA['CURP'])."'
        ,'".strtoupper($datosP['RFC'])."')";
        $resultado=mysqli_query($conexion,$insertar);
    }
    $eliminaNoInsercion;
    if($resultadooo){
        if($resultadoo){
            if($resultado){
                echo "<script> alert('se a registrado con exito'); window.location='/base-de-datos-escuela/agregarMaestro/maestros.php'</script>";
            }else{
                $eliminaNoInsercion="DELETE from datosadministracion WHERE CURP='".$datosA['CURP']."'";
                $eliminaNoInsercion2="DELETE from DatosPersonales WHERE RFC='".$datosP['RFC']."'";
                $ELIMINA=mysqli_query($conexion,$eliminaNoInsercion);
                $ELIMINA2=mysqli_query($conexion,$eliminaNoInsercion2);
                echo "<script> alert('profesor no se registro'); window.location='/base-de-datos-escuela/agregarMaestro/maestros.php'</script>";
            }
        }else{
            $eliminaNoInsercion="DELETE FROM DatosPersonales WHERE RFC='".$datosP['RFC']."'";
            $ELIMINA=mysqli_query($conexion,$eliminaNoInsercion);
            echo mysqli_errno($conexion) . ": " . mysqli_error($conexion). "\n";
        }   
    }else{
        echo mysqli_errno($conexion) . ": " . mysqli_error($conexion). "\n";
        echo $insertarprof. "<br>".$insertaadmin. "<br>". $insertar;
        
    }
?>