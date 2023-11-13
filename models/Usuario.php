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

	public function get_usuario($login, $senha){
		$sql = 'SELECT LOGIN FROM USUARIO WHERE LOGIN= :login and SENHA= :senha';
		$stmt = $this->conec->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', $senha);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		if($stmt->rowCount() != 1){
			throw new Exception('USUARIO NA ENCONTRADO');
		}
	}

}

?>