<?php

require('fpdf/fpdf.php');

session_start();
$maestroDatos = $_SESSION['maestroDatos'];
$datosProfecionales = $_SESSION['datosProfecionales'];
$datosLaborales = $_SESSION['datosLaborales'];
$anchoPag = 210.00155555556;
$altoPag = 297.00008333333;
class PDF extends FPDF
{
 
// Cabecera de página
//se va a mostrar en todas las paginas
function Header()
{
    $anchoPagina = $this->GetPageWidth();//210.00155555556
    $altoPagina = $this->GetPageHeight();//297.00008333333
    $posicionX = $anchoPagina - 70; 
    $this->Image('../assets/img/logo/edomex.png',$posicionX,1,59,12,'png','https://www.youtube.com/watch?v=vsoSeBHqLSQ');
    $this->Image('../assets/img/pdf/go.png',10,1,24,12,'png','https://www.youtube.com/watch?v=30ptGTuG2tA');
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página usando utf8 para que me respte la comilla
    $this->SetXY($anchoPag-80, $altoPag-29); 
    $this->Cell(73,5,utf8_decode('SECRETARÍA DE EDUCACIÓN'),0,0,'R');
    $this->SetXY($anchoPag-80, $altoPag-24); 
    $this->Cell(73,5,utf8_decode('SUBSECRETARÍA DE EDUCACIÓN BÁSICA'),0,0,'R');
    $this->SetXY($anchoPag-80, $altoPag-19); 
    $this->Cell(73,5,utf8_decode('SUBDIRECCIÓN DE EDUCACION BÁSICA TEXCOCO'),0,0,'R');
    $this->SetXY($anchoPag-80, $altoPag-14); 
    $this->Cell(73,5,utf8_decode('SUPERVISIÓN ESCOLAR P2'),0,0,'R');
    $this->Image('../assets/img/pdf/footer.png',0,252,220,28,'png');
}
} 
//apartir de esta line se mostrara el contenido del pdf
$pdf = new PDF();
$pdf->AliasNbPages();
$titulo="2021. Año de la consumación de la independencia de México";

$pdf->AddPage('P', 'Letter');  // 'P' para orientación vertical, 'Letter' para tamaño carta
$pdf->SetFont('arial','',10);
$pdf->ln(4); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20, 5,utf8_decode('"'.$titulo.'".'), 0, 1, 'C',0); // Agregar el texto centrado
$pdf->SetFont('arial','B',10);
$pdf->ln(1); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20, 5,utf8_decode("FICHA DE IDENTIFICACIÓN LABORAL"), 0, 1, 'C',0); // Agregar el texto centrado

$anchoCuadro = 25; // 2.5 cm en milímetros
$altoCuadro = 30; // 3 cm en milímetros

// Convertir las medidas de milímetros a unidades del PDF (72 unidades = 1 pulgada)

$pdf->SetXY($anchoPag-32, 15); // Establecer la posición x e y del texto
$pdf->Cell( $anchoCuadro, $altoCuadro,utf8_decode("foto"), 1, 0, 'C',0); // Agregar el texto centrado

$pdf->SetFont('arial','B',10);
$pdf->ln(10); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-45, 7,utf8_decode("ESCUELA PRIMARIA".'"'."__________________________________".'"'. "    ZONA:_____________"), 0, 1, 'B',0); // Agregar el texto centrado

//daots personales 

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(10, 35); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20,5, utf8_decode('DATOS PERSONALES'),0,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->ln(5);
$pdf->Cell(50,5, 'Nombre Completo:',1,0,'A');
$pdf->Cell($anchoPag-92,5,utf8_decode($maestroDatos['nombre']." ".$maestroDatos['apellidoP']." ".$maestroDatos['apellidoM'] ),1,0,'C');

