<?php
    include_once 'Carrinho.class.php';

    if(is_null($_POST['id']) || is_null($_POST['quantidade'])) return;
            
    $carrinho = new Carrinho();
    $carrinho->set_id($_POST['id']);
    $carrinho->set_quantidade($_POST['quantidade']);

    if (isset($_POST['update'])) $carrinho->update();
    else $carrinho->delete();

    header("location: http://localhost/confeitaria-duda/frontend/carrinho.php");
?>