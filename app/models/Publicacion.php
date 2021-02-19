<?php
//

namespace Model;
//clase Publicacion y extiende de la clase conexion
class Publicacion extends Conexion
{
	//declarar las variables que se van a ocupar
	public $id_usuario;
	public $texto;
	public $foto;
	//constructor de la calase
	function __construct(){
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcion registrat la publicacion en la base de datos
	public function create()
	{
		//sentencia sql y se declaran los parametros
		$sql = "INSERT INTO usuario_post(id_usuario,texto,foto) VALUES (?,?,?)";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('iss',$this->id_usuario,$this->texto,$this->foto);
		//ejecutamos la consulta
		$pre->execute();

	}
	//funcion que nos muestra todos los post del usuario
	static function all($idusuario){
	    //sentencia sql
	    $sql = new Conexion();
	    //
	    $pre = mysqli_prepare($sql->con, "SELECT usuario_post.idusuario_post, usuario_post.id_usuario, usuario_post.texto, usuario_post.foto, usuario.usuario FROM usuario INNER JOIN usuario_post ON usuario_post.id_usuario = usuario.idusuario WHERE usuario.idusuario = ?");
	    //
	    $pre->bind_param('i',$idusuario);
	    //
	    $pre->execute();
	    //
	    $res = $pre->get_result();
	    //
	    while ($y = mysqli_fetch_assoc($res)){
	        $t[] = $y;
        }
        //retorna valor de t
         return $t;
    }

    static function eliminar($dato){
        //sentencia sql
		$sql = Conexion();
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($sql->con, "DELETE FROM usuario_post WHERE idusuario_post = ?");
		//se prepara los parametros
		$pre->bind_param("i", $dato);
		//ejecutamos la consulta
		$pre->execute();

    }

     function update(){
	    // los tipos de dato
		$pre_ = mysqli_prepare($this->con,"UPDATE usuarios set nombre=? ,apellido_paterno=? ,apellido_materno=? ,usuario=? ,correo=? ,contrasennia=?");
		//ponemos los tipos de dato
		$pre_->bind_param("si",$this->nombre,$this->apellido_paterno,$this->apellido_materno,$this->usuario,$this->correo,$this->contrasennia);
		//ejecutamos la consulta
		$pre_->execute();
	}

	static function darLike($idpost,$idusuario)
	{
		$conexion = new Conexion();
		// los tipos de dato
		$pre_ = mysqli_prepare($conexion->con,"INSERT INTO usuario_post_reaction(id_usuario_post,id_usuario) VALUES (?,?)");
		//ponemos los tipos de dato
		$pre_->bind_param("ii",$idpost,$idusuario);
		//ejecutamos la consulta
		$pre_->execute();
	}

}