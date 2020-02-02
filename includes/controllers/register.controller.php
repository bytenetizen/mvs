<?php

class RegisterController{

	public function handleRequest(){
		
        render('register',array(
            'Lang'	=> $GLOBALS['Lang']
        ));
    }
}
