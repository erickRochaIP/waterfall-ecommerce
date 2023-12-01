<?php
require_once __DIR__ .'/../models/Repository.php';
class CategoriaRepository extends Repository
{
        public function get_all_categorias()
        {
                $sql = 'SELECT NOME_CATEGORIA
                FROM CATEGORIA';

                $stmt = $this->conec->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                $categorias = array();
                while ($row = $stmt->fetch()) {
                        $categorias[] = $row['NOME_CATEGORIA'];
                }
                return $categorias;
        }

        public function edit_categoria($old_categoria, $categoria){
                $sql = 'UPDATE CATEGORIA SET NOME_CATEGORIA= ? WHERE NOME_CATEGORIA = ?';

		$stmt = $this->conec->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$funcionou = $stmt->execute([$categoria, $old_categoria]);

		if (!$funcionou){
			throw new Exception('Problemas ao editar o categoria');
		}
        }

        public function delete_categoria($categoria){
                $sql = 'DELETE FROM CATEGORIA WHERE NOME_CATEGORIA = ?';
                $stmt = $this->conec->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $funcionou = $stmt->execute([$categoria]);

                if (!$funcionou){
                throw new Exception("Erro ao excluir categoria");
                }
        }

        public function create_categoria($categoria){
                $sql = 'INSERT INTO CATEGORIA(NOME_CATEGORIA)
                VALUES (?)';
        
                $stmt = $this->conec->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $funcionou = $stmt->execute([$categoria]);
        
                if (!$funcionou){
                    throw new Exception('Problemas ao adicionar categoria');
                }
        }

}
?>