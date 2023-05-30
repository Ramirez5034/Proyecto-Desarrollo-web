<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php
$id=$_GET["idEmpleado"];
require ('cn.php');
$consulta = "SELECT * FROM empleado WHERE idUsuario = $id";
$datos = $conn->query($consulta);

if ($datos->num_rows > 0) {
    $registro = $datos->fetch_assoc();
    echo'<center>
    <form class="col-3" action="UpdEmpleado.php" method="post">
        <label class="form-label" for="Nombre"><h1>Nombre:</h1></label><br>
        <input class="form-control" type="text" id="nombre" name="nombre"value="'.$registro["nombre"].'"><br>
        <label class="form-label" for="Apaterno"><h1>Apaterno:</h1></label><br>
        <input class="form-control" type="text" id="Apaterno" name="Apaterno"value="'.$registro["APaterno"].'"><br>
        <label class="form-label" for="Amaterno"><h1>Amaterno:</h1></label><br>
        <input class="form-control" type="text" id="Amaterno" name="Amaterno"value="'.$registro["AMaterno"].'"><br>
        <label class="form-label" for="Salario"><h1>Salario:</h1></label><br>
        <input class="form-control" type="text" id="Salario" name="Salario"value="'.$registro["salario"].'"><br>
        <label class="form-label" for="Telefono"><h1>Telefono:</h1></label><br>
        <input class="form-control" type="text" id="Telefono" name="Telefono"value="'.$registro["telefono"].'"><br>
        <label class="form-label" for="Fecha"><h1>Fecha de contratacion:</h1></label><br>
        <input class="form-control" type="text" id="Fecha" name="Fecha"value="'.$registro["FechaContratacion"].'"><br>

        <label class="form-label" for="idArea"><h1>idArea:</h1></label><br>
        <select class="form-control" id="idArea" name="idArea">';
}
        ?>
            <?php
            require('cn.php');

            $consultaArea = "SELECT idArea, nombre FROM area where estatus = 1";
            $resultadoArea = $conn->query($consultaArea);

            while ($rowArea = $resultadoArea->fetch_assoc()) {
                echo '<option value="' . $rowArea['idArea'] . '">' . $rowArea['nombre'] . '</option>';
            }

            $conn->close();
            ?>
        </select> <br>

        <label class="form-label" for="idSucursal"><h1>idSucursal:</h1></label><br>
        <select class="form-control" id="idSucursal" name="idSucursal">
            <?php
            require('cn.php');

            $consultaSucursal = "SELECT idSucursal, nombre FROM sucursal where estatus = 1";
            $resultadoSucursal = $conn->query($consultaSucursal);

            while ($rowSucursal = $resultadoSucursal->fetch_assoc()) {
                echo '<option value="' . $rowSucursal['idSucursal'] . '">' . $rowSucursal['nombre'] . '</option>';
            }

            $conn->close();
            ?>
        </select> <br>

        <label class="form-label" for="idUsuario"><h1>idUsuario:</h1></label><br>
        <select class="form-control" id="idUsuario" name="idUsuario">
            <?php
            require('cn.php');
            $consultaUsuario = "SELECT idUsuario, nombre FROM usuario where estatus = 1";
            $resultadoUsuario = $conn->query($consultaUsuario);

            while ($rowUsuario = $resultadoUsuario->fetch_assoc()) {
                echo '<option value="' . $rowUsuario['idUsuario'] . '">' . $rowUsuario['nombre'] . '</option>';
            }


            $conn->close();
            ?>
        </select> <br>
        <?php
 echo '<input class="form-label" type="hidden" id="idEmpleado" name="idEmpleado"
        value="'.$id.'">'
        ?>
        <input class="btn btn-primary" type="submit" value="Insertar">
    </form>
    </center>
</body>
</html>


