<?php
include '../includes/conexion-BD.php';
$secionusuarios= array(
    'secionNom' => $_POST['secionNom'],
    'secionUsr' => $_POST['secionUsr'],
    'seciontipoUser' => $_POST['seciontipoUser'],
    'secionPass' => md5($_POST['secionPass'])
);
$agregarUserSesion=" INSERT INTO usuario(Nombre,UserName,tipo_usuario,password)
VALUES(
    '".$secionusuarios['secionNom']."',
    '".$secionusuarios['secionUsr']."',
    '".$secionusuarios['seciontipoUser']."',
    '".$secionusuarios['secionPass']."'
)";
$resultaUsuario=mysqli_query($conexion,$agregarUserSesion);

    if($resultaUsuario){
        echo "<script> alert('se a registrado con exito'); window.location='/base-de-datos-escuela/usuario/usuarios.php'</script>";
    }else{
        echo "<script> alert('no se registro el usuario'); window.location='/base-de-datos-escuela/usuario/usuarios.php'</script>";
    }
?>