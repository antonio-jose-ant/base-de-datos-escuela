create database escuela;
use escuela;
CREATE TABLE datos_laborales ( 
    CURP varchar(18) NOT NULL, 
    Nombre_Dependencia varchar(50),
    CCT varchar (20),
    Domicilio_Particular varchar(50), 
    No_Int int(4),
    Colonia_Fracc varchar(50),
    Ciudad_laboral varchar(40),
    Localidad_laboral varchar(40),
    Municipio_laboral varchar(40),
    CP_laboral int(5),
    TEL_Celular_laboral VARCHAR(14),
    Fecha_Ingreso_GEM date,
    Numero_Prelación int(10),
    Antiguedad varchar(5),
    Puesto_Profeciona varchar(40),
    Categoria_TalonCheque varchar(30),
    Estado_Categoria  varchar(30),
    Plaza_Principal varchar(30),
    Plaza_Secundaria varchar(30),
    Clave_S_Plublico varchar(30),
    H_Lt1 TIME,
    H_Lt1_2 TIME,
    CCT_S_Plaza INT,
    H_Lt2 TIME,
    H_Lt2_2 TIME,
    PRIMARY KEY (CURP)
);
create table datos_profecionales( 
    RFC varchar(13), 
    Preparacion_Profecional varchar(50),
    Titulado varchar(30),
    Escuela_Procedencia varchar(50),
    No_Cédula_Profecional  int(15),
    Posgrado varchar(30),
    Grado_Obtenido varchar(30),
    Incorporacion_Carrera_Magistral varchar(30),
    Fecha_Dictamen date,
    Numero_Dicatamen int(20),
    Nivel_Variante varchar(40),
    Otros_Estudios varchar(50),
    primary key (RFC)
); 

CREATE TABLE profesor(
    nomina varchar(30), 
    nombre varchar(30), 
    apellidoP varchar(30), 
    apellidoM varchar(30),
    ColoniaFracc varchar(100), 
    Direccion varchar(60), 
    Ciudad varchar(50),
    no_int varchar(10),
    no_ext varchar(10),
    municipio varchar(50), 
    CP int,
    localidadProfesor varchar(50),
    gradoMEstudio VARCHAR(15),
    telefonoPersonal varchar(12), 
    telefonoCasa varchar(12), 
    correoElectronico varchar(50), 
    edad int, 
    sexo varchar(1),
    Lugar_De_Nacimiento varchar(60),
    EstadoCivil varchar(31), 
    nombrePareja varchar(50),
    redSocial varchar(30),
    CURP varchar(30), 
    primary key (nomina),
    RFC varchar(30),
    FOREIGN KEY (CURP) REFERENCES datos_laborales(CURP),
    FOREIGN KEY (RFC) REFERENCES datos_profecionales(RFC)
);

create table usuario(
    Nombre varchar(50), 
    UserName varchar(25),
    tipo_usuario varchar(30),
    rfcu varchar(18),
    password varchar(50), 
    unique key (UserName)
);

opcional ALTER TABLE profesor ADD FOREIGN KEY (id_personal) REFERENCES datospersonales (id_personal);
