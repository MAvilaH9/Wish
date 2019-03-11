
<!-- Product -->


<section class="bg0 p-t-23 p-b-140" id="Producto">
    <div class="container">
        <!-- Boton Buscar -->
        <form action="Buscar.php" method="Get">
            <div class="container">
                <div class="flex-w flex-sb-m p-b-52">

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
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" Id="Producto" name="Producto" required placeholder="Buscar">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row isotope-grid">
            <?php
                include "../Recursos/Conexion.php";
                $sql= $pdo->prepare("SELECT p.IdProducto, p.NombreProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto");
				$sql->execute();
				$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			?>
            <?php foreach ($resultado as $dato):?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../FrontEnd/imgProductos/<?php echo $dato['Portada'];?>" alt="IMG-PRODUCT">
                        <a href="DetalleProducto.php?IdProducto=<?=$dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Ver
                        </a>
                        <!--<a href="#" Producto="<?php // echo $dato['IdProducto'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Ver -->
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <span class="stext-105 cl3 js-name-b2">
                                <?php echo $dato['NombreProducto'];?>                            
                            </span>

                            <span class="stext-105 cl3">
                                $ <?php echo $dato['PrecioDescuento'];?>                            
                            </span>
                        </div>
                        
                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="../Recursos/AgregarLista.php?IdProducto=<?php echo $dato['IdProducto'];?>" onclick="funcionAlerta()" class="btn-addwish-b2 dis-block pos-relative" title="Agregar a lista de deseos">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <script>
            function funcionAlerta(){
                alert("Producto agregado a la lista de deseos");
            }
        </script>
    </div>
</section>

