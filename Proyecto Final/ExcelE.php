<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta="SELECT e.idEmpleado, e.nombre, e.APaterno, e.AMaterno, e.salario, e.telefono, e.FechaContratacion, s.nombre AS nombreSucursal, a.nombre AS nombreArea, u.nombre AS nombreUsuario, e.estatus
FROM Empleado e
JOIN Sucursal s ON e.idSucursal = s.idSucursal
JOIN Area a ON e.idArea = a.idArea
JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1";
$datos = $conn->query($consulta);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Empleados");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'APaterno');
$hojaActiva->setCellValue('C1', 'AMaterno');
$hojaActiva->setCellValue('D1', 'Salario');
$hojaActiva->setCellValue('E1', 'Telefono');
$hojaActiva->setCellValue('F1', 'FechaContratacion');
$hojaActiva->setCellValue('G1', 'Area');
$hojaActiva->setCellValue('H1', 'Sucursal');
$hojaActiva->setCellValue('I1', 'Usuario');

$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B'.$Fila, $rows['APaterno']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C'.$Fila, $rows['AMaterno']);
    $hojaActiva->getColumnDimension('D')->setWidth(10);
    $hojaActiva->setCellValue('D'.$Fila, $rows['salario']);
    $hojaActiva->getColumnDimension('E')->setWidth(15);
    $hojaActiva->setCellValue('E'.$Fila, $rows['telefono']);
    $hojaActiva->getColumnDimension('F')->setWidth(10);
    $hojaActiva->setCellValue('F'.$Fila, $rows['FechaContratacion']);
    $hojaActiva->getColumnDimension('F')->setWidth(10);
    $hojaActiva->setCellValue('G'.$Fila, $rows['nombreArea']);
    $hojaActiva->getColumnDimension('G')->setWidth(15);
    $hojaActiva->setCellValue('H'.$Fila, $rows['nombreSucursal']);
    $hojaActiva->getColumnDimension('H')->setWidth(10);
    $hojaActiva->setCellValue('I'.$Fila, $rows['nombreUsuario']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Empleado.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>