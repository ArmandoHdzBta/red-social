<?php
//añadimos los archis de conexion y el modelo
require 'app/models/Conexion.php';
require 'app/models/Chat.php';
//se usan las clases
use Model\Chat;
use Model\Conexion;

class ChatController
{
	public function crearChat()
	{
		$char = new Chat();

	}
}