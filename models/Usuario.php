<?php
require_once __DIR__ .'/../models/Repository.php';

class Usuario {
	private $login;
	private $nome;
	private $admin;

	public function get_login(){
		return $this->login;
	}

	public function get_nome(){
		return $this->nome;
	}

	public function set_login($login){
		$this->login = $login;
	}

	public function set_nome($nome){
		$this->nome = $nome;
	}

	public function set_admin($admin){
		$this->admin = $admin;
	}

	public function get_admin(){
		if($this->admin == 1){
			return true;
		}
		return false;
	}
}

class UsuarioRepository extends Repository{

	public function get_all_usuarios(){
		$sql = 'SELECT LOGIN, NOME FROM USUARIO';
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		$usuarios = array();
		while ($row = $stmt->fetch()){
			$usuario = new Usuario();
			$usuario->set_login($row['LOGIN']);
			$usuario->set_nome($row['NOME']);

			$usuarios[] = $usuario;
		}

		return $usuarios;
	}

	public function get_usuario($login, $senha){
		$sql = 'SELECT LOGIN, NOME, ADMIN FROM USUARIO WHERE LOGIN= :login and SENHA= :senha';
		$stmt = $this->conec->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', $senha);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		if($stmt->rowCount() != 1){
			throw new Exception('USUARIO NA ENCONTRADO');
		}

		$row = $stmt->fetch();

		$usuario = new Usuario();
		$usuario->set_login($row['LOGIN']);
		$usuario->set_nome($row['NOME']);
		$usuario->set_admin($row['ADMIN']);

		return $usuario;
	}

	public function create_usuario($login, $senha, $nome){
		$sql = 'INSERT INTO USUARIO(LOGIN, SENHA, NOME, ADMIN)
		VALUES(?,?,?,0)';
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$login, $senha, $nome]);

		if (!$funcionou){
			throw new Exception("Erro ao cadastrar usuario");
		}

		return $this->get_usuario($login, $senha);
	}

	public function check_login_usuario($login){
		$sql = 'SELECT LOGIN FROM USUARIO WHERE LOGIN= :login';
		$stmt = $this->conec->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		return ($stmt->rowCount() != 0);
	}
}

?>