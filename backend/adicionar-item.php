<?php
    include_once 'Carrinho.class.php';
    
    session_start();

    if(is_null($_POST['quantidade']) || is_null($_POST['item_id'])) return;
    if (!$_SESSION['user_id']) return header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");

    $carrinho = new Carrinho();
    $carrinho->set_quantidade($_POST['quantidade']);
    $carrinho->set_item_id($_POST['item_id']);
    $carrinho->set_cadastro_id($_SESSION['user_id']);
    $carrinho->store();

    header("location: http://localhost/confeitaria-duda/frontend/carrinho.php");

?>