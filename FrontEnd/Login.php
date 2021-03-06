<?php
session_start();
if (isset($_SESSION['nombre'])) {
  header('location:index.php');
}else{
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Wish</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/w.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/login/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/estilo.css">	
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/product-10.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="../Recursos/Login.php" method="post">
					<span class="login100-form-title">
						Inicio de Sesion 
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valide su correo: ex@abc.xyz">
						<input class="input100" type="text" name="Correo" placeholder="Correo">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su contraseña">
						<input class="input100" type="password" name="Contrasenia" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Iniciar Sesión">
					</div>
					<br> <hr>
					<div class="text-center p-t-12">
						<a class="txt2" href="Registro.php">
							Registrarse
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="Registro.php">
							Registrarse
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->	
	<script src="js/login/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/login/popper.js"></script>
	<script src="js/login/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/login/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/login/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/login/main.js"></script>

</body>
</html>