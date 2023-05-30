<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

    $Nombre=$_POST["nombre"];
     $Email=$_POST["email"];
     $Clave=$_POST["clave"];
     $Fecha=$_POST["Fecha"];

     $Clave = md5($Clave); 

     $sql = "INSERT INTO usuario (nombre, email, clave, FechaCreacion) VALUES ('".$Nombre."','".$Email."','".$Clave."', '".$Fecha."')";

    $resultado = mysqli_query($conn,$sql);
header("Location: Usuario.php"); 
mysqli_close( $conn );



   ?>
   </body>
   </html>
</body>
</html>