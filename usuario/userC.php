<?php
    class userAgr {
        public $usuarioDef;
        public $usuarioOPT;
        function set_usuarioOPT($usuarioOPT) {
            $this->usuarioOPT = $usuarioOPT;
        }
        function get_usuarioOPT() {
            return $this->usuarioOPT;
        }
        function set_usuarioDef($usuarioDef) {
            $this->usuarioDef = $usuarioDef;
        }
        function get_usuarioDef() {
            return $this->usuarioDef;
        }
    }

    $secionusuarios = new userAgr;
    $secionusuarios -> set_usuarioDef (
        array(
        'secionNom' => !empty($_POST['secionNom'])?$_POST['secionNom']:"",
        'secionUsr' => !empty($_POST['secionUsr'])?$_POST['secionUsr']:"",
        'seciontipoUser' => !empty($_POST['seciontipoUser'])?$_POST['seciontipoUser']:"",
        'secionPass' => !empty($_POST['secionPass'])?md5($_POST['secionPass']):"",
        'RFCUser' => !empty($_POST['RFCUser'])?strtoupper($_POST['RFCUser']):$_POST['secionUsr'],
        )
    );
    $accionR= new userAgr;
    $accionR->set_usuarioOPT($_POST['agr']);
    $consulta=$accionR->get_usuarioOPT();

    if ($consulta == "Agregar") {
        include_once 'agruser.php';
    }
    if ($consulta == "Modificar") {
        include_once 'usuariosModofocA.php';
    }
    if ($consulta == "Eliminar") {
        include_once 'eliminaUser.php';
    }
?>