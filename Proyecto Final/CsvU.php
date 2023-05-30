<?php
require('cn.php');
require('vendor/autoload.php');
 
$consulta="SELECT * FROM Usuario WHERE estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Usuario.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Email', 'Clave', 'FechaCreacion' ,'Rol' ));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['email'],
        $rows['clave'],
        $rows['FechaCreacion'],
        $rows['Rol']
    ));
}

fclose($output);
exit;

    ?>