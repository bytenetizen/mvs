<?php

class UserController{

    static function index(){
        $content = Category::find();

        render('home',array(
            'title'		=> 'Welcome to our computer store',
            'content'	=> $content
        ));
    }

	public function handleRequest(){
		
		// Select all the categories:
		$content = Category::find();
		
		render('home',array(
			'title'		=> 'Welcome to our computer store',
			'content'	=> $content
		));
	}
}
