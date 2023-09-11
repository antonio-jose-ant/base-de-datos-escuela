<?php

        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //echo "hay sesion"; 
        $user->setUser($userSession->getCurrentUser());
        $tipo_usuario = $user->getTipoUsuario();
        $usuarioPri= $tipo_usuario['tipo_usuario'];
        $RFCMP= $tipo_usuario['RFC'];

        $conMaestroM ="SELECT * FROM profesor 
        inner JOIN datos_laborales 
        on profesor.CURP=datos_laborales.CURP 
        inner join datos_profecionales 
        on profesor.RFC=datos_profecionales.RFC 
        where profesor.RFC='$RFCMP'";

        $nomina=$_POST['buscaP'];
        $conMaestro ="SELECT * FROM profesor 
        inner JOIN datos_laborales 
        on profesor.CURP=datos_laborales.CURP
        inner join datos_profecionales 
        on profesor.RFC=datos_profecionales.RFC 
        where profesor.nomina='$nomina'";
        $db = new DB();
        $pdo = $db->connect();
        if($usuarioPri=="Docente"){
            $stmt = $pdo->prepare($conMaestroM);
        }else{
            $stmt = $pdo->prepare($conMaestro);
        }
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../assets/header.php'?>

<body>
    <form action="../agregarMaestro/maestro_C.php" method="post" name="form" class="form">
        <?php 
                foreach ($resultados as $row) {
        ?>
            <div class="colC-Complet">
                <h2>DATOS PERSONALES</h2>
            </div>
            <div class="colC-2 colC-CompletMin">
                <span> Nomina:</span>
                <input type="text" name="nomina" value="<?php echo $row['nomina'];?>"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Nombre:</span>
                <input type="text" name="nombre" value="<?php echo $row['nombre'];?>"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Apeido Paterno:</span>
                <input type="text" name="apellidoP" value="<?php echo $row['apellidoP']; ?>"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Apeido Materno:</span>
                <input type="text" name="apellidoM" value="<?php echo $row['apellidoM']; ?>"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> CURP:</span>
                <input type="hidden" name="CURP" value="<?php echo $row['CURP']; ?>"/>
                <p><?php echo $row['CURP']; ?></p>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> RFC:</span>
                <input type="hidden" name="RFC" value="<?php echo $row['RFC']; ?>"/>
                <p><p><?php echo $row['RFC']; ?></p>
            </div>
            <div class="colC-4 colCMin-7">
                <span> Colonia y/o Fracc:</span>
                <input type="text" name="ColoniaFracc" value="<?php echo $row['ColoniaFracc']; ?>"/>
            </div>
            <div class="colC-4 colCMin-5">
                <span> Ciudad:</span>
                <input type="text" name="Ciudad" value="<?php echo $row['Ciudad']; ?>"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Localidad:</span>
                <input type="text" name="localidadProfesor" value="<?php echo $row['localidadProfesor']; ?>"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Dirección:</span>
                <input type="text" name="direccion" value="<?php echo $row['Direccion']; ?>"/>
            </div>
            <div class="colC-2 colCMin-4">
                <span> No. Int.:</span>
                <input type="text" name="no_int" value="<?php echo $row['no_int']; ?>"/>
            </div>
            <div class="colC-2 colCMin-4">
                <span> No. Ext.:</span>
                <input type="text" name="no_ext" value="<?php echo $row['no_ext']; ?>"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Municipio:</span>
                <input type="text" name="municipioDocente" value="<?php echo $row['municipio']; ?>"/>
            </div>
            <div class="colC-2 colCMin-4">
                <span> C.P:</span>
                <input type="text" name="CP" value="<?php echo $row['CP']; ?>"/>
            </div>
            <div class="colC-2 colCMin-6">
                <span> TEL. Casa:</span>
                <input type="tel" name="telCasa" value="<?php echo $row['telefonoPersonal']; ?>"/>
            </div>
            <div class="colC-2 colCMin-6">
                <span> TEL. Celular:</span>
                <input type="tel" name="telCel" value="<?php echo $row['telefonoCasa']; ?>"/>
            </div>
            <div class="colC-5 colC-CompletMin">
               <span> Correo Electrónico:</span>
                <input type="Email" name="emailpersonal" value="<?php echo $row['correoElectronico']; ?>"/>
            </div>
            <div class="colCMin-4">
                <span> Edad:</span>
                <input type="number" name="edad" value="<?php echo $row['edad']; ?>"/>
            </div>
            <div class="colCMin-3">
                <span> Sexo:</span>
                <select name="sexo">
                    <option value="F" <?php if($row['sexo']=="F")  echo "selected";?>>F</option>
                    <option value="M" <?php if($row['sexo']=="M")  echo "selected";?>>M</option>
                </select>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Lugar De Nacimiento:</span>
                <input type="text" name="Lugar_De_Nacimiento" value="<?php echo $row['Lugar_De_Nacimiento']; ?>"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span>Grado Maximo de Estudios:</span>
                <select name="gradoMEstudio">
                        <option></option>
                        <option value="Media Superior" <?php if($row['gradoMEstudio']=="Media Superior")  echo "selected";?>>Media Superior</option>
                        <option value="Superior" <?php if($row['gradoMEstudio']=="Superior")  echo "selected";?>>Superior</option>
                        <option value="Maestria" <?php if($row['gradoMEstudio']=="Maestria")  echo "selected";?>>Maestria</option>
                        <option value="Doctorado" <?php if($row['gradoMEstudio']=="Doctorado")  echo "selected";?>>Doctorado</option>
                    </select>
            </div>
            <div class="colC-5 colC-CompletMin">
                <span> Estado Civil:</span>
                    <select name="estadoC" id="parejaSelection" onchange="seleccionEstadoC();">
                        <option></option>
                        <option value="Casado(a)" <?php if($row['EstadoCivil']=="Casado(a)")  echo "selected";?>>Casado(a)</option>
                        <option value="Conviviente(a)" <?php if($row['EstadoCivil']=="Conviviente(a)")  echo "selected";?>>Conviviente(a)</option>
                        <option value="Anulado(a)" <?php if($row['EstadoCivil']=="Anulado(a)")  echo "selected";?>>Anulado(a)</option>
                        <option value="Separado(a) de unión legal" <?php if($row['EstadoCivil']=="Separado(a) de unión legal")  echo "selected";?>>Separado(a) de unión legal</option>
                        <option value="Separado(a) de unión de hecho" <?php if($row['EstadoCivil']=="Separado(a) de unión de hecho")  echo "selected";?>>Separado(a) de unión de hecho</option>
                        <option value="Viudo(a)" <?php if($row['EstadoCivil']=="Viudo(a)")  echo "selected";?>>Viudo(a)</option>
                        <option value="Soltero(a)" <?php if($row['EstadoCivil']=="Soltero(a)")  echo "selected";?>>Soltero(a)</option>
                    </select>
            </div>
            <div class="colC-6 colC-CompletMin" id="pareja_EC" style="display: none;">
                <span>Nombre completo del esposo(a) o pareja:</span>
                <input type="text" name="pareja" value="<?php if($row['EstadoCivil']=="Casado(a)" ||$row['EstadoCivil']=="Conviviente(a)" ){echo $row['nombrePareja'];}?>" />
            </div>
            <div class="colC-7 colC-CompletMin">
                <span> Red Social:</span>
                <input type="text" name="RedSocial" value="<?php echo $row['redSocial']; ?>"/>
            </div>
            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet">
                <h2>DATOS LABORALES</h2>
            </div> 
            <div class="colC-4 colC-CompletMin">
                <span>Nombre De La Dependencia: </span>
                <input type="text"  value="<?php echo $row['Nombre_Dependencia']; ?>" name="Nombre_Dependencia"/>
            </div>
            <div class="colC-2 colCMin-5">
                <span> CCT:</span>
                <input type="text" value="<?php echo $row['CCT']; ?>" name="CCT"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Domicilio Particular</span>
                <input type="text" value="<?php echo $row['Domicilio_Particular']; ?>" name="Domicilio_Particular"/>
            </div>

            <div class="colC-2 colCMin-4">
                <span> No. Int.:</span>
                <input type="number" value="<?php echo $row['No_Int']; ?>" name="No_Int"/>
            </div>
            <div class="colC-3 colCMin-8">
                <span> Colonia y/o Fracc.:</span>
                <input type="text" value="<?php echo $row['Colonia_Fracc']; ?>" name="Colonia_Fracc"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Ciudad:</span>
                <input type="text" value="<?php echo $row['Ciudad_laboral']; ?>" name="Ciudad_laboral"/>
            </div>
            <div class="colC-2 colC-CompletMin">
                <span> Localidad:</span> 
                <input type="text" value="<?php echo $row['Localidad_laboral']; ?>" name="Localidad_laboral"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Municipio:</span>
                <input type="text" value="<?php echo $row['Municipio_laboral']; ?>" name="Municipio_laboral"/>
            </div>
            <div class="colC-2 colCMin-4">
                <span> CP:</span>
                <input type="text" value="<?php echo $row['CP_laboral']; ?>" name="CP_laboral"/>
            </div>
            <div class="colC-3 colCMin-6">
                <span> TEL. Celular:</span>
                <input type="text" value="<?php echo $row['TEL_Celular_laboral']; ?>"  name="TEL_Celular_laboral"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Fecha De Ingreso al G.E.M:</span>
                <input type="text" id="date2" value="<?php echo $row['Fecha_Ingreso_GEM']; ?>"  name="Fecha_Ingreso_GEM"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Numero De Prelación:</span>
                <input type="text" value="<?php echo $row['Numero_Prelación']; ?>"  name="Numero_Prelación"/>
            </div>
            <div class="colC-2 colC-CompletMin">
                <span> Antiguedad:</span>
                <input type="text"  value="<?php echo $row['Antiguedad']; ?>" name="Antiguedad"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Puesto Profecional:</span>
                <input type="text" value="<?php echo $row['Puesto_Profeciona']; ?>" name="Puesto_Profeciona"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Categoria:</span>
                <input type="text" value="<?php echo $row['Categoria_TalonCheque']; ?>"  name="Categoria_TalonCheque" placeholder="Segun Talon De Cheque"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Estado Categoria:</span>
                <input type="text"  value="<?php echo $row['Estado_Categoria']; ?>" name="Estado_Categoria"/>
            </div>
            <div class="colC-5 colCMin-6">
                <span> No. De Plaza:</span>
                <input type="text"  value="<?php echo $row['Plaza_Principal']; ?>" name="Plaza_Principal" placeholder="Principal"/>
            </div>
            <div class="colC-5 colCMin-6">
                <span> No. De Plaza:</span>
                <input type="text"  value="<?php echo $row['Plaza_Secundaria']; ?>" name="Plaza_Secundaria" placeholder="Secundaria"/>
            </div>
            <div class="colC-5 colC-CompletMin">
                <span>Clave De Servidor Plublico:</span>
                <input type="text"  value="<?php echo $row['Clave_S_Plublico']; ?>" name="Clave_S_Plublico"/>
            </div>
            <div class="colCMin-5">
                <span>Horario</span>
                <input type="text" id="timeInput" title="Horario Laboral De:" value="<?php echo substr($row['H_Lt1'],0,5); ?>" name="H_Lt1" maxlength="5"/>
            </div>
            <div class="ceterText colCMin-2">
                <h2>a:</h2>
            </div>
            <div class="colCMin-5">
                <span>Horas.</span>
                <input type="text" id="timeInput2" value="<?php echo substr($row['H_Lt1_2'],0,5); ?>" name="H_Lt1_12" maxlength="5"/>
            </div>
            <div></div>
            <div class="colC-5 colC-CompletMin">
                <span>C.C.T. Otra Plaza:</span>
                <input type="text" value="<?php echo $row['CCT_S_Plaza']; ?>" name="CCT_S_Plaza"/>
            </div>
            <div class="colCMin-5">
                <span>Horario</span>
                <input type="text" id="timeInput3" title="Horario Laboral De:" value="<?php echo substr($row['H_Lt2'],0,5); ?>" name="H_Lt2" maxlength="5"/>
            </div>
            <div class="ceterText colCMin-2">
                <h2>a:</h2>
            </div>
            <div class="colCMin-5">
                <span>Horas.</span>
                <input type="text" id="timeInput4" value="<?php echo substr($row['H_Lt2_2'],0,5); ?>" name="H_Lt2_2" maxlength="5"/>
            </div>

            <!--aqui empieza datos profecionales -->
            <div class="colC-Complet">
                <h2>DATOS PROFECIONALES</h2>
            </div> 
            <div class="colC-5 colC-CompletMin">
                <span>Preparacion Profecional: </span>
                <input type="text" value="<?php echo $row['Preparacion_Profecional']; ?>" name="Preparacion_Profecional"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Titulado:</span>
                <input type="text" value="<?php echo $row['Titulado']; ?>" name="Titulado"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Escuela de Procedencia:</span>
                <input type="text" value="<?php echo $row['Escuela_Procedencia']; ?>" name="Escuela_Procedencia"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> No. De Cédula Profecional:</span>
                <input type="text" value="<?php echo $row['No_Cédula_Profecional']; ?>" name="No_Cédula_Profecional"/>
            </div>
            <div class="colC-5 colC-CompletMin">
                <span> Posgrado:</span>
                <input type="text" value="<?php echo $row['Posgrado']; ?>" name="Posgrado"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Grado Obtenido:</span>
                <input type="tel" value="<?php echo $row['Grado_Obtenido']; ?>" name="Grado_Obtenido"/>
            </div>
            <div class="colC-5 colC-CompletMin">
                <span> Incorporacion a Carrera Magistra:</span>
                <input type="text" value="<?php echo $row['Incorporacion_Carrera_Magistral']; ?>" name="Incorporacion_Carrera_Magistral"/>
            </div>
            <div class="colC-3 colC-CompletMin">
                <span> Fecha De Dictamen:</span>
                <input type="text" id="date3" value="<?php echo $row['Fecha_Dictamen']; ?>" name="Fecha_Dictamen" />
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Numero De Dicatamen:</span>
                <input type="text" value="<?php echo $row['Numero_Dicatamen']; ?>" name="Numero_Dicatamen"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Nivel y Variante:</span>
                <input type="text" value="<?php echo $row['Nivel_Variante']; ?>" name="Nivel_Variante"/>
            </div>
            <div class="colC-4 colC-CompletMin">
                <span> Otros Estudios:</span>
                <input type="text" value="<?php echo $row['Otros_Estudios']; ?>" name="Otros_Estudios"/>
            </div>
            <div></div>

            <?php
                if ($usuarioPri=="administrador"){
                    echo "
                    <div class=\"colC-4 colC-CompletMin\">
                        <input type=\"submit\" name=\"acction\" value=\"PDF\" class=\"btn btnPDF\" />
                    </div>
                    <div class=\"colC-4 colC-CompletMin\">
                        <input type=\"submit\" name=\"acction\" value=\"Modificar Datos\" class=\"btn btnModificar\" />
                    </div>
                    <div class=\"colC-4 colC-CompletMin\">
                        <input type=\"submit\" name=\"acction\" value=\"Eliminar Datos\" class=\"btn btnEliminar\"/>
                    </div>
                    ";
                }else{
                    echo "
                    <div class=\"colC-6 colC-CompletMin\">
                        <input type=\"submit\" name=\"acction\" value=\"PDF\" class=\"btn btnPDF\" />
                    </div>
                    <div class=\"colC-6 colC-CompletMin\">
                        <input type=\"submit\" name=\"acction\" value=\"Modificar Datos\" class=\"btn btnModificar\" />
                    </div>
                    ";
                }

            ?>

                
        <?php 
            }
        ?>
    </form>
    <script>
            document.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                }
            });
    </script>
</body>
</html>
<?php
}else{
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
  }
?>