<?php include_once "Template/Header.php"; ?>
<!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                    <div class="col-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Agregar nuevo producto</h4>
                                <form class="forms-sample">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre del producto</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="Nombre"
                                                placeholder="Ingresa el Nombre">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Descripción</label>
                                        <textarea class="form-control" nam="Descripcion" rows="4"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="">Precio: </label>
                                            <input type="text" class="form-control" name="Precio"
                                                placeholder="Precio">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Precio descuento: </label>
                                            <input type="text" class="form-control" name="Preciodescuento"
                                                placeholder="Precio descuento">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Código: </label>
                                            <input type="text" class="form-control" name="Codigo"
                                                placeholder="Código">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Cantidad: </label>
                                            <input type="text" class="form-control" name="Cantidad"
                                                placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Agregar</button>
                                    <a class="btn btn-light" href="Index.php">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once "Template/Footer.php"; ?>