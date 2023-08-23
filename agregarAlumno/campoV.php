<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php'; 
        session_start();
        $alumnoDatosSession = $_SESSION['alumnoDatos'];
        $datosMedicosASession = $_SESSION['datosMedicosA'];
        $tutor1ASession = $_SESSION['tutor1A'];
        $tutor2ASession = $_SESSION['tutor2A'];
        $DomicilioASession = $_SESSION['DomicilioA'];
        $datosGeneralesASession = $_SESSION['datosGeneralesA'];
        $userSession = new UserSession();
        $user = new User(); 
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
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
            <form action="./alumno_C.php" method="post" name="form" class="form">
<!------------------------------------DATOS ALUMNO---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL ALUMNO:</h2>
                </div>
                <div class="colC-4 colC-CompletMin">
                    <p> Nombre(s):</p>
                    <input type="text" name="Nombre" value="<?php echo  $alumnoDatosSession['Nombre'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Paterno:</p>
                    <input type="text"  name="ApeidoP" value="<?php echo  $alumnoDatosSession['ApeidoP'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Materno:</p>
                    <input type="text" name="ApeidoM" value="<?php echo  $alumnoDatosSession['ApeidoM'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p> Grado:</p>
                    <select name="Grado">
                        <option>  </option>
                        <option value="1" <?php if($alumnoDatosSession['Grado']=="1") echo "selected"; ?>>1</option>
                        <option value="2" <?php if($alumnoDatosSession['Grado']=="2") echo "selected"; ?>>2</option>
                        <option value="3" <?php if($alumnoDatosSession['Grado']=="3") echo "selected"; ?>>3</option>
                        <option value="4" <?php if($alumnoDatosSession['Grado']=="4") echo "selected"; ?>>4</option>
                        <option value="5" <?php if($alumnoDatosSession['Grado']=="5") echo "selected"; ?>>5</option>
                        <option value="6" <?php if($alumnoDatosSession['Grado']=="6") echo "selected"; ?>>6</option>
                    </select>
                </div>
                <div class="colCMin-4">
                    <p> Grupo:</p> 
                    <select name="Grupo">
                        <option>  </option> 
                        <option value="A"  <?php if($alumnoDatosSession['Grupo']=="A") echo "selected"; ?>>A</option>
                        <option value="B"  <?php if($alumnoDatosSession['Grupo']=="B") echo "selected"; ?>>B</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-7">
                    <p> Turno:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino" <?php if($alumnoDatosSession['Turno']=="Matutino") echo "selected"; ?>>Matutino</option>
                        <option value="Vespertino" <?php if($alumnoDatosSession['Turno']=="Vespertino") echo "selected"; ?>>Vespertino</option>
                    </select>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> CURP:</p>
                    <input type="text" name="CURP"  class="mayusculas" value="<?php echo  $alumnoDatosSession['CURP'];?>" maxlength="18"/>
                </div>
                <div class="colC-3 colCMin-9 ">
                    <p> Fecha de nacimiento:</p>
                    <input type="text" id="date1" name="Fecha_n" value="<?php echo  $alumnoDatosSession['Fecha_n'];?>"/>
                </div>
                <div class=" colCMin-4">
                    <p>Edad:</p>
                    <input type="number" name="edad" value="<?php echo  $alumnoDatosSession['edad'];?>"/>
                </div>
                <div class="colC-4 colCMin-8 ">
                    <p> Correo Electronico:</p>
                    <input type="email" name="CorreoAlu" value="<?php echo  $alumnoDatosSession['CorreoAlu'];?>"/>
                </div>
<!------------------------------------DOMICILIO---------------------------------------------------->
                <div class="colC-Complet ">
                    <h2>DOMICILIO:</h2>
                </div>
                <div class="colC-3 colCMin-6"> 
                    <p> Calle:</p>
                    <input type="text" name="Calle" value="<?php echo  $DomicilioASession['Calle'];?>"/>
                </div>
                <div class="colCMin-2">
                    <p> No:</p>
                    <input type="number"  name="No" value="<?php echo  $DomicilioASession['No'];?>"/>
                </div>
                <div class=" colCMin-3">
                    <p> C.P:</p>
                    <input type="text" name="CP" value="<?php echo  $DomicilioASession['CP'];?>"/>
                </div>
                <div class="colC-3 colCMin-6 ">
                    <p> ENTRE CALLE</p>
                    <input type="text" name="Calle1" value="<?php echo  $DomicilioASession['Calle1'];?>"/>
                </div>
                <div class="colC-3  colCMin-6">
                    <p> Y CALLE</p>
                    <input type="text" name="Calle2" value="<?php echo  $DomicilioASession['Calle2'];?>"/>
                </div>
                <div class="colC-6 colR-2  colC-Complet">
                    <p>OTRA REFERENCIA</p>
                    <textarea name="referencia"><?php echo  $DomicilioASession['referencia'];?> </textarea>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>COLONIA</p>
                    <input type="text" name="Colonia" value="<?php echo  $DomicilioASession['Colonia'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>MUNICIPIO</p>
                    <input type="text" name="Municipio" value="<?php echo  $DomicilioASession['Municipio'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TELEFONO DE CASA</p>
                    <input type="tel" name="TelCasa" value="<?php echo  $DomicilioASession['TelCasa'];?>"/>
                </div>

