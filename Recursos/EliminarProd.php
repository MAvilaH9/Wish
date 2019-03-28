<?php
session_start();
include "Conexion.php";
$id = $_REQUEST['IdProducto'];
$sql = 'DELETE FROM producto WHERE IdProducto=:IdProducto';
$statement = $pdo->prepare($sql);
if ($statement->execute([':IdProducto' => $id])) {
    header('Location: ../BackEnd/Index.php');
}

?>