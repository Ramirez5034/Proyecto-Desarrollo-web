<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once ('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $Encargado=$_POST["encargado"];
     $Capacidad=$_POST["capacidad"];

      
     $sql = "INSERT INTO almacen (nombre, encargado, capacidad) VALUES ('".$Nombre."','".$Encargado."','".$Capacidad."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Almacen.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>