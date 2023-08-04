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
    $posicionX = $anchoPagina - 65; 
    $titulo="2021. Año de la consumación de la independencia de México";
    $this->Image('../assets/img/logo/edomex.png',$posicionX,2,55,20,'png','https://www.youtube.com/watch?v=vsoSeBHqLSQ');
    $this->Image('../assets/img/pdf/go.png',10,2,30,20,'png','https://www.youtube.com/watch?v=30ptGTuG2tA');
    $this->SetFont('arial','',10);
    $this->SetXY(10, 22); // Establecer la posición x e y del texto
    $this->Cell($anchoPagina-20, 10,utf8_decode('"'.$titulo.'".'), 0, 1, 'C',0); // Agregar el texto centrado
    $this->SetFont('arial','B',10);
    $this->SetXY(10, 28); // Establecer la posición x e y del texto
    $this->Cell($anchoPagina-20, 10,utf8_decode("FICHA DE IDENTIFICACIÓN LABORAL"), 0, 1, 'C',0); // Agregar el texto centrado
  
    $anchoCuadro = 25; // 2.5 cm en milímetros
    $altoCuadro = 30; // 3 cm en milímetros

    // Convertir las medidas de milímetros a unidades del PDF (72 unidades = 1 pulgada)

    $this->SetXY($anchoPagina-35, 22); // Establecer la posición x e y del texto
    $this->Cell( $anchoCuadro, $altoCuadro,utf8_decode("foto"), 1, 0, 'C',0); // Agregar el texto centrado
    
    $this->SetFont('arial','B',10);
    $this->SetXY(10, 38); // Establecer la posición x e y del texto
    $this->Cell($anchoPagina-45, 10,utf8_decode("ESCUELA PRIMARIA".'"'."_____________________________".'"'. "    ZONA:_______"), 0, 1, 'B',0); // Agregar el texto centrado

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
//daots personales 
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(10, 52); // Establecer la posición x e y del texto
$pdf->Cell($anchoPag-20,10, 'DATOS PERSONALES',1,0,'C',0);
//daots loaborales
$pdf->SetFont('Arial','B',12);
$pdf->ln(10);
$pdf->Cell($anchoPag-20,10, 'DATOS LABORALES',1,0,'C',0);
//daots profesionales
$pdf->SetFont('Arial','B',12);
$pdf->ln(10);
$pdf->Cell($anchoPag-20,10, 'DATOS PROFECIONALES',1,0,'C',0);

//hace un recorrido por el resultado y se guarda en row 
//en cada selda se colocara una ip de la base de datos
//ancho, alto, texto imp por row, jalamos la colunms de la b_d
//bode, salto de linea, justificacion, relleno


$pdf->Output('I','Datos_Docente_.pdf');
?>