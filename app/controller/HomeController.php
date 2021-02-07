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
	public function error()
	{
		require 'app/views/error.html';
	}
}