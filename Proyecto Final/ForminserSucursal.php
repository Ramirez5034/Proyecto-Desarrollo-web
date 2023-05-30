<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <center>
    <form class= "col-3" action="InserSucursal.php" method="post">
  <label class="form-label" for="Nombre"><h1>Nombre:</h1></label><br>
  <input class="form-control" type="text" id="nombre" name="nombre"> <br>
  <label class="form-label" for="estado"><h1>Estado:</h1></label><br>
  <input class="form-control" type="text" id="estado" name="estado"> <br>
  <label class="form-label" for="telefono"><h1>Telefono:</h1></label><br>
        <input class="form-control" type="text" id="telefono" name="telefono"> <br>
        <label class="form-label" for="idAlmacen"><h1>idAlmacen:</h1></label><br>
        <select class="form-select" id="idAlmacen" name="idAlmacen">
            <?php
            require_once('Config.php');
            $conn = new mysqli($servername, $username, $password, $dbname);

            $consulta = "SELECT idAlmacen, nombre FROM almacen where estatus = 1";
            $resultado = $conn->query($consulta);

            while ($row = $resultado->fetch_assoc()) {
                echo '<option value="' . $row['idAlmacen'] . '">' . $row['nombre'] . '</option>';
            }

            $conn->close();
            ?>
        </select>
        <input class="btn btn-primary" type="submit" value="Insertar">
    </center>
</form>
</body>
</html>