<?php
$messaje = "";
session_start();
require_once ('Conexion.php');

$correo = $_POST['Correo'];
$contrasenia = $_POST['Contrasenia'];

$sql = 'SELECT * FROM usuario WHERE Correo = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();


if (!$resultado) {
    //Matar la operacion
    echo'No existe usuario';
    die();
}



if ($contrasenia == $resultado['Contrasenia']  && $resultado['Correo'] == $correo){

    $_SESSION['Nombre_Usuario'] = $resultado['Nombre_Usuario']; 
    $_SESSION['Apellidos'] = $resultado['Apellidos']; 
    $_SESSION['IdPerfil'] = $resultado['IdPerfil']; 
    $_SESSION['Correo'] = $resultado['Correo']; 

    if($resultado['IdPerfil'] == 3){
        header('location:../FrontEnd/Index.php');
    }
    
    if($resultado['IdPerfil'] != 1){
        header('location:../FrontEnd/Index.php');    
    }
  
}
else{
    header('location:../FrontEnd/Index.php');
}
?>