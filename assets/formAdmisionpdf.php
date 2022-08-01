<?php
//require('../fpdf.php');
require('../../Style/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../Imagenes/linea.jpg',156,1,55);
    $this->Image('../Imagenes/LOGO_ESMA.png',18,13,33);
    $this->Image('../Imagenes/ESCUELA_DE_NATACION.png',160,8,35);
    $this->Image('../Imagenes/MARCA_DE_AGUA_ESCUELA_DE_NATACION.png',30,62,150);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    //Color del Texto
    $this->SetTextColor( 57,86,191);
    // Movernos a la derecha
    //$this->Cell(50);
    // Título
    $this->Cell(00,37,utf8_decode('ESCUELA DE NATACIÓN'),0,0,'C',0);
    // Salto de línea
    $this->Ln(10);
    $this->SetFont('Arial','B',35);
    $this->SetTextColor(3,27,110);
    $this->Cell(00,41,utf8_decode('"ESMAR"'),0,0,'C',0);
    $this->Ln(0);

    $this->SetFont('Arial','B',15);
    $this->SetTextColor(57,86,100);
    $this->Cell(0,70,utf8_decode('FORMULARIO DE INSCRIPCIÓN'),0,0,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    //$this->SetY(-15);
    // Arial italic 8
    //$this->SetFont('Arial','I',8);
    // Número de página
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


}


require("../../config/conexion.php");
//configuraciones
$alto=5.5;
$letra=12;
//$query="SELECT edad FROM `alumnos` WHERE edad='12'";
$query="SELECT sexo FROM `sexo` WHERE sexo='masculino'";
$resultado=mysqli_query($conexion, $query);
$row=$resultado->fetch_assoc();
    
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',$letra);
$pdf->SetXY(26,63);

if(isset($_POST["recibo"]))
{
    {
      //echo"<script type='text/javascript'>
        //window.location.href='http://localhost:8080/Esmar/formAdmisionpdf.php';
          //</script>";
    }
    //$admisionpdf=$_POST["formAdmisionpdf.php"];
    //echo "respuesta";
    //return;
}

$recibo=$_POST["recibo"];
$fech=$_POST["fecha"];
    $nueva_fech = date("d/m/Y", strtotime($fech));
$profesor=$_POST["docente"];

$sql = "SELECT nombre_completo FROM docente WHERE id_docente='".$profesor."';";
$result=$conexion->query($sql);
while($row1=$result->fetch_assoc()){
    $prof=$row1['nombre_completo'];
}
$nro_inscrito=$_POST["nro_inscrito"];
$nombre=$_POST["nombre"];
$paterno=$_POST["ap_paterno"];
$materno=$_POST["ap_materno"];
$edad=$_POST["edad"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];
    $nuevo_nacimiento = date("d/m/Y", strtotime($fecha_nacimiento));
$ci=$_POST["ci"];
$nro_celular=$_POST["nro_celular"];
$direccion=$_POST["direccion"];
$sexo=$_POST["sexo"];

//$parentesco=$_POST["parentesco"];
$ref_nombre=$_POST["refnombre"];
$ref_paterno=$_POST["refap_paterno"];
$ref_materno=$_POST["refap_materno"];
$ref_celular=$_POST["refnro_celular"];

$dia=$_POST["dias"];
$desde=$_POST["hora_desde"];
$hasta=$_POST["hora_hasta"];

$pdf->Cell(105,$alto,utf8_decode('FECHA DE INICIO:   '.$nueva_fech),1,0,'L',0);
$pdf->Cell(55,$alto,utf8_decode('Nro de Recibo:   '.$recibo),1,1,'L',0);
//$pdf->Ln();
$pdf->SetX(26); 
//$pdf->Cell(105,$alto,$row1['nombre_completo'],1,0,'L',0);
$pdf->Cell(105,$alto,utf8_decode('PROFESOR: '.strtoupper($prof)),1,0,'L',0);
$pdf->Cell(55,$alto,utf8_decode('Nro de Inscrito:  '.$nro_inscrito),1,0,'L',0);

$pdf->SetTextColor(57,86,191);
$pdf->Ln(10);
$pdf->SetX(26); 
$pdf->SetFont('Arial','I'.'B',$letra);$pdf->Cell(105,$alto,'DATOS DEL ALUMNO',0,1,'L',0);

$pdf->SetTextColor(0,0,0);

$pdf->SetX(26);
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Nombres',1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($nombre),1,1,'L',0);

$pdf->SetX(26);      
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Apellidos',1,0,'L',0);
$pdf->SetFont('Arial','',$letra);$pdf->Cell(105,$alto,utf8_decode($paterno.' '.$materno),1,1,'L',0);
//$pdf->SetX(25); $pdf->Cell(50,$alto,'NOMBRE',1,0,'L',0);
//                $pdf->Cell(105,$alto,$materno,1,1,'L',0);

$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Edad',1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($edad),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Fecha de Nacimiento:',1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($nuevo_nacimiento),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'C.I.',1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($ci),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,utf8_decode('Número de Celular'),1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($nro_celular),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,utf8_decode('Dirección'),1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($direccion),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Sexo',1,0,'L',0);
$pdf->SetFont('Arial','',$letra); $pdf->Cell(105,$alto,utf8_decode($sexo),1,0,'L',0);

