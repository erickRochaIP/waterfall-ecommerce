<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Usuario.php';

class UsuarioController extends Controller{

	public function authenticate($post){
		try{
			$usuarioRepo = new UsuarioRepository();
			$_REQUEST['usuario'] = $usuarioRepo->get_usuario($post['login'], $post['senha']);

			$this->load_controller('ProdutoController', 'get_all_produtos', $post);
		}
		catch(Exception $e){
			$this->show_error($e->getMessage());
			$this->load_view('usuario/login.php');
		}
	}

	public function openSignUp($post){
		$this->load_view('usuario/signUp.php');
	}

	public function authenticateSignUp($post){
		if($post['senha'] != $post['senha_confirma']){
			$this->show_error('Os dois campos de Senha devem ser iguais');
			$this->load_view('usuario/signUp.php');
			return;
		}

		try{
			$usuarioRepo = new UsuarioRepository();
			$usuario = $usuarioRepo->create_usuario($post['login'], 
				$post['senha'], $post['nome']);
				
			$this->show_success('Usuario cadastrado com sucesso');
			$this->load_view('usuario/login.php');
		}
		catch(Exception $e){
			$this->show_error($e->getMessage());
			$this->load_view('usuario/signUp.php');
			return;
		}
	}
}
?>