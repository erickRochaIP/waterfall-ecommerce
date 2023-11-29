<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Produto.php';

class ProdutoController extends Controller{


	public function get_all_produtos($post){

		$produtoRepo = new ProdutoRepository();
		$_REQUEST['produtos'] = $produtoRepo->get_all_produtos();

		$this->load_view('produto/entry.php');
	}


}
?>