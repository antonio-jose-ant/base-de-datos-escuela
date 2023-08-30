<?php
    class userAgr {
        public $usuarioDef;
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
        'secionUsr' => !empty($_POST['secionUsr'])?$_POST['secionNom']:"",
        'seciontipoUser' => !empty($_POST['seciontipoUser'])?$_POST['secionNom']:"",
        'secionPass' => !empty($_POST['secionPass'])?md5($_POST['secionPass']):"",
        'RFCUser' => !empty($_POST['RFCUser'])?$_POST['RFCUser']:$_POST['secionUsr'],
        'opcion' => !empty($_POST['agr'])
        )
    );

    if ($secionusuarios->get_usuarioDef()['opcion'] == "Agregar") {
        include_once 'agruser.php';
    }

?>