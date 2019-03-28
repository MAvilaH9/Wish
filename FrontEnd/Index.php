<?php include "Template/Header.php";
include "../Recursos/Conexion.php";

$sql = $pdo->prepare("SELECT * FROM cupon");
$sql -> execute(array());
$resultado = $sql->fetch();
$Cupon=$resultado['Codigo'];
?>


	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-05.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Bienvenidos a Wish On-line
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<span class="ltext-202 txt-center cl0 respon2">
								Cupón de Bienvenida:
								</span><br>
								<span class="ltext-202 txt-center cl0 respon2">
									<?php echo $Cupon; ?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="Productos.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Comprar Ahora
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-06.jpg);" data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Compra de manera facil
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Una gran variedad de productos
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="Productos.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                  Comprar Ahora
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-07.jpg);" data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									También puedes vender con nosotros
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									De manera sencilla
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="Productos.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Comprar Ahora
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
<br><hr><br>    
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Quienes Somos?
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Nosotros
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Somos estudiantes de la carrera de sistemas informaticos de la Universidad Tecnológica Metropolitana,
							que desarrollamos la aplicacion web como proyecto final de cuatrimestre para poder aprovarlo.
							En el cual se desarrolla para poner en practica los conocimientos adquiridos durante este periodo.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Somo un equipo conformados por Mario Rafael Avila Hu y Joseph Dionel Paredes Rafful, encargados del desarrollo
							de esta apliación.
						</p>

					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Nuestra Misión 
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Crear una apliacion web de ventas en linea similar a la tienda Online WISH, el cual cumpla
							con el proceso de la compra de una gran variedad de productos de una forma cencilla similar a la de la 
							apliacion mencionada, implementando el metodo de pago por medio de Paypal.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								También un area de administración por parte del vendedor para que el mismo pueda realizar la administración de 
								sus productos para poder comercializarlos en la página.
							</p>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	


<?php include "Template/Footer.php";?>