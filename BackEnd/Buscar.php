<?php
include_once "Template/Header.php";
require_once ('../Recursos/Conexion.php');

$IdVendedor=$_SESSION['IdVendedor'];
$Producto=$_REQUEST['Producto'];

if (empty($Producto)) {
    header("location: Index.php");
}

?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Buscar Productos</h4>

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
            </form> <br> <br>
            <?php
                include "../Recursos/Conexion.php";
                $sql= $pdo->prepare("SELECT * FROM producto where IdVendedor=$IdVendedor and NombreProducto LIKE '%$Producto%'");
				$sql->execute();
				$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
			?>
            <h4 class="card-title">Mis Productos</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <!-- <th>Descripción</th> -->
                            <th>Precio</th>
                            <th>Precio Descuento</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                            <!-- <td class="py-1">
                                <img src="../../images/faces-clipart/pic-1.png" alt="image" />
                            </td> -->
                        <?php foreach ($resultado as $dato):?>
                        <tr>
                            <td><?php echo $dato['IdProducto'];?></td>
                            <td><?php echo $dato['NombreProducto'];?></td>
                            <!-- <td><?php echo $dato['Descripcion'];?></td> -->
                            <td><?php echo $dato['Precio'];?></td>
                            <td><?php echo $dato['PrecioDescuento'];?> </td>
                            <td><?php echo $dato['Cantidad'];?></td>
                            <td><a href="#"><img src="img/Editar.png" alt=""></a></td>
                            <td><a href="#"><img src="img/Eliminar.png" alt=""></a></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once "Template/Footer.php";?>