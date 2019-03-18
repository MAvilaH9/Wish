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
 	$total=$_POST['Total'];
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
			# code...
		}

    }else {
        $msg = "Porfavor vuelva a intentarlo";
        //die();
    }
	
}

?>
<div class="container">
	<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
		<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<h4 class="mtext-109 cl2 p-b-30">
				Total a Pagar
			</h4>
			<br><hr>
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

			<!-- <input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Pagar"> -->

			<!-- <a href="RegDireccion.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Pagar</a> -->

			<!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
				Pagar
			</button>  -->

				
		</div>
	</div>
</div>
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
                                        amount: {   total: '<?php echo $total; ?>', currency: 'MXN'  },
                                        description:"Compra de Productos Wish:$<?php echo $total; ?>",
                                        custom:"<?php echo $sid;?>#<?php echo ($idVenta); ?> "
                                      
                                    }]
                                }
                            });
                        },
                        onAuthorize: function (data, actions) {
                            return actions.payment.execute().then(function () {
                                console.log(data);
                                window.location="Pagar.1.php?paymentToken="+data.paymentToken                              
                            });
                        }
                    }, '#paypal-button-container');
            	</script>	

<?php include "Template/Footer.php";?>