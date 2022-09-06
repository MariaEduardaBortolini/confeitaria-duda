<?php
    include_once 'Item.class.php';
    include '../backend/Cadastro.class.php';

    session_start();

    if (!$_SESSION['user_id']) return header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");

    $cadastro = new Cadastro();
    $usuarioLogado = $cadastro->get_cadastro_by_id($_SESSION['user_id']);
    if (!$usuarioLogado['admin']) return header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");

    if(is_null($_POST['nome']) || is_null($_POST['foto']) || is_null($_POST['descr']) || is_null($_POST['prec']) || is_null($_POST['cate'])) return;
            
    $item = new Item();
    $item->set_nome($_POST['nome']);
    $item->set_descr($_POST['descr']);
    $item->set_prec($_POST['prec']);
    $item->set_cate($_POST['cate']);
    $item->set_foto($_POST['foto']);
    $item->store();

    header("location: http://localhost/confeitaria-duda/frontend/cardapio.php");
?>