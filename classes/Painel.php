<?php
// Verifica se existe a sessão login conforme o andamento da classe MySql
class Painel
{

    public static function logado()
    {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout()
    {
        session_destroy();
        header('Location: ' . INCLUDE_PATH_PAINEL);
    }

    public static function loadPage()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (file_exists('pages/' . $url[0] . '.php')) {
                include('pages/' . $url[0] . '.php');
            } else {
                // página não existe
                header('Location: ' . INCLUDE_PATH_PAINEL);
            }
        } else {
            include('pages/home.php');
        }
    }

    public static function listarUsuariosOnline(){
        self::limparUsuariosOnline();
        $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function limparUsuariosOnline() {
        $date = date('Y-m-d H:i:s');
        $sql = Mysql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
    }

    public static function alertUpdate($type, $mensagem){
        if ($type == 'success') {
            echo '<div class="success mb-5"><i class="fa fa-check" ></i>' .$mensagem.'</div>';
        } else if ($type == 'erro'){
            echo '<div class="erro mb-5"><i class="fa fa-times" ></i>' .$mensagem.'</div>';
        }
    }
}

