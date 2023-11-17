<?php
require_once __DIR__ .'/../models/Produto.php';

class ProdutoController {


	public function get_all_produtos($post){

		$produtoRepo = new ProdutoRepository();
		$_REQUEST['produtos'] = $produtoRepo->get_all_produtos();

		require_once __DIR__ .'/../views/produto/entry.php';
	}
}
?>