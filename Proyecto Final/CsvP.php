<?php
require('cn.php');
require('vendor/autoload.php');

$consulta="SELECT p.idProducto, p.nombre, p.cantidad, p.marca, p.FechaIngreso, a.nombre AS nombreAlmacen, p.estatus
FROM producto p
JOIN almacen a ON p.idAlmacen = a.idAlmacen
WHERE p.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="producto.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Cantidad', 'Marca', 'Fecha de ingreso', 'Almacen'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['cantidad'],
        $rows['marca'],
        $rows['FechaIngreso'],
        $rows['nombreAlmacen']
    ));
}

fclose($output);
exit;

    ?>