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
        <span class="stext-109 cl4">
			Registrarme como vendedor
		</span>
	</div>
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <span class="stext-109 cl4">
		* El nombre de tu tienda puede ser tu nombre
		</span>
	</div>
</div>
<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" action="../Recursos/RegistroVendedor.php" method="Post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
                    <form >
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Nombre" value="<?php echo $resultado['NombreUsuario'];?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellidos</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Apellidos" value="<?php echo $resultado['Apellidos'];?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="Correo" value="<?php echo $resultado['Correo'];?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre de la Tienda</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Tienda" required>
                            </div>
                        </div> <br>
                        <div class="form-group row">
							<input type="hidden" name="IdUsuario" value="<?php echo $resultado['IdUsuario'];?>">
                            <label class="col-sm-6 col-form-label"></label>
                            <div class="col-sm-2">
                                <input type="submit" value="Registrar" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                            </div>
                        </div> 
                        <!-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Actualizar Carrito
						</div>  -->   
					</form>              
				</div>
			</div>

		</div>
	</div>
</form>
</div>
<?php include "Template/Footer.php"; ?>