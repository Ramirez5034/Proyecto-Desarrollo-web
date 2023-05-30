<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $Estado=$_POST["estado"];
     $Telefono=$_POST["telefono"];
     $idAlmacen=$_POST["idAlmacen"];

      
     $sql = "INSERT INTO sucursal (nombre, estado, telefono, idAlmacen) VALUES ('".$Nombre."','".$Estado."','".$Telefono."','".$idAlmacen."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Sucursal.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>