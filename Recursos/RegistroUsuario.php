<?php
session_start();
require_once ('Conexion.php');

$Nombre_Usuario = $_POST['Nombre_Usuario'];
$Apellidos = $_POST['Apellidos'];
$Correo = $_POST['Correo'];
$Contrasenia = $_POST['Contrasenia'];
$IdPerfil = '3';


$sql = 'SELECT * FROM usuario WHERE Correo = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($Correo));
$resultado = $sentencia->fetch();

if ($resultado['Correo'] == $Correo) {
    $msg = "Ya existe un usuario con el correo electronico registrado";
} else {
}

$sql_agregar = 'INSERT INTO usuario (NombreUsuario,Apellidos,Correo,Contrasenia,IdPerfil) VALUES (?,?,?,?,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Nombre_Usuario, $Apellidos, $Correo, $Contrasenia, $IdPerfil))) {

    $sql = 'SELECT * FROM usuario WHERE Correo = ?';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($correo));
    $resultado = $sentencia->fetch();

    $_SESSION['Nombre_Usuario'] = $resultado['Nombre_Usuario'];
    $_SESSION['Apellidos'] = $resultado['Apellidos'];
    $_SESSION['IdPerfil'] = $resultado['IdPerfil'];
    $_SESSION['Correo'] = $resultado['Correo'];
    $_SESSION['IdUsuario']= $resultado['IdUsuario'];


    if ($IdPerfil == 3) {

        header('location:../FrontEnd/Login.php');

    } elseif ($IdPerfil = 1) {

        header('location:../BackEnd/Index.php');
    }


} else {
    die();
}
?>