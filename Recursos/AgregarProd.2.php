<?php
require_once ('Conexion.php');
    session_start();
    $sql = $pdo->prepare('SELECT * from producto order by IdProducto  desc limit 1');
    $sql-> execute(array());
    $resultado = $sql->fetch();
    $IdProducto=$resultado['IdProducto'];
    $Precio=$_POST['Precio'];
    $Cantidad=$_POST['Cantidad'];
    $Valor =$_POST['ValorTalla'];
    $Valorc =$_POST['ValorColor'];


    $Talla ='Talla';
    if ($Valor==$Talla) {
        $sql_agregar = 'INSERT INTO caracteristicas (NombreCaracteristica, IdProducto) VALUES (?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);

        if ($sentencia_agregar->execute(array($Talla,$IdProducto)) ) {
        }
        else {
            echo "No se agrego";
        }

        $sql_agregarm = 'INSERT INTO maestro (Precio,Cantidad, IdProducto) VALUES (?,?,?)';
        $sentencia_agregarm = $pdo->prepare($sql_agregarm);
        
        
        if ($sentencia_agregarm->execute(array($Precio,$Cantidad,$IdProducto)) ) {
            $IdMaestro = $pdo-> lastInsertId();
            echo "Se agrego";
        }
        else {
            echo "No se agrego";
        }

        if ($sentencia_agregar->execute(array($Talla,$IdProducto))){
            $Idcaracteristica = $pdo-> lastInsertId();

            $sql_agregar = 'INSERT INTO valor (Valor, IdCaracteristicas) VALUES (?,?)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);

            if ($sentencia_agregar->execute(array($Valor,$Idcaracteristica))) {
                $IdValor = $pdo-> lastInsertId();
                $sql_agregard = 'INSERT INTO detalle (IdValor, IdMaestro) VALUES (?,?)';
                $sentencia_agregard = $pdo->prepare($sql_agregard);
                if ($sentencia_agregard->execute(array($IdValor,$IdMaestro))) {
                    session_start();
                    $_SESSION['producto_temporal']['caracteristicas'][] = array(
                        "talla" => $_POST['talla_nombre']
                    );
                    header('Content-type: application/json');
                    echo json_encode($_SESSION['producto_temporal']);
                    
                    header("Location: ../BackEnd/ProdCaracteristicas.php");
                }else {
                    echo "No se agrego";
                }
                
            }else {
                echo "No se agrego";
            }
            
        }else {
            echo "No se agrego";
        }
    }


    $Color ='Color';
            
    if ($Valorc==$Color) {
        $sql_agregar = 'INSERT INTO caracteristicas (NombreCaracteristica, IdProducto) VALUES (?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        
        if ($sentencia_agregar->execute(array($Color,$IdProducto))) {
            $Idcaracteristica = $pdo-> lastInsertId();

            $sql_agregar = 'INSERT INTO valor (Valor, IdCaracteristicas) VALUES (?,?)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
        
            if ($sentencia_agregar->execute(array($Valorc,$Idcaracteristica))) {
                $IdValor1 = $pdo-> lastInsertId();
                
                $sql_agregard = 'INSERT INTO detalle (IdValor, IdMaestro) VALUES (?,?)';
                $sentencia_agregard = $pdo->prepare($sql_agregard);

                if ($sentencia_agregard->execute(array($IdValor1,$IdMaestro))) {
                    session_start();
                    $_SESSION['producto_temporal']['caracteristicas'][] = array(
                        "color" => $_POST['color_nombre']  
                    );
                    header('Content-type: application/json');
                    echo json_encode($_SESSION['producto_temporal']);
                    
                    header("Location: ../BackEnd/ProdCaracteristicas.php");
                }else {
                    echo "No se agrego";
                }
                
            } else {
                echo "No se agrego";
            }
        } else {
            echo "No se agrego";
        }
    }
    
?> 