<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<?php
session_start();

require_once('config.php');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

echo'<form action="login.php" method="POST"> <section class="vh-100">
<div class="container-fluid h-custom">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="https://tecmonclova.com/sitio/wp-content/uploads/2019/03/LogoTecNM_mva_2018_video-web.png"
        class="img-fluid" alt="Sample image">
    </div>
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form>
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <p class="lead fw-normal mb-0 me-3">Ingresar con</p>
          <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="bi bi-facebook"></i>
          </button>

          <button type="button" class="btn btn-info btn-floating mx-1">
          <i class="bi bi-twitter"></i>
          </button>

          <button type="button" class="btn btn-secondary btn-floating mx-1">
          <i class="bi bi-discord"></i>
          </button>
        </div>

        <div class="divider d-flex align-items-center my-4">
          <p class="text-center fw-bold mx-3 mb-0">Or</p>
        </div>


       
        <!-- Email input -->
        <div class="form-outline mb-4">
        <input type="text" name="nombre" placeholder="Nombre de usuario">
          <label class="form-label" for="nombre"></label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
        <input type="password" name="clave" placeholder="Contraseña">
          <label class="form-label" for="clave"></label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
       
          
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="submit" class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar sesión</button>
          <p class="small fw-bold mt-2 pt-1 mb-0">No tienes una cuenta? <a href="formularioRegister.php"
              class="link-danger">Registrate</a></p>
        </div>
      </form>
     
    </div>
  </div>
</div>
<div
  class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
  <!-- Copyright -->
  <div class="text-white mb-3 mb-md-0">
    Copyright © 2020. All rights reserved.
  </div>
  <!-- Copyright -->

  <!-- Right -->
  <div>
    <a href="#!" class="text-white me-4">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a href="#!" class="text-white me-4">
      <i class="fab fa-twitter"></i>
    </a>
    <a href="#!" class="text-white me-4">
      <i class="fab fa-google"></i>
    </a>
    <a href="#!" class="text-white">
      <i class="fab fa-linkedin-in"></i>
    </a>
  </div>
  <!-- Right -->
</div>
</section>'

?>
</body>
</html>