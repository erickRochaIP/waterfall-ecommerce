<?php

abstract class Controller{
    public function show_error($error_message){
        $_REQUEST['error'] = $error_message;
        require __DIR__ .'/../views/error.php';
    }

    public function show_success($success_message){
        $_REQUEST['success'] = $success_message;
        require __DIR__ .'/../views/success.php';
    }

    public function load_view($path){
        require __DIR__ .'/../views/'.$path;
    }

    public function load_model($path){
        require __DIR__ .'/../models/'.$path;
    }

    public function load_controller($class, $action, $post){
        require __DIR__ .'/../controllers/'.$class.'.php';

        $controller = new $class();
        $controller->$action($post);
    }
}
?>