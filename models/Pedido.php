<?php
require_once __DIR__ .'/../models/Repository.php';



class PedidoRepository extends Repository{
    public function get_carrinho($login){


		$sql = 'SELECT * FROM PEDIDO JOIN ITEM_PEDIDO 
        ON PEDIDO.ID_PEDIDO = ITEM_PEDIDO.ID_PEDIDO 
        WHERE STATUS = 0 AND LOGIN = :login';
		
        

		
	}
}
?>