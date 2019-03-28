<?php 

session_start();
require_once ('Conexion.php');

$Codigo=$_REQUEST['Codigo'];
$Porcentaje=$_REQUEST['Porcentaje'];
$FInicio=$_REQUEST['FInicio'];
$FFin=$_REQUEST['FFin'];
$Minimo=0;
$cantidad=100;

$sql_agregar = 'INSERT INTO cupon (Codigo,Porcentaje,FechaInicio,FechaFin,Minimo,Cantidad) VALUES (?,?,?,?,?,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Codigo,$Porcentaje, $FInicio,$FFin,$Minimo,$cantidad))) {
    
    header('location: ../BackEnd/Cupones.php');

} else {
    die();
}

?>