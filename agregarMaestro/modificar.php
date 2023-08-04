<?php
include '../includes/conexion-BD.php';
$datos = $mDatos->get_maestrosDatos();
$datosP=$mDP->get_datospersonales();
$datosA=$mDA->get_datosadministracion();
/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/

        $cons="Modifico";
        $insertarprof=" 
        datospersonales.categoria='".$datosP['RFC']."'
        ,datospersonales.categoria='".$datosP['Categoria']."'
        ,datospersonales.EstadoCategoria='".$datosP['EstadCategoria']."'
        ,datospersonales.AñosServico='".$datosP['AnosS']."'
        ,datospersonales.AñosServicoEnFuncion='".$datosP['AnosSerFUnciona']."'
        ,datospersonales.preparacionPersonal='".$datosP['PreparaciónPa']."'
        ,datospersonales.ClaevServidor='".$datosP['ClaveS']."'
        ,datospersonales.FechaIngreso='".date("Y-m-d", strtotime($datosP['FechaINgreso']))."'
        ,datospersonales.NumeroPlaza='".$datosP['NumeroPa']."'
        ,datospersonales.fechaIngresoFuncionActual='".date("Y-m-d", strtotime($datosP['FechaFuncionActual']))."'
        ,datospersonales.CodigoPuesto='".$datosP['CoddigoPuesto']."'
        ,datospersonales.PreparacionProfecional='".$datosP['PreparacionPro']."' ";
        
        $insertaadmin=" 
        ,datosadministracion.CedeLugarAdminitracion='".$datosA['CURP']."'
        ,datosadministracion.CedeLugarAdminitracion='".$datosA['SedeLugarAD']."'
        ,datosadministracion.Domicilio='".$datosA['Domicilio']."'
        ,datosadministracion.LocalidadColonia='".$datosA['LocalidadColonia']."'
        ,datosadministracion.MunicipioEscuela='".$datosA['MunicipioEscuela']."'
        ,datosadministracion.C_C_T='".$datosA['CCT']."'
        ,datosadministracion.Telefono='".$datosA['Telefono']."'
        ,datosadministracion.CorreoInstituto='".$datosA['EmailInstituto']."'";
        
        $insertar="
        ,profesor.nomina='".$datos['nomina']."'
        ,profesor.nombre='".ucfirst(strtolower($datos['nombre']))."'
        ,profesor.apellidoP='".ucfirst(strtolower($datos['apellidoP']))."'
        ,profesor.apellidoM='".ucfirst(strtolower($datos['apellidoM']))."'
        ,profesor.localidadOcolonia='".$datos['localidadOcolonia']."'
        ,profesor.Direccion='".$datos['Direccion']."'
        ,profesor.municipio='".$datos['municipio']."'
        ,profesor.CP='".$datos['CP']."'
        ,profesor.telefonoPersonal='".$datos['telefonoPersonal']."'
        ,profesor.telefonoCasa='".$datos['telefonoCasa']."'
        ,profesor.correoElectronico='".$datos['correoElectronico']."'
        ,profesor.edad='".$datos['edad']."'
        ,profesor.sexo='".$datos['sexo']."'
        ,profesor.EstadoCivil='".$datos['EstadoCivil']."'
        ,profesor.redSocial ='".$datos['redSocial']."'
        ,datosadministracion.CedeLugarAdminitracion='".$datosA['CURP']."'
        ,datospersonales.categoria='".$datosP['RFC']."'
        ";
        $queryUpdate="UPDATE profesor
        inner JOIN datosadministracion on profesor.CURP=datosadministracion.CURP
        inner JOIN datospersonales on profesor.RFC=datospersonales.RFC
        set ".$insertarprof.$insertaadmin.$insertar." WHERE datospersonales.RFC='".$datosP['RFC']."'";
    $resultado=mysqli_query($conexion,$queryUpdate);
    if($resultado){
        echo "<script> alert(' se Modifico con exito'); window.location='/test/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }
?> 