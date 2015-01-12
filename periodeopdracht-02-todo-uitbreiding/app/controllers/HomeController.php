<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$title = 'Home';
		return View::make('home.index')->with('title',$title);
	}
	public function getRegistreer()
	{
		$title = 'Registreer';
		return View::make('home.registreer')->with('title',$title);
	}
	public function getLogin()
	{
		$title = 'login';
		return View::make('home.login')->with('title',$title);
	}

}
