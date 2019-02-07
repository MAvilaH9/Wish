<?php
$messaje = "";
session_start();
require_once ('Conexion.php');

$correo = $_POST['Correo'];
$contrasenia = $_POST['Contrasenia'];

//$sql = 'SELECT * FROM usuario WHERE Correo = ?';
$sql = 'SELECT * FROM usuario WHERE correoUsuario = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();


if (!$resultado) {
    //Matar la operacion
    echo'No existe usuario';
    die();
}



if ($contrasenia == $resultado['contraseniaUsuario']  && $resultado['correoUsuario'] == $correo){

    $_SESSION['Nombre_Usuario'] = $resultado['nombreUsuario']; 
    $_SESSION['Apellidos'] = $resultado['apellidosUsuario']; 
    $_SESSION['IdPerfil'] = $resultado['idPerfil']; 
    $_SESSION['Correo'] = $resultado['correoUsuario']; 

    if($resultado['idPerfil'] == 3){
        header('location:../FrontEnd/Index.php');
    }
    
    if($resultado['idPerfil'] = 2){
       // header('location:../FrontEnd/Carrito.php');    
    }
  
}
else{
    //header('location:../FrontEnd/Index.php');
}

/*
if ($contrasenia == $resultado['Contrasenia']  && $resultado['Correo'] == $correo){

    $_SESSION['Nombre_Usuario'] = $resultado['Nombre_Usuario']; 
    $_SESSION['Apellidos'] = $resultado['Apellidos']; 
    $_SESSION['IdPerfil'] = $resultado['IdPerfil']; 
    $_SESSION['Correo'] = $resultado['Correo']; 

    if($resultado['IdPerfil'] == 3){
        header('location:../FrontEnd/Index.php');
    }
    
    if($resultado['IdPerfil'] = 2){
       // header('location:../FrontEnd/Carrito.php');    
    }
  
}
else{
    //header('location:../FrontEnd/Index.php');
}
?>
*/