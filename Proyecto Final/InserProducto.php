<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $Marca=$_POST["marca"];
     $Cantidad=$_POST["cantidad"];
     $Fecha=$_POST["Fecha"];
     $idAlmacen=$_POST["idAlmacen"];

      
     $sql = "INSERT INTO producto (nombre, cantidad, marca, FechaIngreso , idAlmacen) VALUES ('".$Nombre."','".$Cantidad."','".$Marca."', '".$Fecha."' ,'".$idAlmacen."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Producto.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>