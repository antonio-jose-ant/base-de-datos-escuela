<?php
    include '../includes/conexion-BD.php';

    $Datos_Alumno =array( 
        'matricula'=>strtoupper(substr($_POST['Nombre'],0,3).substr($_POST['ApeidoP'],0,2).substr($_POST['ApeidoM'],0,2).substr($_POST['Grado'],0,1).substr($_POST['Grupo'],0,1).substr($_POST['Turno'],0,1)),
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
    );
    $datos_medicos =array( 
        'CURPAlu'=>(!empty($_POST['CURPAlu'])) ? $_POST['CURPAlu']:"",
        'numEmergencia'=>(!empty($_POST['numEmergencia'])) ? $_POST['numEmergencia']:"",
        'Talla'=>(!empty($_POST['Talla'])) ? $_POST['Talla']:"",
        'peso'=>(!empty($_POST['peso'])) ? $_POST['peso']:"",
        'tipoSangre'=>(!empty($_POST['tipoSangre'])) ? $_POST['tipoSangre']:"",
        'alergia'=>(!empty($_POST['alergia'])) ? $_POST['alergia']:"",
        'padecimiento'=>(!empty($_POST['padecimiento'])) ? $_POST['padecimiento']:"",
        'piePlano'=>(!empty($_POST['piePlano'])) ? $_POST['piePlano']:"",
        'lentes'=>(!empty($_POST['lentes'])) ? $_POST['lentes']:""
    );
    $tutor1 =array( 
        'CURPT1'=>(!empty($_POST['CURPT1'])) ? $_POST['CURPT1']:"",
        'nombreT1'=>(!empty($_POST['nombreT1'])) ? $_POST['nombreT1']:"",
        'apellidoPT1'=>(!empty($_POST['apellidoPT1'])) ? $_POST['apellidoPT1']:"",
        'apellidoMT1'=>(!empty($_POST['apellidoMT1'])) ? $_POST['apellidoMT1']:"",
        'edadT1'=>(!empty($_POST['edadT1'])) ? $_POST['edadT1']:"",
        'parentescoT1'=>(!empty($_POST['parentescoT1'])) ? $_POST['parentescoT1']:"",
        'Estado_civilT1'=>(!empty($_POST['Estado_civilT1'])) ? $_POST['Estado_civilT1']:"",
        'ocupacionT1'=>(!empty($_POST['ocupacionT1'])) ? $_POST['ocupacionT1']:"",
        'estudioT1'=>(!empty($_POST['estudioT1'])) ? $_POST['estudioT1']:""
    );
    $tutor2 =array( 
        'CURPT2'=>(!empty($_POST['CURPT2'])) ? $_POST['CURPT2']:"",
        'nombreT2'=>(!empty($_POST['nombreT2'])) ? $_POST['nombreT2']:"",
        'apellidoPT2'=>(!empty($_POST['apellidoPT2'])) ? $_POST['apellidoPT2']:"",
        'apellidoMT2'=>(!empty($_POST['apellidoMT2'])) ? $_POST['apellidoMT2']:"",
        'edadT2'=>(!empty($_POST['edadT2'])) ? $_POST['edadT2']:"",
        'parentescoT2'=>(!empty($_POST['parentescoT2'])) ? $_POST['parentescoT2']:"",
        'Estado_civilT2'=>(!empty($_POST['Estado_civilT2'])) ? $_POST['Estado_civilT2']:"",
        'ocupacionT2'=>(!empty($_POST['ocupacionT2'])) ? $_POST['ocupacionT2']:"",
        'estudioT2'=>(!empty($_POST['estudioT2'])) ? $_POST['estudioT2']:""
    );
    $domicilio =array( 
        'Calle'=>(!empty($_POST['Calle'])) ? $_POST['Calle']:"",
        'No'=>(!empty($_POST['No'])) ? $_POST['No']:"",
        'CP'=>(!empty($_POST['CP'])) ? $_POST['CP']:"",
        'Calle1'=>(!empty($_POST['Calle1'])) ? $_POST['Calle1']:"",
        'Calle2'=>(!empty($_POST['Calle2'])) ? $_POST['Calle2']:"",
        'referencia'=>(!empty($_POST['referencia'])) ? $_POST['referencia']:"",
        'Colonia'=>(!empty($_POST['Colonia'])) ? $_POST['Colonia']:"",
        'Municipio'=>(!empty($_POST['Municipio'])) ? $_POST['Municipio']:"",
        'TelCasa'=>(!empty($_POST['TelCasa'])) ? $_POST['TelCasa']:""
    );
    $Datos_generales =array( 
        'vivenC'=>(!empty($_POST['vivenC'])) ? $_POST['vivenC']:"",
        'sostenHogar'=>(!empty($_POST['sostenHogar'])) ? $_POST['sostenHogar']:"",
        'internet'=>(!empty($_POST['internet'])) ? $_POST['internet']:"",
        'television'=>(!empty($_POST['television'])) ? $_POST['television']:"",
        'celular'=>(!empty($_POST['celular'])) ? $_POST['celular']:"",
        'tablet'=>(!empty($_POST['tablet'])) ? $_POST['tablet']:"",
        'computadora'=>(!empty($_POST['computadora'])) ? $_POST['computadora']:""
    );

?>