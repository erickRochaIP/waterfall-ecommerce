<?php
require_once __DIR__ .'/../models/Repository.php';
require_once __DIR__ .'/../models/Produto.php';
require_once __DIR__ .'/../models/Pagamento.php';

class Pedido{
  private $id;
  private $login;
  private $status;
  private $pagamentos;

  public function __construct(){
    $this->pagamentos = array();
  }
  
  public function get_id(){
    return $this->id;
  }

  public function set_id($id){
    $this->id = $id;
  }

  public function get_login(){
    return $this->login;
  }

  public function set_login($login){
    $this->login = $login;
  }

  public function get_status(){
    return $this->status;
  }

  public function set_status($status){
    $this->status = $status;
  }

  public function add_pagamento($pagamento){
    $this->pagamentos[] = $pagamento;
  }

  public function get_pagamentos(){
    return $this->pagamentos;
  }

}

class ItemPedido{
  private $id_pedido;
  private $id_produto;
  private $quantidade;

  private $produto;

  public function get_id_pedido(){
    return $this->id_pedido;
  }

  public function set_id_pedido($id_pedido){
    $this->id_pedido = $id_pedido;
  }

  public function get_id_produto(){
    return $this->id_produto;
  }

  public function set_id_produto($id_produto){
    $this->id_produto = $id_produto;
  }

  public function get_quantidade(){
    return $this->quantidade;
  }

  public function set_quantidade($quantidade){
    $this->quantidade = $quantidade;
  }

  public function get_produto(){
    return $this->produto;
  }

  public function set_produto($produto){
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
    $pedido->set_id($row['ID_PEDIDO']);
    $pedido->set_login($login);
    $pedido->set_status(0);
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

  public function exclude_carrinho($login){
    $sql = 'DELETE FROM PEDIDO WHERE STATUS = 0 AND LOGIN_USUARIO = :login';
    $stmt = $this->conec->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute();

    if (!$funcionou){
      throw new Exception("Erro ao excluir carrinho");
    }

  }

  public function create_item_pedido($idPedido, $idProduto, $quantidade){
    $sql = 'INSERT INTO ITEM_PEDIDO(ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
            VALUES (?, ?, ?)';

    $stmt = $this->conec->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$idPedido, $idProduto, $quantidade]);


