<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

// Cabecera de página
//se va a mostrar en todas las paginas
function Header()
{
  
    $this->Image('assets/img/logo/logo.png',55,3,20,20,'png','https://www.youtube.com/watch?v=vsoSeBHqLSQ');
    $this->Image('assets/img/pdf/go.png',20,2,30,20,'png','https://www.youtube.com/watch?v=30ptGTuG2tA');

   
    $this->SetFont('TIMES','BI',9);
    // Movernos a la derecha la celda
    $this->Cell(80);
    // Título y celda ancho y alto, texto,borde
    $this->Cell(35,2,'ESC.PRIM.REY POETA CICLO 2021-2022',0,0,'C');
    // Salto de línea
    $this->Ln(5);
    //formato fente, alineacion, fuente
    $this->SetFont('TIMES','BI',9);
    // Movernos a la derecha la celda
    $this->Cell(80);
    // Título y celda ancho y alto, texto,borde
    $this->Cell(35,2,'TURNO: VESPERTINO CCT 15EPR4285U',0,0,'C');
    // Salto de línea
    $this->Ln(5);
    $this->SetFont('ARIAL','IU',9);
    // Movernos a la derecha la celda
    $this->Cell(66);
    // Título y celda ancho y alto, texto,borde
    $this->Cell(40,2,'GRADO:            ',0,0,'');
    // Salto de línea
    $this->SetFont('ARIAL','IU',9);
    $this->Ln(0);
    // Movernos a la derecha la celda
    $this->Cell(70);
    //Título y celda ancho y alto, texto,borde
    $this->Cell(70,2,'GRUPO:            ',0,0,'C');
    //$this->line(90,20,80,2);
   //$this->setDrawColor(); colo de linea
   //$this->setLineWidth(1); grosor de la linea de linea
    // Salto de línea
    $this->Ln(0);
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


//mandar a llamar la base de datos
include 'includes/conexion-BD.php';
//consulta SELECCIONA DE LA TRABLA X
$consulta = "SELECT * FROM datos_alumno 
inner join datos_medicos on  datos_alumno.CURP_alu=datos_medicos.CURPAlu
inner join tutor1 on  datos_alumno.CURP_tutor1=tutor1.CURP_tutor1
inner join tutor2 on  datos_alumno.CURP_tutor2=tutor2.CURP_tutor2
WHERE matricula='ANAROSE6BM06'";
//mostrar los resultados, estamos pasando el texto de la consulta y la ejecutamos usando mysql
$resultado =mysqli_query($conexion,$consulta);


//apartir de esta line se mostrara el contenido del pdf
$pdf = new PDF();
$pdf->AliasNbPages();

//$pdf->AddPage('portrait',array(150,300)); //ango y largo
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(0,240,97);//COLOR VERDE BONITO
$pdf->Cell(55,10, 'DATOS DEL ALUMNO',0,0,'B',0);
$pdf->Ln(7);




//hace un recorrido por el resultado y se guarda en row 
while($row = $resultado ->fetch_assoc()){


//en cada selda se colocara una ip de la base de datos
//ancho, alto, texto imp por row, jalamos la colunms de la b_d
//bode, salto de linea, justificacion, relleno

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'NOMBRE DEL ALUMNO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Nombre_alu']." ".$row['Apellido_p'].$row['Apellido_m']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CURP_alu']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'FECHA DE NACIMIENTO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Fecha_n_alu']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Edad_alu']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CORREO ELECTRONICO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Correo_alu']),1,0,'C',0);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(160,81,134);//COLOR LILA CHULO
$pdf->Cell(45,5, 'DOMICILIO ',0,0,'B',0);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'CALLE: ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['calle']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'N0. ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['n0']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CODIGO POSTAL: ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['cp']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'ENTRE CALLE: ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['enc']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Y CALLE: ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['yc']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'OTRA REFERENCIA: ',1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'COLONIA: ',1,0,'C',0);
//$pdf->Cell(105,5,utf8_decode( $row['colonia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'MUNICIPIO: ',1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'TELEFONO DE CASA: ',1,0,'C',0);
$pdf->Ln(8);

$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(89,89,255);//COLOR AZUL-LILA
$pdf->Cell(45,5, 'DATOS MEDICOS ',0,0,'B',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'TELEFONO DE EMERGENCIA/CELULAR: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Tel_emergencia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'TALLA: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Talla']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'PESO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Peso']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'TIPO DE SANGRE: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Tipo_sangre']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'ALERGIAS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Alergias']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'PADECIMIENTOS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['padecimiento']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'PADECIMIENTOS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['padecimiento']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'OTROS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( "Pie plano: ".$row['Pie_plano']."   Lentes: ".$row['lentes']),1,0,'C',0);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(232,232,0);//COLOR AMARILLO
$pdf->Cell(45,5, 'DATOS DEL PADRE/MADRE O TUTOR ',0,0,'B',0);
$pdf->Ln(5);+

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'NOMBRE COMPLETO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Nombre']." ".$row['Apellido_p'].$row['Apellido_m']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CURP_tutor1']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Edad']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'RELACION DE PARENTESCO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Parentesco']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'ESTADO CIVIL: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Estado_civil']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'OCUPACION: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Ocupacion']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'GRADO DE ESTUDIOS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Grado_estudios']),1,0,'C',0);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,84,2);//COLOR NARANJA
$pdf->Cell(45,5, 'DATOS DEL PADRE/MADRE O TUTOR ',0,0,'B',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'NOMBRE COMPLETO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Nombre']." ".$row['Apellido_p'].$row['Apellido_m']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CURP_tutor2']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'EDAD: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Edad']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'RELACION DE PARENTESCO: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Parentesco']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'ESTADO CIVIL: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Estado_civil']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'OCUPACION: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Ocupacion']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'GRADO DE ESTUDIOS: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Grado_estudios']),1,0,'C',0);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(280,0,0);//COLOR ROJO
$pdf->Cell(45,5, 'DATOS GENERALES',0,0,'B',0);
$pdf->Ln(5);


/*
Mostrar texto en pantalla hay 2 metodos:
$this->Cell(70,2,'GRUPO:',0,0,'C');
.CELL, 1.celda (ancho, alto, texto, 1.bordes,2.Posicion inicial ,3.alineacion(C)centrado,(L)(R),
4.relleno (con color), (true)
$pdf->setfilecolor(55,89,78)
links
.WRITE,(alto,texto,link) alinea de texto- sin importancia del ordena miento
*/
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,9,utf8_decode ('¿CUANTAS PERSONAS INCLUYENDO AL '),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode ('ALUMNO(A) VIVEN EN ESE DOMICILIO?'),0,0,'C',0);
//$pdf->Write(2, 'ALUMNO(A) VIVEN EN ESE DOMICILIO?');
$pdf->Ln(5);
$pdf->Cell(75,9,utf8_decode ('¿QUIEN SOSTIENE ECONOMICAMENTE AL') ,1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'HOGAR? SEÑALE LA OPCIÓN') ,0,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,9,utf8_decode ('¿CON QUE MEDIOS CUENTA?'),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'RESPONDA SI O NO ',0,0,'C',0);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, utf8_decode('¿EL TUTOR O PADRE O MADRE DE FAMILIA PADECIO COVID-19? '),0,0,'c',0);
$pdf->Ln(5);


}

$pdf->Output('I','Datos_Alumno:.pdf');
?>