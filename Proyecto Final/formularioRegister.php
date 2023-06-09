<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<?php
require_once('config.php');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

echo '<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="registro.php" method="POST" class="mx-1 mx-md-4">

                
                <div class="form-outline mb-4">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre de usuario">
                  <label class="form-label" for="nombre"></label>
                </div>

                  <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control" placeholder="Correo eléctronico">
                    <label class="form-label" for="email"></label>
                  </div>

                  <div class="form-outline mb-3">
        <input type="password" name="clave" class="form-control" placeholder="Contraseña">
          <label class="form-label" for="clave"></label>
        </div>

        <div class="form-outline mb-3">
        <input type="password" name="Cclave" class="form-control" placeholder="Repetir Contraseña">
          <label class="form-label" for="Cclave"></label>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
        <p class="small fw-bold mt-2 pt-1 mb-0">Ya tienes una cuenta? <a href="FormularioLogin.php"
            class="link-danger">Inicia Sesión</a></p>
      </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://tecmonclova.com/sitio/wp-content/uploads/2019/03/LogoTecNM_mva_2018_video-web.png"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>'

?>
</body>
</html>