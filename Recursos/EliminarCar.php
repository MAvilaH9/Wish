<?php
session_start();
include "Conexion.php";
$id = $_REQUEST['IdDetalle'];
$IdM = $_REQUEST['IdMaestro'];
$sql = 'DELETE FROM detalle WHERE IdDetalle=:IdDetalle';
$statement = $pdo->prepare($sql);
if ($statement->execute([':IdDetalle' => $id])) {
  $sql1 = 'DELETE FROM maestro WHERE IdMaestro=:IdMaestro';
  $statement1 = $pdo->prepare($sql1);
  if ($statement1->execute([':IdMaestro' => $IdM])) {
    header("Location: ../BackEnd/ProdCaracteristicas.php");
  }
}

?>