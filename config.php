<?php

    session_start();
// autoload automatico das classes 
$autoload = function($class){
    if($class == 'Email'){
        require_once('classes/phpmailer/PHPMailerAutoLoad.php');
    }
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

// Caminhos do site 
define('INCLUDE_PATH', 'http://localhost/php-project01/');
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH . 'painel/');

// Banco de dados
define('HOST', 'localhost');
define('DATABASE', 'projeto_01');
define('PASSWORD', '');
define('USER', 'root');

?>
