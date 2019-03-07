<?php include_once "Template/Header.php"; ?>
<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><b>Información Básica</b></h4>
                            <form id="frm_productoNuevo" class="forms-sample">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label >Nombre del producto: </label>
                                        <input type="text" class="form-control" name="Nombre" placeholder="Ingresa el Nombre" required>
                                    </div>
                                    <?php 
                                        include "../Recursos/Conexion.php";
                                        $sql= $pdo->prepare("SELECT * FROM categoria");
                                        $sql->execute();
                                        $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                                        foreach ($resultado as $dato) {
                                        }
                                    ?>
                                    <div class="col-sm-6">
                                        <label >Categoría: </label>
                                        <?php 
                                        if (!empty($dato['NombreCategoria'])){
                                            echo '<select name="ProductoCategoria" id="drp_categorias" class="form-control">';
                                            echo '<option value="">-- Seleccione una categoría --</option>';
                                            foreach ($resultado as $dato) {
                                                echo '<option value="'.$dato['IdCategoria'].'">'.$dato['NombreCategoria'].'</option>';
                                            }
                                            echo'</select>';
                                        }
                                        ?>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" nam="Descripcion" rows="4" required></textarea>
                                </div> <br>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="">Precio: </label>
                                        <input type="text" class="form-control" name="Precio" placeholder="Precio" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Precio descuento: </label>
                                        <input type="text" class="form-control" name="Preciodescuento" placeholder="Precio descuento" required>
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Código: </label>
                                        <input type="text" class="form-control" name="Codigo" placeholder="Código" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Cantidad: </label>
                                        <input type="text" class="form-control" name="Cantidad" placeholder="Cantidad" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Peso: </label>
                                        <input type="text" class="form-control" name="Peso" placeholder="Peso" required>
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                    <a class="btn btn-light" href="Index.php">Cancelar</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <button id="btn_enviar1" type="submit" class="btn btn-success mr-2">Agregar</button>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                            </form>
                             <br>
                            <form id="frm_producto_imagenes" class="forms-sample">
                                <div class="form-group">
                                    <label><b>Imagen Principal</b></label>
                                    <input type="file" name="img" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <span >
                                            <input id="file_imagen_principal" name="imagen_principal" type="file" class="btn btn-primary" id="inputEmail3" placeholder="Nombre del producto" required>
                                        </span>
                                    </div>
                                </div>
                            </form>
                                <br><hr>
                                    <br>
                                    <h4 class="card-title"><b>Características</b></h4>
                                <br>

                                <div class="form-group row">
                                    
                                    <div class="col-sm-3">
                                        <label>Talla</label>
                                        <input  name="nombre_caracteristica" type="text" class="form-control" id="nombre_caracteristica" placeholder="Nombre" required>
                                        
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Colore</label>
                                        <input  name="nombre_caracteristica1" type="text" class="form-control" id="nombre_caracteristica1" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <button onclick="AgregarCaracteristica()" class="btn btn-primary">Agregar</button>
                                </div>

                                    

                                    <br>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th style="display:none;">Id talla</th>
                                                <th>Talla</th>
                                                <th>Color</th>
                                                <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_contenido_Talla">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br><br>
                                    <br>

                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <button onclick="AlmacenarProducto()" class="btn btn-primary btn-block">Terminar</button>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                            </form>
                        </div>
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
      url : '../Recursos/Producto.php',
      type : 'post',
      data : {'peticion' :'agregar_caracteristica',
               'talla_nombre': $("#nombre_caracteristica").val(),
               'color_nombre': $("#nombre_caracteristica1").val()},
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
      row.append('<td>'+dataCaracteristicas[i].color+'</td>');

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

        //  $("#modal_producto").modal('hide');
        //  $("#modal_producto_imagen").modal();
        //  $("#btn_enviar1").prop('disabled',false);


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

// function MostrarCategorias(data){

//    for(var i = 0; i < data.length;i++){

//       $("#drp_categorias").append('<option value="'+data[i].IdCategoria+'">'+data[i].NombreCategoria+' </option>');

//    }


// }

function AgregarProducto(){

   

}

function AbrirModalProducto(){
   $('#modal_producto').modal();
}
</script>

<?php include_once "Template/Footer.php"; ?>