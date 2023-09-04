<?php
session_start();
    class alumnos{ 
        public $accionA; 
        public $alumnoDatos;
        public $datosGeneralesA;
        public $datosMedicosA;
        public $DomicilioA;
        public $tutor1A;
        public $tutor2A;
        /****************Datos Alumno********************/
        function set_alumnoDatos($alumnoDatos) {
            $this->alumnoDatos = $alumnoDatos;
        }
        function get_alumnoDatos() {
            return $this->alumnoDatos;
        }
        /****************Datos Generales********************/
        function set_datosGeneralesA($datosGeneralesA) {
            $this->datosGeneralesA = $datosGeneralesA;
        }
        function get_datosGeneralesA() {
            return $this->datosGeneralesA;
        }
        /****************Datos Medicos********************/
        function set_datosMedicosA($datosMedicosA) {
            $this->datosMedicosA = $datosMedicosA;
        }
        function get_datosMedicosA() {
            return $this->datosMedicosA;
        }
        /****************Domicilio********************/
        function set_DomicilioA($DomicilioA) {
            $this->DomicilioA = $DomicilioA;
        }
        function get_DomicilioA() {
            return $this->DomicilioA;
        }
        /****************Tutor 1********************/
        function set_tutor1A($tutor1A) {
            $this->tutor1A = $tutor1A;
        }
        function get_tutor1A() {
            return $this->tutor1A;
        }
        /****************tutor 2********************/
        function set_tutor2A($tutor2A) {
            $this->tutor2A = $tutor2A;
        }
        function get_tutor2A() {
            return $this->tutor2A;
        }
        function set_accionA($accionA) {
            $this->accionA = $accionA;
        }
        function get_accionA() {
            return $this->accionA;
        }
    }
    $Datos_Alumno = new alumnos;
    $Datos_Alumno ->set_alumnoDatos (
        array(  
            'matricula'=>strtoupper(substr($_POST['Nombre'],0,3).substr($_POST['ApeidoP'],0,2).substr($_POST['ApeidoM'],0,2).substr($_POST['Grado'],0,1).substr($_POST['Grupo'],0,1).substr($_POST['Turno'],0,1).substr($_POST['CURP'],-2)),
            'Nombre'=>(!empty($_POST['Nombre'])) ? $_POST['Nombre'] : "",
            'ApeidoP'=>(!empty($_POST['ApeidoP'])) ? $_POST['ApeidoP'] : "",
            'ApeidoM'=>(!empty($_POST['ApeidoM'])) ? $_POST['ApeidoM'] : "",
            'Grado'=>(!empty($_POST['Grado'])) ? $_POST['Grado'] : "",
            'Grupo'=>(!empty($_POST['Grupo'])) ? $_POST['Grupo'] : "",
            'Turno'=>(!empty($_POST['Turno'])) ? $_POST['Turno'] : "",
            'CURP'=>(!empty($_POST['CURP'])) ? $_POST['CURP'] : "",
            'Fecha_n'=>(!empty($_POST['Fecha_n'])) ? $_POST['Fecha_n'] : "",
            'edad'=>(!empty($_POST['edad'])) ? $_POST['edad'] : "", 
            'CorreoAlu'=>(!empty($_POST['CorreoAlu'])) ? $_POST['CorreoAlu'] : ""
        )
    );
    $datos_medicos = new alumnos;
    $datos_medicos -> set_datosMedicosA(
        array( 
            'numEmergencia'=>(!empty($_POST['numEmergencia'])) ? $_POST['numEmergencia']:"",
            'Talla'=>(!empty($_POST['Talla'])) ? $_POST['Talla']:"",
            'peso'=>(!empty($_POST['peso'])) ? $_POST['peso']:"",
            'tipoSangre'=>(!empty($_POST['tipoSangre'])) ? $_POST['tipoSangre']:"",
            'alergia'=>(!empty($_POST['alergia'])) ? $_POST['alergia']:"",
            'padecimiento'=>(!empty($_POST['padecimiento'])) ? $_POST['padecimiento']:"",
            'piePlano'=>(!empty($_POST['piePlano'])) ? $_POST['piePlano']:"",
            'lentes'=>(!empty($_POST['lentes'])) ? $_POST['lentes']:""
        )
    ); 
    $tutor1 = new alumnos;
    $tutor1 ->set_tutor1A(
        array( 
            'CURPT1'=>(!empty($_POST['CURPT1'])) ? $_POST['CURPT1']:"",
            'nombreT1'=>(!empty($_POST['nombreT1'])) ? $_POST['nombreT1']:"",
            'apellidoPT1'=>(!empty($_POST['apellidoPT1'])) ? $_POST['apellidoPT1']:"",
            'apellidoMT1'=>(!empty($_POST['apellidoMT1'])) ? $_POST['apellidoMT1']:"",
            'edadT1'=>(!empty($_POST['edadT1'])) ? $_POST['edadT1']:"",
            'parentescoT1'=>(!empty($_POST['parentescoT1'])) ? $_POST['parentescoT1']:"",
            'Estado_civilT1'=>(!empty($_POST['Estado_civilT1'])) ? $_POST['Estado_civilT1']:"",
            'ocupacionT1'=>(!empty($_POST['ocupacionT1'])) ? $_POST['ocupacionT1']:"",
            'estudioT1'=>(!empty($_POST['estudioT1'])) ? $_POST['estudioT1']:""
        )
    );
    $tutor2 = new alumnos;
    $tutor2 ->set_tutor2A( 
        array( 
            'CURPT2'=>(!empty($_POST['CURPT2'])) ? $_POST['CURPT2']:"",
            'nombreT2'=>(!empty($_POST['nombreT2'])) ? $_POST['nombreT2']:"",
            'apellidoPT2'=>(!empty($_POST['apellidoPT2'])) ? $_POST['apellidoPT2']:"",
            'apellidoMT2'=>(!empty($_POST['apellidoMT2'])) ? $_POST['apellidoMT2']:"",
            'edadT2'=>(!empty($_POST['edadT2'])) ? $_POST['edadT2']:"",
            'parentescoT2'=>(!empty($_POST['parentescoT2'])) ? $_POST['parentescoT2']:"",
            'Estado_civilT2'=>(!empty($_POST['Estado_civilT2'])) ? $_POST['Estado_civilT2']:"",
            'ocupacionT2'=>(!empty($_POST['ocupacionT2'])) ? $_POST['ocupacionT2']:"",
            'estudioT2'=>(!empty($_POST['estudioT2'])) ? $_POST['estudioT2']:""
        )
    );
    
    $domicilio = new alumnos;
    $domicilio ->set_DomicilioA(
        array( 
            'Calle'=>(!empty($_POST['Calle'])) ? $_POST['Calle']:"",
            'No'=>(!empty($_POST['No'])) ? $_POST['No']:"",
            'CP'=>(!empty($_POST['CP'])) ? $_POST['CP']:"",
            'Calle1'=>(!empty($_POST['Calle1'])) ? $_POST['Calle1']:"",
            'Calle2'=>(!empty($_POST['Calle2'])) ? $_POST['Calle2']:"",
            'referencia'=>(!empty($_POST['referencia'])) ? $_POST['referencia']:"sin Referencias",
            'Colonia'=>(!empty($_POST['Colonia'])) ? $_POST['Colonia']:"",
            'Municipio'=>(!empty($_POST['Municipio'])) ? $_POST['Municipio']:"",
            'TelCasa'=>(!empty($_POST['TelCasa'])) ? $_POST['TelCasa']:""
        )
    );
    $Datos_generales = new alumnos;
    $Datos_generales -> set_datosGeneralesA(
        array( 
            'vivenC'=>(!empty($_POST['vivenC'])) ? $_POST['vivenC']:"",
            'sostenHogar'=>(!empty($_POST['sostenHogar'])) ? $_POST['sostenHogar']:"",
            'internet'=>(!empty($_POST['internet'])) ? $_POST['internet']:"No",
            'television'=>(!empty($_POST['television'])) ? $_POST['television']:"No",
            'celular'=>(!empty($_POST['celular'])) ? $_POST['celular']:"No",
            'tablet'=>(!empty($_POST['tablet'])) ? $_POST['tablet']:"No",
            'computadora'=>(!empty($_POST['computadora'])) ? $_POST['computadora']:"No"
        )
    );

    $accionR= new alumnos;
    $accionR->set_accionA($_POST['acction']);
    $consulta=$accionR->get_accionA();
    if($consulta=="Guardar Datos"){ 
        include_once 'insertarA.php';
    }
    if($consulta=="Eliminar Datos"){ 
        include_once 'eliminar.php';
    }
    if($consulta=="Modificar Datos"){ 
        include_once 'modificar.php';
    }
    if($consulta=="PDF"){ 
        $_SESSION['alumnoDatos'] = $Datos_Alumno->get_alumnoDatos();
        $_SESSION['datosMedicosA'] = $datos_medicos->get_datosMedicosA();
        $_SESSION['tutor1A'] = $tutor1->get_tutor1A();
        $_SESSION['tutor2A'] = $tutor2->get_tutor2A();     
        $_SESSION['DomicilioA'] = $domicilio->get_DomicilioA();
        $_SESSION['datosGeneralesA'] = $Datos_generales->get_datosGeneralesA();
        header("Location: ../pdf/pdfalu.php");
        exit;
    }
?>