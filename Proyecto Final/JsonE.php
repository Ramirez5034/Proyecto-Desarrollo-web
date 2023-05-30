<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta = "SELECT e.idEmpleado, e.nombre, e.APaterno, e.AMaterno, e.salario, e.telefono, e.FechaContratacion, s.nombre AS nombreSucursal, a.nombre AS nombreArea, u.nombre AS nombreUsuario, e.estatus
FROM Empleado e
JOIN Sucursal s ON e.idSucursal = s.idSucursal
JOIN Area a ON e.idArea = a.idArea
JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1";

$resultado = $conn->query($consulta);

// Obtener los datos de la consulta como un array
$empleados = array();
while ($row = $resultado->fetch_assoc()) {
    unset($row['estatus']);
    unset($row['idEmpleado']);
    $empleados[] = $row;
}

// Generar el archivo JSON
$jsonData = json_encode($empleados, JSON_PRETTY_PRINT);

// Establecer los encabezados de la respuesta HTTP
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="empleados.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conn->close();
?>
