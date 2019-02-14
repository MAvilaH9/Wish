<?php
include('../Master/Master.php');
include('../Modelo/carrito.php');
include('../../FrontEnd/Modelo/Conexion.php');
$fecha = date("Y-m-d");
$fechavenci = date("Y-m-d", strtotime("+ 1 month"));
$paypaldatos = "Paypal";
$status = "Pendiente";

?>

<div class="content-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-body">

                <?php
                    if ($_POST) {
                        $sid = session_id();
                        $correo = $_POST['email'];


                        // $correo=$_SESSION['admin'];
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $indice => $planes) {
                            $total = $total + ($planes['precio'] * $planes['cantidad']);
                        }
                    }

                    $sentencia=$pdo->prepare("INSERT INTO 
                    `venta` (`idventa`, `clavetransaccion`, `paypaldatos`, `fecha`, `correo`, `total`, `status`,`fechavenci`) 
                     VALUES (NULL, :clavetransaccion , :paypaldatos ,:fecha, :correo, :total , 'pendiente',:fechavenci);");
                    $sentencia->bindParam(":clavetransaccion", $sid);
                    $sentencia->bindParam(":paypaldatos", $paypaldatos);
                    $sentencia->bindParam(":fecha", $fecha);
                    $sentencia->bindParam(":correo", $correo);
                    $sentencia->bindParam(":total",$total);
                    $sentencia->bindParam(":fechavenci",$fechavenci);
                    $sentencia->execute();
                  

                    $idventa = $pdo->lastInsertId();
                    foreach ($_SESSION['carrito'] as $indice => $planes) {
                        $sentencia = $pdo->prepare("INSERT INTO 
                        `detalleventa` (`id`, `idplan`, `idventa`, `preciounitario`, `cantidad`) 
                         VALUES (NULL,:idplan,:idventa,:preciounitario,:cantidad);");

                        $sentencia->bindParam(":idplan", $planes['idplan']);
                        $sentencia->bindParam(":idventa", $idventa);
                        $sentencia->bindParam(":preciounitario", $planes['precio']);
                        $sentencia->bindParam(":cantidad", $planes['cantidad']);
                        $sentencia->execute();
                    }


                    ?>

                <div class="jumbotrom text-center">
                    <h1>Paso final</h1>
                    <hr class="my-4">
                    <p class="lead">Estas apunto de pagar con paypal la cantidad de </p>
                    <h4 class="display-4">
                        <?php echo '' . '$ ' . $total . ' PESOS MEXICANOS'; ?>
                        <br><br>
                        <div id="paypal-button-container" class="btn btn-block"></div>
                        <br>
                    </h4>
                    <p>Los planes podran ser visualizados y utilizados una vez
                        comprados <br>Aclaraciones con los responsables: Bryant&Randy@hotmail.com
                    </p>
                </div>


                <script src="https://www.paypalobjects.com/api/checkout.js"></script>


                <script>
                    // Render the PayPal button
                    paypal.Button.render({
                        // Set your environment
                        env: 'sandbox', // sandbox | production
                        // Specify the style of the button
                        style: {
                            label: 'paypal',
                            size: 'medium', // small | medium | large | responsive
                            shape: 'rect', // pill | rect
                            color: 'blue', // gold | blue | silver | black
                            tagline: false
                        },
                        // PayPal Client IDs - replace with your own
                        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                        client: {
                            sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                            production: '<insert production client id>'
                        },
                        payment: function (data, actions) {
                            return actions.payment.create({
                                payment: {
                                    transactions: [{
                                        amount: {   total: '<?php echo $total; ?>', currency: 'MXN'  },
                                        description:"Compra de planes a Philosopy:$<?php echo $total; ?>",
                                        custom:"<?php echo $sid;?>#<?php echo ($idventa); ?> "
                                      
                                    }]
                                }
                            });
                        },
                        onAuthorize: function (data, actions) {
                            return actions.payment.execute().then(function () {
                                console.log(data);
                                window.location="verificador.php?paymentToken="+data.paymentToken                                    
                            });
                        }
                    }, '#paypal-button-container');
                </script>
            </div>
        </div>
    </div>
</div>


<?php
include('../Master/Master1.php');
?>