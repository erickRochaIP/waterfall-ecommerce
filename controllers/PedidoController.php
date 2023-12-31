<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Pedido.php';

class PedidoController extends Controller{


    public function add($post){
		$pedidoRepo = new PedidoRepository();
        
        try {
            $log = $this->get_session_login();
            $pedido = $pedidoRepo->get_carrinho($log);
    
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

    public function exclude_carrinho($post){
        $pedidoRepo = new PedidoRepository();

        try {
            $log = $this->get_session_login();
    
            $pedidoRepo->exclude_carrinho($log);

            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
            
        }
    }

    // Esses metodos ficam aqui? E a PagamentoController?
    public function new_compra($post){
        $this->load_view('pedido/pagamento.php');
    }

    public function add_pagamento($post){
        try{
            $endereco = $post['endereco'];
            $tipo_pagamento = $post['tipo_pagamento'];
            $vezes = $tipo_pagamento == "credito" ? $post['vezes'] : 1;
            if ($tipo_pagamento != "credito" && $tipo_pagamento != "debito") {
                throw new Exception("Erro no tipo de pagamento");
            }

            $pedidoRepo = new PedidoRepository();
            $log = $this->get_session_login();
    
            $total = $pedidoRepo->get_total_carrinho($log);

            $valor_pagamento = $total/$vezes;

            for ($i = 0; $i < $vezes; $i++){
                $pedidoRepo->create_pagamento($log, $endereco, $tipo_pagamento, $valor_pagamento);
            }

            $pedidoRepo->set_carrinho_pago($log);

            // carregar alguma view
            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
            
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());

            // carregar alguma view
            $this->load_controller('ProdutoController', 'get_all_produtos', $post);
        }


    }


    public function open_pedidos($post){
        $pedidoRepo = new PedidoRepository();

        try {
            $log = $this->get_session_login();
            $filtro = isset($post['filtro']) ? $post['filtro'] : null ;
            $_REQUEST['pedidos'] = $pedidoRepo->get_pedidos_pagos($log,$filtro);
            
            $this->load_view('pedido/meus_pedidos.php');
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());

        }
    } 

    public function get_all_pagamentos_admin($post){
        $pedidoRepo = new PedidoRepository();

        try {
            $_REQUEST['pagamentos'] = $pedidoRepo->get_all_pagamentos_admin();
            
            $this->load_view('admin/edit_pagamento.php');
        }
        catch(Exception $e){
            $this->show_error($e->getMessage());
        }

    }

    public function edit_pagamento($post){
        $pedidoRepo = new PedidoRepository();
		$endereco = $post['endereco'];
		$codigo = $post['codigo'];

		try{
			$pedidoRepo->update_pagamento($codigo, $endereco);

			$this->show_success('Pagamento atualizado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('PedidoController', 'get_all_pagamentos_admin', $post);
    }

    public function delete_pagamento($post){
        $pedidoRepo = new PedidoRepository();
		$codigo = $post['codigo'];

		try{
			$pedidoRepo->delete_pagamento($codigo);

			$this->show_success('Pagamento deletado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('PedidoController', 'get_all_pagamentos_admin', $post);
    }

    public function edit_item_pedido($post){
        $pedidoRepo = new PedidoRepository();
		$quantidade = $post['quantidade'];
		$id_pedido = $post['id_pedido'];
        $id_produto = $post['id_produto'];

		try{
			$pedidoRepo->update_item_pedido($id_pedido, $id_produto, $quantidade);

			$this->show_success('Item atualizado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('PedidoController', 'open_carrinho', $post);
    }

    public function delete_item_pedido($post){
        $pedidoRepo = new PedidoRepository();
		$id_pedido = $post['id_pedido'];
        $id_produto = $post['id_produto'];

		try{
			$pedidoRepo->delete_item_pedido($id_pedido, $id_produto);

			$this->show_success('Item deletado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('PedidoController', 'open_carrinho', $post);
    }
}
?>