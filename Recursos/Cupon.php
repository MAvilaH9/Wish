<?php 
include "../Recursos/Conexion.php";
session_start();
$msg ="";
$IdUsuario=$_SESSION['IdUsuario'];
$cupon=$_POST['Cupon'];
$IdCar=$_POST['IdCarrito'];

$sql = $pdo->prepare("SELECT * from cupon where Codigo=?");
$sql -> execute(array($cupon));
$resultado = $sql->fetch();
$IdCupon=$resultado['IdCupon'];

$sql_agregar = "UPDATE carrito SET IdCupon='$IdCupon' WHERE IdCarrito ='$IdCar'";
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($IdCupon))) {

   header("location: ../FrontEnd/Carrito.php?IdCupon=$IdCupon");

} else {
   $msg = "Porfavor vuelva a intentarlo";
   die();
}
?>