<?php

namespace Model;

class Usuario extends Conexion
{
	//se declaran los atributos del usuario
	public $idUsuario;
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
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
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
	static function verificarUsuario($correo, $password)
	{
		//se insancia la clase conexionpara tener acceso a la conexion
		$conexion = new Conexion();
		//se genera la consulta con los parametros necesarios
		$sql = "SELECT * FROM usuario WHERE correo = ? AND contrasennia = ?";
		//se prepara la consulta parametros(conexion,consulta)
		$pre = mysqli_prepare($conexion->con, $sql);
		//se ponen los parametros con su respectivo tipo de dato
		$pre->bind_param('ss',$correo,$password);
		//se ejecuta la consulta
		$pre->execute();
		//el la variable $resultado guardamos todos los datos que aroja la consulta
		$resultado = $pre->get_result();
		//lo convertimos a objeto y lo retornamos
		return $resultado->fetch_object();
	}

	static function listaAmigos(){
		//objecto pata acceder a la clase de la base de datos
		$conexion = new Conexion();
		//sentencia sql para recuperar los datos de la base de datos
		$sql = "SELECT idusuario, usuario FROM usuario INNER JOIN lista_amigos ON id_usuario = ? AND id_amigo = usuario.idusuario WHERE status = 1";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($conexion->con,$sql);
		//ponemos los tipos de dato y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('ii',$dato);
		//ejecutamos la consulta
		$pre->execute();
		//guardamos los resultados de la consulta
		$res = $pre->get_result();
		//recorremos el para guardar todos los datos de la cosulta en la riable $t
		while ($y = mysqli_fetch_assoc($res)) {
			$t[] = $y;
		}
		//retornamos todos los valores
		return $t;
	}

	static function delete($dato)
	{
		//objecto pata acceder a la clase de la base de datos
		$conexion = new Conexion();
		//sentencia sql para eliminar de la base de dtos
		$sql = "DELETE * FROM usuario WHERE idusuario = ?";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($conexion->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('i',$dato);
		//ejecutamos la consulta
		$pre->execute();
	}
	public function update()
	{
		//sentencia sql para actualizar en la base de datos
		$sql = "UPDATE usuario SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, usuario = ?, correo = ?, contrasennia = ?, foto_perfil = ? WHERE idusuario = ?";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('sssssssi',$this->nombre,$this->apellidoPaterno,$this->apellidoMaterno,$this->usuario,$this->correo,$this->contrasennia,$this->foto_perfil,$this->idUsuario);
		//ejecutamos la consulta
		$pre->execute();
	}
	static function cambiarContrasennia($user, $email, $password)
	{
		//objecto pata acceder a la clase de la base de datos
		$conexion = new Conexion();
		$sql = "UPDATE usuario SET contrasennia = ? WHERE usuario = ? AND correo = ?";
		$pre = mysqli_prepare($conexion->con, $sql);
		$pre->bind_param('sss', $password,$user,$email);
		$pre->execute();
	}
}