<?php
require_once __DIR__ .'/../controllers/Controller.php';
require_once __DIR__ .'/../models/Categoria.php';

class CategoriaController extends Controller{
        public function get_all_categorias($post){
                $categoriaRepo = new CategoriaRepository();
		$_REQUEST['categorias'] = $categoriaRepo->get_all_categorias();
		$this->load_view('admin/edit_categorias.php');
        }

        public function edit_categoria($post) {
                try{
                        $old_categoria = $post['old_categoria'];
                        $categoria = $post['categoria'];
                        $categoriaRepo = new CategoriaRepository();

                        $categoriaRepo->edit_categoria($old_categoria, $categoria);
                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
                catch(Exception $e){
                        $this->show_error($e->getMessage());
                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
                
                
        }

        public function delete_categoria($post) {
                try{
                        $categoria = $post['categoria'];
                        $categoriaRepo = new CategoriaRepository();
                        
                        $categoriaRepo->delete_categoria($categoria); 

                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
                catch(Exception $e){
                        $this->show_error($e->getMessage());

                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
                
        }

        public function create_categoria($post){
                try{
                        $categoria = $post['categoria'];
                        $categoriaRepo = new CategoriaRepository();
                        
                        $categoriaRepo->create_categoria($categoria); 

                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
                catch(Exception $e){
                        $this->show_error($e->getMessage());

                        $this->load_controller('CategoriaController', 'get_all_categorias', $post);
                }
        }
}
?>
