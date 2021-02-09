<?php
//ser requiere al archivo del usuario
require 'app/models/Conexion.php';
require 'app/models/Usuario.php';
//se usa la clase
use Model\Usuario;
use Model\Conexion;

class UsuarioController
{
	//funcion para mostrar la vista home despues de iniciar sesion
	public function home()
	{
		require 'app/views/home.php';
	}

	//funcion registrar para tomar los datos escritos en el formulario de la vista home.php
	public function registrar()
	{
		//se crea el objeto usuario
		$usuario = new Usuario();
		//se accede a cada atributo de la clase y se le asigna el valor del formulario
		$usuario->nombre = $_POST['nombre'];
		$usuario->apellidoPaterno = $_POST['app'];
		$usuario->apellidoMaterno = $_POST['apm'];
		$usuario->usuario = $_POST['usuario'];
		$usuario->correo = $_POST['correo'];
		$usuario->contrasennia = hash("SHA256", $_POST['password']);
		$usuario->create();
		require 'app/views/home.php';
	}
}