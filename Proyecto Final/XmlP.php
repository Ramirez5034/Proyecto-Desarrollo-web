<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta = "SELECT p.idProducto, p.nombre, p.cantidad, p.marca, p.FechaIngreso, a.nombre AS nombreAlmacen, p.estatus
FROM producto p
JOIN almacen a ON p.idAlmacen = a.idAlmacen
WHERE p.estatus = 1";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Producto.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('cantidad', $row['cantidad']);
    $xml->writeElement('marca', $row['marca']);
    $xml->writeElement('FechaIngreso', $row['FechaIngreso']);
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
header('Content-Disposition: attachment; filename="Producto.xml"');
readfile('Producto.xml');
?>
