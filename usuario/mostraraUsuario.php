<?php
        
        $consultaMaestro = "SELECT * FROM   usuario";
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //echo "hay sesion"; 
        $user->setUser($userSession->getCurrentUser());
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
<div class="usuarios">
    <form class="tableB" action="./mostraraUsuarioC.php" method="post"  name="form">
        <table id="selectAuto">
            <thead>
                <tr class="usuariosT">
                    <th class="title">Sel</th>
                    <th class="title">Nombre</th>
                    <th class="title">Usuario</th>
                    <th class="title">Tipo</th>
                </tr>
            </thead>
            <tbody class="contenidoT" id="profesores">
                <?php 
                    $nrow=0;
                    $mdfContra=$row["password"];
                    $tr=count($resultados);
                    foreach ($resultados as $row) {
                        echo "<tr class='usuariosT ".($nrow++%2?'even':'odd')."'>";
                        echo "<td> <input name='secionUsr' value='".$row['UserName']."' type='radio'></td>";
                        echo "<td data-title='Nombre'><p>".$row["Nombre"]."</p></td>";
                        echo "<td data-title='TEL. Celular'><p>".$row["UserName"]."</p></td>";
                        echo "<td data-title='CURP'><p>".$row["tipo_usuario"]."</p></td>";
                        echo "</tr>";
                    }
                ?>

            </tbody>
            <tfoot>
                <tr class="usuariosT">
                    <td class="colC-2"><p>Numero De Usuarios: <?php echo $nrow;  ?></p></td>
                    <td class="colC-2"><input type="submit" name="agr" value="Consultar" class="btn btnConsulta"></td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
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
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/test/base-de-datos-escuela/mostrarDatos/maestroCompletoP'</script>";
}
?>