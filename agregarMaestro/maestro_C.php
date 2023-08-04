<?php
session_start();
    class maestros {
        public $accion; 
        public $maestrosDatos;
        public $datospersonales;
        public $datosadministracion;
        
        function set_maestrosDatos($maestrosDatos) {
            $this->maestrosDatos = $maestrosDatos;
        }
        function get_maestrosDatos() {
            return $this->maestrosDatos;
        }

        function set_datospersonales($datospersonales) {
            $this->datospersonales = $datospersonales;
        }
        function get_datospersonales() {
            return $this->datospersonales;
        }

        function set_datosadministracion($datosadministracion) {
            $this->datosadministracion = $datosadministracion;
        }
        function get_datosadministracion() {
            return $this->datosadministracion;
        }
        
        function set_accion($accion) {
            $this->accion = $accion;
        }
        function get_accion() {
            return $this->accion;
        }
    } 
    $mDatos= new maestros;
    $mDatos->set_maestrosDatos(
        array(
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
            'sexo'=> (!empty($_POST['sexo'])) ? $_POST['sexo'] : "",
            'EstadoCivil'=> (!empty($_POST['estadoC'])) ? $_POST['estadoC'] : "",
            'redSocial'=> (!empty($_POST['RedSocial'])) ? $_POST['RedSocial'] : ""
        )
    );
    $mDP = new maestros;
    $mDP->set_datospersonales(
        array(
            'RFC'=>  (strtoupper(!empty($_POST['RFC']))) ? $_POST['RFC'] : "",
            'Categoria'=>  (!empty($_POST['CategoriaProfesor'])) ? $_POST['CategoriaProfesor'] : "",
            'EstadCategoria'=>  (!empty($_POST['EstadCategoria'])) ? $_POST['EstadCategoria'] : "",
            'AnosS'=>  (!empty($_POST['AnosS'])) ? $_POST['AnosS'] : "",
            'PreparaciónPa'=>  (!empty($_POST['PreparaciónP'])) ? $_POST['PreparaciónP'] : "",
            'ClaveS'=>  (!empty($_POST['ClaveS'])) ? $_POST['ClaveS'] : "",
            'FechaINgreso'=>  (!empty($_POST['FechaINgreso'])) ? $_POST['FechaINgreso'] : "",
            'NumeroPa'=>  (!empty($_POST['NumeroP'])) ? $_POST['NumeroP'] : "",
            'FechaFuncionActual'=>  (!empty($_POST['FechaFuncionActual'])) ? $_POST['FechaFuncionActual'] : "",
            'CoddigoPuesto'=>  (!empty($_POST['CoddigoPuesto'])) ? $_POST['CoddigoPuesto'] : "",
            'AnosSerFUnciona'=>  (!empty($_POST['AnosSerFUncion'])) ? $_POST['AnosSerFUncion'] : "",
            'PreparacionPro'=> (!empty($_POST['PreparacionPro'])) ? $_POST['PreparacionPro'] : ""
        )
    );
    $mDA = new maestros;
    $mDA->set_datosadministracion(
        $datosadministracion = array(
            'CURP'=> strtoupper((!empty($_POST['CURP']))) ? $_POST['CURP'] : "",
            'SedeLugarAD'=> (!empty($_POST['SedeLugarAD'])) ? $_POST['SedeLugarAD'] : "",
            'Domicilio'=> (!empty($_POST['Domicilio'])) ? $_POST['Domicilio'] : "",
            'LocalidadColonia'=> (!empty($_POST['LocalidadColonia'])) ? $_POST['LocalidadColonia'] : "",
            'MunicipioEscuela'=> (!empty($_POST['MunicipioEscuela'])) ? $_POST['MunicipioEscuela'] : "",
            'CCT'=> (!empty($_POST['CCT'])) ? $_POST['CCT'] : "",
            'Telefono'=> (!empty($_POST['Telefono'])) ? $_POST['Telefono'] : "",
            'EmailInstituto'=> (!empty($_POST['emailInstituto'])) ? $_POST['emailInstituto'] : ""
        )
    ); 
    $accionR= new maestros;
    $accionR->set_accion($_POST['acction']);
    $consulta=$accionR->get_accion();
    if($consulta=="Guardar Datos"){
        include_once 'insertarM.php';
    }
    if($consulta=="Modificar Datos"){
        include_once 'modificar.php';
    }
    if($consulta=="Eliminar Datos"){
        include_once 'eliminar.php';
    }
    if($consulta=="PDF"){
        $_SESSION['maestroDatos'] = $mDatos->get_maestrosDatos();
        $_SESSION['datosPersonales'] = $mDP->get_datospersonales();
        $_SESSION['datosAdministracion'] = $mDA->get_datosadministracion();
        header("Location: ../pdf/pdfma.php");
        exit;
    }
?>