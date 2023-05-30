<?php
require('cn.php');
require('vendor/autoload.php');

$consulta="SELECT s.idSucursal, s.nombre, s.estado, s.telefono, a.nombre AS nombreAlmacen, s.estatus
FROM sucursal s
JOIN almacen a ON s.idAlmacen = a.idAlmacen
WHERE s.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Sucursal.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Estado', 'Telefono', 'Almacen'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['estado'],
        $rows['telefono'],
        $rows['nombreAlmacen']
    ));
}

fclose($output);
exit;

    ?>