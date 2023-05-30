<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>  
<?php
 $id=$_GET["idArea"];
 require ('cn.php');
$consulta = "SELECT * FROM area WHERE idArea = $id";
$datos = $conn->query($consulta);

if ($datos->num_rows > 0) {
    $registro = $datos->fetch_assoc();
    echo'<center>
    <form class= "col-3" action="UpdArea.php" method="post">
    <label class="form-label" for="Nombre"><h1>Nombre:</h1></label><br>
    <input class="form-control" type="text" id="nombre" name="nombre"value="'.$registro["nombre"].'"><br>
    <label class="form-label" for="EmpleadosRequerido"><h1>Empleados
Requeridos:</h1></label><br>
  <input class="form-control" type="text" id="EmpleadosRequerido" name="EmpleadosRequerido"value="'.$registro["EmpleadosRequerido"].'"><br>
  <label class="form-label" for="HorasRequeridas"><h1>Horas Requeridas:</h1></label><br>
        <input class="form-control" type="text" id="HorasRequeridas" name="HorasRequeridas"value="'.$registro["HorasRequeridas"].'"><br>
        <input class="btn btn-primary" type="submit" value="Modificar">
        <input class="form-label" type="hidden" id="idArea" name="idArea"
        value="'.$id.'">
        </form>
    </center>';
}
    ?>
</body>
</html>