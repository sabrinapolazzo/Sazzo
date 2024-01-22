
<?php
// Inclue a página conforme a classe Painel
    include('../config.php');
    if(Painel::logado() == false){
        include('login.php');
    }else{
        include('main.php');
    }
?>

