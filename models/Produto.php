<?php

class Produto {
	private $id_produto;
	private $nome;
    private $nome_categoria;
    private $descricao;
    private $preco;
    private $informacao;

    
    public function get_idproduto() {
        return $this->id_produto;
    }
    public function get_nome(){
        return $this->nome;
    }

    public function get_nome_categoria(){
        return $this->nome_categoria;
    }

    public function get_descricao(){
        return $this->descricao;
    }

    public function get_preco(){
        return $this->preco;
    }

    public function informacao(){
        return $this->informacao;
    }

    public function set_idproduto($id_produto){
        $this->id_produto = $id_produto;
    }

    public function set_nome($nome){
        $this->nome = $nome;
    }

    public function set_nome_categoria($categoria){
        $this->categoria = $categoria;
    }

    public function set_descricao($descricao){
        $this->descricao = $descricao;
    }

    public function set_preco($preco){
        $this->preco = $preco;
    }

    public function set_informacao($informacao){
        $this->informacao = $informacao;
    }
}

class ProdutoRepository {

    private $conec;

    public function __construct(){
        require_once __DIR__.'/../database_connection.php';
        $this->conec = (new Database())->getConnection();
    }

	public function get_all_produtos(){
		$sql = 'SELECT PRODUTO.ID_PRODUTO, PRODUTO.NOME, PRODUTO.DESCRICAO, PRODUTO.PRECO, 
        PRODUTO.NOME_CATEGORIA
         FROM PRODUTO';
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		$produtos = array();
		while ($row = $stmt->fetch()){
            
			$produto = new Produto();
			$produto->set_idproduto($row['ID_PRODUTO']);
			$produto->set_nome($row['NOME']);
            $produto->set_descricao($row['DESCRICAO']);
            $produto->set_preco($row['PRECO']);
            $produto->set_nome_categoria($row['NOME_CATEGORIA']);
            #$produto->setnformacao($row['I.TITULO', $row['CORPO']]);

			$produtos[] = $produto;
		}

		return $produtos;
	}
    

}

?>