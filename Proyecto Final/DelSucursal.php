<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idSucursal"];

$sql = "UPDATE sucursal SET estatus=0 where idSucursal=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Sucursal.php"); 
mysqli_close( $conn );



?>