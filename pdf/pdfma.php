<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

// Cabecera de página
//se va a mostrar en todas las paginas
function Header()
{
    
    $this->Image('../assets/img/logo/logo.png',55,3,20,20,'png','https://www.youtube.com/watch?v=vsoSeBHqLSQ');
    $this->Image('../assets/img/pdf/go.png',20,2,30,20,'png','https://www.youtube.com/watch?v=30ptGTuG2tA');


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
include '../includes/conexion-BD.php';
include '../mostrarDatos/modificar/modificarM.php';
$maestro = new profesoresDatos();
$nomina = $maestro->maestrospdf['nomina']['nomina'];
//$nomina="12345";
//consulta SELECCIONA DE LA TRABLA X
$consulta = "SELECT * FROM profesor 
inner JOIN datosadministracion 
on profesor.CURP=datosadministracion.CURP
inner join datospersonales 
on profesor.RFC=datospersonales.RFC 
where profesor.nomina='".$nomina."'";
//mostrar los resultados, estamos pasando el texto de la consulta y la ejecutamos usando mysql
$resultado =mysqli_query($conexion,$consulta);



//apartir de esta line se mostrara el contenido del pdf
$pdf = new PDF();
$pdf->AliasNbPages();

//$pdf->AddPage('portrait',array(150,300)); //ango y largo
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(0,240,97);//COLOR VERDE BONITO
$pdf->Cell(55,10, 'Datos personales',0,0,'B',0);
$pdf->Ln(7);


//hace un recorrido por el resultado y se guarda en row 
while($row = $resultado ->fetch_assoc()){
//en cada selda se colocara una ip de la base de datos
//ancho, alto, texto imp por row, jalamos la colunms de la b_d
//bode, salto de linea, justificacion, relleno

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'Nomina: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['nomina']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Nombre: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['nombre']." ".$row['apellidoP'].$row['apellidoM']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Localidad o colonia: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['localidadOcolonia']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode ('Dirección: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Direccion']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Municipio: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['municipio']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'C.P: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CP']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Tel.Casa: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['telefonoPersonal']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Tel.Celular: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['telefonoCasa']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Correo Electronico: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['correoElectronico']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Edad: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['edad']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Estado Civil: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['EstadoCivil']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Red Social: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['redSocial']),1,0,'C',0);
$pdf->Ln(8);



$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(160,81,134);//COLOR LILA CHULO
$pdf->Cell(45,5, 'Datos Profesionales ',0,0,'B',0);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5, 'Categoria: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['categoria']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Estado de Cateoria: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['EstadoCategoria']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Preparacion profesional: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['preparacionPersonal']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'CURP: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CURP']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'RFC: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['RFC']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Años de servicio: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['AñosServico']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5, 'Clave servidor: ',1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['ClaevServidor']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Número de Plaza: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['NumeroPlaza']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Código Puesto: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CodigoPuesto']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Años de Servicio en la Función: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['AñosServicoEnFuncion']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Preparación Profesional: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['PreparacionProfecional']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Fecha de Ingreso a la Función Actual: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['FechaIngreso']),1,0,'C',0);
$pdf->Ln(8);

$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(89,89,255);//COLOR AZUL-LILA
$pdf->Cell(45,5,utf8_decode ('Datos Adscripción '),0,0,'B',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);//COLOR NEGRO
$pdf->Cell(75,5,utf8_decode( 'Sede o Lugar de Administración: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CedeLugarAdminitracion']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Municipio: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['MunicipioEscuela']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'CCT:'),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['C_C_T']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Telefono: '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['Telefono']),1,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(75,5,utf8_decode( 'Correo Oficial '),1,0,'C',0);
$pdf->Cell(105,5,utf8_decode( $row['CorreoInstituto']),1,0,'C',0);
$pdf->Ln(8);

}

$pdf->Output('I','Datos_Docente_.pdf');
?>