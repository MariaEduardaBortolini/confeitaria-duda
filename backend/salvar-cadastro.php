<?php
    include_once 'Cadastro.class.php';

    if(is_null($_POST['cadastro_nome']) || is_null($_POST['cadastro_email']) || is_null($_POST['cadastro_senha'])) return;
            
    $cadastro = new Cadastro();
    $cadastro->set_cadastro_nome($_POST['cadastro_nome']);
    $cadastro->set_cadastro_email($_POST['cadastro_email']);
    $cadastro->set_cadastro_senha($_POST['cadastro_senha']);
    $cadastro->set_cadastro_admin(0);
    $cadastro->inserir_cadastro();
    
    header("location: http://localhost/confeitaria-duda/frontend/cardapio.php");
?>