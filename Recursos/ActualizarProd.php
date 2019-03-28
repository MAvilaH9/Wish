<?php 
include "Conexion.php";

$IdProducto=$_REQUEST['IdProducto'];
$Nombre=$_REQUEST['Nombre'];
$Cat=$_REQUEST['ProductoCategoria'];
$Descrip=$_REQUEST['Descripcion'];
$Precio=$_REQUEST['Precio'];
$PrecioDescuento=$_REQUEST['Preciodescuento'];
$Codigo=$_REQUEST['Codigo'];
$Cantidad=$_REQUEST['Cantidad'];


$sql_agregar = "UPDATE producto SET NombreProducto='$Nombre', Descripcion='$Descrip',Codigo='$Codigo',Precio='$Precio',PrecioDescuento='$PrecioDescuento', Cantidad='$Cantidad' WHERE IdProducto='$IdProducto'";
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Nombre,$Descrip,$Codigo,$Precio,$PrecioDescuento,$Cantidad))) {
   header("location: ../BackEnd/Index.php");

} else {
   $msg = "Porfavor vuelva a intentarlo";
   die();
}
?>