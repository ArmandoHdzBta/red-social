<?php

namespace Model;

class Chat extends Conexion
{
	public $de;
	public $para;
	public $mensaje;

	function __construct()
	{
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}

	public function create()
	{
		$sql = "SELECT * FROM conversasion WHERE id_usuario_by = ? OR id_usuario_from = ?";
		$pre = mysqli_prepare($this->con,$sql);
		$pre->bind_param('ii',$this->de,$this->para);
		$res = $pre->execute();
		$obj = $pre->get_result();
		if ($res) {
			$sql = "INSERT INTO conversasion (id_mensaje, id_usuario_by, id_usuario_from) VALUES (?,?,?)";
			$pre = mysqli_prepare($this->con,$sql);
			$pre->bind_param('iii',$obj->idmensaje ,$this->de,$this->para);
			$res = $pre->execute();
		}else{
			#
		}
	}
}