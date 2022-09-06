<?php
 
    include_once 'Conn.class.php';
    
    class Item extends Conn {

        // VARIÁVEIS DOS ITENS

        private $id;
        private $nome;
        private $descr;
        private $prec;
        private $cate;
        private $foto;

        // GETS DOS ITENS

        public function get_id() {
            return $this->id;
        }

        public function get_nome() {
            return $this->nome;
        }

        public function get_descr() {
            return $this->descr;
        }

        public function get_prec() {
            return $this->prec;
        }

        public function get_cate() {
            return $this->cate;
        }

        public function get_foto() {
            return $this->foto;
        }

        // SETS DOS ITENS

        public function set_id($valor) {
            $this->id = $valor;
        }

        public function set_nome($valor) {
            $this->nome = $valor;
        }

        public function set_descr($valor) {
            $this->descr = $valor;
        }

        public function set_prec($valor) {
            $this->prec = $valor;
        }

        public function set_cate($valor) {
            $this->cate = $valor;
        }

        public function set_foto($valor) {
            $this->foto = $valor;
        }

        // CRUD ITENS

        public function update() {

            $pdo = Conn::connect();

            $sql = 'UPDATE item
                SET nome = :nome, descr = :descr, prec = :prec, cate = :cate, foto = :foto
                WHERE id = :id';

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':nome', $this->nome);
            $resultado->bindValue(':descr', $this->descr);
            $resultado->bindValue(':prec', $this->prec);
            $resultado->bindValue(':cate', $this->cate);
            $resultado->bindValue(':foto', $this->foto);

            $resultado->execute();

            $pdo = Conn::disconnect();
        }

        public function store() {

            $pdo = Conn::connect();

            $sql = 'INSERT INTO item
                (nome, descr, prec, cate, foto)
                VALUES(:nome, :descr, :prec, :cate, :foto)';

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':nome', $this->nome);
            $resultado->bindValue(':descr', $this->descr);
            $resultado->bindValue(':prec', $this->prec);
            $resultado->bindValue(':cate', $this->cate);
            $resultado->bindValue(':foto', $this->foto);
            
            $resultado->execute();
            
            $pdo = Conn::disconnect();
        }

        public function delete() {

            $pdo = $this->connect();

            $sql = 'DELETE FROM item
                WHERE id = :id';

            $resultado = $pdo->prepare($sql);
                        
            $resultado->bindValue(':id', $this->id);        
            $resultado->execute();
                
            $pdo = $this->disconnect();
        }

        public function list($filter) {

            $pdo = $this->connect();

            $sql = 'SELECT * FROM item';
            if ($filter) $sql .= " WHERE cate = '" . $filter . "'";
            $resultado = $pdo->prepare($sql);
            $resultado->execute();
                
            $pdo = $this->disconnect();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }


        public function get_by_id($id) {
            $pdo = $this->connect();
            
            $sql = 'SELECT * FROM item
                WHERE id = ' . $id;

            $resultado = $pdo->prepare($sql);
            $resultado->execute();
                
            $pdo = $this->disconnect();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>