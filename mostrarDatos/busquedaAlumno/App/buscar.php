<?php
        include_once '../../../includes/user.php';
        include_once '../../../includes/user_session.php';        
        $db = new DB();
        $pdo = $db->connect();
        $usuarios ="SELECT * FROM datos_alumno inner join datos_medicos on datos_alumno.CURPAlu=datos_medicos.CURPAlu";

        $salida="";
        if(isset($_POST['consulta'])){
            $Bus = '%' . $_POST['consulta'] . '%';
            $usuarios = "SELECT * FROM datos_alumno
            INNER JOIN datos_medicos ON datos_alumno.CURPAlu = datos_medicos.CURPAlu
            WHERE datos_alumno.CURPAlu LIKE '%" . $Bus . "%' 
            OR datos_alumno.Nombre_alu LIKE '%" . $Bus . "%' 
            OR datos_alumno.Apellido_p LIKE '%" . $Bus . "%' 
            OR datos_alumno.Apellido_m LIKE '%" . $Bus . "%'
            OR CONCAT(datos_alumno.Nombre_alu, ' ', datos_alumno.Apellido_p, ' ', datos_alumno.Apellido_m) LIKE '%" . $Bus . "%'";
        }

        $stmt = $pdo->prepare($usuarios);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroFilas = $stmt->rowCount();

        if($numeroFilas>0){

            $salida.="<table class='tabConten' id='selectAuto'>
                        <thead>
                            <tr class='alumno'>
                                <th class='title'>Sel</th>
                                <th class='title'>CURP</th>
                                <th class='title'>Nombre</th>
                                <th class='title'>Grado</th>
                                <th class='title'>Grupo</th>
                                <th class='title'>Turno</th> 
                                <th class='title'>Telefono</th> 
                                <th class='title'>Tipo De Sangre</th> 
                            </tr>
                        </thead>
                        <tbody class='contenidoT'>
            ";
            $nrow=0;
            foreach($resultados as $row){
                $salida.="
                    <tr class='alumno ".($nrow++%2?'even':'odd')."'>
                        <td> <input name='buscarA' value='".$row['matricula']."' type='radio'></td>
                        <td data-title='CURP'><p>".$row['CURPAlu']."  <input name='CURPAluC' value='".$row['CURPAlu']."' type='hidden'> </p></td>
                        <td data-title='Nombre'><p>".$row["Nombre_alu"]." ".$row["Apellido_p"]." ".$row["Apellido_m"]."</p></td>
                        <td data-title='Grado'><p>".$row["grado"]." <input name='matriculaC' value='".$row['matricula']."' type='hidden'> </p></td>
                        <td data-title='Grupo'><p>".$row["grupo"]."</p></td>
                        <td data-title='Turno'><p>".$row["turno"]."</p></td>
                        <td data-title='Telefono'><a href='tel:".$row["Tel_emergencia"]."'>".$row["Tel_emergencia"]."</a></td>
                        <td data-title='Tipo De Sangre'><p>".$row["Tipo_sangre"]."</p></td>
                    </tr>
                ";
            }
            $salida.="</tbody>
                    <tfoot>
                        <tr>
                            <td><p>Numero De Alumnos: $nrow</p></td>
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
?>