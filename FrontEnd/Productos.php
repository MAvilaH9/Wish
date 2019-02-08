
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
			</div>
			<div class="flex-w flex-c-m m-tb-10">
				
				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Buscar
				</div>
			</div>
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Buscar">
				</div>	
			</div>
		</div>			

        <div class="row isotope-grid">
            <?php
                include "../Recursos/Conexion.php";
                $sql= $pdo->prepare("SELECT b.cantidadVendidaBanner, p.nombreProducto, p.descripcionProducto, p.precioBaseProducto, i.imagenPrincipalProducto from producto p inner join imagenproducto i on p.idImagenProducto=i.idImagenProducto inner join banner b on b.idProducto=p.idProducto");
				$sql->execute();
				$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			?>
            <?php foreach ($resultado as $imagen):?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../FrontEnd/imgProductos/<?php echo $imagen['imagenPrincipalProducto']?>.jpg" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Ver
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <span class="stext-105 cl3">
                                <?php echo $imagen['nombreProducto']?>                            
                            </span>

                            <span class="stext-105 cl3">
                                $ <?php echo $imagen['precioBaseProducto']?>                            
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

