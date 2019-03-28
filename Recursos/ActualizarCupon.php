<?php 
include "Conexion.php";
$Id=$_REQUEST['IdCupon'];
$Codigo=$_REQUEST['Codigo'];
$Porcentaje=$_REQUEST['Porcentaje'];
$FInicio=$_REQUEST['FInicio'];
$FFin=$_REQUEST['FFin'];


$sql_agregar = "UPDATE cupon SET Codigo='$Codigo', Porcentaje='$Porcentaje', FechaInicio='$FInicio', FechaFin='$FFin' WHERE IdCupon='$Id'";
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Codigo,$Porcentaje,$FInicio,$FFin))) {
   header("location: ../BackEnd/Cupones.php");

} else {
   $msg = "Porfavor vuelva a intentarlo";
   die();
}
?>