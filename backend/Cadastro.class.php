<?php
 
    include_once 'Conn.class.php';
    
    class Cadastro extends Conn {

        // VARIÁVEIS DOS ITENS

        private $cadastro_nome;
        private $cadastro_email;
        private $cadastro_senha;
        private $cadastro_admin;

        // GETS DOS ITENS

        public function get_cadastro_id(){
            return $this->cadastro_id;
        }

        public function get_cadastro_nome(){
            return $this->cadastro_nome;
        }

        public function get_cadastro_admin(){
            return $this->cadastro_admin;
        }

        public function get_cadastro_email(){
            return $this->cadastro_email;
        }

        public function get_cadastro_senha(){
            return $this->cadastro_senha;
        }

        // SETS DOS ITENS

        public function set_cadastro_id($valor){
            $this->cadastro_id = $valor;
        }

        public function set_cadastro_nome($valor){
            $this->cadastro_nome = $valor;
        }

        public function set_cadastro_admin($valor){
            $this->cadastro_admin = $valor;
        }

        public function set_cadastro_email($valor){
            $this->cadastro_email = $valor;
        }

        public function set_cadastro_senha($valor){
            $this->cadastro_senha = $valor;
        }

        // CRUD ITENS

        public function inserir_cadastro(){

            $pdo = Conn::connect();

            $sql = 'INSERT INTO cadastro
                (nome, email, senha, admin)
                VALUES(:nome, :email, :senha, :admin)';
                    
            $resultado = $pdo->prepare($sql);

            $resultado->bindValue(':email', $this->cadastro_email);
            $resultado->bindValue(':senha', $this->cadastro_senha);
            $resultado->bindValue(':nome', $this->cadastro_nome);
            $resultado->bindValue(':admin', $this->cadastro_admin);
            $resultado->execute();
                
            $pdo = Conn::disconnect();
        }

        public function excluir_cadastro(){

            $pdo = Conn::connect();

            if($this->cadastro_id !== null && $this->cadastro_id != ''){
                $sql = 'DELETE FROM cadastro
                    WHERE id = :id';
            }

            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':id', $this->cadastro_id);
            $resultado->execute();
            
            $pdo = Conn::disconnect();
        }

        public function listar_cadastro(){

            $pdo = Conn::connect();
            $sql = 'SELECT * FROM cadastro';
            $resultado = $pdo->prepare($sql);
            $resultado->execute();
            
            $pdo = Conn::disconnect();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cadastro_by_id($userId){

            $pdo = Conn::connect();
            $sql = "SELECT * FROM cadastro WHERE id = '" . $userId . "'";
            $resultado = $pdo->prepare($sql);
            $resultado->execute();
            $pdo = Conn::disconnect();
            
            $result = $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ($result) return $result[0];
        }

        public function validar($email){

            $pdo = $this->connect();
            $sql = 'SELECT *
                    FROM cadastro
                    WHERE email = :email';
            
            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':email', $email);
            $resultado->execute();

            $pdo = $this->disconnect();

            if($resultado->rowCount() >= 1){
                return false;
            }else{
                return true;
            }

            
        } 
    }
?>
