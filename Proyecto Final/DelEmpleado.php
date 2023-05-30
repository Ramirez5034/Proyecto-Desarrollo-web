<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idEmpleado"];

$sql = "UPDATE empleado SET estatus=0 where idEmpleado=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Empleado.php"); 
mysqli_close( $conn );


?>