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
        $this->nome_categoria = $categoria;
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
    private $id_produto;

    public function get_id_produto(){
        return $this->id_produto;
    }

    public function get_corpo(){
        return $this->corpo;
    }

    public function get_titulo(){
        return $this->titulo;
    }

    public function set_titulo($titulo){
        $this->titulo = $titulo;
    }

    public function set_corpo($corpo){
        $this->corpo = $corpo;
    }
    public function set_id_produto($id_produto){
        $this->id_produto = $id_produto;
    }
}

class ProdutoRepository extends Repository{

	public function get_all_produtos(){
		$sql = 'SELECT PRODUTO.ID_PRODUTO, PRODUTO.NOME, PRODUTO.DESCRICAO, PRODUTO.PRECO, 
        PRODUTO.NOME_CATEGORIA, INFORMACAO.TITULO, INFORMACAO.CORPO
         FROM PRODUTO LEFT JOIN INFORMACAO ON INFORMACAO.ID_PRODUTO = PRODUTO.ID_PRODUTO';
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
            
            if(!empty($row['TITULO'])){
                $informacao = new Informacao();
                $informacao->set_titulo($row['TITULO']);
                $informacao->set_corpo($row['CORPO']);

                $produto->add_informacao($informacao);
            }
            
		}

		return $produtos;
	}
    
    public function get_all_produtos_admin(){
        $sql = 'SELECT ID_PRODUTO, NOME, DESCRICAO, PRECO, 
        NOME_CATEGORIA FROM PRODUTO';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

        $id_produto = -1;

		$produtos = array();
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
            
            
        }
        return $produtos;
    }

    public function get_all_informacoes_admin(){
        $sql = 'SELECT ID_PRODUTO, TITULO, CORPO 
        FROM INFORMACAO';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

        $id_produto = -1;

		$informacoes = array();
		while ($row = $stmt->fetch()){
            
                $id_produto = $row['ID_PRODUTO'];

                $informacao = new Informacao();
            
                $informacao->set_id_produto($row['ID_PRODUTO']);
                $informacao->set_titulo($row['TITULO']);
                $informacao->set_corpo($row['CORPO']);
                $informacoes[] = $informacao;
            
        
            
        }
        return $informacoes;
    }


    public function update_informacao($id_produto,$titulo,$corpo){
        $sql = 'UPDATE INFORMACAO SET CORPO = ? WHERE ID_PRODUTO = ? AND TITULO = ?';
        echo $id_produto; 
        echo $titulo;
		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$corpo,$id_produto,$titulo]);

		if (!$funcionou){
			throw new Exception('Problemas ao mudar o corpo da informação');
		}
    }


    public function update_peco($preco, $id_produto){
        $sql = 'UPDATE PRODUTO SET PRECO = ? WHERE ID_PRODUTO = ?';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$preco, $id_produto]);

		if (!$funcionou){
			throw new Exception('Problemas ao mudar o nome');
		}
    }
 

    public function delete_informacao($id_produto,$titulo){
        $sql = 'DELETE FROM INFORMACAO WHERE ID_PRODUTO = ? AND TITULO = ?';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$id_produto,$titulo]);

		if (!$funcionou){
			throw new Exception('Problemas ao deletar a informação');
		}
    }

    public function create_informacao($id_produto,$titulo,$corpo){
        $sql = 'INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
        VALUES (?, ?, ?)';

        $stmt = $this->conec->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $funcionou = $stmt->execute([$id_produto,$titulo,$corpo]);

        if (!$funcionou){
            throw new Exception('Problemas ao adicionar uma informação');
        }
    }

    public function delete_produto($id_produto){
        $sql = 'DELETE FROM PRODUTO WHERE ID_PRODUTO = ?';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$id_produto]);

		if (!$funcionou){
			throw new Exception('Problemas ao deletar o produto');
		}
    }

    public function create_produto($nome, $categoria, $descricao, $preco){
        $sql = 'INSERT INTO PRODUTO(NOME, NOME_CATEGORIA, DESCRICAO, PRECO)
        VALUES (?, ?, ?, ?)';

        $stmt = $this->conec->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $funcionou = $stmt->execute([$nome, $categoria, $descricao, $preco]);

        if (!$funcionou){
            throw new Exception('Problemas ao adicionar produto');
        }
    }

    
}



?>