<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $Apaterno=$_POST["Apaterno"];
     $Amaterno=$_POST["Amaterno"];
     $Salario=$_POST["Salario"];
     $Telefono=$_POST["Telefono"];
     $Fecha=$_POST["Fecha"];
     $idArea=$_POST["idArea"];
     $idSucursal=$_POST["idSucursal"];
     $idUsuario=$_POST["idUsuario"];
      
     $sql = "INSERT INTO empleado (nombre, APaterno, AMaterno, salario, telefono, FechaContratacion, idArea, idSucursal, idUsuario) 
     VALUES ('".$Nombre."','".$Apaterno."','".$Amaterno."','".$Salario."','".$Telefono."','".$Fecha."', '".$idArea."','".$idSucursal."','".$idUsuario."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Empleado.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>