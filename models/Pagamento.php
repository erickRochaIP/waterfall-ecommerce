<?php
    class Pagamento {
        private $codigo;
        private $id_pedido;
        private $endereco;
        private $tipo;
        private $total;
      
        public function set_codigo($codigo){
          $this->codigo = $codigo;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_id_pedido($id_pedido){
            $this->id_pedido = $id_pedido;
        }

        public function get_id_pedido(){
            return $this->id_pedido;
        }

        public function set_endereco($endereco){
            $this->endereco = $endereco;
        }

        public function get_endereco(){
            return $this->endereco;
        }

        public function set_tipo($tipo){
            $this->tipo = $tipo;
        }

        public function get_tipo(){
            if($this->tipo == 1){
                 return "credito";
            }
            else{
                return "debito";
            }
        }

        public function set_total($total){
            $this->total = $total;
        }

        public function get_total(){
            return $this->total;
        }
      
      }
?>