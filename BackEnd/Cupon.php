<?php include_once "Template/Header.php"; 
require_once ('../Recursos/Conexion.php');
$IdCupon=$_GET['IdCupon'];
$sql= $pdo->prepare("SELECT * FROM cupon WHERE IdCupon=$IdCupon");
$sql -> execute(array($IdCupon));
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
                            <h4 class="card-title"><b>Datos del Cupón</b></h4>
                            <form enctype="multipart/form-data" class="forms-sample" action="../Recursos/ActualizarCupon.php" method="Post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Código del Cupon: </label>
                                        <input type="text" class="form-control" name="Codigo" placeholder="Ingresa el código" value="<?php echo $resultado['Codigo']; ?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Porcentaje de Descuento: </label>
                                        <input type="text" class="form-control" name="Porcentaje" placeholder="Ingresa el Porcentaje" value="<?php echo $resultado['Porcentaje']; ?>" required>
                                    </div>
                                </div> <br>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Fecha de Incio: </label>
                                        <input type="date" class="form-control" name="FInicio" 
                                        value="<?php echo $resultado['FechaInicio']; ?>"   required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Fecha Final: </label>
                                        <input type="date" class="form-control" name="FFin"
                                        value="<?php echo $resultado['FechaFin']; ?>"   required>
                                    </div>
                                </div><br> <br>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-light btn-block" href="IndexAdmin.php">Cancelar</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="IdCupon" value="<?php echo $resultado['IdCupon'];?>">
                                        <button  type="submit" class="btn btn-success btn-block" onclick="Alerta();">Actualizar</button>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                                <br> <br>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function Alerta() {
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    }
</script>

<?php include_once "Template/Footer.php"; ?>