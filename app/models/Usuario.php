<?php

namespace Model;

class Usuario extends Conexion
{
	//se declaran los atributos del usuario
	public $nombre;
	public $apellidoPaterno;
	public $apellidoMaterno;
	public $usuario;
	public $correo;
	public $contrasennia;
	public $fotoPerfil;
	//funcion contructor
	function __construct()
	{
		//se utiliza esto para que se pueda hacer us de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcion para hacer el registro en la base de datos
	public function create()
	{
		//sentencia sql y se declaran los parametros
		$sql = "INSERT INTO usuario(nombre,apellido_paterno,apellido_materno,usuario,correo,contrasennia) VALUES (?,?,?,?,?,?)";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('ssssss',$this->nombre,$this->apellidoPaterno,$this->apellidoMaterno,$this->usuario,$this->correo,$this->contrasennia);
		//ejecutamos la consulta
		$pre->execute();
	}
	//funcion para el login del usuario en la base de datos
	static function verificarUsuario($usuario, $password)
	{
		$conexion = new Conexion();
		$sql = "SELECT * FROM usuario WHERE usuario=?";
		$pre = mysqli_prepare($conexion->con, $sql);
		$pre->bind_param('s',$usuario);
		$pre->execute();
		$resultado = $pre->get_result();
		return $resultado->fetch_object();
	}
}