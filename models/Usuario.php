<?php

class Usuario {
	private $login;
	private $nome;

	public function getLogin(){
		return $this->login;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
}

class UsuarioRepository {

    private $conec;

    public function __construct(){
        require __DIR__.'/../database_connection.php';
        $this->conec = (new Database())->getConnection();
    }

	public function get_all_usuarios(){
		$sql = 'SELECT LOGIN, NOME FROM USUARIO';
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		$usuarios = array();
		while ($row = $stmt->fetch()){
			$usuario = new Usuario();
			$usuario->setLogin($row['LOGIN']);
			$usuario->setNome($row['NOME']);

			$usuarios[] = $usuario;
		}

		return $usuarios;
	}
}

?>