<?php

namespace Model;

class Usuario extends Conexion
{
	//se declaran los atributos dl usuario
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
		$sql = "INSERT INTO usuario(nombre,apellido_paterno,apellido_materno,usuario,correo,contrasennia) VALUES (?,?,?,?,?,?)";
		$pre = mysqli_prepare($this->con,$sql);
		$pre->bind_param('ssssss',$this->nombre,$this->apellidoPaterno,$this->apellidoMaterno,$this->usuario,$this->correo,$this->contrasennia);
		$pre->execute();
	}
	//funcion para el login del usuario en la base de datos
	public function verificarUusuario()
	{
		# code...
	}
}