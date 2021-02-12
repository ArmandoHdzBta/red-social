<?php
//ser requiere al archivo del usuario
require 'app/models/Conexion.php';
require 'app/models/Usuario.php';
//se usan las clases
use Model\Usuario;
use Model\Conexion;

class UsuarioController
{
	//funcion para mostrar la vista de login
	public function iniciarsesion()
	{
		require 'app/views/iniciarsesion.php';
	}
	//para mostrar la vista de registrarse
	public function registrarse()
	{
		require 'app/views/registrar.php';
	}
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
		//se manda a llamar a la funcion que realiza el registro en la BD
		$usuario->create();
		//se redirecciona a la pagina principal
		require 'app/views/home.php';
	}
	public function login()
	{
		//se verifican que si existan las variables
		if ((!isset($_POST['correo'])) || (!isset($_POST['password']))) {
			echo "Datos incorrectos";
			return false;
		}
		//se recuperan los datos del login
		$correo = $_POST['correo'];
		$password = $_POST['password'];
		#echo "$correo $password";
		$res = Usuario::verificarUsuario($correo, $password);
		//verifica si la variable $res no esta vacia
		if ($res) {
			//se redirecciona a la pagina de vista de inicio
			require 'app/views/home.php';
		}else{
			//se devuele un mensaje a la misma vista
			$status = "datos incorrectos";
			require 'app/views/iniciarsesion.php';
		}
	}
}