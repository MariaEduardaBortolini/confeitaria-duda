<?php
 
    include_once 'Conn.class.php';
    
    session_start();

    class Carrinho extends Conn {

        // VARIÁVEIS DOS ITENS

        private $id;
        private $quantidade;
        private $item_id;
        private $cadastro_id;

        // GETS DOS ITENS

        public function get_id() {
            return $this->id;
        }

        public function get_quantidade() {
            return $this->quantidade;
        }

        public function get_item_id() {
            return $this->item_id;
        }

        public function get_cadastro_id() {
            return $this->cadastro_id;
        }

        // SETS DOS ITENS

        public function set_id($valor) {
            $this->id = $valor;
        }

        public function set_quantidade($valor) {
            $this->quantidade = $valor;
        }

        public function set_item_id($valor) {
            $this->item_id = $valor;
        }

        public function set_cadastro_id($valor) {
            $this->cadastro_id = $valor;
        }

        // CRUD ITENS

        public function update() {

            $pdo = Conn::connect();

            $sql = 'UPDATE carrinho
                SET quantidade = :quantidade
                WHERE id = :id';

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':quantidade', $this->quantidade);
            $resultado->bindValue(':id', $this->id);
            $resultado->execute();

            $pdo = Conn::disconnect();
        }

        public function store() {

            $pdo = Conn::connect();

            $sql = 'INSERT INTO carrinho
                (quantidade, item_id, cadastro_id)
                VALUES(:quantidade, :item_id, :cadastro_id)';

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':quantidade', $this->quantidade);
            $resultado->bindValue(':item_id', $this->item_id);
            $resultado->bindValue(':cadastro_id', $this->cadastro_id);
            
            $resultado->execute();
            
            $pdo = Conn::disconnect();
        }

        public function delete() {

            $pdo = $this->connect();

            $sql = 'DELETE FROM carrinho
                WHERE id = :id';

            $resultado = $pdo->prepare($sql);
                        
            $resultado->bindValue(':id', $this->id);        
            $resultado->execute();
                
            $pdo = $this->disconnect();
        }

        public function list() {
            if(!$_SESSION['user_id']) return;

            $pdo = $this->connect();

            $sql = "SELECT * FROM carrinho WHERE cadastro_id = '" . $_SESSION['user_id'] . "'";
            $resultado = $pdo->prepare($sql);
            $resultado->execute();
                
            $pdo = $this->disconnect();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }


        public function get_by_id($id) {
            $pdo = $this->connect();
            
            $sql = 'SELECT * FROM carrinho
                WHERE id = ' . $id;

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':id', $this->id);
            $resultado->execute();
                
            $pdo = $this->disconnect();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>