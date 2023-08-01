create database escuela;
use escuela;
CREATE TABLE datosadministracion ( 
    CURP varchar(18) NOT NULL, 
    CedeLugarAdminitracion VARCHAR(60), 
    Domicilio VARCHAR(250), 
    LocalidadColonia VARCHAR(60), 
    MunicipioEscuela VARCHAR(60), 
    C_C_T VARCHAR(60), 
    Telefono varchar(12), 
    CorreoInstituto VARCHAR(80), 
    PRIMARY KEY (CURP)
);
create table DatosPersonales(
    RFC varchar(13), 
    categoria varchar(60), 
    EstadoCategoria varchar(60),
    AñosServico int (2), 
    AñosServicoEnFuncion int (2), 
    preparacionPersonal varchar(20), 
    ClaevServidor varchar(30), 
    FechaIngreso varchar(10), 
    NumeroPlaza int(60), 
    fechaIngresoFuncionActual varchar(10), 
    CodigoPuesto varchar(30),
    PreparacionProfecional varchar(100), 
    primary key (RFC)
);

CREATE TABLE profesor(
    nomina varchar(30), 
    nombre varchar(30), 
    apellidoP varchar(30), 
    apellidoM varchar(30),
    localidadOcolonia varchar(100), 
    Direccion varchar(60), 
    municipio varchar(50), 
    CP int, 
    telefonoPersonal varchar(12), 
    telefonoCasa varchar(12), 
    correoElectronico varchar(50), 
    edad int, 
    EstadoCivil varchar(8), 
    redSocial varchar(30),
    CURP varchar(30), 
    primary key (nomina),
    RFC varchar(30),
    FOREIGN KEY (CURP) REFERENCES datosadministracion(CURP),
    FOREIGN KEY (RFC) REFERENCES datospersonales(RFC)
);
create table usuario(
    Nombre varchar(50), 
    UserName varchar(25),
    tipo_usuario varchar(30),
    password varchar(50), 
    unique key (UserName)
);

opcional ALTER TABLE profesor ADD FOREIGN KEY (id_personal) REFERENCES datospersonales (id_personal);
