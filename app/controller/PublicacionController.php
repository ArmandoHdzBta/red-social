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
		//se manda a llamar la funcion que renombra
		$publicacion->foto = renameFoto();
		$publicacion->create();
		require 'app/views/home.php';
	}
	//ver las publicaciones del usuario
	public function verPost()
	{
		$idusuario = $_POST['idusuario'];
		echo json_encode(Publicacion::all($idusuario));
	}
	public function like()
	{
		$idpost = $_POST['idpost'];
		$idusuario = $_POST['idusuario'];
		Publicacion::darLike($idpost,$idusuario);
	}
}
//funcion para renombrar las fotos que se suban
function renameFoto(){
	//variable global
	$img = "";
	//comprobamos si existe el fichero
	if (file_exists($_FILES['fotoPost']['tmp_name'])) {
		//obtenemos la extencion de la imagen
		$ext = explode(".", $_FILES['fotoPost']['name']);
		//verificamos que sea igual a ina de las extenciones permitidas
		if ($_FILES['fotoPost']['type'] == "image/jpg" || $_FILES['fotoPost']['type'] == "image/jpeg" || $_FILES['fotoPost']['type'] == "image/png") {
			//re nombramos concatenando el id del usuario
			//el tiempo en microsegundos y la extencion
			$img = $_POST['idusuario']."_".round(microtime(true)).".".end($ext);
			//movemos el archivo al directorio publico
			move_uploaded_file($_FILES['fotoPost']['tmp_name'], "public/imagenes/imgpublicacion/".$img);
		}
	}
	//re tornamos el valor que se obtenga
	return $img;
}