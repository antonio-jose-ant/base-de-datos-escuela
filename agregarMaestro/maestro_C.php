<?php
session_start(); 
    class maestros {
        public $accion; 
        public $maestrosDatos;
        public $datosProfecionales;
        public $datosLaborales;
        public $modificado;
        function set_maestrosDatos($maestrosDatos) {
            $this->maestrosDatos = $maestrosDatos;
        }
        function get_maestrosDatos() {
            return $this->maestrosDatos;
        }
        function set_datosProfecionales($datosProfecionales) {
            $this->datosProfecionales = $datosProfecionales;
        }
        function get_datosProfecionales() {
            return $this->datosProfecionales;
        }

        function set_datosLaborales($datosLaborales) {
            $this->datosLaborales = $datosLaborales;
        }
        function get_datosLaborales() {
            return $this->datosLaborales;
        }
        
        function set_accion($accion) {
            $this->accion = $accion;
        }
        function get_accion() {
            return $this->accion;
        }
        function set_modificado($modificado) {
            $this->modificado = $modificado;
        }
        function get_modificado() {
            return $this->modificado;
        }
    } 
    $mDatos= new maestros;
    $mDatos->set_maestrosDatos(
        array(
            'nomina'=> (!empty($_POST['nomina'])) ? $_POST['nomina'] : "",
            'nombre'=> (!empty(ucwords($_POST['nombre']))) ? $_POST['nombre'] : "",
            'apellidoP'=> (!empty(ucwords($_POST['apellidoP']))) ? $_POST['apellidoP'] : "",
            'apellidoM'=> (!empty(ucwords($_POST['apellidoM']))) ? $_POST['apellidoM'] : "",
            'ColoniaFracc'=> (!empty($_POST['ColoniaFracc'])) ? $_POST['ColoniaFracc'] : "",
            'Direccion'=> (!empty(ucwords($_POST['direccion']))) ? $_POST['direccion'] : "",
            'Ciudad'=> (!empty(ucwords($_POST['Ciudad']))) ? $_POST['Ciudad'] : "",
            'no_int'=> (!empty($_POST['no_int'])) ? $_POST['no_int'] : "",
            'no_ext'=> (!empty($_POST['no_ext'])) ? $_POST['no_ext'] : "S/N",
            'municipio'=> (!empty($_POST['municipioDocente'])) ? $_POST['municipioDocente'] : "",
            'CP'=> (!empty($_POST['CP'])) ? $_POST['CP'] : "",
            'localidadProfesor'=> (!empty($_POST['localidadProfesor'])) ? $_POST['localidadProfesor'] : "",
            'gradoMEstudio'=> (!empty($_POST['gradoMEstudio'])) ? $_POST['gradoMEstudio'] : "",
            'telefonoPersonal'=> (!empty($_POST['telCasa'])) ? $_POST['telCasa'] : "",
            'telefonoCasa'=> (!empty($_POST['telCel'])) ? $_POST['telCel'] : "",
            'correoElectronico'=> (!empty($_POST['emailpersonal'])) ? $_POST['emailpersonal'] : "",
            'edad'=> (!empty($_POST['edad'])) ? $_POST['edad'] : "",
            'sexo'=> (!empty($_POST['sexo'])) ? $_POST['sexo'] : "",
            'Lugar_De_Nacimiento'=> (!empty($_POST['Lugar_De_Nacimiento'])) ? $_POST['Lugar_De_Nacimiento'] : "",
            'EstadoCivil'=> (!empty($_POST['estadoC'])) ? $_POST['estadoC'] : "",
            'pareja'=> (!empty($_POST['pareja'])) ? $_POST['pareja'] : "----",
            'redSocial'=> (!empty($_POST['RedSocial'])) ? $_POST['RedSocial'] : ""
        )
    );
    $mDP = new maestros; 
    $mDP->set_datosProfecionales(
        array(
            'RFC'=>  (strtoupper(!empty($_POST['RFC']))) ? $_POST['RFC'] : "",
            'Preparacion_Profecional'=>(!empty($_POST['Preparacion_Profecional'])) ? $_POST['Preparacion_Profecional'] : "",
            'Titulado'=>(!empty($_POST['Titulado'])) ? $_POST['Titulado'] : "",
            'Escuela_Procedencia'=>(!empty($_POST['Escuela_Procedencia'])) ? $_POST['Escuela_Procedencia'] : "",
            'No_Cédula_Profecional'=>(!empty($_POST['No_Cédula_Profecional'])) ? $_POST['No_Cédula_Profecional'] : "",
            'Posgrado'=>(!empty($_POST['Posgrado'])) ? $_POST['Posgrado'] : "",
            'Grado_Obtenido'=>(!empty($_POST['Grado_Obtenido'])) ? $_POST['Grado_Obtenido'] : "",
            'Incorporacion_Carrera_Magistral'=>(!empty($_POST['Incorporacion_Carrera_Magistral'])) ? $_POST['Incorporacion_Carrera_Magistral'] : "",
            'Fecha_Dictamen'=>(!empty($_POST['Fecha_Dictamen'])) ? $_POST['Fecha_Dictamen'] : "",
            'Numero_Dicatamen'=>(!empty($_POST['Numero_Dicatamen'])) ? $_POST['Numero_Dicatamen'] : "",
            'Nivel_Variante'=>(!empty($_POST['Nivel_Variante'])) ? $_POST['Nivel_Variante'] : "",
            'Otros_Estudios'=>(!empty($_POST['Otros_Estudios'])) ? $_POST['Otros_Estudios'] : ""

            )
    );
    $mDA = new maestros; 
    $mDA->set_datosLaborales(
        array(        
            'CURP' => strtoupper((!empty($_POST['CURP']))) ? $_POST['CURP'] : "",
            'Nombre_Dependencia' =>(!empty($_POST['Nombre_Dependencia'])) ? $_POST['Nombre_Dependencia'] : "",
            'CCT' =>(!empty($_POST['CCT'])) ? $_POST['CCT'] : "",
            'Domicilio_Particular' =>(!empty($_POST['Domicilio_Particular'])) ? $_POST['Domicilio_Particular'] : "",
            'No_Int' =>(!empty($_POST['No_Int'])) ? $_POST['No_Int'] : "",
            'Colonia_Fracc' =>(!empty($_POST['Colonia_Fracc'])) ? $_POST['Colonia_Fracc'] : "",
            'Ciudad_laboral' =>(!empty($_POST['Ciudad_laboral'])) ? $_POST['Ciudad_laboral'] : "",
            'Localidad_laboral' =>(!empty($_POST['Localidad_laboral'])) ? $_POST['Localidad_laboral'] : "",
            'Municipio_laboral' =>(!empty($_POST['Municipio_laboral'])) ? $_POST['Municipio_laboral'] : "",
            'CP_laboral' =>(!empty($_POST['CP_laboral'])) ? $_POST['CP_laboral'] : "",
            'TEL_Celular_laboral' =>(!empty($_POST['TEL_Celular_laboral'])) ? $_POST['TEL_Celular_laboral'] : "",
            'Fecha_Ingreso_GEM' =>(!empty($_POST['Fecha_Ingreso_GEM'])) ? $_POST['Fecha_Ingreso_GEM'] : "",
            'Numero_Prelación' =>(!empty($_POST['Numero_Prelación'])) ? $_POST['Numero_Prelación'] : "",
            'Antiguedad' =>(!empty($_POST['Antiguedad'])) ? $_POST['Antiguedad'] : "",
            'Puesto_Profeciona' =>(!empty($_POST['Puesto_Profeciona'])) ? $_POST['Puesto_Profeciona'] : "",
            'Categoria_TalonCheque' =>(!empty($_POST['Categoria_TalonCheque'])) ? $_POST['Categoria_TalonCheque'] : "",
            'Estado_Categoria' =>(!empty($_POST['Estado_Categoria'])) ? $_POST['Estado_Categoria'] : "",
            'Plaza_Principal' =>(!empty($_POST['Plaza_Principal'])) ? $_POST['Plaza_Principal'] : "",
            'Plaza_Secundaria' =>(!empty($_POST['Plaza_Secundaria'])) ? $_POST['Plaza_Secundaria'] : "",
            'Clave_S_Plublico' =>(!empty($_POST['Clave_S_Plublico'])) ? $_POST['Clave_S_Plublico'] : "",
            'H_Lt1'=>(!empty($_POST['H_Lt1'])) ? $_POST['H_Lt1'] : "",
            'H_Lt1_12'=>(!empty($_POST['H_Lt1_12'])) ? $_POST['H_Lt1_12'] : "",
            'CCT_S_Plaza'=>(!empty($_POST['CCT_S_Plaza'])) ? $_POST['CCT_S_Plaza'] : "",
            'H_Lt2'=>(!empty($_POST['H_Lt2'])) ? $_POST['H_Lt2'] : "",
            'H_Lt2_2'=>(!empty($_POST['H_Lt2_2'])) ? $_POST['H_Lt2_2'] : ""
        )
    ); 
    $modificados= new maestros;
    $modificados->set_modificado(
        array(
            'RFCM'=>$_POST['RFCM'],
            'CURPM'=>$_POST['CURPM']
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
        $_SESSION['datosProfecionales'] = $mDP->get_datosProfecionales();
        $_SESSION['datosLaborales'] = $mDA->get_datosLaborales();
        header("Location: ../pdf/pdfma.php");
        exit;
    }
?> 