$pdf->Ln(10);
$pdf->SetTextColor(57,86,191);
$pdf->SetX(26); 
$pdf->SetFont('Arial','I'.'B',$letra);$pdf->Cell(105,$alto,'REFERENCIA FAMILIAR',0,1,'L',0);
$pdf->SetTextColor(0,0,0);
//$pdf->SetX(26); 
//$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Parentesco',1,0,'L',0);
//$pdf->SetFont('Arial','',$letra);$pdf->Cell(105,$alto,utf8_decode($parentesco),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Nombre',1,0,'L',0);
$pdf->SetFont('Arial','',$letra);$pdf->Cell(105,$alto,utf8_decode($ref_nombre),1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Apellidos',1,0,'L',0);
$pdf->SetFont('Arial','',$letra);$pdf->Cell(105,$alto,utf8_decode($ref_paterno.' '.$ref_materno),1,1,'L',0);
//$pdf->SetX(25); $pdf->Cell(55,$alto,'',1,0,'L',0);
//                $pdf->Cell(105,$alto,$ref_materno,1,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(55,$alto,'Celular',1,0,'L',0);
$pdf->SetFont('Arial','',$letra);$pdf->Cell(105,$alto,utf8_decode($ref_celular),1,0,'L',0);

$pdf->Ln(10);
$pdf->SetTextColor(57,86,191);
$pdf->SetX(26); 
$pdf->SetFont('Arial','I'.'B',$letra);$pdf->Cell(105,$alto,'PREFERENCIA HORARIA Y FRECUENCIA',0,1,'L',0);
$pdf->SetX(26); 
$pdf->SetFont('Arial','I'.'B',$letra);$pdf->Cell(105,$alto,'SEMANAL',0,1,'L',0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',$letra);
$pdf->SetX(26); $pdf->Cell(90,$alto,'',0,0,'L',0);
                $pdf->Cell(70,$alto,'HORARIO',1,1,'C',0);
$pdf->SetX(26); $pdf->Cell(90,$alto,utf8_decode('DÍAS'),1,0,'L',0);
                $pdf->Cell(35,$alto,'DESDE',1,0,'C',0);
                $pdf->Cell(35,$alto,'HASTA',1,1,'C',0);
$pdf->SetX(26);
//$pdf->SetFont('Arial','B',$letra);$pdf->MultiCell(90,$alto,utf8_decode(''.$dia),1,0,'L',0);
$pdf->SetFont('Arial','B',$letra);$pdf->MultiCell(90,$alto,utf8_decode(''.$dia),0,'L',false);

                $pdf->Cell(35,$alto,utf8_decode(''.$desde),1,0,'L',0);
                $pdf->Cell(35,$alto,utf8_decode(''.$hasta),1,1,'L',0);
//$pdf->MultiCell(60,5,)

$pdf->SetX(26); 
$pdf->SetFont('Arial','B',$letra);$pdf->Cell(90,$alto,utf8_decode(''),1,0,'L',0);
                $pdf->Cell(35,$alto,'',1,0,'L',0);
                $pdf->Cell(35,$alto,'',1,1,'L',0);
$pdf->Ln();
$pdf->SetX(26); 
$pdf->SetFont('Arial','B',12);$pdf->Cell(5,2,utf8_decode('NOTA:'),0,0,'L',0);
//$pdf->MultiCell(40,0,0);
$pdf->SetX(26);
$pdf->SetFont('Arial','',10);
//$pdf->Cell(5,$alto,utf8_decode('Le informamos que los datos personales proporcionados van a ser incluidos en el fichero de La'),0,1,'FJ',0); 
//$pdf->SetX(25);
//$pdf->SetFont('Arial','',10);$pdf->Cell(5,$alto,utf8_decode('Escuela de Natación ESMAR o entidades vinculadas con esta'),0,1,'FJ',0);
$pdf->Multicell(185,2,utf8_decode("               Le informamos que los datos personales proporcionados van a ser incluidos en el fichero de La
 \nEscuela de Natación  ESMAR  o entidades  vinculadas  con  ésta, para  la gestión de las  actividades  de
 \nnatación.  Así mismo, usted tiene derecho a acceder a la información que le concierne, rectificada de ser
 \nerrónea o cancelarla.
 \nLa  Escuela de Natación  ESMAR  cuenta  con  cámaras  de seguridad en todos  los  ambientes  para su
 \ntotal seguridad. Así mismo la escuela no se responsabiliza en caso de pérdida de objetos personales."),0,'FJ',0);
 
 $pdf->Ln(15);
 $pdf->SetX(35);
 $pdf->Multicell(185,2,utf8_decode("----------------------------------                                          ---------------------------------------------------
 \n    Firma del Estudiante                                                 Encargado de Admision y Registro"),0,'FJ',0);

// $pdf=new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',10);
//$pdf->Multicell(60, 5, utf8_decode("Cargo1\nen dependenciamnvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvnnnnnnnnnnnnnn"), 0, 'l', false);
//$x = $pdf->GetX();
//$y = $pdf->GetY();
//$pdf->SetXY($x+100, $y-10);
//$pdf->Multicell(120, 5, utf8_decode("Cargo2\nen dependencia"), 0, 'l', false);
//while ($row=$resultado->fetch_assoc())

{
    //$pdf->Cell(80,10,$row['CI'],1,0,'C',0);

}
//$pdf->Cell(125,8,'FECHA DE INICIO:',1,0,'L',0);


//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número').$i,0,1);

$pdf->Output();
$hoy=date("dmy");
    $docu="ReporteAdmision$hoy.pdf";
    header('Content-type: application/vnd.ms-pdf');
    header('Content-Disposition: attachment; filename='.$docu);
    header('Pragma: no-cache');
    header('Expires: 0');
?>