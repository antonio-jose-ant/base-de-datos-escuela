<?php
require('fpdf/fpdf.php');
session_start();
$alumnoDatosSession = $_SESSION['alumnoDatos'];
$datosMedicosASession = $_SESSION['datosMedicosA'];
$tutor1ASession = $_SESSION['tutor1A'];
$tutor2ASession = $_SESSION['tutor2A'];
$DomicilioASession = $_SESSION['DomicilioA'];
$datosGeneralesASession = $_SESSION['datosGeneralesA'];
$anchoPag = 215.9;
$altoPag = 279.4;
class PDF extends FPDF
{

// Cabecera de página
//se va a mostrar en todas las paginas
function Header()
{
    $this->Image('../assets/img/logo/logo.png',75,2,20,20,'png','https://www.youtube.com/watch?v=vsoSeBHqLSQ');
    $this->Image('../assets/img/pdf/go.png',20,2,30,20,'png','https://www.youtube.com/watch?v=30ptGTuG2tA');
    $this->SetFont('TIMES','BI',9);

}

// Pie de página
function Footer()
{
    $this->SetFont('Arial','B',8);
    $this->SetXY(100-9,$$altoPag-10); // Establecer la posición x e y del texto
    $this->Cell(18,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//apartir de esta line se mostrara el contenido del pdf
$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage('P', 'Letter');  // 'P' para orientación vertical, 'Letter' para tamaño carta
$pdf->SetXY(98, 6); // Establecer la posición x e y del texto
$pdf->Cell(60,4,'ESC.PRIM.REY POETA CICLO 2021-2022',0,0,'L');
$pdf->Ln(5);
$pdf->SetX(98); // Establecer la posición x e y del texto
$pdf->Cell(60,4,'TURNO: '.$alumnoDatosSession['Turno'].' CCT 15EPR4285U',0,0,'L');
$pdf->Ln(5);
$pdf->SetX(98); // Establecer la posición x e y del texto
$pdf->Cell(20,4,'GRADO: '.$alumnoDatosSession['Grado'],0,0,);
$pdf->Cell(20,4,'GRUPO: '.$alumnoDatosSession['Grupo'],0,0,'C');

$pdf->Ln(5);
$pdf->SetX(10); // Establecer la posición x e y del texto
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,240,97);//COLOR VERDE BONITO
$pdf->Cell(40,4, 'DATOS DEL ALUMNO',0,0,'B',0);
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(90,5, 'NOMBRE DEL ALUMNO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode(  $alumnoDatosSession['Nombre']." ".$alumnoDatosSession['ApeidoP']." ".$alumnoDatosSession['ApeidoM']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode($alumnoDatosSession['CURP']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'FECHA DE NACIMIENTO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $alumnoDatosSession['Fecha_n']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $alumnoDatosSession['edad']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'CORREO ELECTRONICO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $alumnoDatosSession['CorreoAlu']),1,0,'C',0);

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(160,81,134);//COLOR LILA CHULO
$pdf->Cell(30,5, 'DOMICILIO ',0,0,'B',0);
$pdf->Ln(5);

$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(90,5, 'CALLE: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['Calle']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'N0. ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['No']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'CODIGO POSTAL: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['CP']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'ENTRE CALLE: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['Calle1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'Y CALLE: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['Calle2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'OTRA REFERENCIA: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['referencia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'COLONIA: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['Colonia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'MUNICIPIO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['Municipio']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'TELEFONO DE CASA: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $DomicilioASession['TelCasa']),1,0,'C',0);

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,89,255);//COLOR AZUL-LILA
$pdf->Cell(30,4, 'DATOS MEDICOS ',0,0,'B',0);
$pdf->Ln(4);
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(90,5, 'TELEFONO DE EMERGENCIA/CELULAR: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['numEmergencia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'TALLA: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['Talla']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'PESO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['peso']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'TIPO DE SANGRE: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['tipoSangre']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'ALERGIAS: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['alergia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'PADECIMIENTOS: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $datosMedicosASession['padecimiento']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'OTROS: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( "Pie plano: ".$datosMedicosASession['piePlano']."   Lentes: ".$datosMedicosASession['lentes']),1,0,'C',0);

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(232,232,0);//COLOR AMARILLO
$pdf->Cell(45,4, 'DATOS DEL PADRE/MADRE O TUTOR ',0,0,'B',0);
$pdf->Ln(4);
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(90,5, 'NOMBRE COMPLETO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['nombreT1']." ".$tutor1ASession['apellidoPT1']." ".$tutor1ASession['apellidoMT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['CURPT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['edadT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'RELACION DE PARENTESCO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['parentescoT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'ESTADO CIVIL: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['Estado_civilT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'OCUPACION: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['ocupacionT1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'GRADO DE ESTUDIOS: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor1ASession['estudioT1']),1,0,'C',0);

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,84,2);//COLOR NARANJA
$pdf->Cell(45,4, 'DATOS DEL PADRE/MADRE O TUTOR ',0,0,'B',0);
$pdf->Ln(4);
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(90,5, 'NOMBRE COMPLETO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['nombreT2']." ".$tutor2ASession['apellidoPT2']." ".$tutor2ASession['apellidoMT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['CURPT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['edadT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'RELACION DE PARENTESCO: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['parentescoT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'ESTADO CIVIL: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['Estado_civilT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'OCUPACION: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['ocupacionT2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(90,5, 'GRADO DE ESTUDIOS: ',1,0,'C',0);
$pdf->Cell(100,5,utf8_decode( $tutor2ASession['estudioT2']),1,0,'C',0);

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(280,0,0);//COLOR ROJO
$pdf->Cell(45,4, 'DATOS GENERALES',0,0,'B',0);
$pdf->Ln(4);
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Multicell(90,4.5,utf8_decode ("¿CUANTAS PERSONAS INCLUYENDO AL ALUMNO(A) VIVEN EN ESE DOMICILIO? "), 1, 'l', false);
$pdf->SetXY(100,231);
$pdf->Cell(100,9,$datosGeneralesASession['vivenC'],1,0,'C',0);
$pdf->Ln(9);
$pdf->Multicell(90,4.5,utf8_decode ("¿QUIEN SOSTIENE ECONOMICAMENTE AL HOGAR? SEÑALE LA OPCIÓN"), 1, 'l', false);
$pdf->SetXY(100,240);
$pdf->Cell(100,9,$datosGeneralesASession['sostenHogar'],1,0,'C',0);
$pdf->SetXY(10,249);
$pdf->Cell(90,10,utf8_decode ("¿CON QUE MEDIOS CUENTA?\n"), 1, 'l', false);
$pdf->SetFont('Arial','B',9);
$pdf->Multicell(100,5,"Internet (".$datosGeneralesASession['internet'].")   Television (".$datosGeneralesASession['television'].")   Celular (".$datosGeneralesASession['celular'].")   Tablet (".$datosGeneralesASession['tablet'].")   Computadora (".$datosGeneralesASession['computadora'].") ", 1, 'C', false);

$pdf->Output('I','Datos_Alumno:.pdf');
?>