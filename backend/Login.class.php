<?php

    include_once 'Conn.class.php';

    session_start();
    session_regenerate_id();

    class Login extends conn{

        private $email;
        private $senha;

        public function get_email(){
            return $this->email;
        }

        public function get_senha(){
            return $this->senha;
        }

        public function set_email($valor){
            $this->email = $valor;
        }

        public function set_senha($valor){
            $this->senha = $valor;
        }

        public function verificar(){

            $pdo = $this->connect();
            $sql = 'SELECT *
                    FROM cadastro
                    WHERE email = :email
                    AND senha = :senha';
            
            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(':email', $this->email);
            $resultado->bindValue(':senha', $this->senha);
            $resultado->execute();

            $pdo = $this->disconnect();
            if($resultado->rowCount() === 0) return false;

            $info = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $info[0]['id'];
            return true;
        }
    }
?>
