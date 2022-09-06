<?php
    include_once 'Cadastro.class.php';

    if(is_null($_POST['cadastro_nome']) || is_null($_POST['cadastro_email']) || is_null($_POST['cadastro_senha'])) return;
            
    $cadastro = new Cadastro();
    $cadastro->set_cadastro_nome($_POST['cadastro_nome']);
    $cadastro->set_cadastro_email($_POST['cadastro_email']);
    $cadastro->set_cadastro_senha($_POST['cadastro_senha']);
    $cadastro->set_cadastro_admin(0);

    if($cadastro->validar($_POST['cadastro_email'])) {
        $cadastro->inserir_cadastro();
        echo '<script>alert("Conta cadastrada com sucesso!");window.location = "http://localhost/confeitaria-duda/frontend/index.html"</script>';
    }
    else {
        echo '<script>alert("O email já está cadastrado!");window.location = "http://localhost/confeitaria-duda/frontend/index.html"</script>';
    }
    
    //header("location: http://localhost/confeitaria-duda/frontend/index.html");
?>
