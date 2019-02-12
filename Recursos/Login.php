<?php
$messaje = "";
session_start();
require_once ('Conexion.php');

$correo = $_POST['Correo'];
$contrasenia = $_POST['Contrasenia'];

$sql = 'SELECT * from usuario where Correo =?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();


if (!$resultado) {
    //Matar la operacion
    echo'No existe usuario';
    die();
}


if ($contrasenia == $resultado['Contrasenia']  && $resultado['Correo'] == $correo){

    $_SESSION['Nombre_Usuario'] = $resultado['NombreUsuario']; 
    $_SESSION['Apellidos'] = $resultado['Apellidos']; 
    $_SESSION['IdPerfil'] = $resultado['IdPerfil']; 
    $_SESSION['Correo'] = $resultado['Correo']; 
    $_SESSION['IdUsuario']=$resultado['IdUsuario'];

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
