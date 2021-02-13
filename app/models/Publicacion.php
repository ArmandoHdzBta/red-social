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
		$sql = "INSERT INTO usuario_post(id_usuario,texto) VALUES (?,?)";
		//se prepara la consulta parametros(conexion, consulta)
		$pre = mysqli_prepare($this->con,$sql);
		//ponemos los tipos de dato (s=string(varchar)) y se pasan los parametros como se pusieron en la consulta
		$pre->bind_param('is',$this->id_usuario,$this->texto);
		//ejecutamos la consulta
		$pre->execute();

	}
	//funcion que nos muestra todos los post del usuario
	static function all(){
	    //sentencia sql
	    $sql = new Conexion();
	    //
	    $pre = mysqli_prepare($sql->con, "SELECT * FROM usuarios");
	    //
	    $pre->execute();
	    //
	    $res = $pre->get_result();
	    //
	    while ($y=mysqli_fetch_assoc($res)){
	        $t[]=$y;
        }
        //retorna valor de t
         return $t;
    }

    static function eliminar($dato){
        //sentencia sql
     $sql = Conexion();
     //se prepara la consulta parametros(conexion, consulta)
     $pre = mysqli_prepare($sql->con, "DELETE FROM usuarios WHERE cod_usuario =?");
     //se prepara los parametros
     $pre->bind_param("s", $dato);
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

}