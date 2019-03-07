<?php include_once "Template/Header.php"; ?>

<div class="modal" id="modal_producto" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Producto - Informacion básica </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="frm_productoNuevo">

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Producto</label>
               <div class="col-sm-10">
                  <input required  name="nombre_producto" type="text" class="form-control" id="inputEmail3" placeholder="Nombre del producto">
               </div>
            </div>
            <?php 

            ?>
            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Descripsion</label>
               <div class="col-sm-10">
                  <textarea required  name="descripsion_producto" class="form-control" id="" cols="30" rows="6"></textarea>
               </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Código</label>
               <div class="col-sm-10">
                  <input  required name="id_unico_producto" type="text" class="form-control">
               </div>
            </div>
            <?php 
                include "../Recursos/Conexion.php";
                $sql= $pdo->prepare("SELECT * FROM categoria");
                $sql->execute();
                $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                foreach ($resultado as $dato) {
                }
            ?>
            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
               <div class="col-sm-10">
               <?php 
                if (!empty($dato['NombreCategoria'])){
                    echo '<select name="producto_categoria" id="drp_categorias" class="form-control">';
                    echo '<option value="">-- Seleccione una categoría --</option>';
                    foreach ($resultado as $dato) {
                        echo '<option value="'.$dato['IdCategoria'].'">'.$dato['NombreCategoria'].'</option>';
                    }
                    echo'</select>';
                }
                ?>
               </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Precio</label>
               <div class="col-sm-10">
                  <input required  name="precio" type="number"  placeholder="$"  class="form-control">
               </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Precio Descuento</label>
               <div class="col-sm-10">
                  <input required name="precio_descuento" type="number" placeholder="$" class="form-control">
               </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Peso</label>
               <div class="col-sm-10">
                  <input required  name="peso" type="number" placeholder="Libras" class="form-control">
               </div>
            </div>

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Stock</label>
               <div class="col-sm-10">
                  <input required  name="stock" type="number" placeholder="Libras" class="form-control">
               </div>
            </div>


            <br>

            <div class="row">
            <div class="col-sm-4">
               </div>
               <div class="col-sm-4">
                  <button id="btn_enviar1" class="btn btn-primary btn-block" type="submit">Siguiente</button>
               </div>
               <div class="col-sm-4">
               </div>
            </div>
         
         </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal" id="modal_producto_imagen" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Producto - Imagenes </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="frm_producto_imagenes">

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen Principal</label>
               <div class="col-sm-10">
                  <input id="file_imagen_principal" name="imagen_principal" type="file" class="form-control-file" id="inputEmail3" placeholder="Nombre del producto">
               </div>
            </div>

            <br>

          

            <br>

            <div class="row">
               <div class="col-sm-12">
                  <button class="btn btn-primary btn-block" type="submit">Siguiente</button>
               </div>
            </div>
         
         </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal" id="modal_inventario" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Producto - Caracteristicas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Tallas</label>
               <div class="col-sm-10">
                  <input  name="nombre_caracteristica" type="text" class="form-control" id="nombre_caracteristica" placeholder="Nombre">
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12">
                  <button onclick="AgregarCaracteristica()" class="btn btn-primary">Agregar</button>
               </div>
            </div>

            <br>

            <div class="form-group row">
               <div class="col-sm-12">
                  <table class="table">
                     <thead>
                        <tr>
                           <th style="display:none;">Id talla</th>
                           <th>Nombre</th>
                        </tr>
                     </thead>
                     <tbody id="tabla_contenido_Talla">
                        
                     </tbody>
                  </table>
               </div>
            </div>

            <br>

            <div class="row">
               <div class="col-sm-12">
                  <button onclick="AlmacenarProducto()" class="btn btn-primary btn-block">Terminar</button>
               </div>
            </div>
            
         
      </div>
      
    </div>
  </div>
</div>


   <script>

      var x = $(document);
      x.ready(Eventos);

      function AgregarCaracteristica(){
         $.ajax({
            url : '../modelo/productos.php',
            type : 'post',
            data : {'peticion' :'agregar_caracteristica',
                     'talla_nombre': $("#nombre_caracteristica").val()},
            beforeSend:function (){
               
            }
         }).done(function(data){

            ListarCaracteristicas(data.caracteristicas);

         });
      }

      function ListarCaracteristicas(dataCaracteristicas){

         $("#tabla_contenido_Talla").empty();
         for(var i = 0;i <dataCaracteristicas.length;i++){

            var row = $("<tr/>");

            row.appendTo("#tabla_contenido_Talla");

            row.append('<td>'+dataCaracteristicas[i].talla+'</td>');

         }
      }

      function Eventos(){

         ListarCategorias();

         $("#frm_productoNuevo").submit(function(e){

            e.preventDefault();

            var frmData = new FormData($(this)[0]);

            frmData.append('peticion','guardar_producto');

            


            $.ajax({
               url : '../Recursos/Productos.php',
               type : 'post',
               data : frmData,
               processData: false,
               contentType: false,
               beforeSend : function (){
                  $("#btn_enviar1").prop('disabled',true);
               }
            }).done(function (data){

               $("#modal_producto").modal('hide');
                $("#modal_producto_imagen").modal();
                $("#btn_enviar1").prop('disabled',false);


            });


         });

         $("#frm_producto_imagenes").submit(function(e){

            e.preventDefault();


            var frmData = new FormData($(this)[0]);

            frmData.append('peticion','guardar_imagen');

            $.ajax({
               url : '../Recursos/Productos.php',
               type : 'post',
               data : frmData,
               processData: false,
               contentType: false,
               beforeSend : function (){

               }
            }).done(function(){
               $("#modal_inventario").modal();
               $("#modal_producto_imagen").modal('hide');
            });



         });

      }

      function AlmacenarProducto(){
         $.ajax({
            url : '../Recursos/Productos.php',
            type : 'post',
            data : {'peticion': 'almacenar_producto'},
            beforeSend: function (){

            }
         }).done(function(data){

            window.location.href = "Index.php";

         });
      }

      function ListarCategorias(){
         $.ajax({
            url : '../Recursos/Producto.php',
            type : 'post',
            data : {'peticion' : 'consultar_Categorias'}
         }).done(function (data){
            console.log(data);
            MostrarCategorias(data);
         });
      }

      function MostrarCategorias(data){

         for(var i = 0; i < data.length;i++){

            $("#drp_categorias").append('<option value="'+data[i].IdCategoria+'">'+data[i].NombreCategoria+' </option>');

         }


      }

      function AgregarProducto(){

         

      }

      function AbrirModalProducto(){
         $('#modal_producto').modal();
      }

   </script>
<?php include_once "Template/Footer.php"; ?>