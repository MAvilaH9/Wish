<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
$IdUsuario=$_SESSION['IdUsuario'];
$sql = $pdo->prepare('SELECT count(IdCarrito) as Cantidad from carrito where IdUsuario=?');
$sql -> execute(array($IdUsuario));
$resultado = $sql->fetch();
?>
<br> <br> <br>
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="Index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Incio
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Mi Carrito
		</span>
	</div>
</div> <br> <br> 
<!-- Shoping Cart -->
	<div class="container">
		<div class="row">
			<?php if ($resultado ['Cantidad']!=0) {?>
			<div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
				<form action="../Recursos/UpdateCarrito.php" method="Post">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Producto</th>
									<th class="column-2"></th>
									<th class="column-3">Precio</th>
									<th class="column-4">Cantidad</th>
									<th class="column-5">Subtotal</th>
									<th class="column-6"></th>
								</tr>
								<?php 
									$IdUsuario =$_SESSION['IdUsuario'];
									$sql= $pdo->prepare("SELECT p.NombreProducto, p.IdVendedor, c.Cantidad, p.PrecioDescuento, i.Portada, c.IdCarrito, u.IdUsuario from carrito c inner join producto p on c.IdProducto=p.IdProducto inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto inner join usuario u on u.IdUsuario=c.IdUsuario inner join vendedor v on p.IdVendedor=v.IdVendedor where u.IdUsuario=$IdUsuario");
									$sql->execute();
									$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
								?>
								<?php $total=0; ?>
								<?php foreach ($resultado as $dato):?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="../FrontEnd/imgProductos/<?php echo $dato['Portada'];?>" alt="IMG">
											<input type="hidden" name="IdCarrito" value="<?php echo $dato['IdCarrito'];?>">
										</div>
									</td>
									<td class="column-2">
										<?php echo $dato['NombreProducto']?>
									</td>
									<td class="column-3">$
										<?php echo $dato['PrecioDescuento']?>
									</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="Cantidad" id="Cantidad" value="<?php echo $dato['Cantidad']; ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<?php 
									$cant=0;
									foreach ($resultado as $dat) {
										$cant=$cant+$dat['Cantidad'];
									}?>
									<td class="column-5">$
										<?php echo number_format($dato['PrecioDescuento']*$dato['Cantidad'],2);?>
									</td>
									<td class="column-6"><a href="../Recursos/DeleteCarrito.php?IdCarrito=<?php echo $dato['IdCarrito'];?>"
										 onclick="funcionAlertaE()">Eliminar</a></td>

								</tr>
								<?php $total=$total+($dato['PrecioDescuento']*$dato['Cantidad']); ?>
								<?php endforeach?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<input class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="submit" value="Actualizar Carrito">
						</div>
					</div>
				</form>
			</div>

			<script>
				function funcionAlertaE(){
				alert("Producto Eliminado del carrito");
			}

			</script>

			<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
				<form class="bg0 p-t-75 p-b-85" action="../FrontEnd/Pagar.php" method="Post">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Mis Productos
						</h4>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="cupon" placeholder="Código de Cupón">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Aplica
								</div>
							</div>

							<div class="size-208"><br>
								<hr>
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1"><br>
								<hr>
								<span class="mtext-110 cl2">
									$
									<?php echo number_format($total,2);?>
								</span>
							</div>
						</div>
						<input type="hidden" name="IdUsuario">
						<input type="hidden" name="IdVendedor" value="<?php echo $dato['IdVendedor'] ?>">
						<!-- <input type="hidden" name="IdCarrito" value="<?php echo $dato['IdCarrito'] ?>"> -->
						<input type="hidden" name="Cantidad" value="<?php echo $cant?>">
						<input type="hidden" name="Total" value="<?php echo $total?>">
						<input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Pagar">

						<!-- <a href="RegDireccion.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Pagar</a> -->

						<!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Pagar
							</button> -->
					</div>
				</form>
			</div>
			<?php } else {?>
			<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Mi Carrito
					</h4><br>
					<hr>

					<div class="flex-w flex-t p-t-27 p-b-33">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="images/carrito.png" alt="">
					</div>
					<a href="Index.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Continuar
						Comprando</a>
				</div>
			</div>
			<?php }?>
		</div>
	</div>

	<script>
	
	// function ActualizarCant(){
	// 	var Cantidad= document.getElementById('Cantidad').value;
	// 	var IdCarrito= document.getElementById('IdCarrito').value;
	// 	$.ajax({
	// 		type: "Post",
	// 		url: "../Recursos/UpdateCarrito.php",
	// 		data: {"Cantidad": Cantidad "IdCarrito": IdCarrito}
	// 		success:function(resp) {
	// 			$("#Cantidad").html(resp);
	// 		}
	// 	});
	// }

	</script>
	<?php include "Template/Footer.php"?>