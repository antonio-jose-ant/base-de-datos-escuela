<?php
        $conexion=mysqli_connect("localhost", "root", "TOYOTS99", "escuela");
        mysqli_set_charset($conexion, "utf8");


        $usuarios ="SELECT * FROM   alumnos";
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
                    <input type="date" name="ApeidoM"/>
                </div>
                <div>
                    <p> Edad:</p>
                    <input type="number" name="ApeidoM"/>
                </div>
                <div class="colC-4">
                    <p> Correo Electronico:</p>
                    <input type="email" name="ApeidoM"/>
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
                <div class="colC-4 colR-2">
                    <p>OTRA REFERENCIA</p>
                    <textarea> </textarea>
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
                    <input type="tel" name="TelCasa"/>
                </div>
                <div>
                    <p>TALLA:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div>
                    <p>PESO:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>TIPO DE SANGRE:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>ALERGIAS:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>PADECIMIENTOS:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-2">
                    <p>PIE PLANO:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino">No</option>
                        <option value="Vespertino">Si</option>
                    </select>
                </div>
                <div class="colC-2">
                    <p>USA LENTES:</p>
                    <select name="Turno">
                        <option>  </option>
                        <option value="Matutino">No</option>
                        <option value="Vespertino">Si</option>
                    </select>
                </div>
<!-----------------------------------tutor1---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3">
                    <p>NOMBRE:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Paterno:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Materno:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>CURP:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div>
                    <p>EDAD:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-4">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>ESTADO CIVIL:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>OCUPACION:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
<!-----------------------------------tutor2---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS DEL SEGUNDO PADRE/MADRE/TUTOR:</h2>
                </div>
                <div class="colC-3">
                    <p>NOMBRE:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Paterno:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>Apeido Materno:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>CURP:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div>
                    <p>EDAD:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-4">
                    <p>RELACIÓN DE PARENTESCO:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>ESTADO CIVIL:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>OCUPACION:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
                <div class="colC-3">
                    <p>GRADO DE ESTUDIOS:</p>
                    <input type="tel" name="TelCasa"/>
                </div>
<!-----------------------------------DATOS MEDICOS---------------------------------------------------->
                <div class="colC-Complet">
                    <h2>DATOS GENERALES:</h2>
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