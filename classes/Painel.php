<?php
// Verifica se existe a sessão login conforme o andamento da classe MySql
     class Painel {
        
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            session_destroy();
            header('Location: ' .INCLUDE_PATH_PAINEL);
        }
    }
    
?>