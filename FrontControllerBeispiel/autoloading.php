<?php
function autoload(string $className): void {
    // $className = 'UserController'
    $c = (substr($className, -10) == "Controller") ? 'controller/' : '';
    $path = './classes/' . $c . str_replace('\\', '/', $className) . '.php'; // "classes/User.php"
    //var_dump($path);
    if (file_exists($path)) {
        require_once $path;
    }
}
spl_autoload_register('autoload');
 
