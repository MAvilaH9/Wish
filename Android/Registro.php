<?php

$json=array();

if (isset($_GET['NombreUsuaario']) && isset($_GET['Apellidos']) && isset($_GET['Correo']) && isset($_GET['Contrasenia'])) {
    $NombreUsuario=$_GET['NombreUsuario'];
    $Apellidos=$_GET['Apellidos'];
    $Correo=$_GET['Correo'];
    $Contrasenia=$_GET['Contrasenia'];
    $IdPerfil = '3';

    $conexion = mysqli_connect('localhost', 'id8736505_marioavila', 'Mavilah9', 'id8736505_wish');

    $sql_agregar = 'INSERT INTO usuario (NombreUsuario,Apellidos,Correo,Contrasenia,IdPerfil) VALUES (?,?,?,?,?)';
    $sentencia_agregar = mysqli_query($conexion,$sql_agregar);

    if ($sentencia_agregar) {

        $sql = "SELECT * FROM usuario WHERE Correo = $Correo";
        $resultado=mysqli_query($conexion,$sql);

        if ($reg=mysqli_fetch_array($resultado)){
            $json['Usuario'][]=$reg;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else {
        $resulta["NombreUsuario"]='No Registrado';
        $resulta["Apellidos"]='No Registrado';
        $resulta["Correo"]='No Registrado';
        $resulta["Contrasenia"]='No Registrado';
        $resulta["IdPerfil"]='No Registrado';
        $json['Usuario'][]=$resulta;
        echo json_encode($json);
    }
}
else {
    $resulta["NombreUsuario"]='No Registrado';
        $resulta["Apellidos"]='No Registrado';
        $resulta["Correo"]='No Registrado';
        $resulta["Contrasenia"]='No Registrado';
        $resulta["IdPerfil"]='No Registrado';
        $json['Usuario'][]=$resulta;
        echo json_encode($json);
}
?>