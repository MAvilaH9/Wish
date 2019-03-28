<?php 
require_once ('../Recursos/Conexion.php');
include_once "Template/HeaderAdmin.php";

$sql= $pdo->prepare("SELECT * FROM cupon");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Buscar Productos</h4>

            <form enctype="multipart/form-data" class="forms-sample" action="Buscar.php" method="Post">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Producto" placeholder="Ingresa el Nombre de Producto" required>
                    </div>
                    <div class="col-sm-3">
                        <button  type="submit" class="btn btn-outline-primary"> <i class="fa fa-search"></i> Burcar
                        </button>
                    </div>
                </div>  
            </form> <br> <br> -->

            <h4 class="card-title">Cupones Promocionales</h4> <br> <br>
            <div class="col-md-2">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Nuevo Cupon
                    <i class="mdi mdi-plus"></i></button>
            </div>
            <br> <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Porcentaje Descuento</th>
                            <th>Fecha inicio</th>
                            <th>Fecha Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $dato):?>
                        <tr>
                            <td><?php echo $dato['Codigo']?></td>
                            <td><?php echo $dato['Porcentaje']?></td>
                            <td><?php echo $dato['FechaInicio']?></td>
                            <td><?php echo $dato['FechaFin']?> </td>
                            <td><a href="Cupon.php?IdCupon=<?php echo $dato['IdCupon'];?>"><img src="img/Editar.png" alt=""></a></td>
                            <td><a href="../Recursos/DeleteCupon.php?IdCupon=<?php echo $dato['IdCupon'];?>"><img src="img/Eliminar.png" alt=""></a></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form enctype="multipart/form-data" class="forms-sample" action="../Recursos/AgregarCupon.php" method="Post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Cupón</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Código del Cupon: </label>
                            <input type="text" class="form-control" name="Codigo" placeholder="Ingresa el código"
                                required>
                        </div>
                        <div class="col-sm-6">
                            <label>Porcentaje de Descuento: </label>
                            <input type="text" class="form-control" name="Porcentaje"
                                placeholder="Ingresa el Porcentaje" required>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Fecha de Incio: </label>
                            <input type="date" class="form-control" name="FInicio" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Fecha Final: </label>
                            <input type="date" class="form-control" name="FFin" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" onclick="Alerta();">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form enctype="multipart/form-data" class="forms-sample" action="../Recursos/ActualizarCupon.php" method="Post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Cupón</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Código del Cupon: </label>
                            <input type="text" class="form-control" name="Codigo" placeholder="Ingresa el código"
                                required>
                        </div>
                        <div class="col-sm-6">
                            <label>Porcentaje de Descuento: </label>
                            <input type="text" class="form-control" name="Porcentaje"
                                placeholder="Ingresa el Porcentaje" required>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Fecha de Incio: </label>
                            <input type="date" class="form-control" name="FInicio" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Fecha Final: </label>
                            <input type="date" class="form-control" name="FFin" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" onclick="Alerta();">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function Alerta() {
        Swal.fire(
        'Cupón Agragado!',
        '!',
        'success'
        )
    }
</script>
<?php include_once "Template/Footer.php"; ?>
