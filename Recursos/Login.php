<?php
$messaje = "";
session_start();
require_once ('Conexion.php');

$correo = $_POST['Correo'];
$contrasenia = $_POST['Contrasenia'];

$sql = 'SELECT u.IdUsuario, u.NombreUsuario, u.Apellidos, u.IdPerfil, u.Correo, u.Contrasenia, v.IdVendedor from usuario u inner join vendedor v on u.IdUsuario=v.IdUsuario where u.Correo=?';
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
    $_SESSION['IdVendedor']=$resultado['IdVendedor'];

    if($resultado['IdPerfil'] == 3){
        header('location:../FrontEnd/Index.php');
        
    } 

    if($resultado['IdPerfil'] == 1){
            header('location:../BackEnd/Index.php');
    }
}
else{
    header('location:../FrontEnd/Login.php');
}
?>
