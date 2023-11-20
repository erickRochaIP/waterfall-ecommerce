<?php 
session_start();

if(isset($_POST['class']) && isset($_POST['action'])){
    $class = $_POST['class'].'Controller';
    $action = $_POST['action'];

    try{
    require_once __DIR__ .'/controllers/'.$class.'.php';

    $controller = new $class();
    $controller->$action($_POST);
    } catch (Exception $e) {
        echo "Nao implementado: "." ".$class."->".$action;
    }
} else {
    require_once __DIR__.'/controllers/UsuarioController.php';

    $controller = new UsuarioController();
    $controller->openLogin($_POST);
}

?>