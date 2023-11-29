<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Pedido.php';

class PedidoController extends Controller{


    public function add($post){
		$pedidoRepo = new PedidoRepository();
        
        try {
            
            if (!isset($_SESSION['usuario'])) {
                throw new Exception("Não credenciado.");
            }
            $log = $_SESSION['usuario'][1];
            $pedido = $pedidoRepo ->get_carrinho($log);
            
    
            //adc item
            $pedidoRepo->create_item_produto($pedido->getId(),$post["idProduto"],$post["quantidade"]); 
            
            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
            $this->load_controller('UsuarioController', 'openLogin', $post);
            
        }
        
	}

    public function open_carrinho($post){
        $pedidoRepo = new PedidoRepository();

        try {
            
            if (!isset($_SESSION['usuario'])) {
                throw new Exception("Não credenciado.");
            }
            $log = $_SESSION['usuario'][1];
    
            $_REQUEST['pedidos'] = $pedidoRepo->get_all_itens_produto($log);

            $this->load_view('pedido/carrinho.php');
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
            $this->load_controller('UsuarioController', 'openLogin', $post);
            
        }
        
    }

    public function newCompra($post){
        $this->load_view('pedido/pagamento.php');
    }

    public function adcPagamento($post){
        //continuar 
    }
}
?>