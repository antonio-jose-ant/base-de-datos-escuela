create table Datos_Alumno(
    matricula varchar(12) not null,
    Nombre_alu varchar(25),
    Apellido_p varchar(25),
    Apellido_m varchar(25),
    CURPAlu varchar(18),
    Fecha_n_alu DATE, 
    Edad_alu int(3), 
    Correo_alu varchar(50),
    grado int(2),
    grupo char(2),
    turno varchar(12),
    PRIMARY key (matricula),
    FOREIGN key (CURPAlu)  REFERENCES datos_medicos(CURPAlu)
);

create table datos_medicos(
    CURPAlu varchar(18),
    Tel_emergencia varchar(12),
    Talla varchar(4),
    Peso int (2),
    Tipo_sangre varchar(12),
    Alergias varchar(100),
    padecimiento varchar(100),
    Pie_plano varchar(2),
    lentes varchar(2),
    PRIMARY KEY (CURPAlu)
);
create table tutor1(
    CURP_tutor1 varchar(18) NOT NULL,
    NombreT1 varchar(25),
    Apellido_pT1 varchar(25),
    Apellido_mT1 varchar(25),
    EdadT1 int (2),
    ParentescoT1 varchar (20),
    Estado_civilT1 varchar (30),
    OcupacionT1 varchar(40),
    Grado_estudiosT1 varchar(40),
    matricula varchar(12),
    FOREIGN KEY (matricula) REFERENCES Datos_Alumno(matricula)
);
create table tutor2(
    CURP_tutor2 varchar(18),
    NombreT2 varchar(25),
    Apellido_pT2 varchar(25),
    Apellido_mT2 varchar(25),
    EdadT2 int (2),
    ParentescoT2 varchar (20),
    Estado_civilT2 varchar (30),
    OcupacionT2 varchar(40),
    Grado_estudiosT2 varchar(40),
    matricula varchar(12),
    FOREIGN KEY (matricula) REFERENCES Datos_Alumno(matricula)
);

create table domicilio(
    Calle varchar(40),
    Numero int (5),
    CP int(5),
    Calle1 varchar(40),
    Calle2 varchar(40),
    Referencia varchar(100),
    Colonia varchar(50),
    Municipio varchar(40),
    Tel_casa varchar(14),
    matricula varchar(12),
    FOREIGN KEY (matricula) REFERENCES Datos_Alumno(matricula)
);

create table Datos_generales(
    personas_Viven int (2),
    sosten_H varchar (6),
    INTERNET varchar(2), 
    TELEVISIÓN varchar(2), 
    CELULAR varchar(2),
    TABLET varchar(2),
    COMPUTADORA varchar(2),
    matricula varchar(12),
    FOREIGN KEY (matricula) REFERENCES Datos_Alumno(matricula)
);