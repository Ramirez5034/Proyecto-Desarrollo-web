<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_GET["idArea"];

$sql = "UPDATE area SET estatus=0 where idArea=". $id;

$resultado = mysqli_query($conn,$sql);

header("Location: Area.php"); 
mysqli_close( $conn );



?>