<!-----------------------------------DATOS MEDICOS---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS MEDICOS:</h2>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>NUMERO DE EMERGENCIA:</p>
                    <input type="tel" name="numEmergencia"  value="<?php echo  $datosMedicosASession['numEmergencia'];?>"/>
                </div>
                <div class="colCMin-5">
                    <p>TALLA:</p>
                    <input type="text" name="Talla"  value="<?php echo  $datosMedicosASession['Talla'];?>"/>
                </div>
                <div class="colCMin-5">
                    <p>PESO:</p>
                    <input type="text" name="peso"  value="<?php echo  $datosMedicosASession['peso'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TIPO DE SANGRE:</p>
                    <select name="tipoSangre">
                        <option value="A+" <?php if($datosMedicosASession['tipoSangre']=="A+") echo "selected";?>>A+</option>
                        <option value="A-" <?php if($datosMedicosASession['tipoSangre']=="A-") echo "selected";?>>A-</option>
                        <option value="B+" <?php if($datosMedicosASession['tipoSangre']=="B+") echo "selected";?>>B+</option>
                        <option value="B-" <?php if($datosMedicosASession['tipoSangre']=="B-") echo "selected";?>>B-</option>
                        <option value="AB+" <?php if($datosMedicosASession['tipoSangre']=="AB+") echo "selected";?>>AB+</option>
                        <option value="AB-" <?php if($datosMedicosASession['tipoSangre']=="AB-") echo "selected";?>>AB-</option>
                        <option value="O+" <?php if($datosMedicosASession['tipoSangre']=="O+") echo "selected";?>>O+</option>
                        <option value="O-" <?php if($datosMedicosASession['tipoSangre']=="O-") echo "selected";?>>O-</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>ALERGIAS:</p>
                    <input type="text" name="alergia"  value="<?php echo  $datosMedicosASession['alergia'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>PADECIMIENTOS:</p>
                    <input type="text" name="padecimiento"  value="<?php echo  $datosMedicosASession['padecimiento'];?>"/>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>PIE PLANO:</p>
                    <select name="piePlano">
                        <option>  </option>
                        <option value="No" <?php if($datosMedicosASession['piePlano']=="No") echo "selected" ?>>No</option>
                        <option value="Si" <?php if($datosMedicosASession['piePlano']=="Si") echo "selected" ?>>Si</option>
                    </select>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>USA LENTES:</p>
                    <select name="lentes">
                        <option>  </option>
                        <option value="No"<?php if($datosMedicosASession['lentes']=="No") echo "selected" ?>>No</option>
                        <option value="Si"<?php if($datosMedicosASession['lentes']=="Si") echo "selected" ?>>Si</option>
                    </select>
                </div>
