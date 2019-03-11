<?php
date_default_timezone_set('America/Mexico_City');
include("Conexion.php");
class Operaciones{
    public function getProductos()
    {

        $conexion=Conexion::getInstance();
        $conexion->conectar();   
        //if($nombre==null)
        //{
            $query=	"select * from producto";
        //}
        //else
        //{
        //    $query="select * from carta where Nombre='".$nombre."'";
        //}
        $ejecutar =  $conexion->ejecutar_consulta($query);
        $dataarray = array();
        $arreglopadre =array();
        while ( $data = mysqli_fetch_array($ejecutar) )
              {
                        $r = array();
                        $r['Idproducto'] = $data['IdProducto'];
                        $r['NombreProducto'] = $data['NombreProducto'];
						$r['Descripcion'] = $data['Descripcion'];
                        $r['PrecioDescuento'] = $data['PrecioDescuento'];
                       // $r['Portada'] = base64_encode($data['Portada']);
                        array_push($dataarray, $r);
              }
        $arreglopadre['Productos'] = $dataarray;
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($arreglopadre, JSON_PRETTY_PRINT);
    }
}
?>
