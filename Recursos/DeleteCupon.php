<?php
session_start();
include "Conexion.php";
$id = $_GET['IdCupon'];

$sql = 'DELETE FROM cupon WHERE IdCupon=:IdCupon';
$statement = $pdo->prepare($sql);
if ($statement->execute([':IdCupon' => $id])) {
    header("Location: ../BackEnd/Cupones.php");
}

?>