<?php 
include "../Recursos/Conexion.php";
$Cantidad=$_POST['Cantidad'];
$IdCar=$_POST['IdCarrito'];

$sql_agregar = "UPDATE carrito SET Cantidad='$Cantidad' WHERE IdCarrito ='$IdCar'";
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Cantidad))) {

   header('location: ../FrontEnd/Carrito.php');

} else {
   $msg = "Porfavor vuelva a intentarlo";
   die();
}
?>