<?php
require_once __DIR__ .'/../models/Repository.php';

class Pedido{
  private $id;
  private $login;
  private $status;
  
  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getLogin(){
    return $this->login;
  }

  public function setLogin($login){
    $this->login = $login;
  }

  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
    $this->status = $status;
  }

}

class PedidoRepository extends Repository{
    public function get_carrinho($login){


		$sql = 'SELECT ID_PEDIDO FROM PEDIDO 
        WHERE STATUS = 0 AND LOGIN_USUARIO = :login';
		
		$stmt = $this->conec->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
    if($stmt->rowCount() == 0){
      return $this->create_carrinho($login);
    }
    $row = $stmt->fetch();
    
		$pedido = new Pedido();
    $pedido->setId($row['ID_PEDIDO']);
    $pedido->setLogin($login);
    $pedido->setStatus(0);
    return $pedido;
		
	}

  public function create_carrinho($login){
    $sql = 'INSERT INTO PEDIDO(LOGIN_USUARIO, STATUS)
            VALUES (?, 0)';

    $stmt = $this->conec->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$login]);


    if (!$funcionou){
      throw new Exception("Erro ao criar carrinho");
    }

    return $this->get_carrinho($login);


  }

}
?>