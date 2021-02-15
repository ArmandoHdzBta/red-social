<?php
//ser requiere al archivo del usuario
require 'app/models/Conexion.php';
require 'app/models/Usuario.php';
//se usan las clases
use Model\Usuario;
use Model\Conexion;

class UsuarioController
{
	function __construct()
	{
		if ($_GET['action'] == 'candado') {
			if (!isset($_SESSION['sesion'])) {
				// echo "no has iniciado sesion";
				// return false;
				header("location: index.php?controller=Usuario&action=iniciarsesion");
			}
		}
	}
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
	public function register()
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
		//redireccion a la misma pagina con mensaje
		$status = "Regristrado. Inicia sesion";
		require 'app/views/registrar.php';
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
		#se accede a la clase statica y se le pasan los valores de correo y contraseña
		$res = Usuario::verificarUsuario($correo, $password);
		//verifica si la variable $res no esta vacia
		if ($res) {
			//se redirecciona a la pagina de vista de inicio
			$_SESSION['sesion'] = $res->idusuario;
			require 'app/views/home.php';
		}else{
			//se devuele un mensaje a la misma vista
			$status = "datos incorrectos";
			require 'app/views/iniciarsesion.php';
		}
	}
	public function logout()
	{
		if (isset($_SESSION['sesion'])) {
			unset($_SESSION['sesion']);
		}
		// session_destroy();
	}
	public function candado()
	{
		echo "salido";
	}
}