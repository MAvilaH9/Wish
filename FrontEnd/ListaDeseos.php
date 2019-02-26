<?php include "Template/Header.php"; ?>
<!-- Product -->
<br> <br> <br> <br> <br> <br>
<section class="bg0 p-t-23 p-b-140" id="Producto">
    <div class="container">

        <div class="row isotope-grid">
            <?php
                include "../Recursos/Conexion.php";
                $sql= $pdo->prepare("SELECT l.IdWishList, p.NombreProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto inner join wishlist l on p.IdProducto=l.IdProducto  where IdUsuario=1");
				$sql->execute();
				$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			?>
            <?php foreach ($resultado as $dato):?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../FrontEnd/imgProductos/<?php echo $dato['Portada'];?>.jpg" alt="IMG-PRODUCT">
                        <a href="DetalleProducto.php?IdProducto=<?php echo $dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Ver
                        </a>
                        <!--<a href="#" Producto="<?php // echo $dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Ver -->
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <span class="stext-105 cl3">
                                <?php echo $dato['NombreProducto'];?>                            
                            </span>

                            <span class="stext-105 cl3">
                                $ <?php echo $dato['PrecioDescuento'];?>                            
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div> <br> <br>
    </div>
</section>

<?php include "Template/Footer.php";?>