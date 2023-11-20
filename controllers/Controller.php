<?php

abstract class Controller{
    public function show_error($error_message){
        $_REQUEST['error'] = $error_message;
    }

    public function show_success($success_message){
        $_REQUEST['success'] = $success_message;
    }

    public function load_view($path){
        require __DIR__ .'/../views/templates/links.php';
        require __DIR__ .'/../views/templates/start_body.php';
        require __DIR__ .'/../views/templates/navbar.php';
        require __DIR__ .'/../views/templates/success.php';
        require __DIR__ .'/../views/templates/error.php';
        require __DIR__ .'/../views/'.$path;
        require __DIR__ .'/../views/templates/end_body.php';
    }

    public function load_model($path){
        require_once __DIR__ .'/../models/'.$path;
    }

    public function load_controller($class, $action, $post){
        require_once __DIR__ .'/../controllers/'.$class.'.php';

        $controller = new $class();
        $controller->$action($post);
    }
}
?>