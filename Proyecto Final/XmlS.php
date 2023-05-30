<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT s.idSucursal, s.nombre, s.estado, s.telefono, a.nombre AS nombreAlmacen, s.estatus
FROM sucursal s
JOIN almacen a ON s.idAlmacen = a.idAlmacen
WHERE s.estatus = 1";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Sucursal.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('estado', $row['estado']);
    $xml->writeElement('telefono', $row['telefono']);
    $xml->writeElement('nombreAlmacen', $row['nombreAlmacen']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();



// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Sucursal.xml"');
readfile('Sucursal.xml');
?>
