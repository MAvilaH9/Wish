<?php
include "Template/Header.php"; 
include "../Recursos/Conexion.php";
$IdUsuario=$_SESSION['IdUsuario'];
$sql1 = $pdo->prepare('SELECT count(IdWishlist) as Cantidad from wishlist where IdUsuario=?');
$sql1 -> execute(array($IdUsuario));
$resultado1 = $sql1->fetch();
?>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Mi lista de Deseos
		</h2>
    </section>	<br>
    
    <section class="bg0 p-t-23 p-b-140" id="Producto">
        <div class="container">

        <?php if ($resultado1 ['Cantidad']!=0) {?>
            <div class="row isotope-grid">
                <?php
                    include "../Recursos/Conexion.php";
                    $sql= $pdo->prepare("SELECT l.IdWishList, p.IdProducto, p.NombreProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto inner join wishlist l on p.IdProducto=l.IdProducto  where IdUsuario=1");
                    $sql->execute();
                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($resultado as $dato):?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="../FrontEnd/imgProductos/<?php echo $dato['Portada'];?>" alt="IMG-PRODUCT">
                            <a href="DetalleProducto.php?IdProducto=<?php echo $dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Ver
                            </a>
                            <!--<a href="#" Producto="<?php // echo $dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Ver -->
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <span class="stext-105 cl3">
                                    <?php echo $dato['NombreProducto'];?>                            
                                </span>

                                <span class="stext-105 cl3">
                                    $ <?php echo $dato['PrecioDescuento'];?>                            
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="../Recursos/EliminarLista.php?IdWishList=<?php echo $dato['IdWishList'];?>"  onclick="funcionAlerta()" class="btn-addwish-b2 dis-block pos-relative" title="Eliminar">
                                    <img class="icon-heart1 dis-block trans-04" src="images/Eliminar.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/Eliminar.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <br> <br>
            <?php} else {?>
            <!-- <div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" >
                    <h4 class="mtext-109 cl2 p-b-30" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                    Mi Lista de deseos
                    </h4><br><hr>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                            <img src="images/carrito.png" alt="">
                    </div>
                    <a href="Index.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Regresar al Inicio</a> 
                </div>
		    </div> -->
            <?php }?>
        </div>
    </section>

    <script>
        function funcionAlerta(){
            alert("Producto eliminado de la lista de deseos");
        }
    </script>

<?php include "Template/Footer.php";?>