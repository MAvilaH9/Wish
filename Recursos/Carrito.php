<?php
session_start();

require_once ('Conexion.php');

    $cantidad=$_POST['cantidad'];
    $IdProducto = $_POST['IdProducto'];
    $IdUsuario = $_SESSION['IdUsuario'];
    $IdVendedor = $_POST['IdVendedor'];
    $Valort=$_POST['Valort'];
    $Valorc=$_POST['Valorc'];
    $Estatus = 'Pendiente';

    $sql = $pdo->prepare("SELECT c.IdCarrito, i.Portada,p.IdProducto,p.NombreProducto, pc.Talla,pc.Color, c.Cantidad, m.Precio, m.IdMaestro,u.IdUsuario, v.IdVendedor
    from carrito c inner join producto p on c.IdProducto=p.IdProducto 
    inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto 
    inner join usuario u on u.IdUsuario=c.IdUsuario 
    inner join vendedor v on p.IdVendedor=v.IdVendedor
    inner join maestro m on m.IdProducto=p.IdProducto
    inner join productocarrito pc on pc.IdCarrito=c.IdCarrito where c.IdUsuario=$IdUsuario AND Estatus='Pendiente'");
    $sql -> execute(array($IdProducto));
    $resultado = $sql->fetch();
    $talla=$resultado['Talla'];
    $color=$resultado['Color'];
        

    if ($Valort != $talla && $Valorc != $color || $Valort != $talla || $Valorc != $color) {
        
        $sql_agregar = 'INSERT INTO carrito (Cantidad,IdProducto,IdUsuario, IdVendedor,IdCupon,IdPeso, Estatus) VALUES (?,?,?,?,null,null,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);

        if ($sentencia_agregar->execute(array($cantidad,$IdProducto,$IdUsuario, $IdVendedor, $Estatus))) {
            $IdCarrito = $pdo->lastInsertId();
            $talla=$_POST['Valort'];
            $color=$_POST['Valorc'];
            $sql_agregar = 'INSERT INTO productocarrito (IdCarrito,IdProducto,Talla,Color,Cantidad) VALUES (?,?,?,?,?)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
            if ($sentencia_agregar->execute(array($IdCarrito,$IdProducto,$talla,$color, $cantidad))) {
                header("location: ../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");
            }

        } else {
            //die();
        }
    }else {
        header("location: ../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");
    }

    
    // if ($_POST['Valort']) {
    //     $cantidad=$_POST['cantidad'];
    //     $IdProducto = $_POST['IdProducto'];
    //     $IdUsuario = $_SESSION['IdUsuario'];
    //     $IdVendedor = $_POST['IdVendedor'];
    //     $Valort=$_POST['Valort'];
    //     $Valorc="";
    //     $Estatus = 'Pendiente';
    
    //     $sql = $pdo->prepare("SELECT c.IdCarrito, i.Portada,p.IdProducto,p.NombreProducto, pc.Talla,pc.Color, c.Cantidad, m.Precio, m.IdMaestro,u.IdUsuario, v.IdVendedor
    //     from carrito c inner join producto p on c.IdProducto=p.IdProducto 
    //     inner join imagenproducto i on i.IdImagenProducto= p.IdImagenProducto 
    //     inner join usuario u on u.IdUsuario=c.IdUsuario 
    //     inner join vendedor v on p.IdVendedor=v.IdVendedor
    //     inner join maestro m on m.IdProducto=p.IdProducto
    //     inner join productocarrito pc on pc.IdCarrito=c.IdCarrito where c.IdUsuario=$IdUsuario AND Estatus='Pendiente'");
    //     $sql -> execute(array($IdProducto));
    //     $resultado = $sql->fetch();
    //     $talla=$resultado['Talla'];
    //     $color=$resultado['Color'];
            
    
    //     if ($Valort != $talla && $Valorc != $color || $Valort != $talla || $Valorc != $color) {
            
    //         $sql_agregar = 'INSERT INTO carrito (Cantidad,IdProducto,IdUsuario,IdVendedor,IdCupon,IdPeso,Estatus) VALUES (?,?,?,?,null,null,?)';
    //         $sentencia_agregar = $pdo->prepare($sql_agregar);
    
    //         if ($sentencia_agregar->execute(array($cantidad,$IdProducto,$IdUsuario,$IdVendedor,$Estatus))) {
    //             $IdCarrito = $pdo->lastInsertId();
    //             $talla=$_POST['Valort'];
    //             $IdProducto = $_POST['IdProducto'];
    //             $cantidad=$_POST['cantidad'];
    
    //             $sql_agregar = 'INSERT INTO productocarrito (IdCarrito,IdProducto,Talla,Color,Cantidad) VALUES (?,?,?,null,?)';
    //             $sentencia_agregar = $pdo->prepare($sql_agregar);
    //             if ($sentencia_agregar->execute(array($IdCarrito,$IdProducto,$talla,$cantidad))) {
    
    //                 header("location: ../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");
    //             }
    
    //         } else {
    //             //die();
    //         }
    //     }else {
    //         header("location: ../FrontEnd/Carrito.php?IdUsuario=$IdUsuario");
    //     }
    // }
?>

