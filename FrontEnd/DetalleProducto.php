<?php   
include "Template/Header.php";
include "../Recursos/Conexion.php";


$IdUsuario=$_SESSION['IdUsuario'];
$IdProducto=$_GET['IdProducto'];

$sql = $pdo->prepare("SELECT * FROM visualizado where IdUsuario=$IdUsuario");
$sql -> execute(array($IdProducto));
$resultado = $sql->fetch();
$Producto=$resultado['IdProducto'];

if ($IdProducto!=$Producto) {

    $sql_agregar='INSERT INTO visualizado (IdProducto,IdUsuario) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);

    if ($sentencia_agregar->execute(array($IdProducto, $IdUsuario))) {
        
    } else {
        die();
    }
}
// // is_numeric($_GET['IdProducto']);
//   $IdProducto = $_GET['IdProducto'];
//   //Agregar producto a la session
//   if (!isset($_SESSION['visualizado'])) {
//       $productos = array(
//         'IdProducto'=>$IdProducto,
//       );
//       $_SESSION['visualizado'][0]=$productos;
//   }else{
//       //Esto es par ano agregar doblemete un producto
//       //Que el producto selecionado no este dentro del carrito
//       $IdProducto = array_column($_SESSION['visualizado'],"IdProducto");
//       if (in_array($IdProducto,$IdProducto)) {
//       }else {
//       $numeroProductos = count($_SESSION['visualizado']);
//       $productos=array(
//         'IdProducto'=>$IdProducto,
//       );
//       $_SESSION['visualizado'][$numeroProductos]=$productos;
//       }
//   }
  
// $IdProducto=$_SESSION['visualizado'];
// // var_dump($IdProducto);
?>




<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
    <?php 
        $IdProducto=$_GET['IdProducto'];
        $sql = $pdo->prepare('SELECT p.NombreProducto,p.Descripcion, p.IdVendedor, i.Portada, i.Imagen1,i.Imagen2,i.Imagen3,i.Imagen4,i.Imagen5,c.NombreCaracteristica, v.Valor,m.Precio,m.IdMaestro,m.Cantidad from detalle d 
        inner join maestro m on m.IdMaestro=d.IdMaestro
        inner join valor v on d.IdValor=v.IdValor
        inner join caracteristicas c on c.IdCaracteristicas=v.IdCaracteristicas 
        inner join producto p on p.IdProducto=c.IdProducto
        inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto where m.IdProducto= ?');
        $sql -> execute(array($IdProducto));
        $resultado = $sql->fetch();
        $idVendedor=$resultado['IdVendedor'];
        $Caracteristica=$resultado['NombreCaracteristica'];
        ?>
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <!-- Imagen principal -->
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Portada'];?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Imagen 1-->
                            <?php
                            if(!empty($resultado['Imagen1'])){?>
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen1'];?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <?php } ?>


                            <!-- Imagen 2 -->
                            <?php
                            if (!empty($resultado['Imagen2'])){ ?>
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen2'];?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>

                            <!-- Imagen 3 -->
                            <?php
                            if (!empty($resultado['Imagen3'])) { ?>
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen3'];?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>

                            <!-- Imagen 4 -->
                            <?php
                            if (!empty($resultado['Imagen4'])){ ?>
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen4'];?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>

                            <!-- Imagen 5 -->
                            <?php
                            if (!empty($resultado['Imagen5'])){ ?>
                            <div class="item-slick3" data-thumb="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../FrontEnd/imgProductos/<?php echo $resultado['Imagen5'];?>">
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
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?php echo $resultado['NombreProducto'];?>
                    </h4>

                    <span class="mtext-106 cl2">
                        $
                        <?php echo $resultado['Precio'];?>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <?php echo $resultado['Descripcion'];?>
                    </p>
                    <p class="stext-102 cl3 p-t-23">
                        <!-- Cantidad disponible:
                        <?php //echo $resultado['Cantidad'];?> -->
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <form action="../Recursos/Carrito.php" method="Post">
                            <?php
                            if (!empty($Caracteristica=="Talla")) {?>
                                <?php 
                                $IdProducto=$_GET['IdProducto'];
                                $sql= $pdo->prepare("SELECT c.NombreCaracteristica,v.IdValor, v.Valor,m.Precio,m.Cantidad,m.IdMaestro from detalle d 
                                inner join maestro m on m.IdMaestro=d.IdMaestro
                                inner join valor v on d.IdValor=v.IdValor
                                inner join caracteristicas c on c.IdCaracteristicas=v.IdCaracteristicas 
                                inner join producto p on p.IdProducto=c.IdProducto where m.IdProducto=$IdProducto AND c.NombreCaracteristica= 'Talla'");
                                $sql->execute();
                                $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($resultado as $dato) {
                                }?>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                    <input type="hidden" name="IdMaestro" value="<?php echo $dato['IdMaestro']; ?>">
                                        <?php
                                        if (!empty($dato['NombreCaracteristica'] == 'Talla')) {?>
                                        <?php echo $dato['NombreCaracteristica'];?>
                                        <?php } ?>
                                    </div>
    
                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <?php 
                                            if (!empty($dato['NombreCaracteristica'] == 'Talla')){
                                            echo '<select class="js-select2" name="Valort" required>';
                                            echo '<option>Seleccione</option>';
                                            foreach ($resultado as $dato) {
                                                echo '<option value="'.$dato['Valor'].'">'.$dato['Valor'].'</option>';
                                            }
                                            echo'</select>';
                                            }?>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        
                            ?>    
                            <?php 
                            $IdProducto=$_GET['IdProducto'];
                            $sql= $pdo->prepare("SELECT c.NombreCaracteristica,v.IdValor, v.Valor,m.Precio,m.Cantidad,m.IdMaestro from detalle d 
                            inner join maestro m on m.IdMaestro=d.IdMaestro
                            inner join valor v on d.IdValor=v.IdValor
                            inner join caracteristicas c on c.IdCaracteristicas=v.IdCaracteristicas 
                            inner join producto p on p.IdProducto=c.IdProducto where m.IdProducto=$IdProducto AND c.NombreCaracteristica='Color'");
                            $sql->execute();
                            $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                            foreach ($resultado as $dato) {
                            }?>
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                <input type="hidden" name="IdMaestro" value="<?php echo $dato['IdMaestro']; ?>">
                                    <?php
                                    if ($dato['NombreCaracteristica']=='Color') {?>
                                    <?php echo $dato['NombreCaracteristica'];?>
                                    <?php } ?>
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <?php 
                                        if ($dato['NombreCaracteristica']=='Color'){
                                        echo '<select class="js-select2" name="Valorc" required>';
                                        echo '<option>Seleccione</option>';
                                        foreach ($resultado as $dato) {
                                            echo '<option value="'.$dato['Valor'].'">'.$dato['Valor'].'</option>';
                                        }
                                        echo'</select>';
                                        }?>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="size-203 flex-c-m respon6">
                                        Cantidad
                                    </div>
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
                                    <input type="hidden" name="IdProducto" value="<?php echo $IdProducto;?>">
                                    <input type="hidden" name="IdVendedor" value="<?php echo $idVendedor;?>">
                                    <br>
                                    <input type="submit" value="Agregar al Carrito" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" onclick="funcionalert();">
                                    <br> <br> <br>
                                    <a href="Index.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="../Recursos/AgregarLista.php?IdProducto=<?php echo $IdProducto; ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 tooltip100"
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
</section>

<script>
function funcionalert() {
    Swal(
  'Producto Agregado al Carrito!',
  'You clicked the button!',
  'success'
)
}
</script>

<?php   
include "Template/Footer.php";
?>