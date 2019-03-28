<?php include_once "Template/Header.php"; 
require_once ('../Recursos/Conexion.php');

$sql = $pdo->prepare('SELECT * from producto order by IdProducto  desc limit 1');
$sql-> execute(array());
$producto = $sql->fetch();
$IdProducto=$producto['IdProducto'];

?>
<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><b>Características</b></h4>
                            <br>
                            <form action="../Recursos/AgregarProd.1.php" method="Post">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Talla</label>
                                        <input name="ValorTalla" type="text" class="form-control" placeholder="Nombre"
                                            >

                                    </div>
                                    <div class="col-sm-3">
                                        <label>Color</label>
                                        <input name="ValorColor" type="text" class="form-control" placeholder="Nombre"
                                            >
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Cantidad</label>
                                        <input name="Cantidad" type="text" class="form-control" placeholder="Cantidad">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Precio</label>
                                        <input name="Precio" type="text" class="form-control" placeholder="Precio">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <input type="submit" value="Agregar" class="btn btn-primary">
                                    <!-- <button onclick="AgregarCaracteristica()" class="btn btn-primary">Agregar</button> -->
                                </div>
                            </form>
                            <?php 
							$sql= $pdo->prepare("SELECT c.NombreCaracteristica, v.Valor,m.Precio,m.Cantidad, d.IdDetalle, m.IdMaestro from detalle d 
                            inner join maestro m on m.IdMaestro=d.IdMaestro
                            inner join valor v on d.IdValor=v.IdValor
                            inner join caracteristicas c on c.IdCaracteristicas=v.IdCaracteristicas where m.IdProducto=$IdProducto and c.NombreCaracteristica='Talla'");
							$sql->execute();
							$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                            ?>
                            
                            <?php
                                $sql = $pdo->prepare("SELECT c.NombreCaracteristica, v.Valor,m.Precio,m.Cantidad, d.IdDetalle, m.IdMaestro from detalle d 
                                inner join maestro m on m.IdMaestro=d.IdMaestro
                                inner join valor v on d.IdValor=v.IdValor
                                inner join caracteristicas c on c.IdCaracteristicas=v.IdCaracteristicas where m.IdProducto=$IdProducto and c.NombreCaracteristica='Color'");
                                $sql-> execute(array());
                                $result = $sql->fetch();
                            ?>
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
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($resultado as $dato):?>
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <?php echo $dato['Valor']?>
                                            </td>
                                            <td class="column-2">
                                                <?php echo $result['Valor']?>
                                            </td>
                                            <td class="column-3">
                                                <?php echo $dato['Cantidad']?>
                                            </td>
                                            <td class="column-4">
                                                $<?php echo $dato['Precio']?>
                                            </td>
                                            <td class="column-5"><a href="../Recursos/EliminarCar.php?IdDetalle=<?php echo $dato['IdDetalle'];?>&IdMaestro=<?php echo $dato['IdMaestro'];?>"
                                                onclick="funcionAlertaE()">Eliminar</a>
                                            </td>

                                        </tr>
                                        <?php endforeach?>
                                    </table>
                                </div>
                            </div>
                            <br><br>
                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <a href="Index.php" class="btn btn-primary btn-block">Terminar</a>
                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--
<script>
    var x = $(document);
    x.ready(Eventos);

    function AgregarCaracteristica() {
        $.ajax({
            url: '../Recursos/Producto.php',
            type: 'post',
            data: {
                'peticion': 'agregar_caracteristica',
                'talla_nombre': $("#nombre_caracteristica").val(),
                'color_nombre': $("#nombre_caracteristica1").val()
            },
            beforeSend: function () {

            }
        }).done(function (data) {

            ListarCaracteristicas(data.caracteristicas);

        });
    }

    function ListarCaracteristicas(dataCaracteristicas) {

        $("#tabla_contenido_Talla").empty();
        for (var i = 0; i < dataCaracteristicas.length; i++) {

            var row = $("<tr/>");

            row.appendTo("#tabla_contenido_Talla");

            row.append('<td>' + dataCaracteristicas[i].talla + '</td>');
            row.append('<td>' + dataCaracteristicas[i].color + '</td>');

        }
    }

</script>-->

<?php include_once "Template/Footer.php"; ?>