<?php
require 'app/models/Usuario.php';

use Model\Usuario;

class UsuarioController
{

	public function singin()
	{
		$usuario = new Ususrio();
		$usuario->nombre = $_POST['nombre'];
		$usuario->apellidoPaterno = $_POST['app'];
		$usuario->apellidoMaterno = $_POST['apm'];
		$usuario->usuario = $_POST['usuario'];
		$usuario->correo = $_POST['correo'];
		$usuario->contrasennia = $_POST['password'];
		$usuario->fotoPerfil = $_POST['foto'];
		$usuario->create();
	}
}