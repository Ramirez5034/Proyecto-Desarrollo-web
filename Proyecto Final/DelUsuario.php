<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idUsuario"];

$sql = "UPDATE usuario SET estatus=0 where idUsuario=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Usuario.php"); 
mysqli_close( $conn );



?>