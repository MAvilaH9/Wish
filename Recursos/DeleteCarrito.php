<?php
session_start();
include "Conexion.php";
$id = $_GET['IdCarrito'];
$IdUsuario = $_SESSION['IdUsuario'];
$sql = 'DELETE FROM carrito WHERE IdCarrito=:IdCarrito';
$statement = $pdo->prepare($sql);
if ($statement->execute([':IdCarrito' => $id])) {
  header("Location:../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");
}