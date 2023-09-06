<?php
        $consultaMaestro = "SELECT 
        profesor.nomina,
        profesor.nombre,
        profesor.apellidoP,
        profesor.apellidoM, 
        profesor.telefonoPersonal,
        profesor.CURP,
        profesor.RFC,
        datos_profecionales.Preparacion_Profecional
        FROM   profesor
        INNER JOIN datos_profecionales 
        ON profesor.RFC=datos_profecionales.RFC";

        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //echo "hay sesion"; 
        $user->setUser($userSession->getCurrentUser());
        $tipo_usuario = $user->getTipoUsuario();
        $usuarioPri= $tipo_usuario['tipo_usuario'];
        if ($usuarioPri!="Docente" && $usuarioPri!="Alumno"){
        $db = new DB();
        $pdo = $db->connect();
        $stmt = $pdo->prepare($consultaMaestro);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Agregar</title>
</head>
<body>
    <form class="tableB" action="./maestroCompletoP.php" method="post"  name="form">
        <div class="busqueda form">
            <div class="colC-4 colC-CompletMin">
                <p>Nombre:</p>
                <input type="text" name="profe"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <p>ingresa RFC</p>
                <input type="text" name="datospersonales"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <p>ingresa CURP</p>
                <input type="text" name="datosadministracion"/>
            </div>
            <div class="colC-Complet">
                <input type="submit" value="Buscar" name="Buscar"  class="btn btnBuscar">
            </div>
        </div>

        <table class="tabConten" id="selectAuto">
            <thead>
                <tr class="profesor">
                    <th class="title">Sel</th>
                    <th class="title">Nombre</th>
                    <th class="title">TEL. Celular</th>
                    <th class="title">CURP</th>
                    <th class="title">RFC</th>
                    <th class="title">PREPARAION</th> 
                </tr>
            </thead>
            <tbody class="contenidoT" id="profesores">
                <?php 
                    $nrow=0;
                    $tr=count($resultados);
                    foreach ($resultados as $row) {
                        echo "<tr class='profesor ".($nrow++%2?'even':'odd')."'>";
                        echo "<td > <input name='buscaP' value='".$row['nomina']."' type='radio'></td>";
                        echo "<td data-title='Nombre'><p>".$row["nombre"]." ".$row["apellidoP"]." ".$row["apellidoM"]."</p></td>";
                        echo "<td data-title='TEL. Celular'><a href='tel:".$row["telefonoPersonal"]."'>".$row["telefonoPersonal"]."</a></td>";
                        echo "<td data-title='CURP'><p>".$row["CURP"]."<input name='curpProfe' value='".$row['CURP']."' type='hidden'> </p></td>";
                        echo "<td data-title='RFC'><p>".$row["RFC"]."<input name='rfcProfe' value='".$row['RFC']."' type='hidden'></p></td>";
                        echo "<td data-title='PREPARAION'><p>".$row["Preparacion_Profecional"]."</p></td>";
                        echo "</tr>";
                    }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td><p>Numero De Docentes: <?php echo $nrow;  ?></p></td>
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