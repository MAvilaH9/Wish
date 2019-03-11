<?php
session_start();

require_once ('Conexion.php');


echo $IdProducto = $_POST['IdProducto'];
echo $IdVendedor = $_POST['IdVendedor'];
echo $cantidad=$_POST['cantidad'];
echo $IdUsuario = $_SESSION['IdUsuario'];

$sql_agregar = 'INSERT INTO carrito (IdProducto,IdUsuario, IdVendedor,IdCupon,IdPeso,Cantidad) VALUES (?,?,?,null,null,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($IdProducto,$IdUsuario, $IdVendedor, $cantidad))) {
    
    header('location:../FrontEnd/Carrito.php?IdUsuario='.$IdUsuario['IdUsuario']);

} else {

    //die();
}
/*
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
}*/

?>