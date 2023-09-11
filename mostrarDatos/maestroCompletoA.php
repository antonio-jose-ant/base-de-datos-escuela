<?php
        $matriculaC=$_POST ['buscarA'];
        $selectMA="SELECT * from Datos_Alumno 
        JOIN datos_medicos on datos_medicos.CURPAlu=Datos_Alumno.CURPAlu
        join tutor1 on tutor1.matricula = Datos_Alumno.matricula
        join tutor2 on tutor2.matricula = Datos_Alumno.matricula
        join domicilio on domicilio.matricula = Datos_Alumno.matricula
        join Datos_generales on Datos_generales.matricula = Datos_Alumno.matricula 
        WHERE Datos_Alumno.matricula='".$matriculaC."'
        ";
        include_once '../includes/user.php';
        include_once '../includes/user_session.php'; 
        $userSession = new UserSession();
        $user = new User(); 
        if(isset($_SESSION['user'])){
        if (empty($matriculaC)){
            echo "<script>alert('Selecciona una registro');window.location='/base-de-datos-escuela/mostrarDatos/mostrarAlumn.php'</script>";
        }else{
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
        $tipo_usuario = $user->getTipoUsuario();
        $usuarioPri= $tipo_usuario['tipo_usuario'];

        $db = new DB();
        $pdo = $db->connect();
        $stmt = $pdo->prepare($selectMA);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <script src="../assets/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="../assets/js/mainad.js"></script>
    <script src="../assets/js/jquery-ui-timepicker-0.3.3/jquery.ui.timepicker.js"></script>
    <title>escuela</title>
</head>
    <body> 
        <div>   
            <form action="../agregarAlumno/alumno_C.php" method="post" name="form" class="form">
<!------------------------------------DATOS ALUMNO---------------------------------------------------->
                <?php foreach ($resultados as $row) {?>
                <div class="colC-Complet">
                    <h2>DATOS DEL ALUMNO:</h2>
                </div>
                <div class="colC-4 colC-CompletMin">
                    <p> Nombre(s):</p>
                    <input type="text" name="Nombre" value="<?php echo  $row['Nombre_alu'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Paterno:</p>
                    <input type="text"  name="ApeidoP" value="<?php echo  $row["Apellido_p"];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Materno:</p>
                    <input type="text" name="ApeidoM" value="<?php echo  $row['Apellido_m'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p> Grado:</p>
                    <select name="Grado">
                        <option>  </option>
                        <option value="1" <?php if($row['grado']=="1") echo "selected"; ?>>1</option>
                        <option value="2" <?php if($row['grado']=="2") echo "selected"; ?>>2</option>
                        <option value="3" <?php if($row['grado']=="3") echo "selected"; ?>>3</option>
                        <option value="4" <?php if($row['grado']=="4") echo "selected"; ?>>4</option>
                        <option value="5" <?php if($row['grado']=="5") echo "selected"; ?>>5</option>
                        <option value="6" <?php if($row['grado']=="6") echo "selected"; ?>>6</option>
                    </select>
                </div>
                <div class="colCMin-4">
                    <p> Grupo:</p>
                    <select name="Grupo">
                        <option>  </option> 
                        <option value="A"  <?php if($row['grupo']=="A") echo "selected"; ?>>A</option>
                        <option value="B"  <?php if($row['grupo']=="B") echo "selected"; ?>>B</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-7">
                    <p> Turno:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino" <?php if($row['turno']=="Matutino") echo "selected"; ?>>Matutino</option>
                        <option value="Vespertino" <?php if($row['turno']=="Vespertino") echo "selected"; ?>>Vespertino</option>
                    </select>
                </div>
                <div class="colC-4 colC-CompletMin">
                    <span> CURP:</span>
                    <p><?php echo  $row['CURPAlu'];?></p>
                    <input type="hidden" name="CURP"  class="mayusculas" value="<?php echo  $row['CURPAlu'];?>" maxlength="18"/>
                </div>
                <div class="colC-3 colCMin-9 ">
                    <p> Fecha de nacimiento:</p>
                    <input type="text" id="date1" name="Fecha_n" value="<?php echo  $row['Fecha_n_alu'];?>"/>
                </div>
                <div class=" colCMin-4">
                    <p>Edad:</p>
                    <input type="number" name="edad" value="<?php echo  $row['Edad_alu'];?>"/>
                </div>
                <div class="colC-4 colCMin-8 ">
                    <p> Correo Electronico:</p>
                    <input type="email" name="CorreoAlu" value="<?php echo  $row['Correo_alu'];?>"/>
                </div>
<!------------------------------------DOMICILIO---------------------------------------------------->
                <div class="colC-Complet ">
                    <h2>DOMICILIO:</h2>
                </div>
                <div class="colC-3 colCMin-6"> 
                    <p> Calle:</p>
                    <input type="text" name="Calle" value="<?php echo  $row['Calle'];?>"/>
                </div>
                <div class="colCMin-2">
                    <p> No:</p>
                    <input type="number"  name="No" value="<?php echo  $row['Numero'];?>"/>
                </div>
                <div class=" colCMin-3">
                    <p> C.P:</p>
                    <input type="text" name="CP" value="<?php echo  $row['CP'];?>"/>
                </div>
                <div class="colC-3 colCMin-6 ">
                    <p> ENTRE CALLE</p>
                    <input type="text" name="Calle1" value="<?php echo  $row['Calle1'];?>"/>
                </div>
                <div class="colC-3  colCMin-6">
                    <p> Y CALLE</p>
                    <input type="text" name="Calle2" value="<?php echo  $row['Calle2'];?>"/>
                </div>
                <div class="colC-6 colR-2  colC-Complet">
                    <p>OTRA REFERENCIA</p>
                    <textarea name="referencia"><?php echo  $row['Referencia'];?> </textarea>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>COLONIA</p>
                    <input type="text" name="Colonia" value="<?php echo  $row['Colonia'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>MUNICIPIO</p>
                    <input type="text" name="Municipio" value="<?php echo  $row['Municipio'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TELEFONO DE CASA</p>
                    <input type="tel" name="TelCasa" value="<?php echo  $row['Tel_casa'];?>"/>
                </div>

<!-----------------------------------DATOS MEDICOS---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS MEDICOS:</h2>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>NUMERO DE EMERGENCIA:</p>
                    <input type="tel" name="numEmergencia"  value="<?php echo  $row['Tel_emergencia'];?>"/>
                </div>
                <div class="colCMin-5">
                    <p>TALLA:</p>
                    <input type="text" name="Talla"  value="<?php echo  $row['Talla'];?>"/>
                </div>
                <div class="colCMin-5">
                    <p>PESO:</p>
                    <input type="text" name="peso"  value="<?php echo  $row['Peso'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TIPO DE SANGRE:</p>
                    <select name="tipoSangre">
                        <option value="A+" <?php if($row['Tipo_sangre']=="A+") echo "selected";?>>A+</option>
                        <option value="A-" <?php if($row['Tipo_sangre']=="A-") echo "selected";?>>A-</option>
                        <option value="B+" <?php if($row['Tipo_sangre']=="B+") echo "selected";?>>B+</option>
                        <option value="B-" <?php if($row['Tipo_sangre']=="B-") echo "selected";?>>B-</option>
                        <option value="AB+" <?php if($row['Tipo_sangre']=="AB+") echo "selected";?>>AB+</option>
                        <option value="AB-" <?php if($row['Tipo_sangre']=="AB-") echo "selected";?>>AB-</option>
                        <option value="O+" <?php if($row['Tipo_sangre']=="O+") echo "selected";?>>O+</option>
                        <option value="O-" <?php if($row['Tipo_sangre']=="O-") echo "selected";?>>O-</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>ALERGIAS:</p>
                    <input type="text" name="alergia"  value="<?php echo  $row['Alergias'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>PADECIMIENTOS:</p>
                    <input type="text" name="padecimiento"  value="<?php echo  $row['padecimiento'];?>"/>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>PIE PLANO:</p>
                    <select name="piePlano">
                        <option>  </option>
                        <option value="No" <?php if($row['Pie_plano']=="No") echo "selected" ?>>No</option>
                        <option value="Si" <?php if($row['Pie_plano']=="Si") echo "selected" ?>>Si</option>
                    </select>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>USA LENTES:</p>
                    <select name="lentes">
                        <option>  </option>
                        <option value="No"<?php if($row['lentes']=="No") echo "selected" ?>>No</option>
                        <option value="Si"<?php if($row['lentes']=="Si") echo "selected" ?>>Si</option>
                    </select>
                </div>
<!-----------------------------------tutor1---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT1" value="<?php echo  $row['NombreT1'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT1" value="<?php echo  $row['Apellido_pT1'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT1" value="<?php echo  $row['Apellido_mT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT1" class="mayusculas" maxlength="18" value="<?php echo  $row['CURP_tutor1'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT1" value="<?php echo  $row['EdadT1'];?>"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT1" value="<?php echo  $row['ParentescoT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT1">
                        <option></option>
                        <option value="Casado" <?php if("Casado"==$row['Estado_civilT1'] ) echo "selected";?>>Casado(a)</option>
                        <option value="Conviviente" <?php if("Conviviente"==$row['Estado_civilT1'] ) echo "selected";?>>Conviviente</option>
                        <option value="Anulado" <?php if("Anulado"==$row['Estado_civilT1'] ) echo "selected";?>>Anulado(a)</option>
                        <option value="Separado de unión legal" <?php if("Separado de unión legal"==$row['Estado_civilT1'] ) echo "selected";?>>Separado de unión legal</option>
                        <option value="Separado_union" <?php if("Separado_unio"==$row['Estado_civilT1'])  echo "selected";?>>Separado(a) de unión de hecho</option>
                        <option value="Viudo" <?php if("Viudo"==$row['Estado_civilT1'] ) echo "selected";?>>Viudo(a)</option>
                        <option value="Soltero" <?php if("Soltero"==$row['Estado_civilT1'] ) echo "selected";?>>Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT1" value="<?php echo  $row['OcupacionT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT1" value="<?php echo  $row['Grado_estudiosT1'];?>"/>
                </div>
<!-----------------------------------tutor2---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL SEGUNDO PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin"> 
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT2" value="<?php echo  $row['NombreT2'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT2" value="<?php echo  $row['Apellido_pT2'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT2" value="<?php echo  $row['Apellido_mT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT2"  class="mayusculas" maxlength="18" value="<?php echo  $row['CURP_tutor2'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT2" value="<?php echo  $row['EdadT2'];?>"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT2" value="<?php echo  $row['ParentescoT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT2">
                        <option></option>
                        <option value="Casado" <?php if("Casado"==$row['Estado_civilT2'] ) echo "selected";?>>Casado(a)</option>
                        <option value="Conviviente" <?php if("Conviviente"==$row['Estado_civilT2'] ) echo "selected";?>>Conviviente</option>
                        <option value="Anulado" <?php if("Anulado"==$row['Estado_civilT2'] ) echo "selected";?>>Anulado(a)</option>
                        <option value="Separado de unión legal" <?php if("Separado de unión legal"==$row['Estado_civilT2'] ) echo "selected";?>>Separado de unión legal</option>
                        <option value="Separado_union" <?php if("Separado_unio"==$row['Estado_civilT2'])  echo "selected";?>>Separado(a) de unión de hecho</option>
                        <option value="Viudo" <?php if("Viudo"==$row['Estado_civilT2'] ) echo "selected";?>>Viudo(a)</option>
                        <option value="Soltero" <?php if("Soltero"==$row['Estado_civilT2'] ) echo "selected";?>>Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT2" value="<?php echo  $row['OcupacionT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT2" value="<?php echo  $row['Grado_estudiosT2'];?>"/>
                </div>
<!-----------------------------------DATOS GENERALES---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS GENERALES:</h2>
                </div>
                <div class="colC-Complet">
                    <p>¿CUANTAS PERSONAS INCLUYENDO AL ALUMNO (A) VIVEN EN ESE DOMICILIO?:</p>
                    <input type="text" name="vivenC" value="<?php echo $row['personas_Viven'];?>"/>
                </div>
                <div class="colC-Complet">
                    <p>¿QUIÉN SOSTIENE ECONOMICAMENTE AL HOGAR? SEÑALE LA OPCIÓN </p>
                    <div class="row-Grid">  
                        <div class="colCMin-2">
                            <label for="hogarPadre">PADRE</label>                    
                            <input type="radio" name="sostenHogar" <?php if($row['sosten_H']=="PADRE") echo "checked";?>  value="PADRE" id="hogarPadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarMadre">MADRE</label>                    
                            <input type="radio" name="sostenHogar" <?php if($row['sosten_H']=="MADRE") echo "checked";?>  value="MADRE" id="hogarMadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarAmbos">AMBOS</label>                    
                            <input type="radio" name="sostenHogar" <?php if($row['sosten_H']=="AMBOS") echo "checked";?>  value="AMBOS" id="hogarAmbos"/>
                        </div> 
                        <div class="colCMin-2">
                            <label for="hogarOtro">OTRO</label>                    
                            <input type="radio" name="sostenHogar" <?php if($row['sosten_H']=="OTRO") echo "checked";?>  value="OTRO" id="hogarOtro"/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <p>¿CON QUE MEDIOS CUENTA?</p>
                    <div class="row-Grid">
                        <div class="colCMin-2">  
                            <label for="medioInternet">INTERNET</label>                    
                            <input type="checkbox" name="internet" value="si" id="medioInternet" <?php if($row['INTERNET']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTelevision">TELEVISIÓN</label>                    
                            <input type="checkbox" name="television" value="si" id="medioTelevision" <?php if($row['TELEVISIÓN']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioCelular">CELULAR</label>                    
                            <input type="checkbox" name="celular" value="si" id="medioCelular" <?php if($row['CELULAR']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTablet">TABLET</label>                    
                            <input type="checkbox" name="tablet" value="si" id="medioTablet" <?php if($row['TABLET']=="si") echo "checked";?>/>
                        </div>
                        <div class="colC-Complet">
                            <label for="medioComputadora">COMPUTADORA (POSTATIL O DE ESCRITORIO)</label>                    
                            <input type="checkbox" name="computadora" value="si" id="medioComputadora" class="COMPUTADORA" <?php if($row['computadora']=="si") echo "checked";?>/>
                        </div>
                    </div>
                </div>

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
        </div>
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
}}else{
    echo "<script>alert('no existe un inicio de secion');window.location='/base-de-datos-escuela/'</script>";
}
?>