<!-----------------------------------tutor1---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT1" value="<?php echo  $tutor1ASession['nombreT1'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT1" value="<?php echo  $tutor1ASession['apellidoPT1'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT1" value="<?php echo  $tutor1ASession['apellidoMT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT1" class="mayusculas" maxlength="18" value="<?php echo  $tutor1ASession['CURPT1'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT1" value="<?php echo  $tutor1ASession['edadT1'];?>"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT1" value="<?php echo  $tutor1ASession['parentescoT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT1">
                        <option></option>
                        <option value="Casado" <?php if("Casado"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Casado(a)</option>
                        <option value="Conviviente" <?php if("Conviviente"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Conviviente</option>
                        <option value="Anulado" <?php if("Anulado"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Anulado(a)</option>
                        <option value="Separado de unión legal" <?php if("Separado de unión legal"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Separado de unión legal</option>
                        <option value="Separado_union" <?php if("Separado_unio"==$tutor1ASession['Estado_civilT1'])  echo "selected";?>>Separado(a) de unión de hecho</option>
                        <option value="Viudo" <?php if("Viudo"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Viudo(a)</option>
                        <option value="Soltero" <?php if("Soltero"==$tutor1ASession['Estado_civilT1'] ) echo "selected";?>>Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT1" value="<?php echo  $tutor1ASession['ocupacionT1'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT1" value="<?php echo  $tutor1ASession['estudioT1'];?>"/>
                </div>
<!-----------------------------------tutor2---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL SEGUNDO PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT2" value="<?php echo  $tutor2ASession['nombreT2'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT2" value="<?php echo  $tutor2ASession['apellidoPT2'];?>"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT2" value="<?php echo  $tutor2ASession['apellidoMT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT2"  class="mayusculas" maxlength="18" value="<?php echo  $tutor2ASession['CURPT2'];?>"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT2" value="<?php echo  $tutor2ASession['edadT2'];?>"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT2" value="<?php echo  $tutor2ASession['parentescoT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT2">
                        <option></option>
                        <option value="Casado" <?php if("Casado"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Casado(a)</option>
                        <option value="Conviviente" <?php if("Conviviente"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Conviviente</option>
                        <option value="Anulado" <?php if("Anulado"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Anulado(a)</option>
                        <option value="Separado de unión legal" <?php if("Separado de unión legal"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Separado de unión legal</option>
                        <option value="Separado_union" <?php if("Separado_unio"==$tutor2ASession['Estado_civilT2'])  echo "selected";?>>Separado(a) de unión de hecho</option>
                        <option value="Viudo" <?php if("Viudo"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Viudo(a)</option>
                        <option value="Soltero" <?php if("Soltero"==$tutor2ASession['Estado_civilT2'] ) echo "selected";?>>Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT2" value="<?php echo  $tutor2ASession['ocupacionT2'];?>"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT2" value="<?php echo  $tutor2ASession['estudioT2'];?>"/>
                </div>
<!-----------------------------------DATOS GENERALES---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS GENERALES:</h2>
                </div>
                <div class="colC-Complet">
                    <p>¿CUANTAS PERSONAS INCLUYENDO AL ALUMNO (A) VIVEN EN ESE DOMICILIO?:</p>
                    <input type="text" name="vivenC" value="<?php echo $datosGeneralesASession['vivenC'];?>"/>
                </div>
                <div class="colC-Complet">
                    <p>¿QUIÉN SOSTIENE ECONOMICAMENTE AL HOGAR? SEÑALE LA OPCIÓN </p>
                    <div class="row-Grid">  
                        <div class="colCMin-2">
                            <label for="hogarPadre">PADRE</label>                    
                            <input type="radio" name="sostenHogar" <?php if($datosGeneralesASession['sostenHogar']=="PADRE") echo "checked";?>  value="PADRE" id="hogarPadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarMadre">MADRE</label>                    
                            <input type="radio" name="sostenHogar" <?php if($datosGeneralesASession['sostenHogar']=="MADRE") echo "checked";?>  value="MADRE" id="hogarMadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarAmbos">AMBOS</label>                    
                            <input type="radio" name="sostenHogar" <?php if($datosGeneralesASession['sostenHogar']=="AMBOS") echo "checked";?>  value="AMBOS" id="hogarAmbos"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarOtro">OTRO</label>                    
                            <input type="radio" name="sostenHogar" <?php if($datosGeneralesASession['sostenHogar']=="OTRO") echo "checked";?>  value="OTRO" id="hogarOtro"/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <p>¿CON QUE MEDIOS CUENTA?</p>
                    <div class="row-Grid">
                        <div class="colCMin-2">  
                            <label for="medioInternet">INTERNET</label>                    
                            <input type="checkbox" name="internet" value="si" id="medioInternet" <?php if($datosGeneralesASession['internet']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTelevision">TELEVISIÓN</label>                    
                            <input type="checkbox" name="television" value="si" id="medioTelevision" <?php if($datosGeneralesASession['television']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioCelular">CELULAR</label>                    
                            <input type="checkbox" name="celular" value="si" id="medioCelular" <?php if($datosGeneralesASession['celular']=="si") echo "checked";?>/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTablet">TABLET</label>                    
                            <input type="checkbox" name="tablet" value="si" id="medioTablet" <?php if($datosGeneralesASession['tablet']=="si") echo "checked";?>/>
                        </div>
                        <div class="colC-Complet">
                            <label for="medioComputadora">COMPUTADORA (POSTATIL O DE ESCRITORIO)</label>                    
                            <input type="checkbox" name="computadora" value="si" id="medioComputadora" class="computadora" <?php if($datosGeneralesASession['computadora']=="si") echo "checked";?>/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <input type="submit" value="Guardar Datos" name="acction" class="btn"/>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/base-de-datos-escuela'</script>";
}
?>