<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Pedido.php';

class PedidoController extends Controller{


    public function add($post){
		$pedidoRepo = new PedidoRepository();
        
        try {
            $log = $this->get_session_login();
            $pedido = $pedidoRepo ->get_carrinho($log);
    
            //adc item
            $pedidoRepo->create_item_pedido($pedido->get_id(),$post["idProduto"],$post["quantidade"]); 
            
            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
            $this->load_controller('UsuarioController', 'open_login', $post);
            
        }
        
	}

    public function open_carrinho($post){
        $pedidoRepo = new PedidoRepository();

        try {
            $log = $this->get_session_login();
    
            $_REQUEST['itens_pedido'] = $pedidoRepo->get_all_itens_pedido($log);

            $this->load_view('pedido/carrinho.php');
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
            $this->load_controller('UsuarioController', 'open_login', $post);
            
        }
        
    }

    public function new_compra($post){
        $this->load_view('pedido/pagamento.php');
    }

    public function add_pagamento($post){
        //continuar 
    }
}
?>