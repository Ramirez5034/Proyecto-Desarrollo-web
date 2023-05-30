<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $EmpleadosRequerido=$_POST["EmpleadosRequerido"];
     $HorasRequeridas=$_POST["HorasRequeridas"];

      
     $sql = "INSERT INTO Area (nombre, EmpleadosRequerido, HorasRequeridas) VALUES ('".$Nombre."','".$EmpleadosRequerido."','".$HorasRequeridas."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Area.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>