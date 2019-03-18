<?php
session_start();
require_once ('Conexion.php');

echo $IdUsuario=$_POST['IdUsuario'];
echo $Tienda=$_POST['Tienda'];


$sql_agregar = 'INSERT INTO vendedor (Empresa,IdUsuario) VALUES (?,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Tienda, $IdUsuario))) {
    header("location: ../BackEnd/Index.php");
} else {
    die();
}
?>