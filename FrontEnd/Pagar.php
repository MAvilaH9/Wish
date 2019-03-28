<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
?>
<br> <br> <br>
<!-- Shoping Cart -->

<?php
if ($_POST) {
	$sid = session_id();

 	$status='0';
 	$cant=$_POST['Cantidad'];
 	$total=$_REQUEST['Total'];
 	$correo=$_SESSION['Correo'];
 	$IdVendedor=$_POST['IdVendedor'];
	$IdMaestro=$_POST['IdMaestro'];
	$IdProducto=$_POST['IdProducto'];


	$idUsuario=$_SESSION['IdUsuario'];
    $sql= $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdUsuario=$idUsuario;");
    $sql->execute();
	$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
	

 	$sentencia=$pdo->prepare ("INSERT INTO `venta` 
	(`IdVenta`, `StatusPago`, `ClaveTransaccion`, `Fecha`, `Cantidad`, `Total`, `DatosPaypal`, `Correo`) 
 	VALUES (Null, :StatusPago, :ClaveTransaccion, NOW(),:Cantidad, :Total, NULL, :Correo);");

 	$sentencia->bindParam(":StatusPago",$status);
 	$sentencia->bindParam(":ClaveTransaccion",$sid);
 	$sentencia->bindParam(":Cantidad",$cant);
 	$sentencia->bindParam(":Total",$total);
 	$sentencia->bindParam(":Correo",$_SESSION['Correo']);
 	$sentencia->execute();
		
	 $idVenta = $pdo->lastInsertId();
		foreach ($resultado as $dato) {
			$sentencia = $pdo->prepare("INSERT INTO 
			`detalleventa` (`IdDetalleVenta`, `IdVenta`, `IdCarrito`, `IdDireccionVendedor`, `IdVendedor`, `IdDireccionUsuario`, `IdEnvio`) 
			VALUES (NULL,:IdVenta,:IdCarrito, NULL,:IdVendedor, NULL, NULL);");

			$sentencia->bindParam(":IdVenta", $idVenta);
			$sentencia->bindParam(":IdCarrito", $dato['IdCarrito']);
			$sentencia->bindParam(":IdVendedor", $IdVendedor);
			$sentencia->execute();
		}

	$sql = $pdo->prepare("SELECT * from maestro where IdMaestro=$IdMaestro");
	$sql -> execute(array($IdMaestro));
	$resultado = $sql->fetch();
	$cantidad=$resultado['Cantidad'];
	$C=($cantidad-$cant);

	$sql_agregar = "UPDATE maestro SET Cantidad='$C' WHERE IdMaestro ='$IdMaestro'";
        $sentencia_agregar = $pdo->prepare($sql_agregar);

    if ($sentencia_agregar->execute(array($C))) {
		$sql = $pdo->prepare("SELECT * from producto where IdProducto=$IdProducto");
		$sql -> execute(array($IdProducto));
		$resultado = $sql->fetch();
		$cantidad=$resultado['Cantidad'];
		$C=($cantidad-$cant);
		$sql_agregar = "UPDATE producto SET Cantidad='$C' WHERE IdProducto='$IdProducto'";
		$sentencia_agregar = $pdo->prepare($sql_agregar);
		if ($sentencia_agregar->execute(array($C))) {

			$sentencia=$pdo->prepare("UPDATE carrito set Estatus='Pagado' where IdUsuario = $idUsuario;");
            $sentencia->execute();
		}

    }else {
        $msg = "Porfavor vuelva a intentarlo";
        //die();
	}
    $sql1= $pdo->prepare("SELECT d.DireccionCliente1, d.Pais, d.Ciudad, d.Pais, d.CodigoPostal, d.Telefono, u.Correo 
	FROM direccionusuario d inner join usuario u on d.IdUsuario=u.IdUsuario WHERE d.IdUsuario=$idUsuario");
    $sql1 -> execute(array($idUsuario));
	$resultado1 = $sql1->fetch();
	
}

?>
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<?php 
				if (!empty($resultado1)) {?>
					<h4 class="mtext-109 cl2 p-b-30">
					Direccion de envío
				</h4>
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Direcion
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							<?php echo $resultado1['DireccionCliente1'];?>, <?php echo $resultado1['Ciudad'];?>,
							<?php echo $resultado1['Pais'];?>, <?php echo $resultado1['CodigoPostal'];?>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Teléfono
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							<?php echo $resultado1['Telefono'];?>
						</p>
					</div>
				</div>
				<?php } ?>

			</div>
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<h4 class="mtext-109 cl2 p-b-30">
					Total a Pagar
				</h4>
				<br>
				<hr>
				<div class="flex-w flex-t p-t-27 p-b-33">

					<div class="size-208">
						<span class="mtext-101 cl2">
							Total:
						</span>
					</div>

					<div class="size-209 p-t-1">
						<span class="mtext-110 cl2">
							$<?php echo number_format($total,2);?>
						</span>
					</div>


				</div>
				<hr>
				<div id="paypal-button-container" class="btn btn-block"></div>

			</div>
		</div>
	</div>
</section>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<script>
	// Render the PayPal button
	paypal.Button.render({
		// Set your environment
		env: 'sandbox', // sandbox | production
		// Specify the style of the button
		style: {
			label: 'paypal',
			size: 'medium', // small | medium | large | responsive
			shape: 'rect', // pill | rect
			color: 'blue', // gold | blue | silver | black
			tagline: false
		},
		// PayPal Client IDs - replace with your own
		// Create a PayPal app: https://developer.paypal.com/developer/applications/create
		client: {
			sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
			production: '<insert production client id>'
		},
		payment: function (data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [{
						amount: {
							total: '<?php echo $total; ?>',
							currency: 'MXN'
						},
						description: "Compra de Productos Wish:$<?php echo $total; ?>",
						custom: "<?php echo $sid;?>#<?php echo ($idVenta); ?> "

					}]
				}
			});
		},
		onAuthorize: function (data, actions) {
			return actions.payment.execute().then(function () {
				console.log(data);
				window.location =
					"Pagar.1.php?Cantidad=<?php echo $cant?>&IdVenta=<?php echo $idVenta?>&paymentToken=" +
					data.paymentToken
			});
		}
	}, '#paypal-button-container');
</script>

<?php include "Template/Footer.php";?>