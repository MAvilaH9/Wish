<?php include_once "Template/Header.php"; 
include "../Recursos/Conexion.php";

$IdProducto=$_REQUEST['IdProducto'];
$sql = $pdo->prepare("SELECT * FROM producto where IdProducto=$IdProducto");
$sql -> execute(array($IdProducto));
$resultado = $sql->fetch();
?>


<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><b>Información Básica</b></h4>
                            <form enctype="multipart/form-data" class="forms-sample" action="../Recursos/ActualizarProd.php" method="Post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <input type="hidden" name="IdProducto" value="<?php echo $resultado['IdProducto'];?>">
                                        <label>Nombre del producto: </label>
                                        <input type="text" class="form-control" name="Nombre" value="<?php echo $resultado['NombreProducto'];?>" placeholder="Ingresa el Nombre"
                                            required>
                                    </div>
                                    <?php 
                                        include "../Recursos/Conexion.php";
                                        $sql1= $pdo->prepare("SELECT * FROM categoria");
                                        $sql1->execute();
                                        $resultado1=$sql1->fetchALL(PDO::FETCH_ASSOC);
                                        foreach ($resultado1 as $dato) {
                                        }
                                    ?>
                                    <div class="col-sm-6">
                                        <label>Categoría: </label>
                                        <?php 
                                        if (!empty($dato['NombreCategoria'])){
                                            echo '<select name="ProductoCategoria" id="drp_categorias" class="form-control">';
                                            echo '<option value="">-- Seleccione una categoría --</option>';
                                            foreach ($resultado1 as $dato) {
                                                echo '<option value="'.$dato['IdCategoria'].'">'.$dato['NombreCategoria'].'</option>';
                                            }
                                            echo'</select>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12"> 
                                        <label>Descripción</label>
                                        <textarea class="form-control" name="Descripcion" value="<?php echo $resultado['Descripcion'];?>" required cols="4" rows="4"></textarea>
                                    </div>
                                </div> <br>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="">Precio: </label>
                                        <input type="text" class="form-control" name="Precio" placeholder="Precio" value="<?php echo $resultado['Precio'];?>"
                                            required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Precio descuento: </label>
                                        <input type="text" class="form-control" name="Preciodescuento" placeholder="Precio descuento" value="<?php echo $resultado['PrecioDescuento'];?>"
                                            required>
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Código: </label>
                                        <input type="text" class="form-control" name="Codigo" placeholder="Código" value="<?php echo $resultado['Codigo'];?>"
                                            required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Cantidad: </label>
                                        <input type="text" class="form-control" name="Cantidad" placeholder="Cantidad" value="<?php echo $resultado['Cantidad'];?>"
                                            required>
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <label for="">Peso: </label>
                                        <input type="text" class="form-control" name="Peso" placeholder="Peso" required>
                                    </div> -->
                                </div><br> <br>
                                
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <label><b>Imagen Principal</b></label>
                                        <span>
                                            <input type="file" name="imagen" class="btn btn-primary" required />
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><b>Imagen 1</b></label>
                                        <span>
                                            <input type="file" name="imagen1" class="btn btn-primary"  />
                                        </span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><b>Imagen 2</b></label>
                                        <span>
                                            <input type="file" name="imagen2" class="btn btn-primary"  />
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><b>Imagen 3</b></label>
                                        <span>
                                            <input type="file" name="imagen3" class="btn btn-primary" />
                                        </span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><b>Imagen 4</b></label>
                                        <span>
                                            <input type="file" name="imagen4" class="btn btn-primary" />
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><b>Imagen 5</b></label>
                                        <span>
                                            <input type="file" name="imagen5" class="btn btn-primary" />
                                        </span>
                                    </div>
                                </div> <br> <br> -->

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-light btn-block" href="Index.php">Cancelar</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <button  type="submit" class="btn btn-success btn-block">Actializar</button>
                                    </div>
                                    <div class="col-sm-3">
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


<?php include_once "Template/Footer.php"; ?>