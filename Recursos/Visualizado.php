<?php
session_start();
include_once('Conexion.php');
$idUsuario = $_SESSION['IdUsuario'];
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
   //Agregar producto
   if (isset($_REQUEST['IdProducto'])){
      
   $sql=$pdo->prepare('SELECT * FROM carrito WHERE IdUsuario = ?');
   $sql->execute(array($idCliente));
   $resultado = $sql->fetch();
   $idProducto=intval($_REQUEST['IdProducto']);
   $idCarrito = $resultado['IdProducto'];
   $cantidadProductoCarrito = 1;
   $sql=$pdo->prepare('INSERT INTO productocarrito (idProducto,idCarrito,cantidadProductoCarrito) VALUES (?,?,?)');
   if ($sql->execute(array($idProducto,$idCarrito,$cantidadProductoCarrito))){
   }else{
   echo 'Error';
   die();
   }
   }
   foreach ($_SESSION['visualizado'] as $indice => $idProducto) {
   $idProducto = $idProducto['IdProducto'];
   var_dump($idProducto);
   include_once('Conexion.php');
   $sql = $pdo -> prepare('SELECT producto.IdProducto,producto.NombreProducto,
   producto.Descripcion,
   producto.Precio,
   producto.PrecioDescuento,
   producto.Cantidad,
   imagenproducto.Portada
   FROM producto
   INNER JOIN imagenproducto 
   ON producto.IdImagenProducto = imagenproducto.IdImagenProducto
   WHERE IdProducto = ? AND EstadoProducto = 2');
   $sql->execute(array(intval($idProducto)));
   $resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
   }
   ?>
<div class="row">
   <?php
   foreach($resultado as $datos):{?>
   <div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
      <!-- Block2 -->
      <div class="block2">
         <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
            <img src="<?php echo $datos['Portada'];?>" alt="IMG-PRODUCT">
            <div class="block2-overlay trans-0-4">
               <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                  <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                  <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
               </a>

               <div class="block2-btn-addcart w-size1 trans-0-4">
                  <!-- Button -->
                  <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" id="<?php echo intval($datos['idProducto']); ?>"
                     onclick="agregarCarrito('<?php echo intval($datos['IdProducto']);?>');" role="button">
                     Agregar
                  </button>
}
   if (!empty($_SESSION['visualizado'])) {
      echo '<div class="row">';
      foreach ($_SESSION['visualizado'] as $indice => $idProducto) {
         $idProducto = $idProducto['IdProducto'];
         include_once('../../conex/conex.php');
         $sql = $pdo -> prepare('SELECT producto.IdProducto,producto.NombreProducto,
         producto.Descripcion,
         producto.Precio,
         producto.PrecioDescuento,
         producto.Cantidad,
         imagenproducto.Portada
         FROM producto
         INNER JOIN imagenproducto 
         ON producto.IdImagenProducto = imagenproducto.IdImagenProducto
         WHERE IdProducto = ? AND EstadoProducto = 2');
         $sql->execute(array(intval($idProducto)));
         $resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
      
         
         foreach ($resultado as $datos): {?>
            <div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
               <!-- Block2 -->
               <div class="block2">
                  <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                     <img src="<?php echo $datos['imagenPrincipalProducto'];?>" alt="IMG-PRODUCT">
                     <div class="block2-overlay trans-0-4">
                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                           <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                           <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                        </a>

                        <div class="block2-btn-addcart w-size1 trans-0-4">
                           <!-- Button -->
                           <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" id="<?php echo intval($datos['IdProducto']); ?>"
                              onclick="agregarCarrito('<?php echo intval($datos['IdProducto']);?>');" role="button">
                              Agregar
                           </button>
                        </div>
                     </div>
                  </div>

                  <div class="block2-txt p-t-20">

                     <a href="detalleProducto.php?idProducto=<?=$datos['IdProducto'];?>" class="block2-name dis-block s-text3 p-b-5">
                        <?php echo $datos['NombreProducto']; ?>
                     </a>

                     <span class="block2-oldprice m-text7 p-r-5">
                        $
                        <?php echo $datos['Precio']; ?>
                     </span>

                     <span class="block2-newprice m-text8 p-r-5">
                        $
                        <?php echo $datos['PrecioDescuento']; ?>
                     </span>

                  </div>
               </div>
            </div>
         </div>
         <?php } endforeach;
      }
      echo '</div>';
      
   }
   
}
?>
<?php
if (!empty($_SESSION['visualizado'])) {?>
   <!-- Pagination -->
   <div class="pagination flex-m flex-w p-t-26">
      <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
      <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
   </div>
   <?php }else{?>
   <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(../resources/images/a1.jpg">
      <h2 class="l-text2 t-center">
         No a visto ningun producto recientemente
      </h2>
   </section>
   <?php }
?>

         <div class="block2-txt p-t-20">

            <a href="detalleProducto.php?idProducto=<?=$datos['IdProducto'];?>" class="block2-name dis-block s-text3 p-b-5">
               <?php echo $datos['nombreProducto']; ?>
            </a>

            <span class="block2-oldprice m-text7 p-r-5">
               $
               <?php echo $datos['Precio']; ?>
            </span>

            <span class="block2-newprice m-text8 p-r-5">
               $
               <?php echo $datos['PrecioDescuento']; ?>
            </span>

         </div>
      </div>
   </div>
   <?php } endforeach;  ?>
</div>
<?php } ?>
<script>
   $('.block2-btn-addcart').each(function () {
      var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
      $(this).on('click', function () {
         swal(nameProduct, "Se a agregado al carrito", "success");
      });
   });
   $('.block2-btn-addwishlist').each(function () {
      var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
      $(this).on('click', function () {
         swal(nameProduct, "Se a agregado a la wishList!", "success");
      });
   });
</script>