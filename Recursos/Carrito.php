<?php
session_start();

require_once ('Conexion.php');

$IdProducto = $_GET['IdProducto'];
$IdVendedor = $_GET['IdVendedor'];
$IdUsuario = $_SESSION['IdUsuario'];

$sql_agregar = 'INSERT INTO carrito (IdProducto,IdUsuario,IdVendedor,IdCupon,IdPeso) VALUES (?,?,?,null,null)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($IdProducto, $IdVendedor, $IdUsuario))) {
    
    header('location:../FrontEnd/Carrito.php?IdUsuario='.$IdUsuario['IdUsuario']);

} else {
    die();
}

?>