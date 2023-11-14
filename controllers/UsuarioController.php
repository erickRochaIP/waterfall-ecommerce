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

	public function openSignUp($post){
		require_once __DIR__ .'/../views/usuario/signUp.php';
	}

	public function authenticateSignUp($post){
		$usuarioRepo = new UsuarioRepository();
		//não obter nenhum login ja cadastrado
		$exists = $usuarioRepo->check_login_usuario($post['login']);
		//a senha do campo nova senha e confirma devem ser iguais 
		if($exists){
			require_once __DIR__ .'/../views/usuario/signUp.php';
			
		}
		//se for verdadeiro, novo usuario e cadastrado	
		else if($post['senha'] == $post['senha_confirma']){
			$usuario = $usuarioRepo->create_usuario($post['login'], 
				$post['senha'], $post['nome']);

			if($usuario != null){
				echo 'cadastrado com sucesso';
			}
				//testar se é admin ou não
				// se nao for adminentrar na tela principal de compras
				//se for admin entrar na tela de admin

		}
		else{
			require_once __DIR__ .'/../views/usuario/signUp.php';
		}

	}
}
?>