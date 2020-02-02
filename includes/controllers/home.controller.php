<?php

class HomeController{

	public function handleRequest(){

        $user = '';

        if(!empty($_SESSION["user_login"]))  $user = $_SESSION["user_login"];
		render('home',array(
			'user'	=> $user,
			'Lang'	=> $GLOBALS['Lang']
		));
	}
}
