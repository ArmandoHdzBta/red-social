<?php
//

namespace Model;
//clase Publicacion y extiende de la clase conexion
class Publicacion extends Conexion
{
	//declarar las variables que se van a ocupar
	public $id_usuario;
	public $texto;
	public $foto;
	//constructor de la calase
	function __construct(){
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcion registrat la publicacion en la base de datos
	public function create()
	{
		//sentencia sql y se declaran los parametros
		$sql = "INSERT INTO usuario_post(id_usuario,texto) VALUES (?,?)";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('is',$this->id_usuario,$this->texto);
		//ejecutamos la consulta
		$pre->execute();

	}
	//funcion que nos muestra todos los post del usuario
	static function verPost($id_usuario)
	{
		//sentencia sql y se declaran los parametros
		$sql = "SELECT * FROM usuario_post WHERE id_usuario = ?";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('i',$id_usuario);
		//ejecutamos la consulta
		$pre->execute();
		//el la variable $resultado guardamos todos los datos que aroja la consulta
		$resultado = $pre->get_result();
		//lo convertimos a objeto y lo retornamos
		return $resultado->fetch_object();
	}
}