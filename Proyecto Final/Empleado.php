<!DOCTYPE html>
<html>
<head> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<style>
        .export-button {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 10px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            color: #fff;
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease;
        }

        .export-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<?php
require_once('config.php');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
//---------------------------------------------------------------------------------------
session_start();

// Verificar si el nombre de usuario está almacenado en la variable de sesión
if(isset($_SESSION['nombre'])) {
  $nombreUsuario = $_SESSION['nombre'];
} else {
  // Redireccionar si el nombre de usuario no está disponible
  header("Location: formulariologin.php");
  exit();
}

 echo '<nav class="navbar navbar-dark bg-dark" "navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
  <a class="navbar-brand" href="#">
  <img
  src=https://seeklogo.com/images/K/kfc-logo-481740F210-seeklogo.com.png
  class="me-2"
  height="50"
  alt="MDB Logo"
  loading="lazy"
/>
Kentucky Fried Chicken Tabla Empleado</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="inicio.php">
        <i class="bi bi-card-text"></i>  Inicio
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="Almacen.php">
      <i class="bi bi-bag"></i> Almacen
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="Area.php">
    <i class="bi bi-clipboard"></i>  Area
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="Empleado.php">
      <i class="bi bi-person-lines-fill"></i>  Empleado
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="Producto.php">
      <i class="bi bi-basket2"></i>  Producto
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="Sucursal.php">
      <i class="bi bi-shop"></i>   Sucursal
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="Usuario.php">
      <i class="bi bi-person-circle"></i>  Usuario
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="Reportes.php">
    <i class="bi bi-clipboard-data"></i>  Reportes
    </a>
  </li>

    <div class="dropdown"> <!-- Agrega el código del dropdown aquí -->
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-fill"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">'.$nombreUsuario.'</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="FormularioLogin.php">Cerrar sesión</a></li>
</div>

    </ul>
  </div>
</div>
</nav>';
//------------------------------------------------------------------------------------------------------
$consulta="SELECT e.idEmpleado, e.nombre, e.APaterno, e.AMaterno, e.salario, e.telefono, e.FechaContratacion, s.nombre AS nombreSucursal, a.nombre AS nombreArea, u.nombre AS nombreUsuario, e.estatus
FROM Empleado e
JOIN Sucursal s ON e.idSucursal = s.idSucursal
JOIN Area a ON e.idArea = a.idArea
JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1";

$datos = $conn->query($consulta);
echo '<table class="table">';
echo "<tr>";
echo "<th><p>Nombre</th></p>";
echo "<th><p>APaterno</th></p>";
echo "<th><p>Amaterno</th></p>";
echo "<th><p>Salario</th></p>";
echo "<th><p>Télefono</th></p>";
echo "<th><p>FechaContratación</th></p>";
echo "<th><p>Area</th></p>";
echo "<th><p>Sucursal</th></p>";
echo "<th><p>Usuario</th></p>";
while ($registro = $datos->fetch_assoc()){
//$registro = $datos->fetch_array(MYSQLI_ASSOC);
echo '
            <tr>           
                <td>'.$registro["nombre"].'</td>
                <td>'.$registro["APaterno"].'</td>
                <td>'.$registro["AMaterno"].'</td>
                <td>'.$registro["salario"].'</td>
                <td>'.$registro["telefono"].'</td>
                <td>'.$registro["FechaContratacion"].'</td>
                <td>'.$registro["nombreArea"].'</td>
                <td>'.$registro["nombreSucursal"].'</td>
                <td>'.$registro["nombreUsuario"].'</td>
                <td><a href="FormUpdEmpleado.php?idEmpleado='.$registro["idEmpleado"].'"><i class="bi bi-pencil-square"></i>
                <td><a href="DelEmpleado.php?idEmpleado='.$registro["idEmpleado"].'" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este registro?\')">
                <i class="bi bi-trash-fill"></i>';
 echo "</tr>";
}
echo"</table>";

echo '<td><a href="ForminserEmpleado.php"><i class="bi bi-plus-square fs-4"></i></a></td>';

$conn->close();

echo '<a class="export-button" href="exportar_pdf.php"> Exportar a PDF</a>';
echo '<a class="export-button" href="ExcelE.php"> Exportar a Excel</a>';
echo '<a class="export-button" href="CsvE.php"> Exportar a Csv</a>';
echo '<a class="export-button" href="XmlE.php"> Exportar a Xml</a>';
echo '<a class="export-button" href="JsonE.php"> Exportar a Json</a>';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>