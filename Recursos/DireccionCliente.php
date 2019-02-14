<?php
session_start();

require_once ('Conexion.php');

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Direccion=$_POST['Direccion1'];
$Direccion2 = null;
$Pais=$_POST['Pais'];
$Ciudad=$_POST['Ciudad'];
$Estado=$_POST['Estado'];
$Cp=$_POST['CP'];
$Tel=$_POST['Telefono'];
$IdVenta=null;

$sql_agregar = 'INSERT INTO direccionusuario (NombreCliente, ApellidoCliente, DireccionCliente1, DireccionCliente2, Pais, Ciudad, Estado, CodigoPostal, Telefono, IdVenta) VALUES (?, ?, ?, null, ?, ?, ?, ?, ?, null)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Nombre, $Apellidos, $Direccion, $Pais, $Ciudad, $Estado, $Cp, $Tel))) {
    
    header('location:../FrontEnd/Carrito.php?IdUsuario='.$_SESSION['IdUsuario']);

} else {
    die();
}

?>