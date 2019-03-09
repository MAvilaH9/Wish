<?php
require_once ('Conexion.php');

    session_start();

    $imagen=$_FILES['imagen']['name'];
    $archivo=$_FILES['imagen']['tmp_name'];
    $ruta="../FrontEnd/imgProductos";
    $ruta=$ruta."/".$imagen;
    move_uploaded_file($archivo,$ruta);
    
    $sql_agregar = "INSERT INTO imagenproducto (Portada,Imagen1,Imagen2,Imagen3,Imagen4,Imagen5) VALUES ('$imagen','', '', '','', '')";
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    
    if ($sentencia_agregar->execute(array($imagen))) {
        $IdImagen = $pdo->lastInsertId();


        $Nombre=$_REQUEST['Nombre'];
        $Categoria=$_REQUEST['ProductoCategoria'];
        $Descripcion=$_REQUEST['Descripcion'];
        $Precio=$_REQUEST['Precio'];
        $PrecioDescuento=$_REQUEST['Preciodescuento'];
        $Codigo=$_REQUEST['Codigo'];
        $Cantidad=$_REQUEST['Cantidad'];
        $Peso=$_REQUEST['Peso'];
        $Estadoprod=0;
        $EstadoPetProducto=0;
        $IdVendedor=$_SESSION['IdVendedor'];
    
        $sql_agregar = 'INSERT INTO producto (NombreProducto,Descripcion,Codigo,Precio,PrecioDescuento,Peso,EstadoProducto,EstadoPetProducto,Cantidad,IdVendedor,IdImagenProducto,IdCategoria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
    
        if ($sentencia_agregar->execute(array($Nombre,$Descripcion,$Codigo,$Precio,$PrecioDescuento,$Peso,$Estadoprod,$EstadoPetProducto,$Cantidad,$IdVendedor,$IdImagen,$Categoria))) {
            header("Location: ../BackEnd/ProdCaracteristicas.php");
        }else {
            echo"No se agrego";
        }
    }else {
        echo"No se agrego";
    }

?>