<?php
require_once __DIR__ .'/../models/Repository.php';

class Produto {
	private $id_produto;
	private $nome;
    private $nome_categoria;
    private $descricao;
    private $preco;
    private $informacoes;

    public function __construct(){
        $this->informacoes = array();
    }

    
    public function get_id_produto() {
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

    public function get_informacoes(){
        return $this->informacoes;
    }

    public function set_id_produto($id_produto){
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

    public function add_informacao($informacao){
        $this->informacoes[] = $informacao;
    }

    public function possui_informacoes(){
        return !(empty($this->informacoes));
    }
}

class Informacao {
	private $titulo;
    private $corpo;

    public function get_titulo(){
        return $this->titulo;
    }

    public function get_corpo(){
        return $this->corpo;
    }

    public function set_titulo($titulo){
        $this->titulo = $titulo;
    }

    public function set_corpo($corpo){
        $this->corpo = $corpo;
    }
}

class ProdutoRepository extends Repository{

	public function get_all_produtos(){
		$sql = 'SELECT PRODUTO.ID_PRODUTO, PRODUTO.NOME, PRODUTO.DESCRICAO, PRODUTO.PRECO, 
        PRODUTO.NOME_CATEGORIA, INFORMACAO.TITULO, INFORMACAO.CORPO
         FROM PRODUTO JOIN INFORMACAO ON INFORMACAO.ID_PRODUTO = PRODUTO.ID_PRODUTO';
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

        $id_produto = -1;

		$produtos = array();
        $informacoes = array();
		while ($row = $stmt->fetch()){
            if ($row['ID_PRODUTO'] != $id_produto){
                $id_produto = $row['ID_PRODUTO'];

                $produto = new Produto();
            
                $produto->set_id_produto($row['ID_PRODUTO']);
                $produto->set_nome($row['NOME']);
                $produto->set_descricao($row['DESCRICAO']);
                $produto->set_preco($row['PRECO']);
                $produto->set_nome_categoria($row['NOME_CATEGORIA']);

                $produtos[] = $produto;
            }
            $informacao = new Informacao();
            
            $informacao->set_titulo($row['TITULO']);
            $informacao->set_corpo($row['CORPO']);

            $produto->add_informacao($informacao);
		}

		return $produtos;
	}
}

?>