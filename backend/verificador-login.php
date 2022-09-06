<?php

    include_once 'Login.class.php';
    
    if(is_null($_POST['email']) || is_null($_POST['senha'])) return;
    
    $login = new Login();
    
    $login->set_email($_POST['email']);
    $login->set_senha($_POST['senha']);
    
    if($login->verificar()) header("location: http://localhost/confeitaria-duda/frontend/cardapio.php");
    else header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");
?>