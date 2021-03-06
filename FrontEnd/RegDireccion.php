<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
$Idusuario=$_SESSION['IdUsuario'];
$sql = $pdo->prepare('SELECT *
FROM usuario where Idusuario = ?');
$sql -> execute(array($Idusuario));
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
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</span>
        <span class="stext-109 cl4">
			Registrar Dirección
		</span>
	</div>
</div>
<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" action="../Recursos/DireccionCliente.php" method="Post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
                    <form >
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Nombre" value="<?php echo $resultado['NombreUsuario'];?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Apellidos" value="<?php echo $resultado['Apellidos'];?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dirección 1</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Direccion1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dirección 2</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Direccion2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">País</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Pais"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ciudad</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Ciudad"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Estado"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Código Postal</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="CP"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Telefono"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"></label>
                            <div class="col-sm-2">
                                <input type="submit" value="Siguiente" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                            </div>
                        </div> 
                        <!-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Actualizar Carrito
						</div>                   -->
					</form>
				</div>
			</div>

			<!-- <div class="col-md-4 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
				     <h4 class="mtext-109 cl2 p-b-30">
						Mis Productos
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								 $79.65 costo subtotal
							</span>
						</div>
					</div> 

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div> 

					    <div class="flex-w flex-t p-t-27 p-b-33">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon"
								placeholder="Código de Cupón">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Aplicar
							</div>
						</div> 
						
						<div class="size-208"><br><hr>
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1"><br><hr>
							<span class="mtext-110 cl2">
								$<?php //echo number_format($total,2);?>
							</span>
						</div>
					</div>

					<input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Pagar">
					<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Pagar
					</button> 
				</div>
			</div> -->
		</div>
	</div>
</form>
</div>
<?php include "Template/Footer.php"; ?>