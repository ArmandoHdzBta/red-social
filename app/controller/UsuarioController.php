<?php
//ser requiere al archivo del usuario
require 'app/models/Conexion.php';
require 'app/models/Usuario.php';
require 'app/models/Chat.php';
//se usan las clases
use Model\Usuario;
use Model\Conexion;
use Model\Chat;

class UsuarioController
{
	function __construct()
	{
		if ($_GET['action'] == 'Home') {
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
		//se encripta la contraseña
		$passwordHash = hash("SHA256", $password);
		#se accede a la clase statica y se le pasan los valores de correo y contraseña
		$res = Usuario::verificarUsuario($correo, $passwordHash);
		//verifica si la variable $res no esta vacia
		if ($res) {
			//se redirecciona a la pagina de vista de inicio
			$_SESSION['sesion'] = $res->idusuario;
			$_SESSION['nombre'] = $res->nombre;
			$_SESSION['app'] = $res->apellido_paterno;
			$_SESSION['apm'] = $res->apellido_materno;
			$_SESSION['usuario'] = $res->usuario;
			$_SESSION['correo'] = $res->correo;
			$_SESSION['foto'] = $res->foto_perfil;
			require 'app/views/home.php';
		}else{
			//se devuele un mensaje a la misma vista
			$status = "datos incorrectos";
			require 'app/views/iniciarsesion.php';
		}
	}
	public function actualizar()
	{
		$usuario = new Usuario();
		$usuario->idUsuario = $_POST['idusuario'];
		$usuario->nombre = $_POST['nombre'];
		$usuario->apellidoPaterno = $_POST['app'];
		$usuario->apellidoMaterno = $_POST['apm'];
		$usuario->usuario = $_POST['usuario'];
		$usuario->correo = $_POST['correo'];
		$usuario->fotoPerfil = renameFoto();
		$res = $usuario->update();
		require 'app/views/perfil.php';
	}
	public function perfil()
	{
		require 'app/views/perfil.php';
	}
	public function informacion()
	{
		$idusuario = $_POST['idusuario'];
		$res = Usuario::usuario($idusuario);
		echo json_encode($res);
	}
	public function listaAmigos()
	{
		$idusuario = $_POST['idusuario'];
		echo json_encode(Usuario::all($idusuario));
	}
	//funcion para crear un chat
	public function chat()
	{
		$chat = new Chat();
		$chat->de = $_GET['de'];
		$chat->para = $_GET['para'];
		$chat->create();
		require 'app/views/chat.php';
	}
	//fincion que devuele la vista si has olvidado tu password
	public function forgotPasswordView()
	{
		require 'app/views/forgotPassword.php';
	}
	//funcion que hace la operacion de cambiar el password
	public function forgotPassword(){
		$usuario = $_POST['usuario'];
		$correo = $_POST['correo'];
		$contrasennia = $_POST['password'];
		$password = hash("SHA256", $contrasennia);
		$res = Usuario::cambiarContrasennia($usuario,$correo,$password);
		//si se ejecuta corractamente xe devuele a iniciar secion
		//de lo contrario en la misma pagina con un mensaje
		if ($res) {
			header("location: index.php?controller=Usuario&action=iniciarsesion");
		}else{
			$status = "Cuenta no encontrada";
			require 'app/views/forgotPassword.php';
		}
	}
	//funcion que nos sirve para destruir la secion
	public function logout()
	{
		if (isset($_SESSION['sesion'])) {
			unset($_SESSION['sesion']);
			session_destroy();
		}
		//redireccionamos a la pagina de inicio de sesion
		header("location: index.php?controller=Usuario&action=iniciarsesion");
	}
}

//funcion para renombrar las fotos que se suban
function renameFoto(){
	//variable global
	$img = "";
	//comprobamos si existe el fichero
	if (file_exists($_FILES['foto']['tmp_name'])) {
		//obtenemos la extencion de la imagen
		$ext = explode(".", $_FILES['foto']['name']);
		//verificamos que sea igual a ina de las extenciones permitidas
		if ($_FILES['foto']['type'] == "image/jpg" || $_FILES['foto']['type'] == "image/jpeg" || $_FILES['foto']['type'] == "image/png") {
			//re nombramos concatenando el id del usuario
			//el tiempo en microsegundos y la extencion
			$img = $_POST['idusuario']."_".round(microtime(true)).".".end($ext);
			//movemos el archivo al directorio publico
			move_uploaded_file($_FILES['foto']['tmp_name'], "public/imagenes/imgperfil/".$img);
		}
	}
	//re tornamos el valor que se obtenga
	return $img;
}