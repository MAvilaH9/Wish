<?php  
    include "../Recursos/Conexion.php"; 
   /* $id=$_POST['producto'];
    $sql= $pdo->prepare("SELECT p.NombeProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto WHERE IdProducto= $id");
    $sql->execute();
       $resultado=mysqli($sql);
             if ($resultado > 0) {
            $data=fetchALL($sql);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo 'error';
        exit;*/
    $id=$_POST['producto'];
    $pd=$_POST['pdescuento'];
    $img=$_POST['portada'];
    
?>
