<?php




class PedidoRepository(){
    private $conec;

    public function __construct(){
        require_once __DIR__.'/../database_connection.php';
        $this->conec = (new Database())->getConnection();
    }

    public function get_carrinho($login){


		$sql = 'SELECT * FROM PEDIDO JOIN ITEM_PEDIDO 
        ON PEDIDO.ID_PEDIDO = ITEM_PEDIDO.ID_PEDIDO 
        WHERE STATUS = 0 AND LOGIN = :login';
		
        

		
	}
}
?>