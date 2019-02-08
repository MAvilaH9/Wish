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
  <link rel="stylesheet" href="css/login/estilos.css">
  <link rel="stylesheet" href="css/login/main.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../FrontEnd/images/w.jpg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Registrarse</h2>
            <div class="auto-form-wrapper">
              <form action="../Recursos/RegistroUsuario.php" method="post" class="validate-form">
                <div class="form-group" data-validate = "Ingrese su nombre">
                  <div class="input-group" data-validate = "Ingrese su nombre">
                    <input type="text" name="Nombre_Usuario" class="form-control" placeholder="Nombre" require>
                    <div class="input-group-append">
                        <span class="input-group-text">
                        </span>
                    </div>
                  </div>
                </div>
                <div class="form-group validate-form">
                  <div class="input-group validate-input" data-validate = "Ingrese su nombre" >
                    <input type="text" class="form-control" name="Apellidos" placeholder="Apellidos" require>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group validate-input" data-validate = "Valide su correo: ex@abc.xyz">
                  <div class="input-group" data-validate = "Valide su correo: ex@abc.xyz">
                    <input type="mail" class="form-control" name="Correo" placeholder="Correo" require>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group" data-validate = "Ingrese su contraseña">
                  <div class="input-group" data-validate = "Ingrese su contraseña">
                    <input type="password" class="form-control" name="Contrasenia" placeholder="Contraseña" require>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary submit-btn btn-block" value="Registrar">
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">¿Ya tengo cuenta?</span>
                  <a href="Log.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
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