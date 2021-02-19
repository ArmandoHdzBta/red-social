<?php

namespace Model;

class Conexion
{
	//varibale publica para poder ocuparla en cualquier lado
	public $con;

	public function __construct()
	{
		$host = "localhost";
		$usuario = "root";
		$contrasenia = "";
		$base = "red_social";
		$this->con = mysqli_connect($host, $usuario, $contrasenia, $base);
		mysqli_query($this->con,"SET NAMES utf8");
	}
}