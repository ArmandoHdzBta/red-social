<?php
//añadimos los archis de conexion y el modelo
require 'app/models/Conexion.php';
require 'app/models/Publicacion.php';
//se usan las clases
use Model\Publicacion;
use Model\Conexion;

class PublicacionController
{
	//funcion para registrar la publicacion
	public function registrarPublicacion()
	{
		$publicacion = new Publicacion();
		$publicacion->id_usuario = $_POST['idusuario'];
		$publicacion->texto = $_POST['textoPost'];
		/*$publicacion->foto = $_POST['fotoPost'];*/
		$publicacion->create();
		require 'app/views/home.php';
	}
	//ver las publicaciones del usuario
	public function verUsuarioPost()
	{
		Publicacion::verPost();
	}
}