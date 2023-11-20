<?php
require_once __DIR__ .'/../controllers/Controller.php';

class SessionController extends Controller{
    public function authenticate($post){
		try{
            $this->load_model('Usuario.php');
			$usuarioRepo = new UsuarioRepository();
			$usuario = $usuarioRepo->get_usuario($post['login'], $post['senha']);
			$_REQUEST['usuario'] = $usuario;
			
			$_SESSION['usuario'] = array();
			$_SESSION['usuario'][] = $usuario->getLogin();
			$_SESSION['usuario'][] = $usuario->getNome();

			//$this->load_controller('ProdutoController', 'get_all_produtos', $post);
            $this->load_view('usuario/login.php');
		}
		catch(Exception $e){
			$this->show_error($e->getMessage());
			$this->load_view('usuario/login.php');
		}
	}

    public function logout($post){
		unset($_SESSION['usuario']);

		$this->load_view('usuario/login.php');
	}

}

    
    
?>