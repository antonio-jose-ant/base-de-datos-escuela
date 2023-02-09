<?php
        $conexion=mysqli_connect("localhost", "root", "TOYOTS99", "escuela");
        mysqli_set_charset($conexion, "utf8");
        $Matricula=$_POST['Matricula'];
        $Nombre=$_POST['Nombre'];
        $ApeidoP=$_POST['ApeidoP'];
        $ApeidoM=$_POST['ApeidoM'];
        $Grado=$_POST['Grado'];
        $Grupo=substr($_POST['Grupo'],0,1);
        $Turno=$_POST['Turno'];
        $Telefono=$_POST['Telefono'];
        $Domicilio=$_POST['Domicilio'];
        $CURP=strtolower( $_POST['CURP']);
        $CP=$_POST['CP'];
        $Edad=$_POST['Edad'];
        $maat= strtoupper(substr($_POST['Nombre'],0,3).substr($_POST['ApeidoP'],0,2).substr($_POST['ApeidoM'],0,2).substr($_POST['Grado'],0,1).substr($_POST['Grupo'],0,1).substr($_POST['Turno'],0,1));
        $insertar="INSERT INTO alumnos (matricula,nombreAlumno,ApellidoPaterno,ApellidoMaterno,Grado,Grupo,Turno,Telefono,Domicilio,CURP,C_P,Edad) values ('$maat','$Nombre','$ApeidoP','$ApeidoM','$Grado','$Grupo','$Turno','$Telefono','$Domicilio','$CURP','$CP','$Edad')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            echo "<script> alert('se a registrado con exito'); window.location='/escuela'</script>";
        }else{
            echo "<script> alert('no se pudo registrar'); window.history.go(-1);</script>";
        }
?>