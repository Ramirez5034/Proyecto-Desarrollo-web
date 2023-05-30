<?php
require('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
   $this->Cell(70,10,'Reporte de Productos ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->Cell(48.3,10,'Nombre',1,0,'C',0);
	$this->Cell(48.3,10,'Email',1,0,'C',0);
    $this->Cell(48.3,10,'Creacion',1,0,'C',0);
	$this->Cell(48.3,10,'Rol',1,1,'C',0);
  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");
$consulta="SELECT * from usuario
WHERE estatus = 1";
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(48.3,10,$row['nombre'],1,0,'C',0);
    $pdf->SetFont('Arial','B',10);
	$pdf->Cell(48.3,10,$row['email'],1,0,'C',0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(48.3,10,$row['FechaCreacion'],1,0,'C',0);
	$pdf->Cell(48.3,10,$row['Rol'],1,1,'C',0);
} 

$pdf->Output('Prueba.pdf', 'I');
?>



