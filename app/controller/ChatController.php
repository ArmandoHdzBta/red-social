<?php
//añadimos los archis de conexion y el modelo
require 'app/models/Conexion.php';
require 'app/models/Chat.php';
//se usan las clases
use Model\Chat;
use Model\Conexion;

class ChatController
{
	//funcion para creat un mensaje
	public function crear()
	{
		$chat = new Chat();
		$chat->de = $_POST['de'];
		$chat->para = $_POST['para'];
		$chat->mensaje = $_POST['mensaje'];
		$chat->crearMensaje();
		require 'app/views/chat.php';
	}
	//funcion para mostar los mensajes
	public function todo()
	{
		$de = $_POST['de'];
		$para = $_POST['para'];
		echo json_encode(Chat::all($de,$para));
	}
	//funcion para borar un mensaje
	public function borrar()
	{
		$idmensaje = $_POST['idmensaje'];
		Chat::borrarMensaje($idmensaje);
	}
}