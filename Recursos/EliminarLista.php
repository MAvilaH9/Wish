<?php

session_start();
include "Conexion.php";

$id = $_GET['IdWishList'];
$IdUsuario = $_SESSION['IdUsuario'];

$sql = 'DELETE FROM wishlist WHERE IdWishList=:IdWishList';
$statement = $pdo->prepare($sql);

if ($statement->execute([':IdWishList' => $id])) {
  header("Location:../FrontEnd/ListaDeseos.php");
}