<?php
// Verifica se existe a sessão login conforme o andamento da classe MySql
class Painel
{
    public static $cargos = [
        '0' => 'Basic',
        '1' => 'Administrador',
        '2' => 'Super User'
    ];

    public static function logado()
    {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout()
    {
        setcookie('remember', true, time() - 1, '/');
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

    public static function listarUsuariosOnline()
    {
        self::limparUsuariosOnline();
        $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function limparUsuariosOnline()
    {
        $date = date('Y-m-d H:i:s');
        $sql = Mysql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
    }

    public static function alertUpdate($type, $mensagem)
    {
        if ($type == 'success') {
            echo '<div class="success mb-5"><i class="fa fa-check" ></i> ' . $mensagem . '</div>';
        } else if ($type == 'erro') {
            echo '<div class="erro mb-5"><i class="fa fa-times" ></i> ' . $mensagem . '</div>';
        }
    }

    public static function imagemValida($imagem)
    {
        if (
            $imagem['type'] == 'image/jpeg' ||
            $imagem['type'] == 'image/jpg' ||
            $imagem['type'] == 'image/png'
        ) {
            $tamanho = intval($imagem['size'] / 1024);
            if ($tamanho < 300) {
                return true;
            } else {
                return false;
            }


            return true;
        } else {
            return false;
        }
    }

    public static function uploadFile($file)
    {
        $formatoArquivo = explode('.', $file['name']);
        $imagemNome = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
        if (move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL . '/uploads/' . $imagemNome)) {
            return $imagemNome;
        } else {
            return false;
        }
    }

    public static function deleteFile($file)
    {
        $filePath = BASE_DIR_PAINEL . '/uploads/' . $file;

        // Excluir o arquivo
        unlink($filePath);
    }

    public static function insert($arr)
    {
        $certo = true;
        $name_table = $arr['name_table'];
        $Query = "INSERT INTO `$name_table` VALUES (null";
        // pegando dados da tabela
        foreach ($arr as $key => $value) {
            $name = $key;
            $valor = $value;
            if ($name == 'acao' || $name == 'name_table') {
                continue;
            }
            if ($value == '') {
                $certo = false;
                break;
            }
            $Query .= ",?";
            $parametros[] = $value;
        }

        $Query .= ")";
        if ($certo == true) {
            $sql = MySql::conectar()->prepare($Query);
            $sql->execute($parametros);
            $lastId = MySql::conectar()->lastInsertId();
            $sql = MySql::conectar()->prepare("UPDATE `$name_table` SET order_id=? WHERE id = $lastId ");
            $sql->execute(array($lastId));
        }
        return $certo;
    }

    public static function selectAll($table, $start = null, $end = null)
    {
        if ($start == null && $end == null)
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` ORDER BY order_id ASC");
        else
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` ORDER BY order_id ASC  LIMIT $start,$end");

        $sql->execute();
        return $sql->fetchAll();
    }

    public static function delete($table, $id = false)
    {
        if ($id == false) {
            $sql = MySql::conectar()->prepare("DELETE FROM `$table`");
        } else {
            $sql = MySql::conectar()->prepare("DELETE FROM `$table` WHERE id = $id");
        }
        $sql->execute();
    }

    public static function redirect($url)
    {
        echo '<script>location.href="' . $url . '"</script>';
        die();
    }

    // para selecionar apenas 1 registro
    public static function select($table, $query, $arr)
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
        $sql->execute($arr);
        return $sql->fetch();
    }

    public static function update($arr)
    {
        $certo = true;
        $first = false;
        $name_table = $arr['name_table'];
        $Query = "UPDATE `$name_table` SET ";

        // pegando dados da tabela
        foreach ($arr as $key => $value) {
            $name = $key;
            $valor = $value;
            if ($name == 'acao' || $name == 'name_table' || $name == 'id') {
                continue;
            }
            if ($value == '') {
                $certo = false;
                break;
            }

            if ($first == false) {
                $first = true;
                $Query .= "$name=?";
            } else {
                $Query .= ",$name=?";
            }

            $parametros[] = $value;
        }

        if ($certo == true) {
            $parametros[] = $arr['id'];
            $sql = MySql::conectar()->prepare($Query . 'WHERE id=?');
            $sql->execute($parametros);
        }
        return $certo;
    }

    public static function order($table, $orderType, $idItem)
    {
        if ($orderType == 'up') {
            $infoCurrentItem = self::select($table, 'id=?', array($idItem));
            $order_id = $infoCurrentItem['order_id'];
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
            $itemBefore->execute();
            if ($itemBefore->rowCount() == 0) {
                return;
            }
            $itemBefore = $itemBefore->fetch();
            self::update(array('name_table' => $table, 'id' => $itemBefore['id'], 'order_id' => $infoCurrentItem['order_id']));
            self::update(array('name_table' => $table, 'id' => $infoCurrentItem['id'], 'order_id' => $itemBefore['order_id']));
        } else if ($orderType == 'down') {
            $infoCurrentItem = self::select($table, 'id=?', array($idItem));
            $order_id = $infoCurrentItem['order_id'];
            $itemAfter = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
            $itemAfter->execute();
            if ($itemAfter->rowCount() == 0) {
                return;
            }
            $itemAfter = $itemAfter->fetch();
            self::update(array('name_table' => $table, 'id' => $itemAfter['id'], 'order_id' => $infoCurrentItem['order_id']));
            self::update(array('name_table' => $table, 'id' => $infoCurrentItem['id'], 'order_id' => $itemAfter['order_id']));
        }
    }
}
