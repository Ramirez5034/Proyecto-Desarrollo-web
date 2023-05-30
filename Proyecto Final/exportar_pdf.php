<?php
require('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',9.5);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
   $this->Cell(70,10,'Empleados ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->Cell(20,10,'Nombre',1,0,'C',0);
	$this->Cell(20,10,'APaterno',1,0,'C',0);
	$this->Cell(20,10,'AMaterno',1,0,'C',0);
    $this->Cell(20,10,'Salario',1,0,'C',0);
	$this->Cell(20,10,'Telefono',1,0,'C',0);
    $this->Cell(20,10,'Contratacion',1,0,'C',0);
    $this->Cell(20,10,'Area',1,0,'C',0);
    $this->Cell(20,10,'Sucursal',1,0,'C',0);
	$this->Cell(20,10,'Usuario',1,1,'C',0);
  
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
$consulta="SELECT e.idEmpleado, e.nombre, e.APaterno, e.AMaterno, e.salario, e.telefono, e.FechaContratacion, s.nombre AS nombreSucursal, a.nombre AS nombreArea, u.nombre AS nombreUsuario, e.estatus
FROM Empleado e
JOIN Sucursal s ON e.idSucursal = s.idSucursal
JOIN Area a ON e.idArea = a.idArea
JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1";
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(20,10,$row['nombre'],1,0,'C',0);
	$pdf->Cell(20,10,$row['APaterno'],1,0,'C',0);
	$pdf->Cell(20,10,$row['AMaterno'],1,0,'C',0);
    $pdf->Cell(20,10,$row['salario'],1,0,'C',0);
	$pdf->Cell(20,10,$row['telefono'],1,0,'C',0);
    $pdf->Cell(20,10,$row['FechaContratacion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['nombreArea'],1,0,'C',0);
    $pdf->SetFont('Arial','B',6.5);
    $pdf->Cell(20,10,$row['nombreSucursal'],1,0,'C',0);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,10,$row['nombreUsuario'],1,1,'C',0);
} 

$pdf->Output('Prueba.pdf', 'I');
?>



