<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>  
<?php
 $id=$_GET["idAlmacen"];
 require ('cn.php');
$consulta = "SELECT * FROM almacen WHERE idAlmacen = $id";
$datos = $conn->query($consulta);

if ($datos->num_rows > 0) {
    $registro = $datos->fetch_assoc();
    echo'<center>
    <form class= "col-3" action="UpdAlmacen.php" method="post">
    <label class="form-label" for="Nombre"><h1>Nombre:</h1></label><br>
    <input class="form-control" type="text" id="nombre" name="nombre"value="'.$registro["nombre"].'"><br>
    <label class="form-label" for="encargado"><h1>Encargado:</h1></label><br>
    <input class="form-control" type="text" id="encargado" name="encargado"value="'.$registro["encargado"].'"><br>
    <label class="form-label" for="capacidad"><h1>Capacidad:</h1></label><br>
          <input class="form-control" type="text" id="capacidad" name="capacidad"value="'.$registro["capacidad"].'"><br>
        <input class="btn btn-primary" type="submit" value="Modificar">
        <input class="form-label" type="hidden" id="idAlmacen" name="idAlmacen"
        value="'.$id.'">
        </form>
    </center>';
}
    ?>
</body>
</html>