    if (!$funcionou){
      throw new Exception('Problemas ao adicionar item');
    }
  }

  public function get_all_itens_pedido($login){
    $carrinho = $this->get_carrinho($login);

    $id = $carrinho->get_id();

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
      
      $item_pedido->set_produto($produto);
      $item_pedido->set_quantidade($row['QUANTIDADE']);
      $item_pedido->set_id_pedido($row['ID_PEDIDO']);
      
      $itens_pedido[] = $item_pedido;
		}

		return $itens_pedido;

  }

  public function get_total_carrinho($login){
    $carrinho = $this->get_carrinho($login);

    $id = $carrinho->get_id();

    $sql = 'SELECT SUM(I.QUANTIDADE * P.PRECO) AS TOTAL FROM ITEM_PEDIDO I 
    JOIN PRODUTO P ON P.ID_PRODUTO = I.ID_PRODUTO WHERE I.ID_PEDIDO = :id';

    $stmt = $this->conec->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $row = $stmt->fetch();

    return $row['TOTAL'];
    
  }


  // O lugar desse metodo e aqui?
  public function create_pagamento($login, $endereco, $tipo_pagamento, $total){
    // Onde deve estar essa logica?
    $tipo_pagamento = $tipo_pagamento == "credito" ? 1 : 0;

    $carrinho = $this->get_carrinho($login);

    $id = $carrinho->get_id();

    $sql = 'INSERT INTO PAGAMENTO(TIPO, ENDERECO, ID_PEDIDO, TOTAL)
            VALUES (?, ?, ?, ?)';

    $stmt = $this->conec->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$tipo_pagamento, $endereco, $id, $total]);


    if (!$funcionou){
      throw new Exception('Problemas ao criar pagamento');
    }
  }

  public function set_carrinho_pago($login){
    $carrinho = $this->get_carrinho($login);

    $id = $carrinho->get_id();

    $sql = 'UPDATE PEDIDO SET STATUS = 1 WHERE ID_PEDIDO=?';

    $stmt = $this->conec->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$id]);

    if (!$funcionou){
      throw new Exception('Problemas ao mudar status do carrinho');
    }
  }

  public function get_pedidos_pagos($login, $filtro = null){
      if($filtro == null){

        $sql = 'SELECT PE.ID_PEDIDO, PE.STATUS, PA.CODIGO, PA.ENDERECO, PA.TOTAL, PA.TIPO FROM PEDIDO PE
        JOIN PAGAMENTO PA ON PE.ID_PEDIDO = PA.ID_PEDIDO 
        WHERE PE.LOGIN_USUARIO = :login AND PE.STATUS <> 0';

        $stmt = $this->conec->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':login', $login);
        $stmt->execute();

        
        $id_pedido = -1;

        $pedidos = array();
        $pagamentos = array();
        while ($row = $stmt->fetch()){
                if ($row['ID_PEDIDO'] != $id_pedido){
                    $id_pedido = $row['ID_PEDIDO'];
    
                    $pedido = new Pedido();
                
                    $pedido->set_id($row['ID_PEDIDO']);
                    $pedido->set_status($row['STATUS']);
                    
                    $pedidos[] = $pedido;
                }
                $pagamento = new Pagamento();
                
                $pagamento->set_codigo($row['CODIGO']);
                $pagamento->set_endereco($row['ENDERECO']);
                $pagamento->set_total($row['TOTAL']);
                $pagamento->set_tipo($row['TIPO']);
    
                $pedido->add_pagamento($pagamento);
        }
    
        return $pedidos;
        
      }
      else {
        
        $sql = 'SELECT  PE.ID_PEDIDO, PE.STATUS, PA.CODIGO, PA.ENDERECO, PA.TOTAL, PA.TIPO FROM PEDIDO PE
                JOIN PAGAMENTO PA ON PE.ID_PEDIDO = PA.ID_PEDIDO
                WHERE PE.ID_PEDIDO IN(
                SELECT  PA.ID_PEDIDO
              FROM PAGAMENTO PA JOIN PEDIDO PE 
              ON PA.ID_PEDIDO=PE.ID_PEDIDO 
              WHERE PE.LOGIN_USUARIO = :login AND PE.STATUS <> 0
              GROUP BY(PA.ID_PEDIDO)
              HAVING SUM(PA.TOTAL)> :filtro)';


        $stmt = $this->conec->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':filtro', $filtro);
        $stmt->bindValue(':login', $login);
        $stmt->execute();

        
        $id_pedido = -1;

        $pedidos = array();
        $pagamentos = array();
        while ($row = $stmt->fetch()){
                if ($row['ID_PEDIDO'] != $id_pedido){
                    $id_pedido = $row['ID_PEDIDO'];
    
                    $pedido = new Pedido();
                
                    $pedido->set_id($row['ID_PEDIDO']);
                    $pedido->set_status($row['STATUS']);
                    
                    $pedidos[] = $pedido;
                }
                $pagamento = new Pagamento();
                
                $pagamento->set_codigo($row['CODIGO']);
                $pagamento->set_endereco($row['ENDERECO']);
                $pagamento->set_total($row['TOTAL']);
                $pagamento->set_tipo($row['TIPO']);
    
                $pedido->add_pagamento($pagamento);
        }
    
        return $pedidos;
        
      }
  }

  public function get_all_pagamentos_admin(){
    $sql = 'SELECT CODIGO, ENDERECO, ID_PEDIDO, TIPO, TOTAL 
          FROM PAGAMENTO';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		$pagamentos = array();
		while ($row = $stmt->fetch()){
                $pagamento = new Pagamento();
            
                $pagamento->set_codigo($row['CODIGO']);
                $pagamento->set_endereco($row['ENDERECO']);
                $pagamento->set_id_pedido($row['ID_PEDIDO']);
                $pagamento->set_tipo($row['TIPO']);
                $pagamento->set_total($row['TOTAL']);
                $pagamentos[] = $pagamento;    
        }
        return $pagamentos;
  }

  public function update_pagamento($codigo, $endereco){
    $sql = 'UPDATE PAGAMENTO SET ENDERECO = ? WHERE CODIGO = ?';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$endereco, $codigo]);

		if (!$funcionou){
			throw new Exception('Problemas ao mudar o endereco');
		}
  }

  public function delete_pagamento($codigo){
    $sql = 'DELETE FROM PAGAMENTO WHERE CODIGO = ?';
    $stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $funcionou = $stmt->execute([$codigo]);

    if (!$funcionou){
      throw new Exception("Erro ao excluir pagamento");
    }
  }
}
?>