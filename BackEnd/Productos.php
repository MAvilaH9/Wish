<?php 
require_once ('../Recursos/Conexion.php');

$IdVendedor=$_SESSION['IdVendedor'];
$sql= $pdo->prepare("SELECT * FROM producto where IdVendedor=$IdVendedor");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Mis Productos</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Descripción</th>
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
                            <td><?php echo $dato['Codigo']?></td>
                            <td><?php echo $dato['NombreProducto']?></td>
                            <td><?php echo $dato['Descripcion']?></td>
                            <td><?php echo $dato['Precio']?></td>
                            <td><?php echo $dato['PrecioDescuento']?> </td>
                            <td><?php echo $dato['Cantidad']?></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
