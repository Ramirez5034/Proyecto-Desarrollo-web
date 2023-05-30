<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>  
<?php
$id=$_GET["idUsuario"];
require ('cn.php');
$consulta = "SELECT * FROM usuario WHERE idUsuario = $id";
$datos = $conn->query($consulta);

if ($datos->num_rows > 0) {
    $registro = $datos->fetch_assoc();
    echo ' <center>
    <form class="col-3" action="UpdUsuario.php" method="post">
        <label class="form-label" for="Nombre"><h1>Nombre:</h1></label><br>
        <input class="form-control" type="text" id="nombre" name="nombre" value="'.$registro["nombre"].'"><br>
        <label class="form-label" for="email"><h1>Email:</h1></label><br>
        <input class="form-control" type="text" id="email" name="email" value="'.$registro["email"].'"><br>
        <label class="form-label" for="clave"><h1>Clave:</h1></label><br>
        <input class="form-control" type="text" id="clave" name="clave" value="'.$registro["clave"].'"><br>
        <label class="form-label" for="Fecha"><h1>Fecha de Creacion:</h1></label><br>
        <input class="form-control" type="text" id="Fecha" name="Fecha" value="'.$registro["FechaCreacion"].'"><br>
        <input class="btn btn-primary" type="submit" value="Modificar">
        <input class="form-label" type="hidden" id="idUsuario" name="idUsuario"
        value="'.$id.'">
        </form>
    </center>';
}
    ?>
</body>
</html>