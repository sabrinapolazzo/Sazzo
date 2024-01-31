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
define('BASE_DIR_PAINEL',__DIR__.'/painel');

// Banco de dados
define('HOST', 'localhost');
define('DATABASE', 'sazzo');
define('PASSWORD', '');
define('USER', 'root');

// variaveis cargo painel 

$cargos = [
    '0' => 'Basic',
    '1' => 'Administrador',
    '2' => 'Super User'];

// Nome da empresa 
define('NOME_EMPRESA', 'Sazzo');


//funções do painel
function getUser($indice){
     return Painel::$cargos[$indice];
}

function menuSelecionado($par){
    $url = explode('/',@$_GET['url'])[0];
    if ($url == $par) {
        echo 'class="menu-active"';
    }
}

function permissaoMenu($permissao){
    if($_SESSION['type_user'] >= $permissao){
        return;
    }else{
        echo 'style="display:none;"';
    }
}

function permissaoPagina($permissao){
    if($_SESSION['type_user'] >= $permissao){
        return;
    }else{
        include('painel/pages/permissao_negada.php');
        die();
}
}

?>
