<?php
require_once __DIR__ .'/../models/Usuario.php';

class UsuarioController {
	public function get_all_usuarios($post){

		$usuarioRepo = new UsuarioRepository();
		$_REQUEST['usuarios'] = $usuarioRepo->get_all_usuarios();

		require_once __DIR__ .'/../views/usuario/index.php';
	}

	public function authenticate($post){
		$usuarioRepo = new UsuarioRepository();
		try{
			$_REQUEST['usuario'] = $usuarioRepo->get_usuario($post['login'], $post['senha']);
			echo "Login realizado com sucesso";	// TODO: chamar a view adequada
		}
		catch(Exception $e){
			echo $e->getMessage();	// TODO: tratar erro de autenticacao
			require_once __DIR__ .'/../views/usuario/login.php';
		}

	}
}
?>