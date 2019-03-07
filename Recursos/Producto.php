<?php

if(isset($_REQUEST['peticion'])){

    switch($_REQUEST['peticion']){


        case 'agregar_caracteristica':

            session_start();

            $_SESSION['producto_temporal']['caracteristicas'][] = array(
                "talla" => $_POST['talla_nombre'],
                "color" => $_POST['color_nombre']  
            );

            header('Content-type: application/json');
            echo json_encode($_SESSION['producto_temporal']);

        break;


        case 'listar_productos_por_aprobar':

            include_once 'Conexion.php';
            
            $objProducto = $pdo -> prepare('select * from producto where estadoProducto = 1');
            $objProducto -> execute();

            header('Content-type: application/json');
            echo json_encode($objProducto ->fetchAll(PDO::FETCH_ASSOC));

        break;

        case 'aprobar_producto':

           include_once 'Conexion.php';

           $query = 'update producto set 
                        estadoProducto = ? 
                        where IdProducto = ?';

           $objProducto = $pdo -> prepare($query)
                -> execute(array(
                    2,
                    $_POST['idProducto']
                ));


        break;

        case 'desaprobar_producto':

            include_once 'Conexion.php';

            $query = 'update producto set 
                        estadoProducto = ? 
                        where IdProducto = ?';

            $objProducto = $pdo -> prepare($query)
                -> execute(array(
                    0,
                    $_POST['idProducto']
                ));


         break;

        case 'guardar_producto':

            session_start();

            $_SESSION['producto_temporal'] = array(

                "nombre_producto" => $_POST['Nombre'],
                "descripsion" => $_POST['Descripcion'],
                "id_unico" => $_POST['Codigo'],
                "producto_categoria" => $_POST['ProductoCategoria'],
                "precio" => $_POST['Precio'],
                "precio_descuento" => $_POST['Preciodescuento'],
                "peso" => $_POST['Peso'],
                "id_categoria" => $_POST['ProductoCategoria'],
                "stock" => $_POST['Cantidad']

            );


            header('Content-type: application/json');
            echo json_encode($_SESSION['producto_temporal']);

        break;

        case 'guardar_imagen':

            include_once 'Conexion.php';

            session_start();

            $path = '../BackEnd/imagenes/';
            $path_bd = 'imagenes/';
            
            $img = $_FILES['imagen_principal']['name'];
            $tmp = $_FILES['imagen_principal']['tmp_name'];

            $final_image = base64_encode(rand(1000,1000000)).$img;

            $path = $path.strtolower($final_image);
            $path_bd = $path_bd.strtolower($final_image);

            move_uploaded_file($tmp,$path);

            $query = "insert into imagenproducto(Portada) values(?)";

            $objImagenProducto = $pdo -> prepare($query)
                ->execute(array(
                    $path_bd
                ));

            $_SESSION['producto_temporal']['idImagenProducto'] = $pdo -> lastInsertId();

            header('Content-type: application/json');
            echo json_encode($_SESSION['producto_temporal']);




        break;

        case 'almacenar_producto';

            include_once 'Conexion.php';
            
            session_start();

            $datosProductoTemporal = $_SESSION['producto_temporal'];

            $query = "insert into producto(
                NombreProducto,
                Descripcion,
                Codigo,
                Precio,
                PrecioDescuento,
                Peso,
                EstadoProducto,
                EstadoPetProducto,
                Cantidad,
                IdVendedor,
                IdImagenProducto,
                IdCategoria
            ) values(?,?,?,?,?,?,1,1,?,?,?,?)";

            $stm = $pdo -> prepare($query)
                -> execute(array(
                    $datosProductoTemporal['nombre_producto'],
                    $datosProductoTemporal['descripsion'],
                    $datosProductoTemporal['id_unico'],
                    $datosProductoTemporal['precio'],
                    $datosProductoTemporal['precio_descuento'],
                    $datosProductoTemporal['peso'],
                    $datosProductoTemporal['stock'],
                    2,
                    $datosProductoTemporal['idImagenProducto'],
                    $datosProductoTemporal['id_categoria']
                ));

                $id_producto = $pdo ->lastInsertId();

                //se inserta la caracteristica
            $stmCaracteristicas = $pdo -> prepare('insert into caracteristicas (NombreCaracteristica) values(?)')
                -> execute(array(
                    "Talla"
                ));

                //se almacena el id de la caracteristica
            $id_caracteristica = $pdo -> lastInsertId();
            
                //se inserta el id del producto y caracterista en la tabla productocaracteristica
            $stmProductoCarac = $pdo -> prepare('insert into productocaracteristica(IdProducto,IdCaracteristicas) values(?,?)')
                -> execute(array(
                    $id_producto,
                    $id_caracteristica
                ));


                //se crea un array para almacenar los 
            $idsValores = array();

            foreach($datosProductoTemporal['caracteristicas'] as $item){

                $stmValores = $pdo -> prepare('insert into valor(Valor,IdCaracteristicas) values(?,?)')
                    ->execute(array(
                        $item['talla'],
                        $id_caracteristica
                    ));

                $idsValores[] = $pdo -> lastInsertId();

             }

             for($i = 0;$i < count($idsValores);$i++){

                $stmProductoValores = $pdo -> prepare('insert into productovalor(IdProducto,IdValor,IdCaracteristicas) values(?,?,?)')
                    -> execute(array(
                        $id_producto,
                        $idsValores[$i],
                        $id_caracteristica
                    ));

             }

             





        break;

        // case 'consultar_Categorias':

        //     include_once 'Conexion.php';


        //     $ObjCategoria = $pdo -> prepare('select * from categoria');
        //     $ObjCategoria -> execute();

        //     $datosCategorias = $ObjCategoria -> fetchAll(PDO::FETCH_ASSOC);

        //     header('Content-type: application/json');
        //     echo json_encode($datosCategorias);

        // break;


        case 'listar_productos_aprobados':

             include_once 'Conexion.php';

             $stmProducto = $pdo -> prepare('select * from producto where EstadoProducto = 2');
             $stmProducto -> execute();

             header('Content-type: application/json');
             echo json_encode($stmProducto -> fetchAll(PDO::FETCH_ASSOC));



        break;


        case 'listar_productos_no_aprobados':

            include_once 'Conexion.php';

            $stmProducto = $pdo -> prepare('select * from producto where EstadoProducto = 0');
            $stmProducto -> execute();

            header('Content-type: application/json');
            echo json_encode($stmProducto ->fetchAll(PDO::FETCH_ASSOC));



        break;

        case 'producto_detalle':

             include_once 'Conexion.php';

             $datosProducto = array();


             $query = "select * from producto where IdProducto = ?";

             $stm = $pdo -> prepare($query);
             $stm -> execute(array(
                 $_POST['dProducto']
             ));

             $datosProducto['datos_generales'] = $stm -> fetch(PDO::FETCH_ASSOC);

             $query = "select * from categoria where IdCategoria = ?";

             $stmCategoria = $pdo -> prepare($query);
             $stmCategoria -> execute(array(
                 $datosProducto['datos_generales']['IdCategoria']
             ));

             $datosProducto['datos_generales']['categoria'] = $stmCategoria -> fetch(PDO::FETCH_ASSOC);

             $query = "select * from imagenproducto where IdImagenProducto = ?";

             $stmImagen = $pdo -> prepare($query);
             $stmImagen -> execute(array(
                 $datosProducto['datos_generales']['IdImagenProducto']
             ));

             $datosProducto['datos_generales']['imagenes'] = $stmImagen -> fetch(PDO::FETCH_ASSOC);

             header('Content-type: application/json');
             echo json_encode($datosProducto);





        break;

    }

    

}

?>