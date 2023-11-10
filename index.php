<?php 
require_once __DIR__.'/controllers/UsuarioController.php';
$controller = new UsuarioController();
$controller->get_all_usuarios(0);
?>