<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
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
define('DATABASE', 'sazzo');
define('PASSWORD', '');
define('USER', 'root');


// Nome da empresa 

define('NOME_EMPRESA', 'Sazzo');

//funções 

// Retorna o usuario do painel de controle
function getUser($typeUser){
    $arr = [
    '0' => 'Basic',
    '1' => 'Administrador',
    '2' => 'Super User'];
    
     return $arr[$typeUser];
}

?>
