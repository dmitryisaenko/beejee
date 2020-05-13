<?php
    ini_set('error_reporting', E_ALL);

    include_once('config.php');
	include_once('autoload.php');
    
    session_start();
    ob_start();
    
    $p = explode('/', $_GET['q']);
    $params = array();

    foreach($p as $one){
        if($one != '')
            $params[] = $one;
    }
    
    $c = '\\controllers\\';
    $c .= isset($params[0]) ? $params[0] : 'table';

	$action = isset($params[1]) ? $params[1] : 'action_start';

    $conrtroller = new $c();   
	$conrtroller->request($params, $action);
