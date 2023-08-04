<?php

require('fpdf/fpdf.php');

session_start();
$maestroDatos = $_SESSION['maestroDatos'];
$datosPersonales = $_SESSION['datosPersonales'];
$datosAdministracion = $_SESSION['datosAdministracion'];

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
    $this->SetFont('Arial','B',8);
    // Número de página usando utf8 para que me respte la comilla
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//mostrar los resultados, estamos pasando el texto de la consulta y la ejecutamos usando mysql
$resultado =mysqli_query($conexion,$consulta);



//apartir de esta line se mostrara el contenido del pdf
$pdf = new PDF();
$pdf->AliasNbPages();
$anchoPag = 210.00155555556;
$altoPag = 297.00008333333;
$titulo="2021. Año de la consumación de la independencia de México";

$pdf->AddPage();
$pdf->SetFont('arial','',9);
$pdf->ln(4); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20, 5,utf8_decode('"'.$titulo.'".'), 0, 1, 'C',0); // Agregar el texto centrado
$pdf->SetFont('arial','B',9);
$pdf->ln(1); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20, 5,utf8_decode("FICHA DE IDENTIFICACIÓN LABORAL"), 0, 1, 'C',0); // Agregar el texto centrado

$anchoCuadro = 25; // 2.5 cm en milímetros
$altoCuadro = 30; // 3 cm en milímetros

// Convertir las medidas de milímetros a unidades del PDF (72 unidades = 1 pulgada)

$pdf->SetXY($anchoPag-35, 13); // Establecer la posición x e y del texto
$pdf->Cell( $anchoCuadro, $altoCuadro,utf8_decode("foto"), 1, 0, 'C',0); // Agregar el texto centrado

$pdf->SetFont('arial','B',10);
$pdf->ln(12); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-45, 7,utf8_decode("ESCUELA PRIMARIA".'"'."_____________________________".'"'. "    ZONA:_______"), 0, 1, 'B',0); // Agregar el texto centrado

//daots personales 

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 35); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20,4, 'DATOS PERSONALES',0,0,'C',0);
$pdf->SetFont('Arial','',8);
$pdf->ln(4);
$pdf->Cell(50,4, 'Nombre Completo:',1,0,'A');
$pdf->Cell($anchoPag-95,4,$maestroDatos['nombre']." ".$maestroDatos['apellidoP']." ".$maestroDatos['apellidoM'] ,1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');
//daots loaborales
$pdf->SetFont('Arial','B',8);
$pdf->ln(4);
$pdf->Cell($anchoPag-20,4, 'DATOS LABORALES',0,0,'C',0);

$pdf->ln(4);
$pdf->Cell(50,4, 'Nombre Completo:',1,0,'A');
$pdf->Cell($anchoPag-95,4,$maestroDatos['nombre']." ".$maestroDatos['apellidoP']." ".$maestroDatos['apellidoM'] ,1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

//daots profesionales
$pdf->SetFont('Arial','B',8);
$pdf->ln(4);
$pdf->Cell($anchoPag-20,4, 'DATOS PROFECIONALES',0,0,'C',0);

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');

$pdf->ln(4);
$pdf->Cell(17,4, 'RFC:',1,0,'A');
$pdf->SetX(27); // Establecer la posición x e y del texto
$pdf->Cell(40,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(67); // Establecer la posición x e y del texto
$pdf->Cell(17,4, 'CURP:',1,0,'A');
$pdf->SetX(84); // Establecer la posición x e y del texto
$pdf->Cell(56,4,$datosAdministracion['CURP'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Edad:',1,0,'A');
$pdf->SetX(155); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['edad'],1,0,'C');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(15,4, 'Sexo:',1,0,'A');
$pdf->SetX(185); // Establecer la posición x e y del texto
$pdf->Cell(15,4,$maestroDatos['sexo'],1,0,'C');
$pdf->ln(4);
$pdf->Cell(40,4, 'Domicilio Particular:',1,0,'A');
$pdf->SetX(50); // Establecer la posición x e y del texto
$pdf->Cell(90,4,$datosPersonales['RFC'],1,0,'C');
$pdf->SetX(140); // Establecer la posición x e y del texto
$pdf->Cell(30,4, 'Estado Civil:',1,0,'A');
$pdf->SetX(170); // Establecer la posición x e y del texto
$pdf->Cell(30,4,$maestroDatos['EstadoCivil'],1,0,'C');
/*********************/
$pdf->SetFont('Arial','',8);
$pdf->ln(8);
$pdf->Cell($anchoPag-20,5, 'Atentamente',0,0,'C',0);
$pdf->SetFont('Arial','',7);
$pdf->ln(7);
$pdf->Cell($anchoPag-20,5, 'Prof:(a)________________________________________________',0,0,'C',0);
$pdf->ln(5);
$pdf->Cell($anchoPag-20,5, '(Nombre y Firma)',0,0,'C',0);
$pdf->SetFont('Arial','',7);
$pdf->ln(5);
$pdf->Cell($anchoPag-20,5, utf8_decode('Bajo protesta de decir la verdad afirmo que los datos asentados anteriormente son todos y cada uno de los mimos verídicos,  y me comprometo a que en cuanto alguno de '),0,0,'C',0);
$pdf->ln(5);
$pdf->Cell($anchoPag-20,5, utf8_decode('ellos se modifique informar a esta instancia'),0,0,'C',0);

//hace un recorrido por el resultado y se guarda en row 
//en cada selda se colocara una ip de la base de datos
//ancho, alto, texto imp por row, jalamos la colunms de la b_d
//bode, salto de linea, justificacion, relleno


$pdf->Output('I','Datos_Docente_.pdf');
?>