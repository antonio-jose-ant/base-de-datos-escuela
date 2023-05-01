<?php
    include '../../includes/conexion-BD.php';
        #a qui comienza datos profecionales 
    $queryUpdate=" ";
    class profesoresDatos{
        public  $maestrospdf = array();
        public function guardarDatos($datos) {
            $this->maestrospdf[] = $datos;
        }
    }
    $maestro = new profesoresDatos();

    $maestro->guardarDatos(array(
        'nomina' => (!empty($_POST['nomina'])) ? $_POST['nomina'] : "",
        'CURP' => (!empty($_POST['CURP'])) ? $_POST['CURP'] : "",
        'RFC' => (!empty($_POST['RFC'])) ? $_POST['RFC'] : ""
    ));
    $nomina = $maestro->maestrospdf[0]['nomina'];
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
        'RFC'=>  (!empty($_POST['RFC'])) ? $_POST['RFC'] : "",
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
        'CURP'=> (!empty($_POST['CURP'])) ? $_POST['CURP'] : "",
        'SedeLugarAD'=> (!empty($_POST['SedeLugarAD'])) ? $_POST['SedeLugarAD'] : "",
        'Domicilio'=> (!empty($_POST['Domicilio'])) ? $_POST['Domicilio'] : "",
        'LocalidadColonia'=> (!empty($_POST['LocalidadColonia'])) ? $_POST['LocalidadColonia'] : "",
        'MunicipioEscuela'=> (!empty($_POST['MunicipioEscuela'])) ? $_POST['MunicipioEscuela'] : "",
        'CCT'=> (!empty($_POST['CCT'])) ? $_POST['CCT'] : "",
        'Telefono'=> (!empty($_POST['Telefono'])) ? $_POST['Telefono'] : "",
        'EmailInstituto'=> (!empty($_POST['emailInstituto'])) ? $_POST['emailInstituto'] : ""
    );

/******************base datos maestrosDatos***********************/
        /******************base datos datospersonales***********************/
    if(isset($_POST['Modificar'])){
        $cons="Modifico";
        $insertarprof=" 
        datospersonales.categoria='".$datospersonales['RFC']."'
        ,datospersonales.categoria='".$datospersonales['Categoria']."'
        ,datospersonales.EstadoCategoria='".$datospersonales['EstadCategoria']."'
        ,datospersonales.AñosServico='".$datospersonales['AnosS']."'
        ,datospersonales.AñosServicoEnFuncion='".$datospersonales['AnosSerFUnciona']."'
        ,datospersonales.preparacionPersonal='".$datospersonales['PreparaciónPa']."'
        ,datospersonales.ClaevServidor='".$datospersonales['ClaveS']."'
        ,datospersonales.FechaIngreso='".$datospersonales['FechaINgreso']."'
        ,datospersonales.NumeroPlaza='".$datospersonales['NumeroPa']."'
        ,datospersonales.fechaIngresoFuncionActual='".$datospersonales['FechaFuncionA']."'
        ,datospersonales.CodigoPuesto='".$datospersonales['CoddigoPuesto']."'
        ,datospersonales.PreparacionProfecional='".$datospersonales['PreparacionPro']."' ";
        
        $insertaadmin=" 
        ,datosadministracion.CedeLugarAdminitracion='".$datosadministracion['CURP']."'
        ,datosadministracion.CedeLugarAdminitracion='".$datosadministracion['SedeLugarAD']."'
        ,datosadministracion.Domicilio='".$datosadministracion['Domicilio']."'
        ,datosadministracion.LocalidadColonia='".$datosadministracion['LocalidadColonia']."'
        ,datosadministracion.MunicipioEscuela='".$datosadministracion['MunicipioEscuela']."'
        ,datosadministracion.C_C_T='".$datosadministracion['CCT']."'
        ,datosadministracion.Telefono='".$datosadministracion['Telefono']."'
        ,datosadministracion.CorreoInstituto='".$datosadministracion['EmailInstituto']."'";
        
        $insertar="
        ,profesor.nomina='".$maestrosDatos['nomina']."'
        ,profesor.nombre='".$maestrosDatos['nombre']."'
        ,profesor.apellidoP='".$maestrosDatos['apellidoP']."'
        ,profesor.apellidoM='".$maestrosDatos['apellidoM']."'
        ,profesor.localidadOcolonia='".$maestrosDatos['localidadOcolonia']."'
        ,profesor.Direccion='".$maestrosDatos['Direccion']."'
        ,profesor.municipio='".$maestrosDatos['municipio']."'
        ,profesor.CP='".$maestrosDatos['CP']."'
        ,profesor.telefonoPersonal='".$maestrosDatos['telefonoPersonal']."'
        ,profesor.telefonoCasa='".$maestrosDatos['telefonoCasa']."'
        ,profesor.correoElectronico='".$maestrosDatos['correoElectronico']."'
        ,profesor.edad='".$maestrosDatos['edad']."'
        ,profesor.EstadoCivil='".$maestrosDatos['EstadoCivil']."'
        ,profesor.redSocial ='".$maestrosDatos['redSocial']."'
        ,datosadministracion.CedeLugarAdminitracion='".$datosadministracion['CURP']."'
        ,datospersonales.categoria='".$datospersonales['RFC']."'
        ";
        $queryUpdate="UPDATE profesor
        inner JOIN datosadministracion on profesor.CURP=datosadministracion.CURP
        inner JOIN datospersonales on profesor.RFC=datospersonales.RFC
        set ".$insertarprof.$insertaadmin.$insertar." WHERE datospersonales.RFC='".$datospersonales['RFC']."'";
    }elseif(isset($_POST['Eliminar'])) {
        $cons="Elimino";
        $queryUpdate="DELETE profesor 
        FROM profesor 
        INNER JOIN datosadministracion ON profesor.CURP = datosadministracion.CURP 
        INNER JOIN datospersonales ON profesor.RFC = datospersonales.RFC 
        WHERE datospersonales.RFC = '".$datospersonales['RFC']."'";
    }elseif(isset($_POST['PDF'])) {
        header("Location: ../../pdf/pdfma.php");
        exit();
    }
    $resultado=mysqli_query($conexion,$queryUpdate);
    if($resultado){
        echo "<script> alert(' se ".$cons." con exito'); window.location='/test/base-de-datos-escuela/mostrarDatos/mosrarprofeor.php';</script>";
    }
?> 