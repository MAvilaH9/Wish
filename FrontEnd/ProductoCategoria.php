<?php   
include "Template/Header.php";
include "../Recursos/Conexion.php";
?>
<!-- Product -->
<br> <br> <br> <br> <br> <br>
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="row isotope-grid">
            <?php
                $IdCategoria=$_GET['IdCategoria'];
                $sql= $pdo->prepare("SELECT p.NombeProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto where IdCategoria=$IdCategoria");
				$sql->execute();
				$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			?>
            <?php foreach ($resultado as $imagen):?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../FrontEnd/imgProductos/<?php echo $imagen['Portada']?>.jpg" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Ver
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <span class="stext-105 cl3">
                                <?php echo $imagen['NombeProducto']?>                            
                            </span>

                            <span class="stext-105 cl3">
                                $ <?php echo $imagen['PrecioDescuento']?>                            
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
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
<?php   
include "Template/Footer.php";
?>