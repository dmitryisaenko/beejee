<?php

spl_autoload_register('my_autoloader');

function my_autoloader($class){
    $path = strtr($class, '\\', '/') . 'Class.php';
		
    if(file_exists($path))
        include_once($path);
    else
        die("$class - not found");
}
