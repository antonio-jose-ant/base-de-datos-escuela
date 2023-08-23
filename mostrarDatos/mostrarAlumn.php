<?php

        $usuarios ="SELECT * FROM datos_alumno inner join datos_medicos on datos_alumno.CURPAlu=datos_medicos.CURPAlu";
        include_once '../includes/user.php'; 
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
        $db = new DB();
        $pdo = $db->connect();
        $stmt = $pdo->prepare($usuarios);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html> 
<html lang="es">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Agregar</title>
</head>
<body> 
<form class="tabla alumno" action="./maestroCompletoA.php" method="post"  name="form">
        <div class="colR-3 colC-Complet tabla busquedaP">
            <div>
                <p>Nombre:</p>
                <input type="text" name="profe"/>
            </div>
            <div>
                <p>ingresa matricula</p>
                <input type="text" name="matriculaB"/>
            </div>
            <div>
                <p>ingresa CURP</p>
                <input type="text" name="CURPAluB"/>
            </div>
            <div class="colC-Complet">
                <input type="submit" value="Buscar" name="Buscar"  class="btn">
            </div>
        </div>
    <div class="title"><p>Sel </p></div>     
    <div class="title"><p>CURP</p></div>    
    <div class="title"><p>Nombre</p></div>   
    <div class="title"><p>Grado</p></div>    
    <div class="title"><p>Grupo</p></div>    
    <div class="title"><p>Turno</p></div>    
    <div class="title"><p>Telefono</p></div>  
    <div class="title"><p>Tipo De Sangre</p></div>
    <div class="contenidoT colC-Complet">
        <?php   
            $nrow=0;
            foreach ($resultados as $row) {
                echo "<div class='alumno alumnoContenido ".($nrow++%2?'even':'odd')."'>";
                echo "<div> <input name='buscarA' value='".$row['matricula']."' type='radio'></div>";
                echo "<div><p>".$row['CURPAlu']."  <input name='CURPAluC' value='".$row['CURPAlu']."' type='hidden'> </p></div>";
                echo "<div><p>".$row["Nombre_alu"]." ".$row["Apellido_p"]." ".$row["Apellido_m"]."</p></div>";
                echo "<div><p>".$row["grado"]." <input name='matriculaC' value='".$row['matricula']."' type='hidden'> </p></div>";
                echo "<div><p>".$row["grupo"]."</p></div>";
                echo "<div><p>".$row["turno"]."</p></div>";
                echo "<div><a href='tel:".$row["Tel_emergencia"]."'>".$row["Tel_emergencia"]."</a></div>";
                echo "<div><p>".$row["Tipo_sangre"]."</p></div>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="colC-Complet footerTable"><p>Numero De Alumnos: <?php echo $nrow;  ?></p></div>  
    </div>
</form>
</body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>