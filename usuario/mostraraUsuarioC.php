<?php
        $secionUsr=$_POST['secionUsr'];
        $consultaMaestro = "SELECT * FROM   usuario WHERE UserName='".$secionUsr."'";
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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
    <div class="usuarios">
        <form action="userC.php" method="post" class="form">
        <?php
            foreach ($resultados as $row) {
        ?>
            <div class="colC-Complet colR-2">
                <h2> Agregar Usuario</h2>
            </div>
            <div class="colC-Complet">
                <span> Nombre</span>
                <p><?php echo $row['Nombre'];?></p>
                <input type="hidden" name="secionNom" value="<?php echo $row['Nombre'];?>">
            </div>
            <div class="colC-Complet">
                <span> Usuario</span>
                <p><?php echo $row['UserName'];?></p>
                <input type="hidden" name="secionUsr" value="<?php echo $row['UserName'];?>">
            </div>
            <div class="colC-Complet">
                <span> Tipo</span>
                <p> <?php echo $row['tipo_usuario'];?></p>
                <input type="hidden" name="secionUsr" value="<?php echo $row['RFCUser'];?>">
            </div>
            <div class="colC-Complet">
                <span> Contraseña</span>
                <input type="text" name="secionPass">
            </div>
            <div class="colC-CompletMin colC-6">
                <input type="submit"  class="btn btnModificar" name="agr" value="Modificar">
            </div>
            <div class="colC-CompletMin colC-6">
                <input type="submit"  class="btn btnEliminar" name="agr" value="Eliminar">
            </div>
            <?php
                }
            ?>
        </form>
    </div>
    </body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window..history.go(-1);</script>";
}
?>