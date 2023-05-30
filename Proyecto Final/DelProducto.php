<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idProducto"];

$sql = "UPDATE producto SET estatus=0 where idProducto=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Producto.php"); 
mysqli_close( $conn );



?>