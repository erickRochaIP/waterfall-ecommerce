<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Produto.php';

class ProdutoController extends Controller{


	public function get_all_produtos($post){

		$produtoRepo = new ProdutoRepository();
		$_REQUEST['produtos'] = $produtoRepo->get_all_produtos();

		$this->load_view('produto/entry.php');
	}

	public function get_all_produtos_admin($post){
		$produtoRepo = new ProdutoRepository();
		$_REQUEST['produtos'] = $produtoRepo->get_all_produtos_admin();
		$this->load_view('admin/edit_produtos.php');

	}

	public function edit_produto($post){
		$produtoRepo = new ProdutoRepository();
		$preco = $post['preco'];
		$id = $post['id_produto'];

		try{
			$produtoRepo->update_peco($preco, $id);

			$this->show_success('Preço atualizado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_produtos_admin', $post);
	}


}
?>