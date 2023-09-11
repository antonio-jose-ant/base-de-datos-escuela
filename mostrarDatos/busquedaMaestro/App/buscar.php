<?php
        include_once '../../../includes/user.php';
        include_once '../../../includes/user_session.php';     
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
        $salida="";
        if(isset($_POST['consulta'])){
            $Bus = '%' . $_POST['consulta'] . '%';
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
            ON profesor.RFC=datos_profecionales.RFC WHERE 
            profesor.nombre like '".$Bus."' 
            OR profesor.CURP LIKE'".$Bus."' 
            OR profesor.apellidoP LIKE'".$Bus."' 
            OR profesor.apellidoM LIKE'".$Bus."' 
            OR profesor.RFC LIKE'".$Bus."'
            OR CONCAT(profesor.nombre, ' ', profesor.apellidoP, ' ', profesor.apellidoM) LIKE '%" . $Bus . "%'";
        }

        $stmt = $pdo->prepare($consultaMaestro);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroFilas = $stmt->rowCount();

        if($numeroFilas>0){
            $salida.="<table class='tabConten' id='selectAuto'>
                        <thead>
                            <tr class='profesor'>
                                <th class='title'>Sel</th>
                                <th class='title'>Nombre</th>
                                <th class='title'>TEL. Celular</th>
                                <th class='title'>CURP</th>
                                <th class='title'>RFC</th>
                                <th class='title'>PREPARAION</th> 
                            </tr>
                        </thead>
                        <tbody class='contenidoT' id='profesores'>
            ";
            $nrow=0;
            foreach($resultados as $row){
                $salida.="
                        <tr class='profesor ".($nrow++%2?'even':'odd')."'>
                            <td > <input name='buscaP' value='".$row['nomina']."' type='radio'></td>
                            <td data-title='Nombre'><p>".$row["nombre"]." ".$row["apellidoP"]." ".$row["apellidoM"]."</p></td>
                            <td data-title='TEL. Celular'><a href='tel:".$row["telefonoPersonal"]."'>".$row["telefonoPersonal"]."</a></td>
                            <td data-title='CURP'><p>".$row["CURP"]."<input name='curpProfe' value='".$row['CURP']."' type='hidden'> </p></td>
                            <td data-title='RFC'><p>".$row["RFC"]."<input name='rfcProfe' value='".$row['RFC']."' type='hidden'></p></td>
                            <td data-title='PREPARAION'><p>".$row["Preparacion_Profecional"]."</p></td>
                        </tr>
                ";
            }
            $salida.="</tbody>
                    <tfoot>
                        <tr>
                            <td><p>Numero De Docentes: $nrow</p></td>
                        </tr>
                    </tfoot>
                </table>";
            $salida .= "<script>
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
            var tabla = document.getElementById('selectAuto');
            var filas = tabla.getElementsByTagName('tr');
            for (var i = 0; i < filas.length; i++) {
                filas[i].addEventListener('click', function() {
                    var radioInput = this.querySelector('input[type=\"radio\"]');
                    if (radioInput) {
                        radioInput.checked = true;
                    }
                });
            }
        </script>";
        }else{
            echo "<div><p>No hay Coincidencias</p></div>";
        }
        echo $salida;
        $pdo = null;
    }else{
        echo "<script>alert('no cuentas con los permisos para esta opción');window.location='/base-de-datos-escuela/inicio.php'</script>";
    }
}else{
    //echo "login";
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>