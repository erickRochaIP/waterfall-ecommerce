<?php
require_once __DIR__ .'/../models/Repository.php';
require_once __DIR__ .'/../models/Produto.php';

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

class ItemPedido{
  private $id_pedido;
  private $id_produto;
  private $quantidade;

  private $produto;

  public function getIdpedido(){
    return $this->id_pedido;
  }

  public function setIdpedido($id_pedido){
    $this->id_pedido = $id_pedido;
  }

  public function getIdproduto(){
    return $this->id_produto;
  }

  public function setIdproduto($id_produto){
    $this->id_produto = $id_produto;
  }

  public function getQuantidade(){
    return $this->quantidade;
  }

  public function setQuantidade($quantidade){
    $this->quantidade = $quantidade;
  }

  public function getProduto(){
    return $this->produto;
  }

  public function setProduto($produto){
    $this->produto = $produto;
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

  public function create_item_produto($idPedido, $idProduto, $quantidade){
    $sql = 'INSERT INTO ITEM_PEDIDO(ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
            VALUES (?, ?, ?)';

    $stmt = $this->conec->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$idPedido, $idProduto, $quantidade]);


    if (!$funcionou){
      throw new Exception('Problemas ao adicionar item');
    }
  }

  public function get_all_itens_produto($login){
    $carrinho = $this->get_carrinho($login);

    $id = $carrinho->getId();

    $sql = 'SELECT I.ID_PEDIDO, I.ID_PRODUTO, I.QUANTIDADE, P.NOME  FROM ITEM_PEDIDO I
            JOIN PRODUTO P ON P.ID_PRODUTO = I.ID_PRODUTO
            WHERE I.ID_PEDIDO = :id';

    $stmt = $this->conec->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $itens_pedido = array();
		while ($row = $stmt->fetch()){

      $produto = new Produto();
  
      $produto->set_id_produto($row['ID_PRODUTO']);
      $produto->set_nome($row['NOME']);
          
      $item_pedido = new ItemPedido();
      
      $item_pedido->setProduto($produto);
      $item_pedido->setQuantidade($row['QUANTIDADE']);
      $item_pedido->setIdpedido($row['ID_PEDIDO']);
      
      $itens_pedido[] = $item_pedido;
		}

		return $itens_pedido;

  }

}
?>