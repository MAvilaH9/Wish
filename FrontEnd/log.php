<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Wish</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../BackEnd/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../BackEnd/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../BackEnd/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../BackEnd/css/estilos.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../FrontEnd/images/w.jpg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="../Recursos/Login.php" method="post">
                <div class="form-group">
                  <label class="label">Usuario</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="Correo" placeholder="Correo Electrónico">
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="Contrasenia" placeholder="Contraseña">
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary submit-btn btn-block" value="Iniciar Sesión">
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Mantenner sesion iniciada
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="#" alt="">Iniciar con Facebook</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">No Recueras ?</span>
                  <a href="Registrousuario.php" class="text-black text-small">Crear una cuenta</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../BackEnd/js/vendor.bundle.base.js"></script>
  <script src="../BackEnd/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../BackEnd/js/off-canvas.js"></script>
  <script src="../BackEnd/js/misc.js"></script>
  <script src="js/login/main.js"></script>
  <!-- endinject -->
</body>

</html>