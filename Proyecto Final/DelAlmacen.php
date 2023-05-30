<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idAlmacen"];

$sql = "UPDATE almacen SET estatus=0 where idAlmacen=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Almacen.php"); 
mysqli_close( $conn );



?>