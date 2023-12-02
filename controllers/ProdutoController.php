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

	public function get_all_informacoes_admin($post){
		$produtoRepo = new ProdutoRepository();
		$_REQUEST['informacoes'] = $produtoRepo->get_all_informacoes_admin();
		$this->load_view('admin/edit_informacao.php');

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

	public function delete_produto($post){
		$produtoRepo = new ProdutoRepository();
		$id = $post['id_produto'];

		try{
			$produtoRepo->delete_produto($id);

			$this->show_success('Produto deletado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_produtos_admin', $post);
	}

	public function create_produto($post){
		$produtoRepo = new ProdutoRepository();
		$nome = $post['nome'];
		$categoria = $post['categoria'];
		$descricao = $post['descricao'];
		$preco = $post['preco'];

		try{
			$id = $produtoRepo->create_produto($nome, $categoria, $descricao, $preco);

			if (isset($_FILES['img'])){
				$info = pathinfo($_FILES['img']['name']);
				$ext = $info['extension'];
				if ($ext == "png"){
					$newname = $id.'.'.$ext;
	
					$target = __DIR__.'/../pictures/'.$newname;
					move_uploaded_file($_FILES['img']['tmp_name'], $target);
				}
				
			}

		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_produtos_admin', $post);
	}


	public function create_informacao($post){
		$produtoRepo = new ProdutoRepository();
		$id = $post['id_produto'];
		$titulo = $post['titulo'];
		$corpo = $post['corpo'];
		

		try{
			$produtoRepo->create_informacao($id, $titulo, $corpo);
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_informacoes_admin', $post);
	}

	public function delete_informacao($post){
		$produtoRepo = new ProdutoRepository();
		$id = $post['id_produto'];
		$titulo = $post['titulo'];

		try{
			$produtoRepo->delete_informacao($id,$titulo);

			$this->show_success('Informação deletado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_informacoes_admin', $post);
	}


	public function edit_informacao($post){
		$produtoRepo = new ProdutoRepository();
		$corpo = $post['corpo'];
		$id = $post['id_produto'];
		$titulo = $post['titulo'];

		try{
			$produtoRepo->update_informacao($id,$titulo,$corpo);

			$this->show_success('Preço atualizado com sucesso!');
		}
		catch (Exception $e){
			$this->show_error($e->getMessage());
		}

		$this->load_controller('ProdutoController', 'get_all_informacoes_admin', $post);
	}


}
?>