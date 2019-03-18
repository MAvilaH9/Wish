<?php 
include "../Recursos/Conexion.php";
session_start();
$IdUsuario=$_SESSION['IdUsuario'];
$Cantidad=$_POST['Cantidad'];
$IdCar=$_POST['IdCarrito'];

$sql_agregar = "UPDATE carrito SET Cantidad='$Cantidad' WHERE IdCarrito ='$IdCar'";
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Cantidad))) {
   $sql_agregar1 = "UPDATE productocarrito SET Cantidad=$Cantidad WHERE IdCarrito=$IdCar";
   $sentencia_agregar1 = $pdo->prepare($sql_agregar1);
   if ($sentencia_agregar1->execute(array($Cantidad))) {
      header("location: ../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");

   }
} else {
   $msg = "Porfavor vuelva a intentarlo";
   die();
}
?>