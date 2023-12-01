<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Usuario.php';

class UsuarioController extends Controller{


	public function open_login($post){
		$this->load_view('usuario/login.php');
	}

	public function authenticate($post){
		try{
			$usuarioRepo = new UsuarioRepository();
			$usuario = $usuarioRepo->get_usuario($post['login'], $post['senha']);
			$_REQUEST['usuario'] = $usuario;
			
			$_SESSION['usuario'] = array();
			$_SESSION['usuario'][] = $usuario->get_login();
			$_SESSION['usuario'][] = $usuario->get_nome();
			$_SESSION['usuario'][] = $usuario->get_admin();

			$this->load_controller('ProdutoController', 'get_all_produtos', $post);
            //$this->load_view('usuario/login.php');
		}
		catch(Exception $e){
			$this->show_error($e->getMessage());
			$this->load_view('usuario/login.php');
		}
	}

	public function open_sign_up($post){
		$this->load_view('usuario/signUp.php');
	}

	public function authenticate_sign_up($post){
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

	public function logout($post){
		unset($_SESSION['usuario']);

		$this->load_view('usuario/login.php');
	}

	public function perfil($post){
		$this->load_view('usuario/perfil.php');
	}

	public function update_name($post){
		$usuarioRepo = new UsuarioRepository();
		$nome = $post['nome'];

		try{
			$log = $this->get_session_login();

			$usuario = $usuarioRepo->update_name($log, $nome);

			$_SESSION['usuario'] = array();
			$_SESSION['usuario'][] = $usuario->get_login();
			$_SESSION['usuario'][] = $usuario->get_nome();
			$_SESSION['usuario'][] = $usuario->get_admin();

			$this->show_success('Nome atualizado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('UsuarioController', 'perfil', $post);
	}

	public function delete_user($post){
		$usuarioRepo = new UsuarioRepository();

		try{
			$log = $this->get_session_login();

			$usuarioRepo->delete_user($log);
			$this->load_controller('UsuarioController', 'logout', $post);

		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
			$this->load_controller('UsuarioController', 'perfil', $post);
		}
	}
}
?>