<?php 
if(isset($_POST['class']) && isset($_POST['action'])){
    $class = $_POST['class'].'Controller';
    $action = $_POST['action'];

    require_once __DIR__ .'/controllers/'.$class.'.php';

    $controller = new $class();
    $controller->$action($_POST);
} else {
    require_once __DIR__.'/views/usuario/login.php';
}

?>