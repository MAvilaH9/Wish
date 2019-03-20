<?php include_once "Template/Header.php"; ?>
<?php
include "../Recursos/Conexion.php";
$IdUsuario=$_SESSION['IdUsuario'];
$sql = $pdo->prepare("SELECT count(IdVisualizado) as Cantidad from visualizado where IdUsuario=?");
$sql -> execute(array($IdUsuario));
$resultado = $sql->fetch();
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Visualizado Recientemente
    </h2>
</section>

<section class="bg0 p-t-23 p-b-140" id="Producto">
    <div class="container">
    <?php
    if ($resultado ['Cantidad']!=0) {?>
        <div class="row isotope-grid">
        <?php
            include "../Recursos/Conexion.php";
            $IdUsuario=$_SESSION['IdUsuario'];
            $sql= $pdo->prepare("SELECT p.IdProducto, p.NombreProducto, p.PrecioDescuento, p.IdCategoria, i.Portada, v.IdVisualizado from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto 
            inner join visualizado v on v.IdProducto=p.IdProducto where v.IdUsuario=$IdUsuario");
            $sql->execute();
            $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
            ?>
        <?php foreach ($resultado as $dato):{?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="../FrontEnd/imgProductos/<?php echo $dato['Portada'];?>" alt="IMG-PRODUCT">
                    <a href="DetalleProducto.php?IdProducto=<?=$dato['IdProducto'];?>"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
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
                        <a href="../Recursos/AgregarLista.php?IdProducto=<?php echo $dato['IdProducto'];?>"
                            onclick="funcionAlerta()" class="btn-addwish-b2 dis-block pos-relative"
                            title="Agregar a lista de deseos">
                            <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
                                alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } endforeach ?>
    </div>
    <?php
    } else {?> <br> <br>
        <div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Vacio!!
            </h3>

        </div> <br>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4 p-b-35 isotope-item women">

            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 p-b-35 isotope-item women">

                <a class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" href="Productos.php">
                    Ver Productos
                </a>
            </div>
            
            <div class="col-sm-4 col-md-4 col-lg-4 p-b-35 isotope-item women">
            </div>
        </div>
    <?php
    }?>
    </div>
</section>
<script>
    function funcionAlerta() {
        alert("Producto agregado a la lista de deseos");
    }

    function funcionAlertae() {
        alert("Producto Eliminado");
    }
</script>

<?php include_once "Template/Footer.php"; ?>