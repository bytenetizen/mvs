<?php

require_once 'includes/config.php';
require_once 'includes/connect.php';
require_once 'includes/helpers.php';
require_once 'includes/models/user.model.php';
require_once 'includes/controllers/home.controller.php';
require_once 'includes/controllers/register.controller.php';
require_once 'includes/controllers/login.controller.php';
require_once 'includes/controllers/ajaxRegister.controller.php';
require_once 'includes/controllers/user.controller.php';
require_once 'includes/resources/lang/'.$LANG.'/messages.php';

header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header('Last-Modified: '.gmdate("D, d M Y H:i:s",time()).' GMT');
header('Expires: '.gmdate("D, d M Y H:i:s",time()+3600).' GMT');