$pdf->ln(5);
$pdf->Cell(17,5, utf8_decode('RFC:'),1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,5,utf8_decode($datosProfecionales['RFC']),1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,5, utf8_decode('CURP:'),1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,5,utf8_decode($datosLaborales['CURP']),1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,5, utf8_decode('Edad:'),1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,5,utf8_decode($maestroDatos['edad']),1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,5, utf8_decode('Sexo:'),1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(18,5,utf8_decode($maestroDatos['sexo']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(36,5, utf8_decode('Lugar De Nacimiento:'),1,0,'A');
$pdf->SetX(46); // Establecer la posición x e y del texto
$pdf->Cell(65,5,utf8_decode($maestroDatos['Lugar_De_Nacimiento']),1,0,'C');
$pdf->SetX(111); // Establecer la posición x e y del texto
$pdf->Cell(25,5, utf8_decode('Estado Civil:'),1,0,'A');
$pdf->SetX(136); // Establecer la posición x e y del texto
$pdf->Cell(67,5,utf8_decode($maestroDatos['EstadoCivil']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(40,5, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(94,5,$maestroDatos['Direccion'],1,0,'C');
$pdf->SetX(144); // Establecer la posición x e y del texto
$pdf->Cell(15,5, 'No. Ext.:',1,0,'A');
$pdf->SetX(159); // Establecer la posición x e y del texto
$pdf->Cell(13,5,$maestroDatos['no_int'],1,0,'C');
$pdf->SetX(172); // Establecer la posición x e y del texto
$pdf->Cell(15,5, 'No. Int.:',1,0,'A');
$pdf->SetX(187); // Establecer la posición x e y del texto
$pdf->Cell(16,5,$maestroDatos['no_ext'],1,0,'C');

$pdf->ln(5);
$pdf->Cell(31,5, utf8_decode('Colonia y/o Fracc.'),1,0,'A');
$pdf->SetX(41); // Establecer la posición x e y del texto
$pdf->Cell(42,5,utf8_decode($maestroDatos['ColoniaFracc']),1,0,'C');
$pdf->SetX(83); // Establecer la posición x e y del texto
$pdf->Cell(15,5, utf8_decode('Ciudad:'),1,0,'A');
$pdf->SetX(98); // Establecer la posición x e y del texto
$pdf->Cell(46,5,utf8_decode($maestroDatos['Ciudad']),1,0,'C');
$pdf->SetX(144); // Establecer la posición x e y del texto
$pdf->Cell(18,5, 'Localidad:',1,0,'A');
$pdf->SetX(162); // Establecer la posición x e y del texto
$pdf->Cell(41,5,utf8_decode($maestroDatos['localidadProfesor']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(18,5, utf8_decode('Municipio:'),1,0,'A');
$pdf->SetX(28); // Establecer la posición x e y del texto
$pdf->Cell(49,5,utf8_decode($maestroDatos['municipio']),1,0,'C');
$pdf->SetX(77); // Establecer la posición x e y del texto
$pdf->Cell(8,5, utf8_decode('CP:'),1,0,'A');
$pdf->SetX(85); // Establecer la posición x e y del texto
$pdf->Cell(15,5,utf8_decode($maestroDatos['CP']),1,0,'C');
$pdf->SetX(100); // Establecer la posición x e y del texto
$pdf->Cell(23,5, utf8_decode('TEL. Celular:'),1,0,'A');
$pdf->SetX(123); // Establecer la posición x e y del texto
$pdf->Cell(27,5,utf8_decode($maestroDatos['telefonoPersonal']),1,0,'C',false,'tel:' . str_replace('-', '', $maestroDatos['telefonoPersonal']));
$pdf->SetX(150); // Establecer la posición x e y del texto
$pdf->Cell(20,5, utf8_decode('TEL. Casa:'),1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(33,5,utf8_decode($maestroDatos['telefonoCasa']),1,0,'C',false,'tel:' . str_replace('-', '', $maestroDatos['telefonoCasa']));

$pdf->ln(5);
$pdf->Multicell(28,6, utf8_decode("Grado Maximo \nde Estudios:"), 1, 'l', false);
$pdf->SetXY(38,70); // Establecer la posición x e y del texto
$pdf->Cell(50,12,utf8_decode($maestroDatos['gradoMEstudio']),1,0,'C');
$pdf->SetX(143); // Establecer la posición x e y del texto
$pdf->Cell(60,12,utf8_decode($maestroDatos['pareja']),1,0,'C'); 
$pdf->SetX(88); // Establecer la posición x e y del texto
$pdf->Multicell(55,4, utf8_decode("Nombre completo del esposo(a) \nen caso de ser casado o unión libre:"), 1, 'l', false);

$pdf->ln(0);
$pdf->Cell(40,5, utf8_decode('Correo Electronico:'),1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(153,5,utf8_decode($maestroDatos['correoElectronico']),1,0,'C');


//daots loaborales
$pdf->SetFont('Arial','B',12);
$pdf->ln(6);
$pdf->Cell($anchoPag-20,6, 'DATOS LABORALES',0,0,'C',0);
$pdf->SetFont('Arial','',10);

$pdf->ln(6);
$pdf->Cell(53,5, 'Nombre De La Dependencia:',1,0,'A');
$pdf->Cell($anchoPag-70,5,utf8_decode($datosLaborales['Nombre_Dependencia']),1,0,'C');
$pdf->ln(5);
$pdf->Cell(10,5, 'CCT',1,0,'A');
$pdf->SetX(20); // Establecer la posición x e y del texto
$pdf->Cell(40,5,$datosLaborales['CCT'],1,0,'C');
$pdf->SetX(60); // Establecer la posición x e y del texto
$pdf->Cell(35,5, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(95); // Establecer la posición x e y del texto
$pdf->Cell(75,5,$datosLaborales['Domicilio_Particular'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(13,5, 'No. Int.:',1,0,'A');
$pdf->SetX(183); // Establecer la posición x e y del texto
$pdf->Cell(20,5,$datosLaborales['No_Int'],1,0,'C');
$pdf->ln(5);
$pdf->Cell(31,5, utf8_decode('Colonia y/o Fracc.'),1,0,'A');
$pdf->SetX(41); // Establecer la posición x e y del texto
$pdf->Cell(46,5,utf8_decode($datosLaborales['Colonia_Fracc']),1,0,'C');
$pdf->SetX(87); // Establecer la posición x e y del texto
$pdf->Cell(14,5, utf8_decode('Ciudad:'),1,0,'A');
$pdf->SetX(101); // Establecer la posición x e y del texto
$pdf->Cell(43,5,utf8_decode($datosLaborales['Ciudad_laboral']),1,0,'C');
$pdf->SetX(144); // Establecer la posición x e y del texto
$pdf->Cell(18,5, 'Localidad:',1,0,'A');
$pdf->SetX(162); // Establecer la posición x e y del texto
$pdf->Cell(41,5,utf8_decode($datosLaborales['Localidad_laboral']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(18,5, utf8_decode('Municipio:'),1,0,'A');
$pdf->SetX(28); // Establecer la posición x e y del texto
$pdf->Cell(80,5,utf8_decode($datosLaborales['Municipio_laboral']),1,0,'C');
$pdf->SetX(108); // Establecer la posición x e y del texto
$pdf->Cell(10,5, utf8_decode('CP:'),1,0,'A');
$pdf->SetX(118); // Establecer la posición x e y del texto
$pdf->Cell(15,5,utf8_decode($datosLaborales['CP_laboral']),1,0,'C');
$pdf->SetX(133); // Establecer la posición x e y del texto
$pdf->Cell(27,5, utf8_decode('TEL. Celular:'),1,0,'A');
$pdf->SetX(160); // Establecer la posición x e y del texto
$pdf->Cell(43,5,utf8_decode($datosLaborales['TEL_Celular_laboral']),1,0,'C',false,'tel:' . str_replace('-', '', $maestroDatos['telefonoPersonal']));

$pdf->ln(5);
$pdf->SetX(42); // Establecer la posición x e y del texto
$pdf->Cell(20,10, utf8_decode($datosLaborales['Fecha_Ingreso_GEM']),1,0,'C');
$pdf->SetX(10); // Establecer la posición x e y del texto
$pdf->Multicell(32,5, utf8_decode("Fecha De Ingreso \nal G.E.M:"), 1, 'l', false);
$pdf->SetXY(62,114); // Establecer la posición x e y del texto
$pdf->Multicell(25,5, utf8_decode("Numero De \nPrelación:"), 1, 'l', false);
$pdf->SetXY(87,114); // Establecer la posición x e y del texto
$pdf->Cell(20,10, utf8_decode($datosLaborales['Numero_Prelación']),1,0,'C');
$pdf->SetX(107); // Establecer la posición x e y del texto
$pdf->Cell(20,10, utf8_decode('Antiguedad:'),1,0,'C');
$pdf->SetX(127); // Establecer la posición x e y del texto
$pdf->Cell(20,10, utf8_decode($datosLaborales['Antiguedad']),1,0,'C');
$pdf->SetX(147); // Establecer la posición x e y del texto
$pdf->Multicell(22,5, utf8_decode("Puesto \nProfecional:"), 1, 'l', false);
$pdf->SetXY(169,114); // Establecer la posición x e y del texto
$pdf->Cell(34,10, utf8_decode($datosLaborales['Puesto_Profeciona']),1,0,'A');

$pdf->ln(10);
$pdf->Cell(63,5, 'Categoria Segun Talon De Cheque:',1,0,'A');
$pdf->Cell($anchoPag-80,5,utf8_decode($datosLaborales['Categoria_TalonCheque']." ".$maestroDatos['apellidoP']." ".$maestroDatos['apellidoM'] ),1,0,'C');

$pdf->ln(5);
$pdf->Cell(30,5, utf8_decode('Estado Categoria:'),1,0,'A');
$pdf->SetX(40); // Establecer la posición x e y del texto
$pdf->Cell(30,5,utf8_decode($datosLaborales['Estado_Categoria']),1,0,'C');
$pdf->SetX(70); // Establecer la posición x e y del texto
$pdf->Cell(25,5, utf8_decode('No. De Plaza:'),1,0,'A');
$pdf->SetX(95); // Establecer la posición x e y del texto
$pdf->Cell(16,5,utf8_decode('Principal:'),1,0,'C');
$pdf->SetX(111); // Establecer la posición x e y del texto
$pdf->Cell(30,5,utf8_decode($datosLaborales['Plaza_Principal']),1,0,'C');
$pdf->SetX(141); // Establecer la posición x e y del texto
$pdf->Cell(21,5, utf8_decode('Secundaria:'),1,0,'A');
$pdf->SetX(162); // Establecer la posición x e y del texto
$pdf->Cell(41,5,utf8_decode($datosLaborales['Plaza_Secundaria']),1,0,'C',false,'tel:' . str_replace('-', '', $maestroDatos['telefonoPersonal']));

$pdf->ln(5);
$pdf->Cell(45,5, utf8_decode('Clave De Servidor Plublico:'),1,0,'A');
$pdf->SetX(55); // Establecer la posición x e y del texto
$pdf->Cell(35,5,utf8_decode($datosLaborales['Clave_S_Plublico']),1,0,'C');
$pdf->SetX(90); // Establecer la posición x e y del texto
$pdf->Cell(32,5,utf8_decode('Horario Laboral De:'),1,0,'C');
$pdf->SetX(122); // Establecer la posición x e y del texto
$pdf->Cell(32,5,utf8_decode($datosLaborales['H_Lt1']),1,0,'C');
$pdf->SetX(154); // Establecer la posición x e y del texto
$pdf->Cell(5,5,utf8_decode('a:'),1,0,'C');
$pdf->SetX(159); // Establecer la posición x e y del texto
$pdf->Cell(30,5,utf8_decode($datosLaborales['H_Lt1_12']),1,0,'C');
$pdf->SetX(189); // Establecer la posición x e y del texto
$pdf->Cell(14,5,utf8_decode('Horas.'),1,0,'C');

$pdf->ln(5);
$pdf->Cell(40,5, utf8_decode('C.C.T. Otra Plaza:'),1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(40,5,utf8_decode($datosLaborales['CCT_S_Plaza']),1,0,'C');
$pdf->SetX(90); // Establecer la posición x e y del texto
$pdf->Cell(32,5,utf8_decode('Horario Laboral De:'),1,0,'C');
$pdf->SetX(122); // Establecer la posición x e y del texto
$pdf->Cell(32,5,utf8_decode($datosLaborales['H_Lt2']),1,0,'C');
$pdf->SetX(154); // Establecer la posición x e y del texto
$pdf->Cell(5,5,utf8_decode('a:'),1,0,'C');
$pdf->SetX(159); // Establecer la posición x e y del texto
$pdf->Cell(30,5,utf8_decode($datosLaborales['H_Lt2_2']),1,0,'C');
$pdf->SetX(189); // Establecer la posición x e y del texto
$pdf->Cell(14,5,utf8_decode('Horas.'),1,0,'C');

//daots profesionales
$pdf->SetFont('Arial','B',12);
$pdf->ln(5);
$pdf->Cell($anchoPag-20,6, 'DATOS PROFECIONALES',0,0,'C',0);


$pdf->SetFont('Arial','',10);
$pdf->ln(6);
$pdf->Cell(41,5, utf8_decode('Preparacion Profecional:'),1,0,'A');
$pdf->SetX(51); // Establecer la posición x e y del texto
$pdf->Cell(79,5,utf8_decode($datosProfecionales['Preparacion_Profecional']),1,0,'C');
$pdf->SetX(130); // Establecer la posición x e y del texto
$pdf->Cell(18,5, utf8_decode('Titulado:'),1,0,'A');
$pdf->SetX(148); // Establecer la posición x e y del texto
$pdf->Cell(55,5,utf8_decode($datosProfecionales['Titulado']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(41,5, utf8_decode('Escuela de Procedencia:'),1,0,'A');
$pdf->SetX(51); // Establecer la posición x e y del texto
$pdf->Cell(64,5,utf8_decode($datosProfecionales['Escuela_Procedencia']),1,0,'C');
$pdf->SetX(115); // Establecer la posición x e y del texto
$pdf->Cell(50,5, utf8_decode('No. De Cédula Profecional:'),1,0,'A');
$pdf->SetX(165); // Establecer la posición x e y del texto
$pdf->Cell(38,5,utf8_decode($datosProfecionales['No_Cédula_Profecional']),1,0,'C');

$pdf->ln(5);
$pdf->Cell(30,5, utf8_decode('Posgrado:'),1,0,'A');
$pdf->SetX(40); // Establecer la posición x e y del texto
$pdf->Cell(60,5,utf8_decode($datosProfecionales['Posgrado']),1,0,'C');
$pdf->SetX(100); // Establecer la posición x e y del texto
$pdf->Cell(30,5, utf8_decode('Grado Obtenido:'),1,0,'A');
$pdf->SetX(130); // Establecer la posición x e y del texto
$pdf->Cell(73,5,utf8_decode($datosProfecionales['Grado_Obtenido']),1,0,'C');

$pdf->ln(5);
$pdf->Multicell(35,5, utf8_decode("Incorporacion a \nCarrera Magistral:"), 1, 'l', false);
$pdf->SetXY(45,165); // Establecer la posición x e y del texto
$pdf->Cell(40,10,utf8_decode($datosProfecionales['Incorporacion_Carrera_Magistral']),1,0,'C');
$pdf->SetX(85); // Establecer la posición x e y del texto
$pdf->Multicell(20,5, utf8_decode("Fecha De \nDictamen:"), 1, 'l', false);
$pdf->SetXY(105,165); // Establecer la posición x e y del texto
$pdf->Cell(30,10,utf8_decode($datosProfecionales['Fecha_Dictamen']),1,0,'C');
$pdf->SetXY(135,165); // Establecer la posición x e y del texto
$pdf->Multicell(30,5, utf8_decode("Numero De \nDicatamen:"), 1, 'l', false);
$pdf->SetXY(165,165); // Establecer la posición x e y del texto
$pdf->Cell(38,10,utf8_decode($datosProfecionales['Numero_Dicatamen']),1,0,'C');

$pdf->ln(10);
$pdf->Cell(30,5, utf8_decode('Nivel y Variante:'),1,0,'A');
$pdf->SetX(40); // Establecer la posición x e y del texto
$pdf->Cell(50,5,utf8_decode($datosProfecionales['Nivel_Variante']),1,0,'C');
$pdf->SetX(90); // Establecer la posición x e y del texto
$pdf->Cell(30,5, utf8_decode('Otros Estudios:'),1,0,'A');
$pdf->SetX(120); // Establecer la posición x e y del texto
$pdf->Cell(83,5,utf8_decode($datosProfecionales['Otros_Estudios']),1,0,'C');
/*********************/
$pdf->SetFont('Arial','',12);
$pdf->ln(15);
$pdf->Cell($anchoPag-20,5, 'Atentamente',0,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->ln(7);
$pdf->Cell($anchoPag-23,5, 'Prof:(a)________________________________________________',0,0,'C',0);
$pdf->ln(5);
$pdf->Cell($anchoPag-20,5, '(Nombre y Firma)',0,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->ln(8);
$pdf->SetX(6); // Establecer la posición x e y del texto
$pdf->Multicell($anchoPag-8,6, utf8_decode("Bajo protesta de decir la verdad afirmo que los datos asentados anteriormente son todos y cada uno de los mimos verídicos,  y me comprometo a que en cuanto alguno de ellos se modifique informar a esta instancia"), 0,'C',false);
//hace un recorrido por el resultado y se guarda en row 
//en cada selda se colocara una ip de la base de datos
//ancho, alto, texto imp por row, jalamos la colunms de la b_d
//bode, salto de linea, justificacion, relleno


$pdf->Output('I','Datos_Docente_.pdf');
?>