<?php

class Usuario{

    public function updateUsuario($nome,$senha,$imagem){
        $sql= MySql::conectar()->prepare("UPDATE `tb_admin.users` SET name = ?, password = ?, img = ? WHERE user = ?");
        if ($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
            return true;
        }else{
            return false;
        }
    }

    public function addUsers($user,$name,$password,$img,$type_user){
        $sql= MySql::conectar()->prepare("INSERT INTO `tb_admin.users` VALUES (null,?,?,?,?,?)");
        $sql->execute(array($user,$name,$password,$type_user,$img));
    }

    public static function userExists($user){
        $sql = MySql::conectar()->prepare('SELECT `id` FROM `tb_admin.users` WHERE user=?');
        $sql->execute(array($user));
        if($sql->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }
}

?>