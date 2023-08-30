<?php
        include_once '../includes/user.php';
        include_once '../includes/user_session.php';
         
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
                    <input type="text" name="Nombre"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Paterno:</p>
                    <input type="text"  name="ApeidoP"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p> Apeido Materno:</p>
                    <input type="text" name="ApeidoM"/>
                </div>
                <div class="colCMin-4">
                    <p> Grado:</p>
                    <select name="Grado">
                        <option>  </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="colCMin-4">
                    <p> Grupo:</p>
                    <select name="Grupo">
                        <option>  </option> 
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-7">
                    <p> Turno:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                    </select>
                </div>
                <div class="colC-4 colC-CompletMin">
                    <p> CURP:</p>
                    <input type="text" name="CURP"  class="mayusculas" maxlength="18"/>
                </div>
                <div class="colC-3 colCMin-9 ">
                    <p> Fecha de nacimiento:</p>
                    <input type="text" id="date1" name="Fecha_n"/>
                </div>
                <div class=" colCMin-4">
                    <p>Edad:</p>
                    <input type="number" name="edad"/>
                </div>
                <div class="colC-4 colCMin-8 ">
                    <p> Correo Electronico:</p>
                    <input type="email" name="CorreoAlu"/>
                </div>
<!------------------------------------DOMICILIO---------------------------------------------------->
                <div class="colC-Complet ">
                    <h2>DOMICILIO:</h2>
                </div>
                <div class="colC-3 colCMin-6"> 
                    <p> Calle:</p>
                    <input type="text" name="Calle"/>
                </div>
                <div class="colCMin-2">
                    <p> No:</p>
                    <input type="number"  name="No"/>
                </div>
                <div class=" colCMin-3">
                    <p> C.P:</p>
                    <input type="text" name="CP"/>
                </div>
                <div class="colC-3 colCMin-6 ">
                    <p> ENTRE CALLE</p>
                    <input type="text" name="Calle1"/>
                </div>
                <div class="colC-3  colCMin-6">
                    <p> Y CALLE</p>
                    <input type="text" name="Calle2"/>
                </div>
                <div class="colC-6 colR-2  colC-Complet">
                    <p>OTRA REFERENCIA</p>
                    <textarea name="referencia"> </textarea>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>COLONIA</p>
                    <input type="text" name="Colonia"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>MUNICIPIO</p>
                    <input type="text" name="Municipio"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TELEFONO DE CASA</p>
                    <input type="tel" name="TelCasa"/>
                </div>

<!-----------------------------------DATOS MEDICOS---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS MEDICOS:</h2>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>NUMERO DE EMERGENCIA:</p>
                    <input type="tel" name="numEmergencia"/>
                </div>
                <div class="colCMin-5">
                    <p>TALLA:</p>
                    <input type="text" name="Talla"/>
                </div>
                <div class="colCMin-5">
                    <p>PESO:</p>
                    <input type="text" name="peso"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>TIPO DE SANGRE:</p>
                    <select name="tipoSangre">
                        <option></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>ALERGIAS:</p>
                    <input type="text" name="alergia"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>PADECIMIENTOS:</p>
                    <input type="text" name="padecimiento"/>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>PIE PLANO:</p>
                    <select name="piePlano">
                        <option>  </option>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
                <div class="colC-2 colCMin-4">
                    <p>USA LENTES:</p>
                    <select name="lentes">
                        <option>  </option>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
<!-----------------------------------tutor1---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT1"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT1"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT1"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT1" class="mayusculas" maxlength="18"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT1"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT1"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT1">
                        <option></option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Conviviente">Conviviente</option>
                        <option value="Anulado">Anulado(a)</option>
                        <option value="Separado de unión legal">Separado de unión legal</option>
                        <option value="Separado_union">Separado(a) de unión de hecho</option>
                        <option value="Viudo">Viudo(a)</option>
                        <option value="Soltero">Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT1"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT1"/>
                </div>
<!-----------------------------------tutor2---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL SEGUNDO PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT2"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT2"/>
                </div>
                <div class="colC-3 colC-CompletMin">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT2"/>
                </div>
                <div class="colC-3 colCMin-8">
                    <p>CURP:</p>
                    <input type="text" name="CURPT2"  class="mayusculas" maxlength="18"/>
                </div>
                <div class="colCMin-4">
                    <p>EDAD:</p>
                    <input type="number" name="edadT2"/>
                </div>
                <div class="colC-4 colCMin-8">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT2"/>
                </div>
                <div class="colC-3 colCMin-10">
                    <p>ESTADO CIVIL:</p>
                    <select name="Estado_civilT2">
                        <option></option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Conviviente">Conviviente</option>
                        <option value="Anulado">Anulado(a)</option>
                        <option value="Separado de unión legal">Separado de unión legal</option>
                        <option value="Separado_union">Separado(a) de unión de hecho</option>
                        <option value="Viudo">Viudo(a)</option>
                        <option value="Soltero">Soltero(a)</option>
                    </select>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT2"/>
                </div>
                <div class="colC-3 colCMin-6">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT2"/>
                </div>
<!-----------------------------------DATOS GENERALES---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS GENERALES:</h2>
                </div>
                <div class="colC-Complet">
                    <p>¿CUANTAS PERSONAS INCLUYENDO AL ALUMNO (A) VIVEN EN ESE DOMICILIO?:</p>
                    <input type="text" name="vivenC"/>
                </div>
                <div class="colC-Complet">
                    <p>¿QUIÉN SOSTIENE ECONOMICAMENTE AL HOGAR? SEÑALE LA OPCIÓN </p>
                    <div class="row-Grid">  
                        <div class="colCMin-2">
                            <label for="hogarPadre">PADRE</label>                    
                            <input type="radio" name="sostenHogar"  value="PADRE" id="hogarPadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarMadre">MADRE</label>                    
                            <input type="radio" name="sostenHogar"  value="MADRE" id="hogarMadre"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarAmbos">AMBOS</label>                    
                            <input type="radio" name="sostenHogar"  value="AMBOS" id="hogarAmbos"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="hogarOtro">OTRO</label>                    
                            <input type="radio" name="sostenHogar"  value="OTRO" id="hogarOtro"/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <p>¿CON QUE MEDIOS CUENTA?</p>
                    <div class="row-Grid">
                        <div class="colCMin-2">  
                            <label for="medioInternet">INTERNET</label>                    
                            <input type="checkbox" name="internet" value="si" id="medioInternet"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTelevision">TELEVISIÓN</label>                    
                            <input type="checkbox" name="television" value="si" id="medioTelevision"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioCelular">CELULAR</label>                    
                            <input type="checkbox" name="celular" value="si" id="medioCelular"/>
                        </div>
                        <div class="colCMin-2">
                            <label for="medioTablet">TABLET</label>                    
                            <input type="checkbox" name="tablet" value="si" id="medioTablet"/>
                        </div>
                        <div class="colC-Complet">
                            <label for="medioComputadora">COMPUTADORA (POSTATIL O DE ESCRITORIO)</label>                    
                            <input type="checkbox" name="computadora" value="si" id="medioComputadora" class="computadora"/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <input type="submit" value="Guardar Datos" name="acction" class="btn btnAgregar"/>
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