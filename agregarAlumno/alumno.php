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
</head>
    <body> 
        <div>   
            <form action="insertar.php" method="post" name="form" class="form">
<!------------------------------------DATOS ALUMNO---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL ALUMNO:</h2>
                </div>
                <div class="colC-4">
                    <p> Nombre(s):</p>
                    <input type="text" name="Nombre"/>
                </div>
                <div class="colC-3">
                    <p> Apeido Paterno:</p>
                    <input type="text"  name="ApeidoP"/>
                </div>
                <div class="colC-3">
                    <p> Apeido Materno:</p>
                    <input type="text" name="ApeidoM"/>
                </div>
                <div>
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
                <div>
                    <p> Grupo:</p>
                    <select name="Grupo">
                        <option>  </option> 
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>
                </div>
                <div class="colC-3">
                    <p> Turno:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                    </select>
                </div>
                <div class="colC-3">
                    <p> CURP:</p>
                    <input type="text" name="CURP"/>
                </div>

                <div class="colC-3">
                    <p> Fecha de nacimiento:</p>
                    <input type="date" name="Fecha_n"/>
                </div>
                <div>
                    <p>Edad:</p>
                    <input type="number" name="edad"/>
                </div>
                <div class="colC-4">
                    <p> Correo Electronico:</p>
                    <input type="email" name="CorreoAlu"/>
                </div>
<!------------------------------------DOMICILIO---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DOMICILIO:</h2>
                </div>
                <div class="colC-3">
                    <p> Calle:</p>
                    <input type="text" name="Calle"/>
                </div>
                <div>
                    <p> No:</p>
                    <input type="number"  name="No"/>
                </div>
                <div>
                    <p> C.P:</p>
                    <input type="text" name="CP"/>
                </div>
                <div class="colC-3">
                    <p> ENTRE CALLE</p>
                    <input type="text" name="Calle1"/>
                </div>
                <div class="colC-3">
                    <p> Y CALLE</p>
                    <input type="text" name="Calle2"/>
                </div>
                <div class="colC-6 colR-2">
                    <p>OTRA REFERENCIA</p>
                    <textarea name="referencia"> </textarea>
                </div>
                <div class="colC-3">
                    <p>COLONIA</p>
                    <input type="text" name="Colonia"/>
                </div>
                <div class="colC-3">
                    <p>MUNICIPIO</p>
                    <input type="text" name="Municipio"/>
                </div>
                <div class="colC-3">
                    <p>TELEFONO DE CASA</p>
                    <input type="tel" name="TelCasa"/>
                </div>

<!-----------------------------------DATOS MEDICOS---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS MEDICOS:</h2>
                </div>
                <div class="colC-4">
                    <p>NUMERO DE EMERGENCIA:</p>
                    <input type="tel" name="numEmergencia"/>
                </div>
                <div>
                    <p>TALLA:</p>
                    <input type="text" name="Talla"/>
                </div>
                <div>
                    <p>PESO:</p>
                    <input type="text" name="peso"/>
                </div>
                <div class="colC-3">
                    <p>TIPO DE SANGRE:</p>
                    <select name="tipoSangre">
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
                <div class="colC-3">
                    <p>ALERGIAS:</p>
                    <input type="text" name="alergia"/>
                </div>
                <div class="colC-3">
                    <p>PADECIMIENTOS:</p>
                    <input type="text" name="padecimiento"/>
                </div>
                <div class="colC-2">
                    <p>PIE PLANO:</p>
                    <select name="piePlano">
                        <option>  </option>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
                <div class="colC-2">
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
                <div class="colC-3">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT1"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT1"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT1"/>
                </div>
                <div class="colC-3">
                    <p>CURP:</p>
                    <input type="text" name="CURPT1"/>
                </div>
                <div>
                    <p>EDAD:</p>
                    <input type="number" name="edadT1"/>
                </div>
                <div class="colC-4">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT1"/>
                </div>
                <div class="colC-3">
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
                <div class="colC-3">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT1"/>
                </div>
                <div class="colC-3">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="text" name="estudioT1"/>
                </div>
<!-----------------------------------tutor2---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL SEGUNDO PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3">
                    <p>NOMBRE:</p>
                    <input type="text" name="nombreT2"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Paterno:</p>
                    <input type="text" name="apellidoPT2"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Materno:</p>
                    <input type="text" name="apellidoMT2"/>
                </div>
                <div class="colC-3">
                    <p>CURP:</p>
                    <input type="text" name="CURPT2"/>
                </div>
                <div>
                    <p>EDAD:</p>
                    <input type="number" name="edadT2"/>
                </div>
                <div class="colC-4">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="text" name="parentescoT2"/>
                </div>
                <div class="colC-3">
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
                <div class="colC-3">
                    <p>OCUPACION:</p>
                    <input type="text" name="ocupacionT2"/>
                </div>
                <div class="colC-3">
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
                        <div>
                            <label for="hogarPadre">PADRE</label>                    
                            <input type="radio" name="sostenHogar"  value="PADRE" id="hogarPadre"/>
                        </div>
                        <div>
                            <label for="hogarMadre">MADRE</label>                    
                            <input type="radio" name="sostenHogar"  value="MADRE" id="hogarMadre"/>
                        </div>
                        <div>
                            <label for="hogarAmbos">AMBOS</label>                    
                            <input type="radio" name="sostenHogar"  value="AMBOS" id="hogarAmbos"/>
                        </div>
                        <div>
                            <label for="hogarOtro">OTRO</label>                    
                            <input type="radio" name="sostenHogar"  value="OTRO" id="hogarOtro"/>
                        </div>
                    </div>
                </div>
                <div class="colC-Complet">
                    <p>¿CON QUE MEDIOS CUENTA?</p>
                    <div class="row-Grid">
                        <div> 
                            <label for="medioInternet">INTERNET</label>                    
                            <input type="checkbox" name="internet" value="si" id="medioInternet"/>
                        </div>
                        <div>
                            <label for="medioTelevision">TELEVISIÓN</label>                    
                            <input type="checkbox" name="television" value="si" id="medioTelevision"/>
                        </div>
                        <div>
                            <label for="medioCelular">CELULAR</label>                    
                            <input type="checkbox" name="celular" value="si" id="medioCelular"/>
                        </div>
                        <div>
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
                    <input type="submit"value="Guardar Datos" class="btn"/>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window.location='/escuela'</script>";
}
?>