<?php
$messaje = "";
session_start();
require_once ('Conexion.php');

$correo = $_POST['Correo'];
$contrasenia = $_POST['Contrasenia'];

$sql = 'SELECT * from usuario where Correo=?';
$sentencia = $pdo->prepare($sql);   
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();

$resultado['Correo'];
$resultado['Contrasenia'];


if (!$resultado) {?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Wish</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/w.jpg"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/util.css">
	<link rel="stylesheet" type="text/css" href="../FrontEnd/css/login/estilo.css">	
	<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../FrontEnd/images/product-10.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Error inicio de Sesion 
					</span> <br> <br>	
                    <span class="login100-form-title">
						Valide Usuario y/o Contraseña
					</span>			
					<div class="container-login100-form-btn">
                        <a href="../FrontEnd/Login.php" class="login100-form-btn">Aceptar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->	
	<script src="../FrontEnd/js/login/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../FrontEnd/js/login/popper.js"></script>
	<script src="../FrontEnd/js/login/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../FrontEnd/js/login/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../FrontEnd/js/login/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../FrontEnd/js/login/main.js"></script>

</body>
</html>
  <?php  echo'No existe usuario';
    die();
}


if ($contrasenia == $resultado['Contrasenia']  && $resultado['Correo'] == $correo){

    $_SESSION['Nombre_Usuario'] = $resultado['NombreUsuario']; 
    $_SESSION['Apellidos'] = $resultado['Apellidos']; 
    $_SESSION['IdPerfil'] = $resultado['IdPerfil']; 
    $_SESSION['Correo'] = $resultado['Correo']; 
    $_SESSION['IdUsuario']=$resultado['IdUsuario'];
    $_SESSION['IdVendedor']=$resultado['IdVendedor'];

    if($resultado['IdPerfil'] == 3){
        header('location:../FrontEnd/Index.php');
        
    } 

    if($resultado['IdPerfil'] == 1){
            header('location:../BackEnd/Index.php');
    }
}
else{
    header('location:../FrontEnd/Login.php');
}
?>
