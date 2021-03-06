<?php
session_start();
include "../Recursos/Conexion.php";
if (isset($_SESSION['Nombre_Usuario'])) {

	if ($_SESSION['IdPerfil'] == 1) {
		header('location:../BackEnd/Index.php');
	}

}else{
	header('location:Login.php');
}
$IdUsuario=$_SESSION['IdUsuario'];
$sql = $pdo->prepare("SELECT count(IdCarrito) as Cantidad from carrito where IdUsuario=? AND Estatus='Pendiente'");
$sql -> execute(array($IdUsuario));
$resultado = $sql->fetch();

$sql1 = $pdo->prepare('SELECT count(IdWishlist) as Cantidad from wishlist where IdUsuario=?');
$sql1 -> execute(array($IdUsuario));
$resultado1 = $sql1->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wish</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/w.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->		
					<a href="Index.php" class="logo">
						<svg width="85" height="30" viewBox="0 0 143 48" xmlns="http://www.w3.org/2000/svg"><g fill="#2fb7ec" fill-rule="evenodd"><path d="M71.04 10.045c-.867-1.022-1.192-2.273-.974-3.757.217-1.48.91-2.734 2.076-3.755C73.309 1.51 74.629 1 76.105 1c1.475 0 2.647.511 3.513 1.533.868 1.02 1.192 2.274.975 3.755-.218 1.484-.91 2.735-2.076 3.757-1.168 1.02-2.49 1.532-3.964 1.532-1.476 0-2.647-.511-3.514-1.532M59.272 15.146c-1.732 0-3.343 1.411-3.582 3.134l-1.76 12.833c-.194 1.398-.864 2.61-2.008 3.638-1.145 1.028-2.435 1.542-3.865 1.542-1.392 0-2.52-.503-3.381-1.511-.864-1.007-1.195-2.23-.997-3.669l1.062-7.788c.032-1.554-1.134-2.77-2.742-2.77h-4.21c-1.608 0-3.112 1.216-3.508 2.77l-1.097 7.788c-.198 1.44-.87 2.662-2.012 3.669-1.142 1.008-2.409 1.511-3.799 1.511-1.392 0-2.528-.514-3.408-1.542-.881-1.027-1.224-2.24-1.031-3.638l2.358-17.028c.25-1.658-.732-3.39-2.23-4.093 0 0-17.758-7.402-18.915-7.878-1.172-.48-2.5.596-2.954 2.39L.108 8.787c-.455 1.794.57 3.834 2.275 4.533l11.901 4.926-1.783 12.867c-.598 4.315.413 8.007 3.038 11.069 2.624 3.064 6.084 4.594 10.382 4.594 3.967 0 7.59-1.335 10.865-4.008 2.616 2.673 5.89 4.008 9.818 4.008 4.297 0 8.181-1.53 11.654-4.594 3.472-3.062 5.508-6.754 6.106-11.069 0 0 1.865-13.579 1.899-13.816.162-1.184-1.12-2.15-2.851-2.15h-4.14zM76.717 15h-3.72c-1.557 0-3.005 1.267-3.22 2.815 0 0-3.747 26.755-3.764 26.886-.147 1.063 1.005 1.933 2.561 1.933h3.72c1.556 0 3.004-1.267 3.218-2.815l3.765-26.886C79.424 15.87 78.272 15 76.717 15M140.49 18.517c-2.133-2.517-5.02-3.776-8.663-3.776-3.644 0-7.046.798-10.4 3.693l2.375-16.463C123.952.887 122.776 0 121.19 0h-3.795c-1.589 0-3.067 1.292-3.284 2.873l-6.097 41.94c-.15 1.083 1.025 1.971 2.613 1.971h3.795c1.559 0 3.008-1.246 3.268-2.787h.005l1.91-13.08c.386-2.643 1.4-4.647 3.044-6.01 1.643-1.364 3.436-2.046 5.375-2.046 3.92 0 5.503 2.602 4.744 7.804l-2.035 14.108c-.15 1.084 1.026 1.971 2.614 1.971h3.793c1.59 0 3.066-1.292 3.286-2.873l2.345-15.283c.612-4.196-.148-7.554-2.28-10.071M105.235 23.153l1.775-2.266c.752-.96.77-2.437.045-3.447-.318-.547-1.242-1.078-2.086-1.534l-.095-.052c-2.67-1.448-5.294-1.994-8.772-1.824-3.778.185-7.002 1.3-9.581 3.315-2.6 2.03-4.07 4.601-4.366 7.64-.301 3.084.74 5.386 3.091 6.843 1.117.706 2.138 1.244 3.034 1.6.89.357 2.2.775 3.895 1.245 1.646.459 2.9.98 3.724 1.543.756.52 1.094 1.077 1.032 1.703-.063.654-.401 1.183-1.031 1.616-.655.45-1.53.706-2.598.758-2.888.141-5.605-.533-8.075-2.004l-1.833-1.015a1.853 1.853 0 0 0-.99-.224 1.938 1.938 0 0 0-1.444.742l-2.636 3.494c-.27.358-.376.787-.3 1.207.073.408.308.76.664.998.863.68 1.76 1.273 2.668 1.764a19.146 19.146 0 0 0 3.8 1.579c2.49.736 4.961 1.05 7.34.934 3.586-.176 6.684-1.306 9.21-3.36 2.543-2.067 3.99-4.755 4.307-7.989.321-3.282-.62-5.61-2.798-6.922-1.116-.662-2.102-1.152-2.932-1.456-.825-.3-2.22-.724-4.147-1.258-1.904-.526-3.27-1.008-4.063-1.43-.698-.372-.992-.87-.924-1.567.127-1.307 1.47-2.032 3.988-2.154 2.025-.1 4.057.368 6.029 1.383.405.223.852.49 1.26.752.507.283.897.396 1.269.377.548-.026 1.023-.331 1.54-.99z"></path></g></svg>					
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">	
						<ul class="main-menu">
							<li>
								<a href="Index.php"><b>Inicio</b></a>
							</li>
							<li>
								<a href="Productos.php"><b>Productos</b></a>
							</li>

							<!-- <li >
								<a href="#"><b>Ofertas Relampago</b></a>
							</li> -->

							<li>
								<a href="Visualizado.php"><b>Visualizado Recientemete</b></a>
							</li>
							

							<!-- <li>
								<a href="#">Outlet</a>
							</li> -->

							<li>
								<a href="#">Más</a>
								<ul class="sub-menu">
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=1">Accesorios</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=2">Accesorios de teléfono</a></li>
									<!-- <li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=3">Deportes y actividades al aire libre</a></li> -->
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=4">Moda</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=5">Blusas</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=6">Zapatos</a></li>
									<!-- <li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=7">Cuidado personal</a></li> -->
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=8">Aparatos electrónicos</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=9">Pasatiempos</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=10">Relojes</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=11">Automotriz</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=12">Piezas y accesorios</a></li>
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=13">Carteras y bolsos</a></li>
									<!-- <li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=14">Teléfonos inteligentes</a></li> -->
									<li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=15">Decoración del hogar</a></li>
									<!-- <li><a href="../FrontEnd/ProductoCategoria.php?IdCategoria=16">Relojes analógicos</a></li> -->
								</ul>
							</li>
						</ul>
					</div>
					<!-- Menu Usuario -->
					<div class="wrap-icon-header flex-w flex-r-m">
									
						<ul class="main-menu">
							<li>
								<a href="#"><img src="images/usuario.png" alt="">&nbsp;<?php echo''.$_SESSION['Nombre_Usuario'].'&nbsp' .$_SESSION["Apellidos"];?></a>
								<?php
								if ($_SESSION['IdPerfil'] == 3)?> <?php{
								?>	
								<ul class="sub-menu">
									<li><a href="#"><img src="images/usuario.png" alt="">&nbsp;<?php echo''.$_SESSION['Nombre_Usuario'].'&nbsp' .$_SESSION["Apellidos"];?><br> <hr></a></li>
									<li><a href="../FrontEnd/ListaDeseos.php">Lista de Deseos</a></li>
									<li><a href="../FrontEnd/HistorialCompras.php">Historial de Compras</a></li>
									<li><a href="../FrontEnd/Carrito.php?IdUsuario=<?php echo $_SESSION['IdUsuario'] ?>">Carrito de Compras</a></li> <hr>
									<!-- <li><a href="#">Wish Cash</a></li>
									<li><a href="#">Recompensas</a></li><hr>
									<li><a href="#">Preguntas Frecuentes</a></li>
									<li><a href="#">Configuración</a></li> -->
									<li><a href="../Recursos/Logout.php">Salir</a></li>

								</ul>
								<?php}?>
								<?php
								if ($_SESSION['IdPerfil'] == 2) ?> <?php{
								?>
								<ul class="sub-menu">
									<li><a href="#"><img src="images/usuario.png" alt="">&nbsp;<?php echo''.$_SESSION['Nombre_Usuario'].'&nbsp' .$_SESSION["Apellidos"];?> <br> <hr></a></li>
									<li><a href="../BackEnd/Index.php">Administrar Productos</a></li>
									<li><a href="../FrontEnd/ListaDeseos.php">Lista de Deseos</a></li>
									<li><a href="../FrontEnd/HistorialCompras.php">Historial de Compras</a></li>
									<li><a href="../FrontEnd/Carrito.php?IdUsuario=<?php echo $_SESSION['IdUsuario'] ?>">Carrito de Compras</a></li> <hr>
									<!-- <li><a href="#">Wish Cash</a></li>
									<li><a href="#">Recompensas</a></li><hr>
									<li><a href="#">Preguntas Frecuentes</a></li>
									<li><a href="#">Configuración</a></li> -->
									<li><a href="../Recursos/Logout.php">Salir</a></li>
								</ul>
								<?php}
								?>
								
							</li>
						</ul>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $resultado['Cantidad'];?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<a href="../FrontEnd/ListaDeseos.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?php echo $resultado1['Cantidad'];?>">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>	
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="#" class="logo">
					<svg width="85" height="30" viewBox="0 0 143 48" xmlns="http://www.w3.org/2000/svg"><g fill="#2fb7ec" fill-rule="evenodd"><path d="M71.04 10.045c-.867-1.022-1.192-2.273-.974-3.757.217-1.48.91-2.734 2.076-3.755C73.309 1.51 74.629 1 76.105 1c1.475 0 2.647.511 3.513 1.533.868 1.02 1.192 2.274.975 3.755-.218 1.484-.91 2.735-2.076 3.757-1.168 1.02-2.49 1.532-3.964 1.532-1.476 0-2.647-.511-3.514-1.532M59.272 15.146c-1.732 0-3.343 1.411-3.582 3.134l-1.76 12.833c-.194 1.398-.864 2.61-2.008 3.638-1.145 1.028-2.435 1.542-3.865 1.542-1.392 0-2.52-.503-3.381-1.511-.864-1.007-1.195-2.23-.997-3.669l1.062-7.788c.032-1.554-1.134-2.77-2.742-2.77h-4.21c-1.608 0-3.112 1.216-3.508 2.77l-1.097 7.788c-.198 1.44-.87 2.662-2.012 3.669-1.142 1.008-2.409 1.511-3.799 1.511-1.392 0-2.528-.514-3.408-1.542-.881-1.027-1.224-2.24-1.031-3.638l2.358-17.028c.25-1.658-.732-3.39-2.23-4.093 0 0-17.758-7.402-18.915-7.878-1.172-.48-2.5.596-2.954 2.39L.108 8.787c-.455 1.794.57 3.834 2.275 4.533l11.901 4.926-1.783 12.867c-.598 4.315.413 8.007 3.038 11.069 2.624 3.064 6.084 4.594 10.382 4.594 3.967 0 7.59-1.335 10.865-4.008 2.616 2.673 5.89 4.008 9.818 4.008 4.297 0 8.181-1.53 11.654-4.594 3.472-3.062 5.508-6.754 6.106-11.069 0 0 1.865-13.579 1.899-13.816.162-1.184-1.12-2.15-2.851-2.15h-4.14zM76.717 15h-3.72c-1.557 0-3.005 1.267-3.22 2.815 0 0-3.747 26.755-3.764 26.886-.147 1.063 1.005 1.933 2.561 1.933h3.72c1.556 0 3.004-1.267 3.218-2.815l3.765-26.886C79.424 15.87 78.272 15 76.717 15M140.49 18.517c-2.133-2.517-5.02-3.776-8.663-3.776-3.644 0-7.046.798-10.4 3.693l2.375-16.463C123.952.887 122.776 0 121.19 0h-3.795c-1.589 0-3.067 1.292-3.284 2.873l-6.097 41.94c-.15 1.083 1.025 1.971 2.613 1.971h3.795c1.559 0 3.008-1.246 3.268-2.787h.005l1.91-13.08c.386-2.643 1.4-4.647 3.044-6.01 1.643-1.364 3.436-2.046 5.375-2.046 3.92 0 5.503 2.602 4.744 7.804l-2.035 14.108c-.15 1.084 1.026 1.971 2.614 1.971h3.793c1.59 0 3.066-1.292 3.286-2.873l2.345-15.283c.612-4.196-.148-7.554-2.28-10.071M105.235 23.153l1.775-2.266c.752-.96.77-2.437.045-3.447-.318-.547-1.242-1.078-2.086-1.534l-.095-.052c-2.67-1.448-5.294-1.994-8.772-1.824-3.778.185-7.002 1.3-9.581 3.315-2.6 2.03-4.07 4.601-4.366 7.64-.301 3.084.74 5.386 3.091 6.843 1.117.706 2.138 1.244 3.034 1.6.89.357 2.2.775 3.895 1.245 1.646.459 2.9.98 3.724 1.543.756.52 1.094 1.077 1.032 1.703-.063.654-.401 1.183-1.031 1.616-.655.45-1.53.706-2.598.758-2.888.141-5.605-.533-8.075-2.004l-1.833-1.015a1.853 1.853 0 0 0-.99-.224 1.938 1.938 0 0 0-1.444.742l-2.636 3.494c-.27.358-.376.787-.3 1.207.073.408.308.76.664.998.863.68 1.76 1.273 2.668 1.764a19.146 19.146 0 0 0 3.8 1.579c2.49.736 4.961 1.05 7.34.934 3.586-.176 6.684-1.306 9.21-3.36 2.543-2.067 3.99-4.755 4.307-7.989.321-3.282-.62-5.61-2.798-6.922-1.116-.662-2.102-1.152-2.932-1.456-.825-.3-2.22-.724-4.147-1.258-1.904-.526-3.27-1.008-4.063-1.43-.698-.372-.992-.87-.924-1.567.127-1.307 1.47-2.032 3.988-2.154 2.025-.1 4.057.368 6.029 1.383.405.223.852.49 1.26.752.507.283.897.396 1.269.377.548-.026 1.023-.331 1.54-.99z"></path></g></svg>					
				</a>		
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
					<ul class="main-menu">
						<li>
							<a href="#"><img src="images/usuario.png" alt="">&nbsp;<?php echo''.$_SESSION['Nombre_Usuario'].'&nbsp' .$_SESSION["Apellidos"];?></a>
							<ul class="sub-menu">
								<li><a href="#"><img src="images/usuario.png" alt="">&nbsp;<?php echo''.$_SESSION['Nombre_Usuario'].'&nbsp' .$_SESSION["Apellidos"];?> <br> <hr></a></li>
								<li><a href="#">Lista de Deseos</a></li> 
								<li><a href="../FrontEnd/Carrito.php?IdUsuario=<?php echo $_SESSION['IdUsuario'] ?>">Carrito de Compras</a></li> <hr>
								<li><a href="#">Historial de Pedidos</a></li>
								<li><a href="#">Wish Cash</a></li>
								<li><a href="#">Recompensas</a></li><hr>
								<li><a href="#">Preguntas Frecuentes</a></li>
								<li><a href="#">Configuración</a></li>
								<li><a href="../Recursos/Logout.php">Salir</a></li>
							</ul>
						</li>
					</ul>

				</div>

				<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $resultado['Cantidad'];?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li class="active-menu">
					<a href="#"><b>Popular</b></a>
				</li>

				<li >
					<a href="#"><b>Ofertas Relampago</b></a>
				</li>

				<li>
					<a href="#"><b>Visualizado Recientemete</b></a>
				</li>

				<li>
					<a href="#">Outlet</a>
				</li>

				<li><a href="#">Más</a>
					<ul class="sub-menu-m">
						<li><a href="../ProductoCategoria.php?IdCategoria=1">Accesorios</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=2">Accesorios de teléfono</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=3">Deportes y actividades al aire libre</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=4">Moda</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=5">Blusas</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=6">Zapatos</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=7">Cuidado personal</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=8">Aparatos electrónicos</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=9">Pasatiempos</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=10">Relojes</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=11">Automotriz</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=12">Piezas y accesorios</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=13">Carteras y bolsos</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=14">Teléfonos inteligentes</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=15">Decoración del hogar</a></li>
						<li><a href="../ProductoCategoria.php?IdCategoria=16">Relojes analógicos</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
			</ul>
		</div>
		
	</header>

	<!-- Info de Carrito-->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Mi Carrito
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem">
					<?php 
						$IdUsuario =$_SESSION['IdUsuario'];
						$sql= $pdo->prepare("SELECT p.NombreProducto, p.PrecioDescuento, i.Portada, c.IdCarrito, u.IdUsuario 
						from carrito c inner join producto p on c.IdProducto=p.IdProducto 
						inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto 
						inner join usuario u on u.IdUsuario=c.IdUsuario where u.IdUsuario=$IdUsuario AND Estatus='Pendiente'");
						$sql->execute();
						$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
					?>
					<?php foreach ($resultado as $dato):?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="../FrontEnd/imgProductos/<?php echo $dato['Portada']?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $dato['NombreProducto'] ?>
							</a>

							<span class="header-cart-item-info">
							<?php echo $dato['PrecioDescuento'] ?>
							</span>
						</div>
					</li>
					<?php endforeach?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
					 <!--	Total: $75.00 -->
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="../FrontEnd/Carrito.php?IdUsuario=<?php echo $IdUsuario?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Ver Carrito
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

