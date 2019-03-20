<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
$IdUsuario=$_SESSION['IdUsuario'];
$sql = $pdo->prepare("SELECT count(IdCarrito) as Cantidad from carrito where IdUsuario=? and Estatus='Pagado'");
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
			Historial de Compras
		</span>
	</div>
</div> <br> <br> 
<!-- Shoping Cart -->
	<div class="container">
		<div class="row">
			<?php if ($resultado ['Cantidad']!=0) {?>
			<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
				<form method="Post">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="site-blocks-table">
							<table class="table table-bordered">
								<tr class="table_head">
									<th class="column-1">Producto</th>
									<th class="column-2">Nombre</th>
									<th class="column-3">Talla/Color</th>
									<th class="column-4">Precio c/u</th>
									<th class="column-5">Cantidad</th>
									<th class="column-6">Total</th>
									<th class="column-7">Estatus</th>
								</tr>
								<?php 
									$sql= $pdo->prepare("SELECT c.IdCarrito, i.Portada,p.IdProducto,p.NombreProducto, pc.Talla,pc.Color, c.Cantidad, c.Estatus, m.Precio, m.IdMaestro,u.IdUsuario, v.IdVendedor
									from carrito c inner join producto p on c.IdProducto=p.IdProducto 
									inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto 
									inner join usuario u on u.IdUsuario=c.IdUsuario 
									inner join vendedor v on p.IdVendedor=v.IdVendedor
									inner join maestro m on m.IdProducto=p.IdProducto
                                    inner join productocarrito pc on pc.IdCarrito=c.IdCarrito where c.IdUsuario=$IdUsuario and Estatus='Pagado'");
									$sql->execute();
									$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
								?>
								<?php $total=0; ?>
								<?php foreach ($resultado as $dato):{?>
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
									<td class="column-3">
									<?php echo $dato['Talla']?>/<?php echo $dato['Color']?>
									</td>
									<td class="column-4">$
										<?php echo $dato['Precio']?>
									</td>
									<td class="column-5">
										<?php echo $dato['Cantidad']?>
									</td>
									<?php 
									$cant=0;
									foreach ($resultado as $dat) {
										$cant=$cant+$dat['Cantidad'];
									}?>
									<?php $total=$total+($dato['Precio']*$dato['Cantidad']); ?>

									<td class="column-6">$
									<?php echo number_format($total,2);?>
									</td>
									<td class="column-7">
									<?php echo $dato['Estatus']?>
									</td>
								</tr>
								<?php } endforeach; ?>
							</table>
						</div>

						<a href="Index.php" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Comprar</a>
					</div>
				</form>
			</div>

			<script>
				function funcionAlertaE(){
				alert("Producto Eliminado del carrito");
			}

			</script>
			<?php } else {?>
			<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Mi Productos Comprados
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