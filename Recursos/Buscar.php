<?php
session_start();
require_once ('Conexion.php');

$Producto=$_POST['Producto'];
$sql = $pdo->prepare('SELECT NombreProducto from producto where NombreProducto=?');
$sql -> execute(array($Producto));
$resultado = $sql->fetch();
?>