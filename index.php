<?php 
require_once __DIR__.'/controllers/UsuarioController.php';
$controller = new UsuarioController();
$controller->login(0);
?>