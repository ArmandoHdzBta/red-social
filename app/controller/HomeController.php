<?php

/**
 *
 */
class HomeController
{

	public function index()
	{
		require 'app/views/home.php';
	}
	//fincion para saber regresar cuando no re encuentre un apgina
	public function error()
	{
		require 'app/views/error.html';
	}
}