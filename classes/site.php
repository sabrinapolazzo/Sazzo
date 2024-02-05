<?php

class Site
{
    public static function updateUsuarioOnline()
    {
        if (isset($_SESSION['online'])) {
            $token = $_SESSION['online'];
            $horarioAtual = date('Y-m-d H:i:s');
            $check = MySql::conectar()->prepare("SELECT  `id` FROM `tb_admin.online` WHERE token = ?");
            $check->execute(array($_SESSION['online']));

            if ($check->rowCount() == 1) {
                $sql = Mysql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
                $sql->execute(array($horarioAtual, $token));
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (NULL,?,?,?)");
                $sql->execute(array($ip, $horarioAtual, $token));
            }
        } else {
            $_SESSION['online'] =  uniqid();
            $token = $_SESSION['online'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $horarioAtual = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (NULL,?,?,?)");
            $sql->execute(array($ip, $horarioAtual, $token));
        }
    }

    public static function contador()
    {
        if (!isset($_COOKIE['visita'])) {
            setcookie('visita', 'true', time() + (60 * 60 * 24 * 7));
            $sql = Mysql::conectar()->prepare("insert into `tb_admin.visits` VALUES (null,?,?)");
            $sql->execute(array($_SERVER['REMOTE_ADDR'], date('Y-m-d')));
        }
    }

    public static function PegaVisitasTotais()
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visits`");
        $sql->execute();

        return $sql->rowCount();
    }


    public static function PegaVisitasHoje()
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visits` WHERE day = ? ");
        $sql->execute(array(date('Y-m-d')));

        return $sql->rowCount();
    }

    public static function listData($table, $limit, $order)
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `$table` ORDER BY $order DESC LIMIT $limit ");
        $sql->execute();
        return $sql->fetchAll();
    }
}
