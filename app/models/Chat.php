<?php

namespace Model;

class Chat extends Conexion
{
	//varbales de la clase
	public $de;
	public $para;
	public $mensaje;

	function __construct()
	{
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcion que nos ayuda a obtener todos los datos de la tabla mensajes
	public function create()
	{
		# code...
	}
	static function all($de,$para)
	{
		//objeto de conexion a la base de datos
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT * FROM mensajes WHERE de = ? AND para = ?";
		//se prepar la consulta se le pasan los paramtros de conexion y de la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//se agregan los parametros de la consilta con su respectivo tipo de dato casa uno
		$pre->bind_param('ii',$de,$para);
		//se ejecuta la consulta
		$pre->execute();
		//se obtienen todos los datos y se gurdan en la varibale
		$res = $pre->get_result();
		//se recorren para obtener y guardar todos los datos de la consulta
		while ($y = mysqli_fetch_assoc($res)){
	        $t[] = $y;
        }
        //retorna valor de t
         return $t;
	}
	//funcion que nos crea un mensaje
	public function crearMensaje()
	{
		//sentencia SQL
		$sql = "INSERT INTO mensajes(mensaje,de,para) VALUES (?,?,?)";
		//preparamos la consulta le enciamos la conexion y la consulta
		$pre = mysqli_prepare($this->con, $sql);
		//ponemos los parametros con su respetico tipo de dato
		$pre->bind_param('sii',$this->mensaje,$this->de,$this->para);
		//ejecutamos la consulta
		$pre->execute();
	}
	static function borrarMensaje($idmensaje)
	{
		//objeto de conexion
		$conexion = new Conexion();
		//consulta SQL
		$sql = "DELETE FROM mensajes WHERE idmensajes = ?";
		//preparamos la consulta le enciamos la conexion y la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//ponemos los parametros con su respetico tipo de dato
		$pre->bind_param('i',$idmensaje);
		//ejecutamos la consulta
		$pre->execute();
	}
}