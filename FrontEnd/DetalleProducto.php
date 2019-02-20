<?php   
include "Template/Header.php";
include "../Recursos/Conexion.php";
?>
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <!-- Modal1 Info del producto -->
        <div class="p-t-60 p-b-20">
            <div class="container">
                <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                    <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                        <img src="images/icons/icon-close.png" alt="CLOSE">
                    </button>

                    <?php 
                    $IdProducto=$_GET['IdProducto'];
                    $sql = $pdo->prepare('SELECT
                    producto.NombreProducto,
                    producto.Descripcion,
                    producto.Precio,
                    producto.PrecioDescuento,
                    producto.Cantidad,
                    imagenproducto.Portada,
                    imagenproducto.Imagen1,
                    imagenproducto.Imagen2,
                    imagenproducto.Imagen3,
                    imagenproducto.Imagen4,
                    imagenproducto.Imagen5
                    FROM
                    producto
                    INNER JOIN imagenproducto ON producto.idImagenProducto = imagenproducto.idImagenProducto
                    where idProducto = ?');
                    $sql -> execute(array($IdProducto));
                    $resultado = $sql->fetch();
                    ?>

                    <div class="row">
                        <div class="col-md-6 col-lg-7 p-b-3pue0">
                            <div class="p-l-25 p-r-30 p-lr-0-lg">
                                <div class="wrap-slick3 flex-sb flex-w">
                                    <div class="wrap-slick3-dots"></div>
                                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            
                                    <div class="slick3 gallery-lb">
                                        <!-- Imagen principal -->
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Imagen 1-->
                                        <?php
                                        if(!empty($resultado['Imagen1'])){?>
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <?php } ?>


                                        <!-- Imagen 2 -->
                                        <?php
                                        if (!empty($resultado['Imagen2'])){ ?>
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <!-- Imagen 3 -->
                                        <?php
                                        if (!empty($resultado['Imagen3'])) { ?>
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                         <!-- Imagen 4 -->
                                         <?php
                                        if (!empty($resultado['Imagen4'])){ ?>
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                         <!-- Imagen 5 -->
                                         <?php
                                        if (!empty($resultado['Imagen5'])){ ?>
                                        <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>.jpg"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5 p-b-30">
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
                                <h4>
                                    <?php echo $resultado['NombreProducto'];?>
                                </h4>

                                <span class="mtext-106 cl2 precioproducto">
                                    $<?php echo $resultado['PrecioDescuento'];?>
                                </span>

                                <p class="stext-102 cl3 p-t-23">
                                    <?php echo $resultado['Descripcion'];?>
                                </p>

                                <!-- Caracteristicas y Valores -->
                                <div class="p-t-33">
                                    <?php 
                                    $IdProducto=$_GET['IdProducto'];
                                    $sql= $pdo->prepare("SELECT p.IdProducto, p.NombreProducto, p.PrecioDescuento, p.Descripcion, p.IdCategoria, p.IdVendedor, i.Portada, c.NombreCaracteristica, v.Valor from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto inner join caracteristicas c  on c.IdProducto=p.IdProducto inner join valor v on v.IdCaracteristicas=c.IdCaracteristicas where p.IdProducto=$IdProducto");
                                    $sql->execute();
                                    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                                    foreach ($resultado as $dato) {
                                    }
                                    ?>
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                        <?php
                                            if (!empty($dato['NombreCaracteristica'])) {?>
                                                <?php echo $dato['NombreCaracteristica'];?> 
                                            <?php } ?>
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <?php 
                                                if (!empty($dato['NombreCaracteristica'])){
                                                    echo '<select class="js-select2" name="time">';
                                                    echo '<option>Seleccione</option>';
                                                    foreach ($resultado as $dato) {
                                                        echo '<option value="'.$dato['IdValor'].'">'.$dato['Valor'].'</option>';
                                                    }
                                                echo'</select>';
                                                }
                                                ?>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <form action="../Recursos/Carrito.php" method="Post">

                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="cantidad"
                                                    value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                                <input type="hidden" name="IdProducto" value="<?php echo $dato['IdProducto'];?>">
                                                <input type="hidden" name="IdVendedor" value="<?php echo $dato['IdVendedor'];?>">
                                                <br>
                                                <input type="submit" value="Agregar al Carrito" onclick="funcionAlerta()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                <br> 
                                                <a href="Index.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Cancelar</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function funcionAlerta(){
                                        alert("Producto agregado al carrito");
                                    }
                                </script>

                                <!--  -->
                                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                    <div class="flex-m bor9 p-r-10 m-r-11">
                                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                            data-tooltip="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>

                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>

                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Google Plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php   
include "Template/Footer.php";
?>