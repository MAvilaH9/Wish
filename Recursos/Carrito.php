<?php
session_start();
require_once ('Conexion.php');

$IdProducto = $_GET['IdProducto'];
$IdVendedor = $_GET['IdVendedor'];
$IdCliente = $_SESSION['IdCliente'];

$sql_agregar = 'INSERT INTO carrito (IdProducto,IdCliente,IdVendedor,IdCupon,IdPeso) VALUES (?,?,?,null,null)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($IdProducto, $IdVendedor, $IdCliente))) {
    
    header('location:../FrontEnd/Carrito.php?IdCliente='.$IdCliente['IdCliente']);

} else {
    die();
}

?>