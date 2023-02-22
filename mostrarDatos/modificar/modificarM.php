<?php
    include '../includes/conexion-BD.php';
        #a qui comienza datos profecionales 
    $maestrosDatos = array(
         'nomina'=> (!empty($_POST['nomina'])) ? $_POST['nomina'] : "",
         'nombre'=> (!empty(ucwords($_POST['nombre']))) ? $_POST['nombre'] : "",
         'apellidoP'=> (!empty(ucwords($_POST['apellidoP']))) ? $_POST['apellidoP'] : "",
         'apellidoM'=> (!empty(ucwords($_POST['apellidoM']))) ? $_POST['apellidoM'] : "",
         'localidadOcolonia'=> (!empty($_POST['localidad'])) ? $_POST['localidad'] : "",
         'Direccion'=> (!empty(ucwords($_POST['direccion']))) ? $_POST['direccion'] : "",
         'municipio'=> (!empty($_POST['municipioDocente'])) ? $_POST['municipioDocente'] : "",
         'CP'=> (!empty($_POST['CP'])) ? $_POST['CP'] : "",
         'telefonoPersonal'=> (!empty($_POST['telCasa'])) ? $_POST['telCasa'] : "",
         'telefonoCasa'=> (!empty($_POST['telCel'])) ? $_POST['telCel'] : "",
         'correoElectronico'=> (!empty($_POST['emailpersonal'])) ? $_POST['emailpersonal'] : "",
         'edad'=> (!empty($_POST['edad'])) ? $_POST['edad'] : "",
         'EstadoCivil'=> (!empty($_POST['estadoC'])) ? $_POST['estadoC'] : "",
         'redSocial'=> (!empty($_POST['RedSocial'])) ? $_POST['RedSocial'] : ""
    );
    $datospersonales= array(
        'RFC'=>  (strtoupper(!empty($_POST['RFC']))) ? $_POST['RFC'] : "",
        'Categoria'=>  (!empty($_POST['CategoriaProfesor'])) ? $_POST['CategoriaProfesor'] : "",
        'EstadCategoria'=>  (!empty($_POST['EstadCategoria'])) ? $_POST['EstadCategoria'] : "",
        'AnosS'=>  (!empty($_POST['AnosS'])) ? $_POST['AnosS'] : "",
        
        'PreparaciónPa'=>  (!empty($_POST['PreparaciónP'])) ? $_POST['PreparaciónP'] : "",
        'ClaveS'=>  (!empty($_POST['ClaveS'])) ? $_POST['ClaveS'] : "",
        'FechaINgreso'=>  (!empty($_POST['FechaINgreso'])) ? $_POST['FechaINgreso'] : "",
        'NumeroPa'=>  (!empty($_POST['NumeroP'])) ? $_POST['NumeroP'] : "",
        'FechaFuncionA'=>  (!empty($_POST['FechaFuncionA'])) ? $_POST['FechaFuncionA'] : "",
        'CoddigoPuesto'=>  (!empty($_POST['CoddigoPuesto'])) ? $_POST['CoddigoPuesto'] : "",
        'AnosSerFUnciona'=>  (!empty($_POST['AnosSerFUncion'])) ? $_POST['AnosSerFUncion'] : "",
        'PreparacionPro'=> (!empty($_POST['PreparacionPro'])) ? $_POST['PreparacionPro'] : ""
    );

    $datosadministracion = array(
        'CURP'=> strtoupper((!empty($_POST['CURP']))) ? $_POST['CURP'] : "",
        'SedeLugarAD'=> (!empty($_POST['SedeLugarAD'])) ? $_POST['SedeLugarAD'] : "",
        'Domicilio'=> (!empty($_POST['Domicilio'])) ? $_POST['Domicilio'] : "",
        'LocalidadColonia'=> (!empty($_POST['LocalidadColonia'])) ? $_POST['LocalidadColonia'] : "",
        'MunicipioEscuela'=> (!empty($_POST['MunicipioEscuela'])) ? $_POST['MunicipioEscuela'] : "",
        'CCT'=> (!empty($_POST['CCT'])) ? $_POST['CCT'] : "",
        'Telefono'=> (!empty($_POST['Telefono'])) ? $_POST['Telefono'] : "",
        'EmailInstituto'=> (!empty($_POST['emailInstituto'])) ? $_POST['emailInstituto'] : ""
    );
    $insert = true;
    if($insert){
/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/
        $insertarprof="INSERT INTO DatosPersonales (RFC,categoria,EstadoCategoria,AñosServico,AñosServicoEnFuncion,preparacionPersonal,ClaevServidor,FechaIngreso,NumeroPlaza,fechaIngresoFuncionActual,CodigoPuesto,PreparacionProfecional)
        values ('".$datospersonales['RFC']."'
        ,'".$datospersonales['Categoria']."'
        ,'".$datospersonales['EstadCategoria']."'
        ,'".$datospersonales['AnosS']."'
        ,'".$datospersonales['AnosSerFUnciona']."'
        ,'".$datospersonales['PreparaciónPa']."'
        ,'".$datospersonales['ClaveS']."'
        ,'".$datospersonales['FechaINgreso']."'
        ,'".$datospersonales['NumeroPa']."'
        ,'".$datospersonales['FechaFuncionA']."'
        ,'".$datospersonales['CoddigoPuesto']."'
        ,'".$datospersonales['PreparacionPro']."')";
        $resultadoo=mysqli_query($conexion,$insertarprof);
        /**********base datos datosadministracion***************/
        $insertaadmin="INSERT INTO datosadministracion (CURP,CedeLugarAdminitracion,Domicilio,LocalidadColonia,MunicipioEscuela,C_C_T,Telefono,CorreoInstituto)
        values ('".$datosadministracion['CURP']."'
        ,'".$datosadministracion['SedeLugarAD']."'
        ,'".$datosadministracion['Domicilio']."'
        ,'".$datosadministracion['LocalidadColonia']."'
        ,'".$datosadministracion['MunicipioEscuela']."'
        ,'".$datosadministracion['CCT']."'
        ,'".$datosadministracion['Telefono']."'
        ,'".$datosadministracion['EmailInstituto']."')";
        $resultadooo=mysqli_query($conexion,$insertaadmin);
        $insertar="INSERT INTO profesor (nomina,nombre,apellidoP,apellidoM,localidadOcolonia,Direccion,municipio,CP,telefonoPersonal,telefonoCasa,correoElectronico,edad,EstadoCivil,redSocial,CURP,RFC) 
        values ('".$maestrosDatos['nomina']."'
        ,'".$maestrosDatos['nombre']."'
        ,'".$maestrosDatos['apellidoP']."'
        ,'".$maestrosDatos['apellidoM']."'
        ,'".$maestrosDatos['localidadOcolonia']."'
        ,'".$maestrosDatos['Direccion']."'
        ,'".$maestrosDatos['municipio']."'
        ,'".$maestrosDatos['CP']."'
        ,'".$maestrosDatos['telefonoPersonal']."'
        ,'".$maestrosDatos['telefonoCasa']."'
        ,'".$maestrosDatos['correoElectronico']."'
        ,'".$maestrosDatos['edad']."'
        ,'".$maestrosDatos['EstadoCivil']."'
        ,'".$maestrosDatos['redSocial']."'
        ,'".$datosadministracion['CURP']."'
        ,'".$datospersonales['RFC']."')";
        $resultado=mysqli_query($conexion,$insertar);
    }
    if($resultado){
        echo "<script> alert('se a registrado con exito'); window.location='/escuela/agregarMaestro/maestros.php'</script>";
    }else{
        echo "<script> alert('no se registro'); window.location='/escuela/agregarMaestro/maestros.php'</script>";
        echo mysqli_errno($conexion) . ": " . mysqli_error($conexion). "\n";
    }
?> 