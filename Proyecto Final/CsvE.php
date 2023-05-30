<?php
require('cn.php');
require('vendor/autoload.php');

$consulta = "SELECT e.idEmpleado, e.nombre, e.APaterno, e.AMaterno, e.salario, e.telefono, e.FechaContratacion, s.nombre AS nombreSucursal, a.nombre AS nombreArea, u.nombre AS nombreUsuario, e.estatus
FROM Empleado e
JOIN Sucursal s ON e.idSucursal = s.idSucursal
JOIN Area a ON e.idArea = a.idArea
JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Empleado.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'APaterno', 'AMaterno', 'Salario', 'Telefono', 'FechaContratacion', 'Area', 'Sucursal', 'Usuario'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['APaterno'],
        $rows['AMaterno'],
        $rows['salario'],
        $rows['telefono'],
        $rows['FechaContratacion'],
        $rows['nombreArea'],
        $rows['nombreSucursal'],
        $rows['nombreUsuario']
    ));
}

fclose($output);
exit;

    ?>