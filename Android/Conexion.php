<?php
class Conexion
{
    private $servidor="localhost";
	private $base_datos="wishbd";
	private $usuario="root";
	private $password=" ";

    private $conexion;
    var $filas;
    static $_instance;

    private function __Construct()
	{

	}

	private function __clone()
	{}

	public static function getInstance(){
        if (!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
    public function conectar(){

        $this->conexion = mysqli_connect('localhost:3306', 'root', '', 'wishbd');
        if (!$this->conexion) {
            die('No pudo conectarse: ' );
        }

    }

    public function desconectar()
	{
		mysqli_close($this->conexion);
	}

	public function ejecutar_consulta($sql)
	{
		$this->conectar();               
		$resultados=mysqli_query($this->conexion,$sql);
              	$this->desconectar();
		return $resultados;
	}
	public function fila_afectadas()
	{
		return $this->filas;
	}

	public function valida_consulta()
	{
		if($this->fila_afectadas()!=0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>

