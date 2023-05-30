<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="select * from area where estatus = 1";

$resultado = $conn->query($consulta);

// Obtener los datos de la consulta como un array
$areas = array();
while ($row = $resultado->fetch_assoc()) {
    unset($row['estatus']);
    unset($row['idArea']);
    $areas[] = $row;
}

// Generar el archivo JSON
$jsonData = json_encode($areas, JSON_PRETTY_PRINT);

// Establecer los encabezados de la respuesta HTTP
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="areas.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conn->close();
?>
