<?php
session_start();

require_once ('Conexion.php');


$IdProducto = $_POST['IdProducto'];
$IdVendedor = $_POST['IdVendedor'];
$cantidad=$_POST['cantidad'];
$IdUsuario = $_SESSION['IdUsuario'];

$sql_agregar = 'INSERT INTO carrito (IdProducto,Cantidad, IdUsuario,IdVendedor,IdCupon,IdPeso) VALUES (?,?,?,?,null,null)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($IdProducto,$cantidad, $IdVendedor, $IdUsuario))) {
    
    header('location:../FrontEnd/Carrito.php?IdUsuario='.$IdUsuario['IdUsuario']);

} else {
    die();
}

if (!isset($_SESSION['Carrito'])) {
    $carrito=array(
        'Idp'=> $IdProducto,
        'Idv'=> $IdVendedor,
        'cant'=> $cantidad
    );
    $_SESSION['Carrito'][0]=$carrito;
    
}else {
    $numprod=count($_SESSION['Carrito']);

    $carrito=array(
        'Idp'=> $IdProducto,
        'Idv'=> $IdVendedor,
        'cant'=> $cantidad
    );
    $_SESSION['Carrito'][$numprod]=$carrito;
    
    alert($_SESSION,true);
}

?>