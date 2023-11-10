<?php
require_once __DIR__ .'/../models/Usuario.php';

class UsuarioController {
	public function get_all_usuarios($post){

		$usuarioRepo = new UsuarioRepository();
		$_REQUEST['usuarios'] = $usuarioRepo->get_all_usuarios();

		require_once __DIR__ .'/../views/usuario/index.php';
	}
}
?>