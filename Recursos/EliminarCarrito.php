<?php
session_start();
include "Conexion.php";
$id = $_REQUEST['IdCarrito'];
$IdUsuario = $_SESSION['IdUsuario'];
$sql = 'DELETE FROM carrito WHERE IdCarrito=:IdCarrito';
$statement = $pdo->prepare($sql);
if ($statement->execute([':IdCarrito' => $id])) {
  $sql1 = 'DELETE FROM productocarrito WHERE IdCarrito=:IdCarrito';
  $statement1 = $pdo->prepare($sql1);
  if ($statement1->execute([':IdCarrito' => $id])) {
    header("Location: ../FrontEnd/Index.php");
  }
}

?>