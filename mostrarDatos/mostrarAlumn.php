<?php

        $usuarios ="SELECT * FROM datos_alumno inner join datos_medicos on datos_alumno.CURPAlu=datos_medicos.CURPAlu";
        include_once '../includes/user.php'; 
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
        $tipo_usuario = $user->getTipoUsuario();
        echo "<script>console.log('".$tipo_usuario."');</script>";
        if ($tipo_usuario!="Doncete" && $tipo_usuario!="Alumno"){
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
<form class="tableB" action="./maestroCompletoA.php" method="post"  name="form">
        <div class="busqueda form">
            <div class="colC-4 colC-CompletMin">
                <p>Nombre:</p>
                <input type="text" name="profe"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <p>ingresa matricula</p>
                <input type="text" name="matriculaB"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <p>ingresa CURP</p>
                <input type="text" name="CURPAluB"/>
            </div>
            <div class="colC-Complet">
                <input type="submit" value="Buscar" name="Buscar"  class="btn btnBuscar">
            </div>
        </div>

        <table class="tabConten" id="selectAuto">
            <thead>
                <tr class="alumno">
                    <th class="title">Sel</th>
                    <th class="title">CURP</th>
                    <th class="title">Nombre</th>
                    <th class="title">Grado</th>
                    <th class="title">Grupo</th>
                    <th class="title">Turno</th> 
                    <th class="title">Telefono</th> 
                    <th class="title">Tipo De Sangre</th> 
                </tr>
            </thead>
            <tbody class="contenidoT">
                <?php   
                    $nrow=0;
                    foreach ($resultados as $row) {
                        echo "<tr class='alumno ".($nrow++%2?'even':'odd')."'>";
                        echo "<td> <input name='buscarA' value='".$row['matricula']."' type='radio'></td>";
                        echo "<td data-title='CURP'><p>".$row['CURPAlu']."  <input name='CURPAluC' value='".$row['CURPAlu']."' type='hidden'> </p></td>";
                        echo "<td data-title='Nombre'><p>".$row["Nombre_alu"]." ".$row["Apellido_p"]." ".$row["Apellido_m"]."</p></td>";
                        echo "<td data-title='Grado'><p>".$row["grado"]." <input name='matriculaC' value='".$row['matricula']."' type='hidden'> </p></td>";
                        echo "<td data-title='Grupo'><p>".$row["grupo"]."</p></td>";
                        echo "<td data-title='Turno'><p>".$row["turno"]."</p></td>";
                        echo "<td data-title='Telefono'><a href='tel:".$row["Tel_emergencia"]."'>".$row["Tel_emergencia"]."</a></td>";
                        echo "<td data-title='Tipo De Sangre'><p>".$row["Tipo_sangre"]."</p></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><p>Numero De Alumnos: <?php echo $nrow;  ?></p></td>
                </tr>
            </tfoot>
        </table>
</form>
<script>
    document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });
    var tabla = document.getElementById('selectAuto');
    var filas = tabla.getElementsByTagName("tr");

        for (var i = 0; i < filas.length; i++) {
            filas[i].addEventListener("click", function() {
                var radioInput = this.querySelector("input[type='radio']");
                if (radioInput) {
                    radioInput.checked = true;
                }
            });
        }
</script>
</body>
</html>
<?php
    }else{
        echo "<script>alert('no cuentas con los permisos para esta opción');window.location='/base-de-datos-escuela/inicio.php'</script>";
    }
}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>