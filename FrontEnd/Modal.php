<?php
   
   
   
    include "../Recursos/Conexion.php";

    if (!empty($_POST)) {
        if ($_POST['action'] == 'InfoProducto') {
            $idproducto = $_POST['producto'];
                $sql= $pdo->prepare("SELECT p.IdProducto, p.NombeProducto, p.PrecioDescuento, p.IdCategoria, i.Portada from producto p inner join imagenproducto i on p.IdImagenProducto=i.IdImagenProducto where IdProducto=$idproducto");
				$sql->execute();
                $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
                echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
            }
            exit;
    }
    echo 'error';
    exit;


?>