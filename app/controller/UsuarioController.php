<?php
//ser requiere al archivo del usuario
require 'app/models/Usuario.php';

use Model\Usuario;

class UsuarioController
{

	//funcion singin para tomar los datos escritos en el formulario de la vista home.php
	public function singin()
	{
		//se crea el objeto usuario
		$usuario = new Ususrio();
		//se accede a cada atributo de la clase y se le asigna el valor del formulario
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