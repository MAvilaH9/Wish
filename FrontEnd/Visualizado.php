<?php include_once "Template/Header.php"; ?>
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-8 col-lg-12 p-b-50">
 
            <div id="outer_div">
            </div><!-- Datos ajax Final -->
            
          
            
         </div>
      </div>
   </div>
</section>

<script>
   $(document).ready(function () {
      cargarProductos(1);
   });
   function cargarProductos(page) {
      var parametros = {
         "action": "ajax",
         "page": page
      };
      $.ajax({
         url: '../modelo/visualizado.php',
         data: parametros,
         beforeSend: function (objeto) {
         },
         success: function (data) {
            $("#outer_div").html(data).fadeIn('slow');
         }
      })
   }
   function agregarCarrito(idProducto) {
      page = 1;
      var parametros = {
         "action": "ajax",
         "page": page,
         "idProducto": idProducto
      };
      $.ajax({
         url: '../modelo/visualizado.php',
         data: parametros,
         beforeSend: function (objeto) {
         },
         success: function (data) {
            contarCarrito();
         }
      })
   }
</script>

<?php include_once "Template/Footer.php"; ?>
