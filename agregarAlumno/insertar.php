<?php
    include '../includes/conexion-BD.php';
    $insert = true;
    $Datos_Alumno =array( 
        'matricula'=>strtoupper(substr($_POST['Nombre'],0,3).substr($_POST['ApeidoP'],0,2).substr($_POST['ApeidoM'],0,2).substr($_POST['Grado'],0,1).substr($_POST['Grupo'],0,1).substr($_POST['Turno'],0,1).substr($_POST['CURP'],-2)),
        'Nombre'=>(!empty(ucwords($_POST['Nombre']))) ? $_POST['Nombre'] : "",
        'ApeidoP'=>(!empty(ucwords($_POST['ApeidoP']))) ? $_POST['ApeidoP'] : "",
        'ApeidoM'=>(!empty(ucwords($_POST['ApeidoM']))) ? $_POST['ApeidoM'] : "",
        'Grado'=>(!empty($_POST['Grado'])) ? $_POST['Grado'] : "",
        'Grupo'=>(!empty($_POST['Grupo'])) ? $_POST['Grupo'] : "",
        'Turno'=>(!empty($_POST['Turno'])) ? $_POST['Turno'] : "",
        'CURP'=>(!empty($_POST['CURP'])) ? $_POST['CURP'] : "",
        'Fecha_n'=>(!empty($_POST['Fecha_n'])) ? $_POST['Fecha_n'] : "",
        'edad'=>(!empty($_POST['edad'])) ? $_POST['edad'] : "",
        'CorreoAlu'=>(!empty($_POST['CorreoAlu'])) ? $_POST['CorreoAlu'] : ""
    );
    $datos_medicos =array( 
        //'CURPAlu'=>(!empty($_POST['CURP'])) ? $_POST['CURPAlu']:"",
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
        'CURPT1'=>(!empty(strtoupper($_POST['CURPT1']))) ? $_POST['CURPT1']:"",
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
        'CURPT2'=>(!empty(strtoupper($_POST['CURPT2']))) ? $_POST['CURPT2']:"",
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
        'referencia'=>(!empty($_POST['referencia'])) ? $_POST['referencia']:"sin Referencias",
        'Colonia'=>(!empty($_POST['Colonia'])) ? $_POST['Colonia']:"",
        'Municipio'=>(!empty($_POST['Municipio'])) ? $_POST['Municipio']:"",
        'TelCasa'=>(!empty($_POST['TelCasa'])) ? $_POST['TelCasa']:""
    );
    $Datos_generales =array( 
        'vivenC'=>(!empty($_POST['vivenC'])) ? $_POST['vivenC']:"",
        'sostenHogar'=>(!empty($_POST['sostenHogar'])) ? $_POST['sostenHogar']:"",
        'internet'=>(!empty($_POST['internet'])) ? $_POST['internet']:"No",
        'television'=>(!empty($_POST['television'])) ? $_POST['television']:"No",
        'celular'=>(!empty($_POST['celular'])) ? $_POST['celular']:"No",
        'tablet'=>(!empty($_POST['tablet'])) ? $_POST['tablet']:"No",
        'computadora'=>(!empty($_POST['computadora'])) ? $_POST['computadora']:"No"
    );
    foreach ($Datos_Alumno as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($datos_medicos as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($tutor1 as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($tutor2 as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($domicilio as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    foreach ($Datos_generales as $key => $value) {
        if (empty($value)) {
            $insert = false;
            echo "<script>alert('El campo $key está vacío');</script>";
            break;
        }
    }
    if($insert){
        $datos_medicosInsert="INSERT INTO datos_medicos (CURPAlu, Tel_emergencia, Talla, Peso, Tipo_sangre, Alergias, padecimiento, Pie_plano,lentes)
        VALUES('".$Datos_Alumno['CURP']."'
            ,'".$datos_medicos['numEmergencia']."'
            ,'".$datos_medicos['Talla']."'
            ,'".$datos_medicos['peso']."'
            ,'".$datos_medicos['tipoSangre']."'
            ,'".$datos_medicos['alergia']."'
            ,'".$datos_medicos['padecimiento']."'
            ,'".$datos_medicos['piePlano']."'
            ,'".$datos_medicos['lentes']."'
        )";
        $resultadoBDMedicos=mysqli_query($conexion,$datos_medicosInsert);

        $tutor1Insert="INSERT INTO tutor1 (CURP_tutor1,Nombre,Apellido_p,Apellido_m,Edad,Parentesco,Estado_civil,Ocupacion,Grado_estudios)
        VALUES('".$tutor1['CURPT1']."'
            ,'".$tutor1['nombreT1']."'
            ,'".$tutor1['apellidoPT1']."'
            ,'".$tutor1['apellidoMT1']."'
            ,'".$tutor1['edadT1']."'
            ,'".$tutor1['parentescoT1']."'
            ,'".$tutor1['Estado_civilT1']."'
            ,'".$tutor1['ocupacionT1']."'
            ,'".$tutor1['estudioT1']."'
        )";
        $resultadoBDtutor1=mysqli_query($conexion,$tutor1Insert);

        $tutor2Insert="INSERT INTO tutor2 (CURP_tutor2,Nombre,Apellido_p,Apellido_m,Edad,Parentesco,Estado_civil,Ocupacion,Grado_estudios)
        VALUES('".$tutor2['CURPT2']."'
            ,'".$tutor2['nombreT2']."'
            ,'".$tutor2['apellidoPT2']."'
            ,'".$tutor2['apellidoMT2']."'
            ,'".$tutor2['edadT2']."'
            ,'".$tutor2['parentescoT2']."'
            ,'".$tutor2['Estado_civilT2']."'
            ,'".$tutor2['ocupacionT2']."'
            ,'".$tutor2['estudioT2']."'
        )";
        $resultadoBDtutor2=mysqli_query($conexion,$tutor2Insert);

        $Datos_AlumnoInsert="INSERT INTO Datos_Alumno (matricula,Nombre_alu,Apellido_p,Apellido_m,CURP_alu,Fecha_n_alu,Edad_alu,Correo_alu,grado,grupo,turno,CURP_tutor1,CURP_tutor2)
        VALUES('".$Datos_Alumno['matricula']."'
            ,'".$Datos_Alumno['Nombre']."'
            ,'".$Datos_Alumno['ApeidoP']."'
            ,'".$Datos_Alumno['ApeidoM']."'
            ,'".$Datos_Alumno['CURP']."'
            ,'".$Datos_Alumno['Fecha_n']."'
            ,'".$Datos_Alumno['edad']."'
            ,'".$Datos_Alumno['CorreoAlu']."'
            ,'".$Datos_Alumno['Grado']."'
            ,'".$Datos_Alumno['Grupo']."'
            ,'".$Datos_Alumno['Turno']."'
            ,'".$tutor1['CURPT1']."'
            ,'".$tutor2['CURPT2']."'
        )";
        $resultadoBDAlu=mysqli_query($conexion,$Datos_AlumnoInsert);

        $domicilioInsert="INSERT INTO domicilio (Calle,Numero,CP,Calle1,Calle2,Referencia,Colonia,Municipio,Tel_casa,matricula)
        VALUES('".$domicilio['Calle']."'
            ,'".$domicilio['No']."'
            ,'".$domicilio['CP']."'
            ,'".$domicilio['Calle1']."'
            ,'".$domicilio['Calle2']."'
            ,'".$domicilio['referencia']."'
            ,'".$domicilio['Colonia']."'
            ,'".$domicilio['Municipio']."'
            ,'".$domicilio['TelCasa']."'
            ,'".$Datos_Alumno['matricula']."'
        )";
        $resultadoBDDomicilio=mysqli_query($conexion,$domicilioInsert);

        $Datos_generalesInsert="INSERT INTO Datos_generales (personas_Viven,sosten_H,INTERNET,TELEVISIÓN,CELULAR,TABLET,COMPUTADORA,matricula)
        VALUES('".$Datos_generales['vivenC']."'
            ,'".$Datos_generales['sostenHogar']."'
            ,'".$Datos_generales['internet']."'
            ,'".$Datos_generales['television']."'
            ,'".$Datos_generales['celular']."'
            ,'".$Datos_generales['tablet']."'
            ,'".$Datos_generales['computadora']."'
            ,'".$Datos_Alumno['matricula']."'
        )";
        $resultadoBDGenerales=mysqli_query($conexion,$Datos_generalesInsert);
    }
    if($resultadoBDAlu){
        echo "<script> alert('se a registrado con exito'); window.location='/base-de-datos-escuela/agregarAlumno/alumno.php'</script>";
    }else{
        echo "<script> alert('no se registro');</script>";
        echo mysqli_errno($conexion) . ": " . mysqli_error($conexion). "\n";
    }
?>