<?php 

session_start();
require_once ('Conexion.php');

$IdUsuario=$_SESSION['IdUsuario'];
$nombre=$_SESSION['Nombre_Usuario'];
$IdProducto=$_GET['IdProducto'];

$sql_agregar = 'INSERT INTO wishlist (Nombre,IdProducto,IdUsuario) VALUES (?,?,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($nombre,$IdProducto, $IdUsuario))) {
    
    header('location:../FrontEnd/ListaDeseos.php');

} else {
    die();
}

?>