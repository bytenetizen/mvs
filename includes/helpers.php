<?php

function render($template,$vars = array()){

	extract($vars);

	if(is_array($template)){

		foreach($template as $k){

			$cl = strtolower(get_class($k));
			$$cl = $k;

			include "views/_$cl.php";
		}

	}
	else {
		include "views/$template.php";
	}
}

function formatTitle($title = ''){
	if($title){
		$title.= ' | ';
	}

	$title .= $GLOBALS['APP_TITLE'];

	return $title;
}

function validatorStr($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');
    $data = preg_replace('/[^A-Za-zА-Яа-я]+/u', '', $data);
    if(strlen($data)>=3) return false;
    return true;
}

function validatorEmail($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');
    if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $data)) return false;
    return true;
}
function validatorPass($data_start){
    $data = trim($data_start);
    $data = stripslashes($data);
    $data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');
    $data = preg_replace('/[^A-Za-zА-Яа-я0-9]+/u', '', $data);
    if(strlen($data)>=6 || $data != $data_start) return false;
    return true;
}