<?php

@session_start();
$PHPSESSID = session_id();
$LangArray = array('ru', 'en');
$DefaultLang = 'en';

if(@$_SESSION['user_lang']) {
    if(!in_array($_SESSION['user_lang'], $LangArray)) {
        $_SESSION['user_lang'] = $DefaultLang;
    }
}
else {
    $_SESSION['user_lang'] = $DefaultLang;
}
$language = addslashes($_GET['lang']);
if($language) {
    if(!in_array($language, $LangArray)) {
        $_SESSION['user_lang'] = $DefaultLang;
    }
    else {
        $_SESSION['user_lang'] = $language;
    }
}
$LANG = addslashes($_SESSION['user_lang']);
require_once 'includes/main.php';

try {
    $url = reset(explode('?', $_SERVER["REQUEST_URI"]));
    $requestedUrl = urldecode(rtrim($url, '/'));

    switch ($requestedUrl){
        case '':
            $c = new HomeController();
            break;
        case '/login':
            $c = new LoginController();
            break;
        case '/logout':
            unset($_SESSION["user_login"]);
            $c = new HomeController();
            break;
        case '/register':
            $c = new RegisterController();
            break;
        case '/register/ajax':
            $c = new AjaxRegisterController();
            break;
        case '/cabinet':
            $c = new RegisterController();
            break;
        default:
            break;
    }
    if(!empty($c)){
        $c->handleRequest();
    }else{
        render('error',array(
            'Lang'	=> $GLOBALS['Lang']
        ));
    }
}
catch(Exception $e) {
	render('error',array('message'=>$e->getMessage()));
}
