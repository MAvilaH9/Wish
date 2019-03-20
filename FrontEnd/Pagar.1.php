<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
$IdUsuario=$_SESSION['IdUsuario'];
$toke=$_GET['paymentToken'];
$Idventa=$_GET['IdVenta'];

$sentencia=$pdo->prepare("UPDATE venta set DatosPaypal='$toke' where IdVenta = $Idventa");
$sentencia->execute();

?>
<br> <br> <br>
<!-- Shoping Cart -->


<div class="container">
	<form>
		<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
			<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
				<h4 class="mtext-109 cl2 p-b-30">
					Compra exitosa
				</h4>
				<hr>
				<div class="flex-w flex-t p-t-27 p-b-33">

					<div class="size-208">
						<span class="mtext-101 cl2">
							Wish on line
						</span>
					</div>

					<div class="size-209 p-t-1">
						<span class="mtext-110 cl2">
							Le agradece su compra
						</span>
					</div>
				</div>
				<hr>
				<?php 
				$IdUsuario =$_SESSION['IdUsuario'];
				$cant=$_GET['Cantidad'];
				$sql= $pdo->prepare("SELECT c.IdCarrito, i.Portada,p.NombreProducto, pc.Talla,pc.Color, c.Cantidad, 
				m.Precio,u.IdUsuario, v.IdVendedor
				from carrito c inner join producto p on c.IdProducto=p.IdProducto 
				inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto 
				inner join usuario u on u.IdUsuario=c.IdUsuario 
				inner join vendedor v on p.IdVendedor=v.IdVendedor
				inner join maestro m on m.IdProducto=p.IdProducto
				inner join productocarrito pc on pc.IdCarrito=c.IdCarrito where c.IdUsuario=$IdUsuario 
				AND Estatus='Pagado' ORDER by IdCarrito DESC limit $cant");
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
						<?php echo $dato['Talla']?>/
						<?php echo $dato['Color']?>
					</td>
					<?php 
						$cant=0;
						foreach ($resultado as $dat) {
							$cant=$cant+$dat['Cantidad'];
						}?>
					<td class="column-6">$
						<?php echo number_format($dato['Precio']*$dato['Cantidad'],2);?>
					</td>
				</tr>
				<?php $total=$total+($dato['Precio']*$dato['Cantidad']); ?>
				<?php } endforeach; ?>
			</div>


			<div class="size-208"><br>

			</div>

			<div class="size-209 p-t-1"><br>

			</div>
			<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="Index.php">Ir al Inicio</a>
			<!-- <input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Ir al Inicio"> -->

			<!-- <a href="RegDireccion.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Pagar</a> -->

			<!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Pagar
								</button> -->
		</div>
	</form>

</div>

<?php include "Template/Footer.php";?>