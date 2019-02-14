<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
?>
<br> <br> <br>
<!-- Shoping Cart -->

<?php
if ($_POST) {
	$status='0';
	$clave='0001';
	$cant=$_POST['Cantidad'];
	$total=$_POST['Total'];
	$correo=$_SESSION['Correo'];
	$sentencia=$pdo->prepare ("INSERT INTO `venta` 
	(`IdVenta`, `StatusPago`, `ClaveTransaccion`, `Fecha`, `Cantidad`, `Total`, `DatosPaypal`, `Correo`) 
	VALUES (Null, :StatusPago, :ClaveTransaccion, NOW(),:Cantidad, :Total, NULL, :Correo);");
	
	$sentencia->bindParam(":StatusPago",$status);
	$sentencia->bindParam(":ClaveTransaccion",$clave);
	$sentencia->bindParam(":Cantidad",$cant);
	$sentencia->bindParam(":Total",$total);
	$sentencia->bindParam(":Correo",$_SESSION['Correo']);
	$sentencia->execute();
	$idVenta=$pdo->lastInsertedId();
	
}

?>

<?php include "Template/Footer.php"; ?>