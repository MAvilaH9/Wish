<?php
session_start();
require_once ('Conexion.php');

$Nombre_Usuario = $_POST['Nombre_Usuario'];
$Apellidos = $_POST['Apellidos'];
$Correo = $_POST['Correo'];
$Contrasenia = $_POST['Contrasenia'];
$IdPerfil = '3';


//$sql = 'SELECT * FROM usuario WHERE Correo = ?';
$sql = 'SELECT * FROM usuario WHERE contraseniaUsuario = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($Correo));
$resultado = $sentencia->fetch();

if ($resultado['Correo'] == $Correo) {
    $msg = "Ya existe un usuario con el correo electronico registrado";
} else {
}
/*
$sql_agregar = 'INSERT INTO usuario (Nombre_Usuario,Apellidos,Correo,Contrasenia,IdPerfil) VALUES (?,?,?,?,?)';
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

    if ($IdPerfil == 3) {

        header('location:../FrontEnd/Log.php');

    } elseif ($IdPerfil = 1) {

        header('location:../BackEnd/Index.php');
    }


} else {
    die();
}*/

$sql_agregar = 'INSERT INTO usuario (nombreUsuario,apellidosUsuario,correoUsuario,contraseniaUsuario,idPerfil) VALUES (?,?,?,?,?)';
$sentencia_agregar = $pdo->prepare($sql_agregar);

if ($sentencia_agregar->execute(array($Nombre_Usuario, $Apellidos, $Correo, $Contrasenia, $IdPerfil))) {

    $sql = 'SELECT * FROM usuario WHERE contraseniaUsuario = ?';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($correo));
    $resultado = $sentencia->fetch();

    $sql = 'SELECT * FROM usuario WHERE contraseniaUsuario = ?';
    $_SESSION['Nombre_Usuario'] = $resultado['nombreUsuario'];
    $_SESSION['Apellidos'] = $resultado['apellidosUsuario'];
    $_SESSION['IdPerfil'] = $resultado['IdPerfil'];
    $_SESSION['Correo'] = $resultado['idPerfil'];

    if ($IdPerfil == 3) {

        header('location:../FrontEnd/Login.php');

    } elseif ($IdPerfil = 1) {

        header('location:../BackEnd/Index.php');
    }


} else {
    die();
}

?>